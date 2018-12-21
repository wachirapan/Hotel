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
}