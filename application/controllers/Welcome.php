<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	}

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
	function closebillonline()
	{
		$data['checkbill'] = $this->QueryModel->closebillonline();
		$this->load->view('front/header');
		$this->load->view('front/closebillonline/closebillonline',$data);
		$this->load->view('front/footer');
	}
	function completebill($index = 1)
	{
		$data['bill'] = $this->QueryModel->getcompletebill($index);
		$data['links'] = $this->createLinkPag('welcome/completebill',$this->QueryModel->countbillcomplete(),3);
		$this->load->view('front/header');
		$this->load->view('front/completebill/completebill',$data);
		$this->load->view('front/footer');
	}

	private function createLinkPag($url, $all_row, $uri_segment)
	{

		$config['base_url'] = base_url() . $url;
		$config['total_rows'] = $all_row;
		$config['per_page'] = 12;
		$config["uri_segment"] = $uri_segment;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;

		$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center pagination-lg">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = '<<';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '>>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);

		return $this->pagination->create_links();

	}

}
