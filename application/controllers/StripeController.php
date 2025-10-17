<?php

defined('BASEPATH') OR exit('No direct script access allowed');

   

class StripeController extends CI_Controller {

    

    /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function __construct() {

       parent::__construct();

       $this->load->library("session");

       $this->load->helper('url');

       
    }

    

    /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function index()

    {

        if ($this->session->userdata('login')) {
			$email=$this->session->userdata('email');
            $this->load->model('user_model');
            $api = $this->user_model->api();
            $stripe_key = $api['stripe_key'];
			$data['skucode'] = $this->input->post('skucode');
			$data['mobile'] = $this->input->post('mobile');
			$data['opt'] = $this->input->post('opt');
			$data['amount'] = $this->input->post('amount');
			$data['currency'] = $this->input->post('currency');
            $data['stripe_key'] = $stripe_key;
			$this->load->view('front/my_stripe', $data);
		}
		else{
			redirect(base_url().'auth/login');
		}

    }

       

    /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function stripePost()

    {

        if ($this->session->userdata('login')) {
            $email=$this->session->userdata('email');
            $this->load->model('user_model');
            $api = $this->user_model->api();
            $stripe_secret = $api['stripe_secret'];
            require_once('application/libraries/stripe-php/init.php');

    

        \Stripe\Stripe::setApiKey($stripe_secret);

        $customer = \Stripe\Customer::create(array(
            'name' => $this->session->userdata('name'),
            'description' => 'Mobile Recharge',
            'email' => $this->session->userdata('email'),
            "address" => ["city" => "hyd", "country" => "US", "line1" => "adsafd werew", "postal_code" => "500090", "state" => "telangana"]
        ));

        \Stripe\Customer::createSource(
            $customer->id,
            ['source' => $this->input->post('stripeToken')]
        );

        $orderID = strtoupper(str_replace('.','',uniqid('', true)));
        $charge = \Stripe\Charge::create ([

                'customer' => $customer->id,
                "amount" => 100 * $this->input->post('amount'),
                "currency" => $this->input->post('currency'),
                "description" => $this->input->post('opt').' Mobile Recharge',  
                'metadata' => array( 
                    'order_id' => $orderID ,
                    'skucode' => $this->input->post('skucode'),
                    'mobile' => $this->input->post('mobile'),
                    'opt' => $this->input->post('opt'),
                    'amount' => $this->input->post('amount'),
                    'currency' => $this->input->post('currency')
                ) 

        ]);
        // Retrieve charge details 
        $chargeJson = $charge->jsonSerialize();
        
            // Check whether the charge is successful 
    	if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 

	        // Order details 
	        $transactionID = $chargeJson['id']; 
	        $paidAmount = $chargeJson['amount']; 
	        $paidCurrency = $chargeJson['currency']; 
	        $payment_status = $chargeJson['status'];
	        $payment_date = date("Y-m-d H:i:s");
	        $dt_tm = date('Y-m-d H:i:s');
            $order_id = $chargeJson['metadata']['order_id'];
            $skucode = $chargeJson['metadata']['skucode'];
            $mobile = $chargeJson['metadata']['mobile'];
            $opt = $chargeJson['metadata']['opt'];
            $amount = $chargeJson['metadata']['amount'];

	        // Insert tansaction data into the database

	        //$sql = "insert into registration (name,email,coursename,fees,card_number,card_expirymonth,card_expiryyear,status,paymentid,added_date) values ('".$name."','".$email."','".$course."','".$price."','".$card_no."','".$card_exp_month."','".$card_exp_year."','".$payment_status."','".$transactionID."','".$dt_tm."')";
			
			
	        //mysqli_query($con,$sql) or die("Mysql Error Stripe-Charge(SQL)".mysqli_error($con));

    		

	        // If the order is successful 
	        if($payment_status == 'succeeded'){ 
                $this->load->library('Common');
                $aa='{ "SkuCode": "'.$skucode.'", "SendValue": "'.$amount.'", "AccountNumber": "'.$mobile.'", "DistributorRef": "'.$order_id.'", "ValidateOnly": "true" }';
                //$data['data'] = json_decode($this->common->SendTransfer($aa));
                $this->load->model('user_model');
                $api = $this->user_model->api();
                $Key = $api['ding_key'];
                $response = $this->common->SendTransfer($aa,$Key);
                $response_data = json_decode($response, true);
                $ProcessingState = $response_data['TransferRecord']['ProcessingState'];
                $distributor_ref = $response_data['TransferRecord']['TransferId']['DistributorRef'];
                $this->load->helper('myfunction');
                $datetime = datetime();
                
                $data = array(
                    'id' => NULL,
                    'email' => $email,
                    'credit_amount' => '0',
                    'debit_amount' => $amount,
                    'tdate' => datetime(),
                    'type' => 'Recharge Vie Card',
                    'txnid' => $order_id,
                    'status' => 'SUCCESS'
                );
                $this->user_model->transaction_insert($data);
                $datetime = datetime();
                if ($ProcessingState=='Failed' || $ProcessingState=='Cancelled' || $ProcessingState=='Cancelling') {
                    $data = array(
                        'id' => NULL,
                        'email' => $email,
                        'credit_amount' => $amount,
                        'debit_amount' => '0',
                        'tdate' => datetime(),
                        'type' => 'Refund in Wallet',
                        'txnid' => $order_id,
                        'status' => 'REFUNDED'
                    );
                    $this->user_model->transaction_insert($data);
                    $a=$this->user_model->profile($email);
                $wallet=$a['wallet'];
                $Bal=$wallet+$amount;
                $data = array(
                    'wallet' => $Bal
                );
                $this->user_model->update_wallet($data,$email);
                $data = array(
                    'id' => NULL,
                    'email' => $email,
                    'number' => $mobile,
                    'amount' => $amount,
                    'operator' => $opt,
                    'optid' => $distributor_ref,
                    'status' => 'FAILED',
                    'rch_time' => datetime(),
                    'api_log' => $response
                );
            
                $this->user_model->recharge_insert($data);
                $ordStatus = 'failure'; 
	            $statusMsg = 'Recharge Failed Your Payment has been Refunded in your Wallet!'; 
                }
                else{
                    $data = array(
                        'id' => NULL,
                        'email' => $email,
                        'number' => $mobile,
                        'amount' => $amount,
                        'operator' => $opt,
                        'optid' => $distributor_ref,
                        'status' => 'SUCCESS',
                        'rch_time' => datetime(),
                        'api_log' => $response
                    );
                
                    $this->user_model->recharge_insert($data);
                    $ordStatus = 'success'; 
	            $statusMsg = 'Your Payment has been Successful!'; 
                }
	            
                //{"TransferRecord":{"TransferId":{"TransferRef":"0","DistributorRef":"658FF5974512F694955107"},"SkuCode":"AIIN48846","Price":{"CustomerFee":0.00,"DistributorFee":0.00,"ReceiveValue":29.00,"ReceiveCurrencyIso":"INR","ReceiveValueExcludingTax":29.00,"TaxRate":0,"SendValue":0.5,"SendCurrencyIso":"USD"},"CommissionApplied":0,"ProcessingState":"Complete","AccountNumber":"919801041300"},"ResultCode":1,"ErrorCodes":[]}
                //echo $response;
	    	} else{ 
                $ordStatus = 'failure';
	            $statusMsg = "Your Payment has Failed!"; 
	        } 
	    } else{ 
	        //print '<pre>';print_r($chargeJson); 
            $ordStatus = 'failure';
	        $statusMsg = "Transaction has been failed!"; 
	    } 

        $this->session->set_flashdata($ordStatus, $statusMsg);

        //$x = json_encode($chargeJson); print_r($x);

        //redirect('my-stripe', 'refresh');
        redirect(base_url().'home/status');
        }
        else{
            redirect(base_url().'auth/login');
        }

    }

    public function addwallet()

    {

        if ($this->session->userdata('login')) {
            $email=$this->session->userdata('email');
            require_once('application/libraries/stripe-php/init.php');

    

        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        $customer = \Stripe\Customer::create(array(
            'name' => $this->session->userdata('name'),
            'description' => 'Wallet Recharge',
            'email' => $this->session->userdata('email'),
            "address" => ["city" => "hyd", "country" => "US", "line1" => "adsafd werew", "postal_code" => "500090", "state" => "telangana"]
        ));

        \Stripe\Customer::createSource(
            $customer->id,
            ['source' => $this->input->post('stripeToken')]
        );

        $orderID = strtoupper(str_replace('.','',uniqid('', true)));
        $charge = \Stripe\Charge::create ([

                'customer' => $customer->id,
                "amount" => 100 * $this->input->post('amount'),
                "currency" => $this->input->post('currency'),
                "description" => 'Wallet Recharge',  
                'metadata' => array( 
                    'order_id' => $orderID ,
                    'email' => $this->session->userdata('email'),
                    'amount' => $this->input->post('amount')
                ) 

        ]);
        // Retrieve charge details 
        $chargeJson = $charge->jsonSerialize();
        
            // Check whether the charge is successful 
    	if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 

	        // Order details 
	        $transactionID = $chargeJson['id']; 
	        $paidAmount = $chargeJson['amount']; 
	        $paidCurrency = $chargeJson['currency']; 
	        $payment_status = $chargeJson['status'];
	        $payment_date = date("Y-m-d H:i:s");
	        $dt_tm = date('Y-m-d H:i:s');
            $order_id = $chargeJson['metadata']['order_id'];
            $email = $chargeJson['metadata']['email'];
            $amount = $chargeJson['metadata']['amount'];
    		

	        // If the order is successful 
	        if($payment_status == 'succeeded'){ 
                $this->load->helper('myfunction');
                $this->load->library('Common');
                $datetime = datetime();
                $this->load->model('user_model');
                $data = array(
                    'id' => NULL,
                    'email' => $email,
                    'credit_amount' => $amount,
                    'debit_amount' => '0',
                    'tdate' => datetime(),
                    'type' => 'Add Wallet',
                    'txnid' => $order_id,
                    'status' => 'SUCCESS'
                );
                $this->user_model->transaction_insert($data);
                $a=$this->user_model->profile($email);
                $wallet=$a['wallet'];
                $Bal=$wallet+$amount;
                $data = array(
                    'wallet' => $Bal
                );
                $this->user_model->update_wallet($data,$email);
                
	            $ordStatus = 'success'; 
	            $statusMsg = 'Your Payment has been Successful Your New Wallet Balance is : $ '.$Bal; 
                
	    	} else{ 
                $ordStatus = 'failure';
	            $statusMsg = "Your Payment has Failed!"; 
	        } 
	    } else{ 
	        //print '<pre>';print_r($chargeJson); 
            $ordStatus = 'failure';
	        $statusMsg = "Transaction has been failed!"; 
	    } 

        $this->session->set_flashdata($ordStatus, $statusMsg);

        //$x = json_encode($chargeJson); print_r($x);

        //redirect('my-stripe', 'refresh');
        redirect(base_url().'home/status');
        }
        else{
            redirect(base_url().'auth/login');
        }

    }

}