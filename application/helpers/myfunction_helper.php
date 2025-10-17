<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function ip()
{
    error_reporting(0);
    $ip=$_SERVER['REMOTE_ADDR'];
    $ip2=$_SERVER["HTTP_CF_CONNECTING_IP"];
    if ($ip2=='') {
    $ip3=$ip;
}
elseif ($ip2!=='') {
    $ip3=$ip2;
    return $ip;
}
}

function getTxnId(){
    $t = &get_instance();
    $data = array('id' => NULL);
    $str = $t->db->insert('get_txnid', $data);
    return $t->db->insert_id();
}

function LapuBalance($userid){
    $t = &get_instance();
    
             $data=$t->db
             ->select('SUM(airtel) + SUM(vodafone) + SUM(idea) + SUM(jio) + SUM(bsnl) + SUM(mtnl) + SUM(dishtv) + SUM(videocond2h) + SUM(airteldth) + SUM(tatasky) + SUM(suntv) + SUM(airtelmoney) +SUM(jiolite) as total', FALSE)
             ->from('user_balance')
              ->where('userid', $userid)
             ->get();
         return $data->result();
} 

function GetWallet($userid){
    $t = &get_instance();
    
             $data=$t->db
             ->select('wallet')
             ->from('users')
              ->where('email', $userid)
             ->get();
         return $data->result();
} 

function GetState(){
    $t = &get_instance();
    
             $data=$t->db
             ->select('states')
             ->from('states')
             ->get();
         return $data->result();
}

function GetName($userid){
    $t = &get_instance();
    
             $data=$t->db
             ->select('name')
             ->from('users')
             ->where('email', $userid)
             ->get();
             return $data->result();
}

function GetMobile($userid){
    $t = &get_instance();
    
             $data=$t->db
             ->select('mobile')
             ->from('users')
             ->where('email', $userid)
             ->get();
             return $data->result();
}

function plan_check($userid){
    $t = &get_instance();
    
             $data=$t->db
             ->select('*')
             ->from('customer_plan')
             ->where('userid', $userid)
             ->get();
         return $data->first_row('array');
}

function datetime(){
    date_default_timezone_set("Asia/Kolkata");
		$datetime=date('Y-m-d H:i:s');
        return $datetime;
}

function SaleCount($a){
    $t = &get_instance();
    
             $data=$t->db
             ->select('sum(amount) as total', FALSE)
             ->from('rech_reports')
              ->where('status', 'SUCCESS')
              ->where('rch_time BETWEEN NOW() - INTERVAL '.$a.' DAY AND NOW()', "", false)
             ->get();
         return $data->result();
}

function ChartOne($a){
    $t = &get_instance();
    $pm = (int) date('n', strtotime('-'.$a.' months'));
        $pmy = (int) date('Y', strtotime('-1 months'));
             $data=$t->db
             ->select('sum(amount) as total', FALSE)
             ->from('rech_reports')
              ->where('MONTH(rch_time)', $pm)
              ->where('YEAR(rch_time)', $pmy)
             ->get();
          $a = $data->result();
          $jsonobj= json_encode($a);
    $obj = json_decode ($jsonobj, true);
    $ax=$obj[0]["total"];
    $ax = number_format($ax);
    return $ax;
}

function ChartOnex($a){
    $t = &get_instance();
    $pm = (int) date('n', strtotime('-'.$a.' months'));
        $pmy = (int) date('Y', strtotime('-1 months'));
             $data=$t->db
             ->select('sum(amount) as total', FALSE)
             ->from('rech_reports')
             ->where('status', 'SUCCESS')
              ->where('MONTH(rch_time)', $pm)
              ->where('YEAR(rch_time)', $pmy)
             ->get();
          $a = $data->result();
          $jsonobj= json_encode($a);
    $obj = json_decode ($jsonobj, true);
    $ax=$obj[0]["total"];
    $ax = number_format($ax);
    return $ax;
}

function GetDingApi(){
    $t = &get_instance();
             $data=$t->db
             ->select('*')
             ->from('api')
             ->where('id', 1)
             ->get();
             return $data->first_row('array');
}

function GetPage($a){
    $t = &get_instance();
    
             $data=$t->db
             ->select($a)
             ->from('webpage')
             ->where('id', 1)
             ->get();
             return $data->first_row('array');
}

function getSmsUrl($mobile, $message)
{
	$Baseurl = "https://5sms.in/api/trans.php?token=s&senderid=PHPMEP";
	$result = "$Baseurl&mobile=".$mobile."&message=".$message."";
	return $result;
}

function sendsms($mobile, $message)
{
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL, getSmsUrl(trim($mobile), urlencode($message)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result_curl=curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
}
function sendemail($emaildata)
{
    $t = &get_instance();
    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp-relay.brevo.com',
        'smtp_port' => 587,
        'smtp_user' => 'gameserver365@gmail.com', // change it to yours
        'smtp_pass' => 'hsCz920AImUpRVTS', // change it to yours
        'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
        'mailtype' => 'html', //plaintext 'text' mails or 'html'
        'smtp_timeout' => '4', //in seconds
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
      );
      
            $t->load->library('email', $config);
            $t->email->set_newline("\r\n");
            $t->email->from('admin@topupfleet.com', 'topupfleet.com');
            $data = array(
                'Message'=> $emaildata['Message']
            );
            $t->email->to($emaildata['Email']);
            $t->email->subject($emaildata['Subject']);
            $body = $t->load->view($emaildata['Template'],$data,TRUE);
            $t->email->message($body);
            $t->email->send();
            return;
            
}
