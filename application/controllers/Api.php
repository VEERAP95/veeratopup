<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

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
		//$this->load->view('home');
		//redirect(base_url().'home');
        echo 'ok';
	}

    public function getOperatorcheck()
	{
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $Mobile= $data['number'];

        

		$curl = curl_init();

curl_setopt_array($curl, [
  //CURLOPT_URL => "https://www.roffer.in/api/operatorinfo.php?token=HvZv2HWGAnnMBSpedJKyj2olIEj5KkPTVnDMvaTv&mobile=$Mobile",
  CURLOPT_URL => "https://rechargezap.in/api/Recharge/getOperatorcheck",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_SSL_VERIFYPEER  => false,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST"
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
  
}
	}

    public function getOperatorPrepaid()
	{
		$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://rechargezap.in/api/Recharge/getOperatorPrepaid",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_SSL_VERIFYPEER  => false,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
echo $response;
	}

    public function getCircle()
	{
		$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://rechargezap.in/api/Recharge/getCircle",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_SSL_VERIFYPEER  => false,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
echo $response;
	}

	public function getOperatorDTH()
	{
		$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://rechargezap.in/api/Recharge/getOperatorDTH",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_SSL_VERIFYPEER  => false,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
echo $response;
	}

  public function getBalance()
	{
		$email=$this->session->userdata('email');
		$this->load->model('user_model');
		$x=$this->user_model->profile($email);
		$y = array(
            $x['wallet'], $x['email'], $x['mobile']
        );
		echo json_encode($y);
	}

	public function recharge()
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

  public function getDashboard()
	{
		// $a='{"username":"","balanceAmount":"20.00","successRecharge":"0.00","failedRecharge":"0.00","rewardPointBalance":"1.00","userId":null,"email":null,"mobile":null,"dtdata":[]}';
		// echo $a;
		$email=$this->session->userdata('email');
		$this->load->model('user_model');
		$x=$this->user_model->profile($email);
		$y = array(
            $x['wallet'], $x['email'], $x['mobile']
        );
		echo json_encode($y);
	}

	public function getUserDetail()
	{
		$email=$this->session->userdata('email');
		$this->load->model('user_model');
		$x=$this->user_model->profile($email);
		$y = array(
            $x['name'], $x['email'], $x['mobile'], $x['mpin']
        );
		echo json_encode($y);
		
	}
	//getRechargeHistory

	public function getRechargeHistory()
	{
		$email='gameserver365@gmail.com';
		$this->load->model('user_model');
		$x=$this->user_model->recharge_history($email);
		//{"username":null,"balanceAmount":null,"successRecharge":null,"failedRecharge":null,"rewardPointBalance":null,"userId":null,"email":null,"mobile":null,"dtdata":[]}
		
		print_r($x['id']);
		
	}


}
