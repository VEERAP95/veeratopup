<?php

defined('BASEPATH') OR exit('No direct script access allowed');

   

class Paypal extends CI_Controller {

    

    public function __construct() {

       parent::__construct();

       $this->load->library("session");

       $this->load->helper('url');

       
    }

    

    public function index()

    {
        //s=AIIN48846&m=919801041300&o=Airtel%20India&a=0.5&e=gameserver365@gmail.com
        $skucode = $_GET['s'];
        $mobile = $_GET['m'];
        $opt = $_GET['o'];
        $payment_gross = $_GET['a'];
        $amount = $payment_gross;
        $email = $_GET['e'];
        $item_name = $_GET['item_name'];
        $order_id = $_GET['paymentID'];

        $this->load->model('user_model');
    $QrTCheck=$this->user_model->txncheck($order_id);
    if (!$QrTCheck) {
        if ($item_name=='Add Wallet') {
            $this->load->helper('myfunction');
                $this->load->library('Common');
                $datetime = datetime();
                $this->load->model('user_model');
                $data = array(
                    'id' => NULL,
                    'email' => $email,
                    'credit_amount' => $payment_gross,
                    'debit_amount' => '0',
                    'tdate' => datetime(),
                    'type' => 'Add Wallet',
                    'txnid' => $order_id,
                    'status' => 'SUCCESS'
                );
                $this->user_model->transaction_insert($data);
                $a=$this->user_model->profile($email);
                $wallet=$a['wallet'];
                $Bal=$wallet+$payment_gross;
                $data = array(
                    'wallet' => $Bal
                );
                $this->user_model->update_wallet($data,$email);
                $ordStatus = 'success'; 
	            $statusMsg = 'Your Payment has been Successful Your New Wallet Balance is : $ '.$Bal;
                $this->session->set_flashdata($ordStatus, $statusMsg);
                redirect(base_url().'home/status');
        }
        elseif ($item_name=='Recharge') {
            $this->load->library('Common');
                $aa='{ "SkuCode": "'.$skucode.'", "SendValue": "'.$amount.'", "AccountNumber": "'.$mobile.'", "DistributorRef": "'.$order_id.'", "ValidateOnly": "false" }';
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
                    'type' => 'Recharge Vie Paypal',
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
                $this->session->set_flashdata($ordStatus, $statusMsg);
                redirect(base_url().'home/status');
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
                $this->session->set_flashdata($ordStatus, $statusMsg);  
                redirect(base_url().'home/status');
                }
            
        }
    }else{
        $ordStatus = 'failure';
	        $statusMsg = "Transaction has been failed!";
            $this->session->set_flashdata($ordStatus, $statusMsg);
        redirect(base_url().'home/status');
    }

    }


    public function callback()

    {

        
/* 
 * Read POST data 
 * reading posted data directly from $_POST causes serialization 
 * issues with array data in POST. 
 * Reading raw POST data from input stream instead. 
 */         
$raw_post_data = file_get_contents('php://input'); 
$raw_post_array = explode('&', $raw_post_data); 
$myPost = array(); 
foreach ($raw_post_array as $keyval) { 
    $keyval = explode ('=', $keyval); 
    if (count($keyval) == 2) 
        $myPost[$keyval[0]] = urldecode($keyval[1]); 
} 
 
// Read the post from PayPal system and add 'cmd' 
$req = 'cmd=_notify-validate'; 
if(function_exists('get_magic_quotes_gpc')) { 
    $get_magic_quotes_exists = true; 
} 
foreach ($myPost as $key => $value) { 
    if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
        $value = urlencode(stripslashes($value)); 
    } else { 
        $value = urlencode($value); 
    } 
    $req .= "&$key=$value"; 
} 
 
/* 
 * Post IPN data back to PayPal to validate the IPN data is genuine 
 * Without this step anyone can fake IPN data 
 */ 
$paypalURL = PAYPAL_URL; 
$ch = curl_init($paypalURL); 
if ($ch == FALSE) { 
    return FALSE; 
} 
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $req); 
curl_setopt($ch, CURLOPT_SSLVERSION, 6); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1); 
 
// Set TCP timeout to 30 seconds 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name')); 
$res = curl_exec($ch); 
 
/* 
 * Inspect IPN validation result and act accordingly 
 * Split response headers and payload, a better way for strcmp 
 */  
$tokens = explode("\r\n\r\n", trim($res)); 
$res = trim(end($tokens)); 
if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) { 
     
    // Retrieve transaction info from PayPal
    $item_number    = $_POST['item_number']; 
    $order_id         = $_POST['txn_id'];  
    $item_name         = $_POST['item_name']; 
    $payment_gross     = $_POST['mc_gross']; 
    $currency_code     = $_POST['mc_currency']; 
    $payment_status = $_POST['payment_status']; 
    $custom = $_POST['custom'];
    $custom2 = explode(",", $custom);
    $skucode = $custom2[0];
    $mobile = $custom2[1];
    $opt = $custom2[2];
    $amount = $custom2[3];
    $email = $custom2[4];
     
    // Check if transaction data exists with the same TXN ID 
    $this->load->model('user_model');
    $QrTCheck=$this->user_model->txncheck($order_id);
    if (!$QrTCheck) {
        if ($item_name=='Add Wallet') {
            $this->load->helper('myfunction');
                $this->load->library('Common');
                $datetime = datetime();
                $this->load->model('user_model');
                $data = array(
                    'id' => NULL,
                    'email' => $email,
                    'credit_amount' => $payment_gross,
                    'debit_amount' => '0',
                    'tdate' => datetime(),
                    'type' => 'Add Wallet',
                    'txnid' => $order_id,
                    'status' => 'SUCCESS'
                );
                $this->user_model->transaction_insert($data);
                $a=$this->user_model->profile($email);
                $wallet=$a['wallet'];
                $Bal=$wallet+$payment_gross;
                $data = array(
                    'wallet' => $Bal
                );
                $this->user_model->update_wallet($data,$email);
        }
        elseif ($item_name=='Recharge') {
            $this->load->library('Common');
                $aa='{ "SkuCode": "'.$skucode.'", "SendValue": "'.$amount.'", "AccountNumber": "'.$mobile.'", "DistributorRef": "'.$order_id.'", "ValidateOnly": "false" }';
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
                    'type' => 'Recharge Vie Paypal',
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
                     
                }
            
        }
    }
 
} 

    }

    
    public function status()

    {
        $PayerID    = $_GET['PayerID']; 
        if ($PayerID) {
            $ordStatus = 'success'; 
	        $statusMsg = 'Your Payment has been Successful';
        }else{
            $ordStatus = 'failure';
            $statusMsg = "Your Payment has Failed!";
        }
        $this->session->set_flashdata($ordStatus, $statusMsg);
        redirect(base_url().'home/status');
        //$this->load->view('front/paypal_status');

    }

    public function addwallet()

    { 
        $this->load->model('user_model');
        $api = $this->user_model->api();
        $data['PayPalClientId'] = $api['PayPalClientId'];
        $data['PayPalSecret'] = $api['PayPalSecret'];
        $data['PayPalENV'] = $api['PayPalENV'];
        $data['amount']    = $_POST['amount'];
        $this->load->view('front/addwallet', $data);

    }

}