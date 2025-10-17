<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common { 
	public function getDate()
	{
		putenv("TZ=Asia/Calcutta");
		date_default_timezone_set('Asia/Calcutta');
		$date = date("Y-m-d h:i:s A");		
		return $date; 
	}
	public function GetPassword()
	{
		$n = rand(10e16, 10e20);
		$number = base_convert($n, 10, 36)."".base_convert($n, 15, 36);
		return substr($number,0,8);										
	}
	public function getOTP()
	{
		$n = rand(100001, 999999);
		return $n;										
	}
	

	public function getRealIpAddr()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
		{
		  $ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
		{
		  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
		  $ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

    public function GetAccountLookup($a,$Key)
	{
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.dingconnect.com/api/V1/GetAccountLookup?accountNumber=$a",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            "api_key: $Key "
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;  
        //echo $response;							
	}

    public function GetProviders($providerCode,$countryIsos,$regionCodes,$accountNumber,$Key)
	{	
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.dingconnect.com/api/V1/GetProviders?providerCodes=$providerCode&countryIsos=$countryIsos&regionCodes=$regionCodes&accountNumber=$accountNumber",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    "api_key: $Key "
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return $response;  
	}	
 

    public function GetProducts($providerCode,$countryIsos,$Key)
	{
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.dingconnect.com/api/V1/GetProducts?countryIsos=$countryIsos&providerCodes=$providerCode",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            "api_key: $Key "
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;								
	}
 

 public function GetProductDescriptions($skuCodes,$Key)
{
     $curl = curl_init();

     curl_setopt_array($curl, array(
       CURLOPT_URL => "https://api.dingconnect.com/api/V1/GetProductDescriptions?skuCodes=$skuCodes",
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_ENCODING => '',
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 0,
       CURLOPT_SSL_VERIFYPEER => false,
       CURLOPT_FOLLOWLOCATION => true,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => 'GET',
       CURLOPT_HTTPHEADER => array(
        "api_key: $Key "
       ),
     ));
     
     $response = curl_exec($curl);
     
     curl_close($curl);
     return $response;								
}
 

public function SendTransfer($aa,$Key)
{
  //$aa='{ "SkuCode": "AIIN48846", "SendValue": 1, "AccountNumber": "919801041300", "DistributorRef": "1234567890", "ValidateOnly": "true" }';
		
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.dingconnect.com/api/V1/SendTransfer',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $aa,
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json', // Changed the Content-Type
      "api_key: $Key "
    ),
  ));
  
  $response = curl_exec($curl);
  
  curl_close($curl);	
  return $response;		
}


	
	
}