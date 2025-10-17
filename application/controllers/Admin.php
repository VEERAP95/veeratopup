<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
    }

	public function index()
	{
        $error = '';

        if(isset($_POST['submit'])) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('admin/login');
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
						$email = strtolower($this->security->xss_clean($this->input->post('email',true)));
						$password = md5($this->input->post('password',true));
			
						// Checking the email address
						$un = $this->admin_model->check_email($email);
			
						if(!$un) {
							$error = 'Email address is wrong!';
							$this->session->set_flashdata('error',$error);
							redirect(base_url().'admin');
			
						} else {
			
							// When email found, checking the password
							$pw = $this->admin_model->check_password($email,$password);
			
							if(!$pw) {
								
								$error = 'Password is wrong!';
								$this->session->set_flashdata('error',$error);
								redirect(base_url().'admin');
			
							} else {
			
								// When email and password both are correct
								$array = array(
									'id' => $pw['id'],
									'name' => $pw['name'],
									'email' => $pw['email'],
									'password' => $pw['password'],
									'status' => $pw['status']
								);
								$this->session->set_userdata($array);
								redirect(base_url().'admin/dashboard');
							}
						}
					}else {
						$error = 'Captcha Error!';
						$this->session->set_flashdata('error',$error);
						redirect(base_url().'admin');   
					}
                        
                }
            

            
        } else {
            $this->load->view('admin/login');    
        }
    }
	public function forgot()
	{
		$error = '';

        if(isset($_POST['submit'])) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('admin/forgot');
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
							$email = strtolower($this->security->xss_clean($this->input->post('email',true)));

							// Checking the email address
							$un = $this->admin_model->check_email($email);
				
							if(!$un) {
								$error = 'Email address is wrong!';
								$this->session->set_flashdata('error',$error);
								redirect(base_url().'admin/forgot');
				
							} else {
								$cp = $this->admin_model->change_password($email);
								echo $cp;
								//die();
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
								redirect(base_url().'admin/forgotsuccess');
								
							}
						}else {
							$error = 'Captcha Error!';
							$this->session->set_flashdata('error',$error);
							redirect(base_url().'admin');   
						}
                }
            

            
        } else {
            $this->load->view('admin/forgot');    
        }
	}

    public function forgotsuccess()
	{
		$this->load->view('admin/forgot-success');
	}

    public function dashboard()
	{
        if ($this->session->userdata('id')) {
			$this->load->model('admin_model');
			$data['data'] = $this->admin_model->recharge_history_last();
			$this->load->view('admin/dashboard', $data);
		}
		else{
			redirect(base_url().'admin');
		}
	}

    public function api()
	{
        if ($this->session->userdata('id')) {
			$this->load->model('admin_model');
			$data['data'] = $this->admin_model->api();
			
			$this->load->view('admin/api', $data);
		}
		else{
			redirect(base_url().'admin');
		}
	}

    public function api_update()
	{
        if ($this->session->userdata('id')) {
			$this->load->model('admin_model');
            $id = $this->input->get('id');
            $data = array(
                'ding_key' => $this->input->post('ding_key'),
                'stripe_key' => $this->input->post('stripe_key'),
                'stripe_secret' => $this->input->post('stripe_secret'),
                'PayPalClientId' => $this->input->post('PayPalClientId'),
                'PayPalSecret' => $this->input->post('PayPalSecret'),
                'PayPalENV' => $this->input->post('PayPalENV')
            );
			$this->admin_model->api_update($data);
			$success = 'API Update Successfully.';
			$this->session->set_flashdata('success',$success);
			redirect(base_url().'admin/api');
		}
		else{
			redirect(base_url().'admin');
		}
	}

    public function users()
	{
        if ($this->session->userdata('id')) {
			$this->load->model('admin_model');
			$data['data'] = $this->admin_model->users();
			$this->load->view('admin/users', $data);
		}
		else{
			redirect(base_url().'admin');
		}
	}

    public function profile()
	{
        if ($this->session->userdata('id')) {
            $userid=$this->session->userdata('id');
            $this->load->model('admin_model');
            $data['data'] = $this->admin_model->profile($userid);
			$this->load->view('admin/profile', $data);
		}
		else{
			redirect(base_url().'admin');
		}
	}

    public function emailsetting_save()
	{
        if ($this->session->userdata('id')) {
            if (isset($_POST['submit'])) {
                $data = array(
                    'type' => $this->input->post('mail_type'),
                    'port' => $this->input->post('port'),
                    'host' => $this->input->post('host'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'ssl_type' => $this->input->post('protocol')
                );
                $this->admin_model->update_emailsetting($data);
					$success = 'SMTP Update Successfully.';
					$this->session->set_flashdata('success',$success);
					redirect(base_url().'admin/emailsetting');
            }
            
		}
		else{
			redirect(base_url().'admin');
		}
	}

    public function emailsetting()
	{
        if ($this->session->userdata('id')) {
            $userid=$this->session->userdata('id');
            $this->load->model('admin_model');
            $data['data'] = $this->admin_model->emailsetting($userid);
			$this->load->view('admin/emailsetting', $data);
		}
		else{
			redirect(base_url().'admin');
		}
	}

    public function websetting()
	{
        if ($this->session->userdata('id')) {
            $userid=$this->session->userdata('id');
            $this->load->model('admin_model');
            $data['data'] = $this->admin_model->websetting($userid);
			$this->load->view('admin/websetting', $data);
		}
		else{
			redirect(base_url().'admin');
		}
	}

    public function websetting_save()
	{
        if ($this->session->userdata('id')) {
            if (isset($_POST['submit'])) {
                $data = array(
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'mobile' => $this->input->post('mobile')
                );
                $this->admin_model->update_websetting($data);
					$success = 'Web Setting Update Successfully.';
					$this->session->set_flashdata('success',$success);
					redirect(base_url().'admin/websetting');
            }
            
		}
		else{
			redirect(base_url().'admin');
		}
	}

    public function whatsapp()
	{
        if ($this->session->userdata('id')) {
            $userid=$this->session->userdata('id');
            $this->load->model('admin_model');
            $data['data'] = $this->admin_model->websetting($userid);
			$this->load->view('admin/whatsapp', $data);
		}
		else{
			redirect(base_url().'admin');
		}
	}
	

    public function whatsapp_save()
	{
        if ($this->session->userdata('id')) {
            if (isset($_POST['submit'])) {
                $data = array(
                    'whatsapp_token' => $this->input->post('token')
                );
                $this->admin_model->update_websetting($data);
					$success = 'Token Update Successfully.';
					$this->session->set_flashdata('success',$success);
					redirect(base_url().'admin/whatsapp');
            }
            
		}
		else{
			redirect(base_url().'admin');
		}
	}

	public function terms()
	{
        if ($this->session->userdata('id')) {
            $userid=$this->session->userdata('id');
            $this->load->model('admin_model');
            $data['data'] = $this->admin_model->webpage($userid);
			$this->load->view('admin/webpage', $data);
		}
		else{
			redirect(base_url().'admin');
		}
	}

	public function privacy()
	{
        if ($this->session->userdata('id')) {
            $userid=$this->session->userdata('id');
            $this->load->model('admin_model');
            $data['data'] = $this->admin_model->webpage($userid);
			$this->load->view('admin/webpage2', $data);
		}
		else{
			redirect(base_url().'admin');
		}
	}

	public function webpage_save()
	{
        if ($this->session->userdata('id')) {
            if (isset($_POST['submit'])) {
				$page = $this->input->post('page');
                $data = array(
                    $page => $this->input->post('editor1')
                );
                $this->admin_model->update_webpage($data);
					$success = 'Webpage Update Successfully.';
					$this->session->set_flashdata('success',$success);
					redirect(base_url().'admin/'.$page);
            }
            
		}
		else{
			redirect(base_url().'admin');
		}
	}

	public function slider()
	{
        if ($this->session->userdata('id')) {
            $userid=$this->session->userdata('id');
            $this->load->model('admin_model');
            $data['data'] = $this->admin_model->slider($userid);
			$this->load->view('admin/slider', $data);
		}
		else{
			redirect(base_url().'admin');
		}
	}

	public function slider_save()
	{
        if ($this->session->userdata('id')) {
            if (isset($_POST['submit'])) {
				$slider = $this->input->post('s');
				$allowed_filetypes = array('.jpg','.gif','.bmp','.png','.jpeg','.JPG','.GIF','.BMP','.PNG', '');
		$max_filesize = 524288; // Maximum filesize in BYTES (currently 0.5MB).	
		$str = base_url()."/uploads/";
		$filename = $_FILES['logo']['name']; // Get the name of the file (including file extension).
		$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
                if (!in_array($ext,$allowed_filetypes)) {
					$error = 'Slider Update Failed.';
				$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/slider');
				}
				else{
					$f1 = time().$_FILES['logo']['name'];
			$s = move_uploaded_file($_FILES['logo']['tmp_name'],$str.$f1);
			$img_len = strlen($str.$f1);
			$im_format = substr($str.$f1, ($img_len-3), 3);
			$data = array(
				$slider => $this->input->post('logo')
			);
			$this->admin_model->update_slider($data);
				$success = 'Slider Update Successfully.';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/slider');
				}
            }
            
		}
		else{
			redirect(base_url().'admin');
		}
	}
	

    public function changepassword()
	{
        if ($this->session->userdata('id')) {
			$this->load->view('admin/changepassword');
		}
		else{
			redirect(base_url().'admin');
		}
	}

    public function change_password()
	{
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('existingPassword', 'Current Password', 'trim|required');
			$this->form_validation->set_rules('newPassword', 'New Password', 'trim|required');
			$this->form_validation->set_rules('confirmPassword', 'Confirm New Password', 'trim|required');
		}
		if ($this->form_validation->run() == FALSE)
                {
					$error = 'Error.';
					$this->session->set_flashdata('error',$error);
					redirect(base_url().'admin/changepassword');
                }
                else
                {
					$a=$this->input->post('existingPassword');
					$b=$this->input->post('newPassword');
					$c=$this->input->post('confirmPassword');

					if ($b == $c) {
						$email = $this->session->userdata('email');
					$un = $this->admin_model->check_password($email,$a);
					
					if (!$un) {
						$error = 'Current Password is wrong!';
						$this->session->set_flashdata('error',$error);
						redirect(base_url().'admin/changepassword');
					}
					else{
						//$this->load->helper('myfunction');
						$data = array(
						'password' => $b
					);
					$this->admin_model->update_customer($data);
					$success = 'Password Update Successfully.';
					$this->session->set_flashdata('success',$success);
					redirect(base_url().'admin/changepassword');
					}
					}else{
						$error = 'New Password Not Matched';
						$this->session->set_flashdata('error',$error);
						redirect(base_url().'admin/changepassword');
					}
					
					
                }
	}

    public function calender()
	{
        if ($this->session->userdata('id')) {
			$this->load->view('admin/calender');
		}
		else{
			redirect(base_url().'admin');
		}
	}

    public function chart()
	{
        if ($this->session->userdata('id')) {
			$this->load->view('admin/chart');
		}
		else{
			redirect(base_url().'admin');
		}
	}

    public function reports()
	{
        if ($this->session->userdata('id')) {
            $userid=$this->session->userdata('id');
            $this->load->model('admin_model');
            $data['data'] = $this->admin_model->recharge_history();
			$this->load->view('admin/reports', $data);
		}
		else{
			redirect(base_url().'admin');
		}
	}

    public function transactions()
	{
        if ($this->session->userdata('id')) {
            $userid=$this->session->userdata('id');
            $this->load->model('admin_model');
            $data['data'] = $this->admin_model->order_history();
			$this->load->view('admin/transactions', $data);
		}
		else{
			redirect(base_url().'admin');
		}
	}
    
    public function logout()
	{
		$this->session->sess_destroy();
        redirect(base_url().'admin');
	}
	
}
