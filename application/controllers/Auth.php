<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('auth_model');
    }

	public function index()
	{
		//$this->load->view('front/home');
        echo 'Error';
	}
	public function login()
	{
        $error = '';

        if(isset($_POST['submit'])) {
            $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('Password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('front/login');
                }
                else
                {
                    $your_secret = "6LeejYEUAAAAADavq0pIUmbOMWiHqQptkeZj2U39";
    $client_captcha_response = $_POST['g-recaptcha-response'];
    $user_ip = $_SERVER['REMOTE_ADDR'];

    //$captcha_verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$your_secret&response=$client_captcha_response&remoteip=$user_ip");
        $curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify?secret=$your_secret&response=$client_captcha_response&remoteip=$user_ip",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
]);

$captcha_verify = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
    $captcha_verify_decoded = json_decode($captcha_verify);
     if ($captcha_verify_decoded->success) {
       // Getting the form data
       $email = strtolower($this->security->xss_clean($this->input->post('Email',true)));
       $password = md5($this->input->post('Password',true));

       // Checking the email address
       $un = $this->auth_model->check_email($email);

       if(!$un) {
           $error = 'Email address is wrong!';
           $this->session->set_flashdata('error',$error);
           redirect(base_url().'auth/login');

       } else {

           // When email found, checking the password
           $pw = $this->auth_model->check_password($email,$password);

           if(!$pw) {
               
               $error = 'Password is wrong!';
               $this->session->set_flashdata('error',$error);
               redirect(base_url().'auth/login');

           } else {

               // When email and password both are correct
               $array = array(
                   'id' => $pw['id'],
                   'name' => $pw['name'],
                   'email' => $pw['email'],
                   'password' => $pw['password'],
                   'login' => true
               );
               $this->session->set_userdata($array);
               redirect(base_url().'home/dashboard');
           }
       }
     } else {
        $error = 'Captcha Error!';
        $this->session->set_flashdata('error',$error);
        redirect(base_url().'auth/login');   
    }              
                        
                }
            

            
        } else {
            $this->load->view('front/login');    
        }
    }
	public function forgot()
	{
		$error = '';

        if(isset($_POST['submit'])) {
            $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
            if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('front/forgot-password');
                }
                else
                {
                    $your_secret = "6LeejYEUAAAAADavq0pIUmbOMWiHqQptkeZj2U39";
    $client_captcha_response = $_POST['g-recaptcha-response'];
    $user_ip = $_SERVER['REMOTE_ADDR'];

    //$captcha_verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$your_secret&response=$client_captcha_response&remoteip=$user_ip");
        $curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify?secret=$your_secret&response=$client_captcha_response&remoteip=$user_ip",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
]);

$captcha_verify = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
    $captcha_verify_decoded = json_decode($captcha_verify);
    //print_r($captcha_verify_decoded);
    //die();
                        // Getting the form data
            if ($captcha_verify_decoded->success) {
                $email = strtolower($this->security->xss_clean($this->input->post('Email',true)));

            // Checking the email address
            $un = $this->auth_model->check_email($email);

            if(!$un) {
                $error = 'Email address is wrong!';
                $this->session->set_flashdata('error',$error);
                redirect(base_url().'auth/forgot');

            } else {
                $cp = $this->auth_model->change_password($email);
                $this->load->helper('myfunction');
                $subject = "New Password";
                $message = "Your New Password is: $cp";
                $template = 'email/otp.php';
                $emaildata = array(
                    'Name'=> $un['name'],
                    'Email'=> $email,
                    'Subject'=> $subject,
                    'Message'=> $message,
                    'Template'=> $template
                );
                sendemail($emaildata);
                $success = 'Password Changed Successfully!';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'auth/forgot');
                
            }
            }else {
                $error = 'Captcha Error!';
                $this->session->set_flashdata('error',$error);
                redirect(base_url().'auth/forgot');   
            }
                }
            

            
        } else {
            $this->load->view('front/forgot-password');    
        }
	}
    public function register()
	{
		$error = '';

        if(isset($_POST['submit'])) {
            //$this->form_validation->set_rules('CountryID', 'CountryID', 'trim|required');
            $this->form_validation->set_rules('MobileNo', 'Mobile', 'trim|required');
            $this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
            $this->form_validation->set_rules('LastName', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('Password', 'Password', 'trim|required');
            //$this->form_validation->set_rules('ConfirmPassword', 'Confirm Password', 'trim|required|matches[password]');
            if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('front/register');
                }
                else
                {
                    $your_secret = "6LeejYEUAAAAADavq0pIUmbOMWiHqQptkeZj2U39";
    $client_captcha_response = $_POST['g-recaptcha-response'];
    $user_ip = $_SERVER['REMOTE_ADDR'];

    //$captcha_verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$your_secret&response=$client_captcha_response&remoteip=$user_ip");
        $curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify?secret=$your_secret&response=$client_captcha_response&remoteip=$user_ip",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
]);

$captcha_verify = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
    $captcha_verify_decoded = json_decode($captcha_verify);
    
                        // Getting the form data
            if ($captcha_verify_decoded->success) {
                $CountryID = $this->input->post('CountryID',true);
            $fname = $this->input->post('FirstName',true);
            $lname = $this->input->post('LastName',true);
            $name = $fname.' '.$lname;
            $MobileNo = $this->input->post('MobileNo',true);
            $Mobile = $CountryID.$MobileNo;
            $email = strtolower($this->security->xss_clean($this->input->post('Email',true)));
            $password = $this->input->post('Password',true);
            $password2 = md5($password);

            // Checking the email address
            $un = $this->auth_model->check_email($email);

            if($un) {
                $error = 'Email address already exists!';
                $this->session->set_flashdata('error',$error);
                redirect(base_url().'auth/register');

            } else {
                $this->load->helper('myfunction');
                $register = $this->auth_model->register($name, $email, $password2, $Mobile);
                $subject = "Welcome Mail from topupfleet.com";
                $message = "Your Login Id: $email and Password is: $password";
                $template = 'email/welcome.php';
                $emaildata = array(
                    'Name'=> $name,
                    'Email'=> $email,
                    'Subject'=> $subject,
                    'Message'=> $message,
                    'Template'=> $template
                );
                sendemail($emaildata);
                $success = 'Account Create Successfully!';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'auth/register');
                
            }
            }else {
                $error = 'Captcha Error!';
                $this->session->set_flashdata('error',$error);
                redirect(base_url().'auth/register');   
            }
                }
            

            
        } else {
            $this->load->view('front/register');    
        }
	}
    public function logout()
	{
		$this->session->sess_destroy();
        redirect(base_url().'auth/login');
	}
	
}
