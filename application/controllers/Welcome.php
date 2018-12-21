<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function index()
	{
		$this->load->view('front/header');
		$this->load->view('front/index');
		$this->load->view('front/footer');
	}
	function room()
	{
		$data['room'] = $this->QueryModel->checkroom();
		$this->load->view('front/header');
		$this->load->view('front/room/room',$data);
		$this->load->view('front/footer');
	}
	function payment()
	{
		$data['payment'] = $this->QueryModel->checkpayment();
		$this->load->view('front/header');
		$this->load->view('front/payment/payment',$data);
		$this->load->view('front/footer');
	}
	function login()
	{
		$this->load->view('front/header');
		$this->load->view('front/login/login');
		$this->load->view('front/footer');
	}
	function checkoutroom()
	{
		$data['checkout'] = $this->QueryModel->checkoutroom();
		$this->load->view('front/header');
		$this->load->view('front/checkoutroom/checkoutroom',$data);
		$this->load->view('front/footer');
	}
	function changeroom()
	{
		$data['change'] = $this->QueryModel->changeroom();
		$this->load->view('front/header');
		$this->load->view('front/changeroom/changeroom',$data);
		$this->load->view('front/footer');
	}

}
