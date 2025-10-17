<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('home');
		//redirect(base_url().'home');
	}

    public function homex()
	{
		$this->load->view('home');
		//redirect(base_url().'home');
	}

    public function recharge()
	{
		$this->load->view('home');
		//redirect(base_url().'home');
	}

	public function mobile()
	{
		$this->load->view('mobile');
		//redirect(base_url().'home');
	}

    public function dth()
	{
		$this->load->view('dth');
		//redirect(base_url().'home');
	}

    public function Landline()
	{
		$this->load->view('Landline');
		//redirect(base_url().'home');
	}

    public function Broadband()
	{
		$this->load->view('Broadband');
		//redirect(base_url().'home');
	}

    public function Cylinder()
	{
		$this->load->view('Cylinder');
		//redirect(base_url().'home');
	}

    public function gas()
	{
		$this->load->view('gas');
	}

    public function Electricity()
	{
		$this->load->view('Electricity');
	}

    public function water()
	{
		$this->load->view('water');
	}

    public function Fastag()
	{
		$this->load->view('Fastag');
	}

    public function Insurance()
	{
		$this->load->view('Insurance');
	}

	public function process()
	{
		if ($this->session->userdata('login')) {
			$email=$this->session->userdata('email');
			$mob = $this->input->post('txtDetinationMob');
			$this->load->library('Common');
			$this->load->model('user_model');
			$api = $this->user_model->api();
        	$Key = $api['ding_key'];
			$a = $this->common->GetAccountLookup($mob,$Key);
			$obj = json_decode($a);
			$aa = $obj->Items;
			$providerCode = $aa[0]->ProviderCode;
			$countryIsos = $obj->CountryIso;
			$regionCodes = $aa[0]->RegionCode;
			$accountNumber = $obj->AccountNumberNormalized;
			//print_r($regionCodes);
			//die();
			$data['mobile'] = $accountNumber;
			$data['data'] = json_decode($this->common->GetProviders($providerCode,$countryIsos,$regionCodes,$accountNumber,$Key));
			$data['data2'] = json_decode($this->common->GetProducts($providerCode,$countryIsos,$Key), true);
			
			
			$this->load->view('front/process', $data);
		}
		else{
			redirect(base_url().'auth/login');
		}
	}

	public function summary()
	{
		if ($this->session->userdata('login')) {
			$email=$this->session->userdata('email');
			$data['email'] = $email;
			$data['skucode'] = $this->input->post('skucode');
			$data['mobile'] = $this->input->post('mobile');
			$data['logo'] = $this->input->post('logo');
			$data['opt'] = $this->input->post('opt');
			$data['amount'] = $this->input->post('amount');
			$data['currency'] = $this->input->post('currency');
			$data['benefit'] = $this->input->post('benefit');
			$data['price'] = $this->input->post('price');
			$data['SendCurrencyIso'] = $this->input->post('SendCurrencyIso');
			$this->load->library('Common');
			$this->load->model('user_model');
			$api = $this->user_model->api();
        	$Key = $api['ding_key'];
			//$data['paypal_email'] = $api['paypal_email'];
			$data['PayPalClientId'] = $api['PayPalClientId'];
			$data['PayPalSecret'] = $api['PayPalSecret'];
			$data['PayPalENV'] = $api['PayPalENV'];
			$data['data'] = json_decode($this->common->GetProductDescriptions($this->input->post('skucode'),$Key));
			$this->load->view('front/summary', $data);
		}
		else{
			redirect(base_url().'auth/login');
		}
	}

	public function status()
	{
		if ($this->session->userdata('login')) {
			$email=$this->session->userdata('email');
			$error = 'Payment Cancel Please try again.';
			$this->session->set_flashdata('error',$error);
			$this->load->view('front/status');
		}
		else{
			redirect(base_url().'auth/login');
		}
	}

	public function dashboard()
	{
		if ($this->session->userdata('login')) {
			$email=$this->session->userdata('email');
			$this->load->view('front/dashboard');
		}
		else{
			redirect(base_url().'home');
		}
	}

	public function wallet()
	{
		if ($this->session->userdata('login')) {
			$email=$this->session->userdata('email');
			$this->load->model('user_model');
            $api = $this->user_model->api();
            $stripe_key = $api['stripe_key'];
			$data['stripe_key'] = $stripe_key;
			$this->load->view('front/wallet', $data);
		}
		else{
			redirect(base_url().'auth/login');
		}
	}

	public function reports()
	{
		if ($this->session->userdata('login')) {
			$email=$this->session->userdata('email');
			$this->load->model('user_model');
			$data['data'] = $this->user_model->recharge_history($email);
			$this->load->view('front/reports', $data);
		}
		else{
			redirect(base_url().'auth/login');
		}
	}


	public function addwallet()
	{
		if ($this->session->userdata('login')) {
			$email=$this->session->userdata('email');
			//$this->load->view('addwallet');
		}
		else{
			redirect(base_url().'home');
		}

		if (isset($_POST['submit'])) {
			$email=$this->session->userdata('email');
			$Amount=$this->input->post('amount');
			$this->load->model('user_model');
			
		}
	}

	public function addwalletstatus()
	{
		if (isset($_GET['results'])) {
			$results=$_GET['results'];
			if ($results=='payment cancel') {
				$error = 'Payment Cancel Please try again.';
				$this->session->set_flashdata('error',$error);
				$this->load->view('addwallet');
			}elseif ($results=='time out') {
				$error = 'Payment Time Out Please try again.';
				$this->session->set_flashdata('error',$error);
				$this->load->view('addwallet');
			}
		}
		$this->load->model('user_model');
				$status = $_POST['status']; // Its Payment Status Only, Not Txn Status.
$message = $_POST['message']; // Txn Message.
$cust_Mobile = $_POST['cust_Mobile']; // Txn Message.
$cust_Email = $_POST['cust_Email']; // Txn Message.
$Amount = $_POST['amount'];
$txn_ref_id = $_POST['txn_ref_id'];//txn_ref_id
$notes = $_POST['notes'];//txn_ref_id
$RidCheck = $this->user_model->txn_check($cust_Email,$txn_ref_id);
if ($RidCheck==!'') {
	redirect(base_url().'home');
	echo 'duplicate txnid found';
	die();
}
if($status=="SUCCESS")
{
$cust_Mobile = $cust_Mobile;
	$Email = $cust_Email;
	$Operator = $notes;
	$Amount = $Amount;
	$Amount2 = $Amount/100*2.5;
	$Amount3 = $Amount+$Amount2;
	if ($Amount < 999) {
		$Amount = $Amount;
	}else{
		$Amount = $Amount3;
	}
	$this->load->helper('myfunction');
	$this->load->library('Common');
	$datetime = datetime();
		$data = array(
			'id' => NULL,
			'email' => $Email,
			'credit_amount' => $Amount,
			'debit_amount' => '0',
			'tdate' => datetime(),
			'type' => 'Add Wallet',
			'txnid' => $txn_ref_id,
			'status' => 'SUCCESS'
		);
		$this->user_model->transaction_insert($data);
		$a=$this->user_model->profile($Email);
		$wallet=$a['wallet'];
		$newwallet=$wallet+$Amount;
		$data = array(
			'wallet' => $newwallet
		);
		$this->user_model->update_wallet($data,$Email);
		$array = array(
			'email' => $Email,
			'login' => true
		);
		$this->session->set_userdata($array);
		$success = 'Wallet Recharge Successfully .';
				$this->session->set_flashdata('success',$success);
				$this->load->view('addwallet');
}
	}

	public function profile()
	{
		if ($this->session->userdata('login')) {
			$email=$this->session->userdata('email');
			$this->load->model('user_model');
			$data['data'] = $this->user_model->profile($email);
			$this->load->view('front/profile', $data);
		}
		else{
			redirect(base_url().'home');
		}

		if (isset($_POST['btnSubmit'])) {
			$this->form_validation->set_rules('UserName', 'Name', 'trim|required');
			$this->form_validation->set_rules('Mobile', 'Mobile Number', 'trim|required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('mpin', 'M-Pin', 'trim|required|min_length[5]|max_length[5]');
			if ($this->form_validation->run() == FALSE) {
				$error = 'Some Error.';
					$this->session->set_flashdata('error',$error);
					redirect(base_url().'Profile');
			}
			else{
				$data = array(
					'name' => $this->input->post('UserName'),
					'mobile' => $this->input->post('Mobile'),
					'mpin' => $this->input->post('mpin')
				);
				$this->user_model->update_customer($data);
				$success = 'Profile Update Successfully.';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'Profile');
			}
		}
	}
	public function RechargeHistory()
	{
		if ($this->session->userdata('login')) {
			$email=$this->session->userdata('email');
			$this->load->model('user_model');
			$data['data'] = $this->user_model->recharge_history($email);
			$this->load->view('RechargeHistory', $data);
		}
		else{
			redirect(base_url().'home');
		}
	}
	public function transactions()
	{
		if ($this->session->userdata('login')) {
			$email=$this->session->userdata('email');
			$this->load->model('user_model');
			$data['data'] = $this->user_model->order_history($email);
			$this->load->view('front/transactions', $data);
		}
		else{
			redirect(base_url().'home');
		}
	}

	public function CheckAndValidateRecepient()
	{
		if ($this->session->userdata('login')) {
			$email=$this->session->userdata('email');
			$this->load->model('user_model');
			$data['data'] = $this->user_model->order_history($email);
			$this->load->view('front/transactions', $data);
		}
		else{
			echo '{"$id":"1","StatusCode":200,"Status":"Success","Description":"Successfully","Data":false}';
		}
	}

	public function About()
	{
		$this->load->view('About');
	}
	public function Terms()
	{
		$this->load->view('Terms');
	}
	public function Refund()
	{
		$this->load->view('Refund');
	}
	public function Privacy()
	{
		$this->load->view('Privacy');
	}
	public function Contact()
	{
		$this->load->model('admin_model');
		$data['data'] = $this->admin_model->websetting();
		$this->load->view('Contact', $data);
	}

	public function getPlanNewDesign()
	{
		$this->load->view('plan');
	}

	public function upi()
	{
		$this->load->view('upi/txnProcess');
	}

	public function upi2()
	{
		$this->load->view('upi/addwallet');
	}

	public function upistatus()
	{
		if (isset($_GET['results'])) {
			$results=$_GET['results'];
			if ($results=='payment cancel') {
				$this->load->view('Status/Failed');
			}elseif ($results=='time out') {
				$this->load->view('Status/Pending');
			}
		}else{
			$this->load->model('user_model');
			$status = $_POST['status']; // Its Payment Status Only, Not Txn Status.
$message = $_POST['message']; // Txn Message.
$cust_Mobile = $_POST['cust_Mobile']; // Txn Message.
$cust_Email = $_POST['cust_Email']; // Txn Message.
$Amount = $_POST['amount'];
$txn_ref_id = $_POST['txn_ref_id'];//txn_ref_id
$notes = $_POST['notes'];//txn_ref_id

$RidCheck = $this->user_model->txn_check($cust_Email,$txn_ref_id);
if ($RidCheck==!'') {
	redirect(base_url().'home');
	echo 'duplicate txnid found';
	die();
}
//echo $status;
if ($status=="SUCCESS") {
	$cust_Mobile = $cust_Mobile;
	$Email = $cust_Email;
	$Operator = $notes;
	$Amount = $Amount;
	$this->load->helper('myfunction');
	$this->load->library('Common');
	$CheckOPCode = $this->common->GetOperator($Operator);
	// $APICode = $this->common->APICode($Operator);
	// $recharge=$this->common->arivurecharge($APICode,$cust_Mobile,$Amount,$txn_ref_id);
	// if ($recharge!==false) {
	// 	$json=json_decode($recharge,true);
	// 	$Status=$json["status"];
	// 	$OperatorId=$json["opid"];
	// 	if ($Status=='Success') {
	// 		$Status = 'SUCCESS';
	// 	}elseif ($Status=='Failure') {
	// 		$Status = 'FAILED';
	// 	}elseif ($Status=='Pending') {
	// 		$Status = 'PENDING';
	// 	}else{
	// 		$Status = $Status;
	// 	}
	// }
	$apis= $this->user_model->apicheck($CheckOPCode);
				$api=$apis['api'];
				// print_r($api);
				// die();
				if ($api=='arivurecharge') {
					$APICode = $this->common->APICode($Operator);
				$recharge=$this->common->arivurecharge($APICode,$cust_Mobile,$Amount,$txn_ref_id);
				if ($recharge!==false) {
		$json=json_decode($recharge,true);
		$Status=$json["status"];
		$OperatorId=$json["opid"];
		if ($Status=='Success') {
			$Status = 'SUCCESS';
		}elseif ($Status=='Failure') {
			$Status = 'FAILED';
		}elseif ($Status=='Pending') {
			$Status = 'PENDING';
		}else{
			$Status = $Status;
		}
	}
				}elseif ($api=='lapuapi') {
					$APICode = $this->common->LapuAPICode($Operator);
				$recharge=$this->common->lapuapi($APICode,$cust_Mobile,$Amount,$txn_ref_id);
				if ($recharge!==false) {
		$json=json_decode($recharge,true);
		$Status=$json["Status"];
		$OperatorId=$json["Operatorid"];
		if ($Status=='SUCCESS') {
			$Status = 'SUCCESS';
		}elseif ($Status=='FAILED') {
			$Status = 'FAILED';
		}elseif ($Status=='PENDING') {
			$Status = 'PENDING';
		}else{
			$Status = $Status;
		}
	}
				}
	
	$data = array(
		'id' => NULL,
		'email' => $Email,
		'number' => $cust_Mobile,
		'amount' => $Amount,
		'operator' => $CheckOPCode,
		'optid' => $OperatorId,
		'status' => $Status,
		'rch_time' => datetime(),
		'api_log' => $recharge
	);

	$this->user_model->recharge_insert($data);

	$data = array(
		'id' => NULL,
		'email' => $Email,
		'credit_amount' => '0',
		'debit_amount' => $Amount,
		'tdate' => datetime(),
		'type' => 'RECHARGE',
		'txnid' => $txn_ref_id,
		'status' => 'SUCCESS'
	);
	$this->user_model->transaction_insert($data);
	

	if ($Status=='FAILED') {
		$array = array(
			'txnid' => $txn_ref_id
		);
		$this->session->set_userdata($array);
		$datetime = datetime();
		$data = array(
			'id' => NULL,
			'email' => $Email,
			'credit_amount' => $Amount,
			'debit_amount' => '0',
			'tdate' => datetime(),
			'type' => 'REFUND',
			'txnid' => $txn_ref_id,
			'status' => 'REFUNDED'
		);
		$this->user_model->transaction_insert($data);
		$a=$this->user_model->profile($Email);
		$wallet=$a['wallet'];
		$newwallet=$wallet+$Amount;
		$data = array(
			'wallet' => $newwallet
		);
		$this->user_model->update_wallet($data,$Email);
		$array = array(
			'email' => $Email,
			'login' => true
		);
		$this->session->set_userdata($array);
		$this->load->view('Status/Refund');

	}
	$datax['data'] = array(
		'email' => $Email,
		'txnid' => $txn_ref_id,
		'number' => $cust_Mobile,
		'amount' => $Amount,
		'operator' => $CheckOPCode,
		'optid' => $OperatorId,
		'status' => $Status,
	);
	$array = array(
		'email' => $Email,
		'login' => true
	);
	$this->session->set_userdata($array);
	$this->load->view('Status/Success', $datax);
}else{
	echo 'error';
}
			
		}
	}

	public function pay()
	{
		$Operator=$_GET['o'];
		$this->load->library('Common');
	$CheckOPCode = $this->common->GetOperator($Operator);
	$APICode = $this->common->APICode($Operator);
	$cust_Mobile = $_GET['m'];
	$Amount = $_GET['a'];
	$txn_ref_id=$_GET['t'];
	$recharge=$this->common->arivurecharge($APICode,$cust_Mobile,$Amount,$txn_ref_id);

	if ($recharge!==false) {
		echo $recharge;
	}
		
	}

	public function RechargePayment()
	{
		if ($this->session->userdata('login')) {
			$email=$this->session->userdata('email');
			$Amount = $this->input->post('RechargeAmount',true);
			$this->load->model('user_model');
			$a= $this->user_model->profile($email);
			$wallet=$a['wallet'];
			$wallet2=$wallet+1;
			//$newwallet=$wallet+$Amount;
			if ($wallet2 > $Amount) {
				$this->load->helper('myfunction');
				$this->load->library('Common');
				$ra=rand();
				$txn_ref_id = $ra."W".time();
				$cust_Mobile = $this->input->post('RechargeMobile',true);
				$CheckOPCode = $this->common->GetOperator($this->input->post('OperatorCode',true));
				$apis= $this->user_model->apicheck($CheckOPCode);
				$api=$apis['api'];
				// print_r($api);
				// die();
				if ($api=='arivurecharge') {
					$APICode = $this->common->APICode($this->input->post('OperatorCode',true));
				$recharge=$this->common->arivurecharge($APICode,$cust_Mobile,$Amount,$txn_ref_id);
				if ($recharge!==false) {
		$json=json_decode($recharge,true);
		$Status=$json["status"];
		$OperatorId=$json["opid"];
		if ($Status=='Success') {
			$Status = 'SUCCESS';
		}elseif ($Status=='Failure') {
			$Status = 'FAILED';
		}elseif ($Status=='Pending') {
			$Status = 'PENDING';
		}else{
			$Status = $Status;
		}
	}
				}elseif ($api=='lapuapi') {
					$APICode = $this->common->LapuAPICode($this->input->post('OperatorCode',true));
				$recharge=$this->common->lapuapi($APICode,$cust_Mobile,$Amount,$txn_ref_id);
				if ($recharge!==false) {
		$json=json_decode($recharge,true);
		$Status=$json["Status"];
		$OperatorId=$json["Operatorid"];
		if ($Status=='SUCCESS') {
			$Status = 'SUCCESS';
		}elseif ($Status=='FAILED') {
			$Status = 'FAILED';
		}elseif ($Status=='PENDING') {
			$Status = 'PENDING';
		}else{
			$Status = $Status;
		}
	}
				}
				
	if ($Status=='SUCCESS' || $Status=='PENDING') {
		$newwallet=$wallet-$Amount;
		$data = array(
			'wallet' => $newwallet
		);
		$this->user_model->update_wallet($data,$email);
		
		$data = array(
			'id' => NULL,
			'email' => $email,
			'number' => $cust_Mobile,
			'amount' => $Amount,
			'operator' => $CheckOPCode,
			'optid' => $OperatorId,
			'status' => $Status,
			'rch_time' => datetime(),
			'api_log' => $recharge
		);
	
		$this->user_model->recharge_insert($data);
	
		$data = array(
			'id' => NULL,
			'email' => $email,
			'credit_amount' => '0',
			'debit_amount' => $Amount,
			'tdate' => datetime(),
			'type' => 'RECHARGE Vie Wallet',
			'txnid' => $txn_ref_id,
			'status' => 'SUCCESS'
		);
		$this->user_model->transaction_insert($data);
		$datax['data'] = array(
			'email' => $email,
			'txnid' => $txn_ref_id,
			'number' => $cust_Mobile,
			'amount' => $Amount,
			'operator' => $CheckOPCode,
			'optid' => $OperatorId,
			'status' => $Status,
		);
		$array = array(
			'email' => $email,
			'login' => true
		);
		$this->session->set_userdata($array);
		$this->load->view('Status/Success', $datax);
	}else{
		$datax['data'] = array(
			'email' => $email,
			'txnid' => $txn_ref_id,
			'number' => $cust_Mobile,
			'amount' => $Amount,
			'operator' => $CheckOPCode,
			'status' => $Status,
		);
		$this->load->view('Status/Failed', $datax);
	}
			}else{
				$this->load->library('Common');
			$CheckOPCode = $this->common->GetOperator($this->input->post('OperatorCode',true));
			$array = array(
				'RechargeAmount' => $this->input->post('RechargeAmount',true),
				'OperatorCode' => $this->input->post('OperatorCode',true),
				'RechargeMobile' => $this->input->post('RechargeMobile',true),
				'Operator' => $CheckOPCode
			);
			$this->session->set_userdata($array);
			//$this->load->view('TransactionHistory', $data);
			redirect(base_url().'upi');
			}
			
		}
		else{
			redirect(base_url().'home');
		}
	}

	public function test()
	{
//SkuCode=AIIN48846&SendValue=0.49&AccountNumber=919801041300&DistributorRef=1234567890&ValidateOnly=true
		$aa='{ "SkuCode": "AIIN48846", "SendValue": "0.49", "AccountNumber": "919801041300", "DistributorRef": "1234567890", "ValidateOnly": "true" }';
		
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.dingconnect.com/api/V1/SendTransfer',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $aa,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json', // Changed the Content-Type
    'api_key: Io8S9F39rIc5XfLuNMvAXe'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

// Check the response from the API
if ($response === false) {
    echo 'cURL Error: ' . curl_error($curl);
} else {
    echo $response;
}

	}
	
}
