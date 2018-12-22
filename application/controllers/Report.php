<?php

/**
 * Created by PhpStorm.
 * User: wachirapan
 * Date: 12/22/2018
 * Time: 5:29 PM
 */
class Report extends CI_Controller
{
    function revenue()
    {
        $this->load->view('back/header');
        $this->load->view('back/report/revenue/revenue');
        $this->load->view('back/footer');
    }
    function listrevenue()
    {
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
        $data = array('date1'=>$date1, 'date2'=>$date2,'report'=>$this->BQueryModel->reportlistrevenue($date1, $date2));
        $this->load->view('back/report/revenue/listrevenue',$data);
    }
}