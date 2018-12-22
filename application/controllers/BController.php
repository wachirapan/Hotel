<?php

/**
 * Created by PhpStorm.
 * User: Non
 * Date: 12/21/2018
 * Time: 8:36 PM
 */
class BController extends CI_Controller
{
    function index()
    {
        $data['room'] = $this->QueryModel->getroom();
        $this->load->view('back/header');
        $this->load->view('back/index',$data);
        $this->load->view('back/footer');
    }
    function bookingonline()
    {
        $data['check'] = $this->BQueryModel->bookingonline();
        $this->load->view('back/header');
        $this->load->view('back/bookingonline/bookingonline',$data);
        $this->load->view('back/footer');
    }
    function paymentonline()
    {
        $data['payonline'] = $this->BQueryModel->paymentonline();
        $this->load->view('back/header');
        $this->load->view('back/paymentonline/paymentonline',$data);
        $this->load->view('back/footer');
    }
    function checkinonline()
    {
        $data['checkin'] = $this->BQueryModel->getcheckinonline();
        $this->load->view('back/header');
        $this->load->view('back/checkinonline/checkinonline',$data);
        $this->load->view('back/footer');
    }
    function checkin()
    {
        $data['room'] = $this->BQueryModel->getroomcheckin();
        $this->load->view('back/header');
        $this->load->view('back/checkin/checkin',$data);
        $this->load->view('back/footer');
    }
    function changeroom()
    {
        $this->load->view('back/header');
        $this->load->view('back/changeroom/changeroom');
        $this->load->view('back/footer');
    }
    function checkoutroom()
    {
        $this->load->view('back/header');
        $this->load->view('back/checkoutroom/checkoutroom');
        $this->load->view('back/footer');
    }
    function openbill()
    {
        $this->load->view('back/header');
        $this->load->view('back/openbill/openbill');
        $this->load->view('back/footer');
    }
    function closebillonline()
    {
        $data['pay'] = $this->BQueryModel->getclosebillonline();
        $this->load->view('back/header');
        $this->load->view('back/closebillonline/closebillonline',$data);
        $this->load->view('back/footer');
    }
    function closebill()
    {
        $this->load->view('back/header');
        $this->load->view('back/closebill/closebill');
        $this->load->view('back/footer');
    }
}