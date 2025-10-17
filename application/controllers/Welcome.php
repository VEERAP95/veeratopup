<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('front/home');
	}
	public function about()
	{
		$this->load->view('front/about');
	}
	public function contact()
	{
		$this->load->view('front/contact');
	}
	public function faq()
	{
		$this->load->view('front/faq');
	}
	public function sendrecharge()
	{
		$this->load->view('front/sendrecharge');
	}
	public function buygiftcards()
	{
		$this->load->view('front/buy-gift-cards');
	}
	public function promotions()
	{
		$this->load->view('front/promotions');
	}
	public function privacy()
	{
		$this->load->helper('myfunction');
		$this->load->view('front/privacy');
	}
	public function terms()
	{
		$this->load->helper('myfunction');
		$this->load->view('front/terms');
	}
}
