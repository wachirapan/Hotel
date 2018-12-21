<?php

/**
 * Created by PhpStorm.
 * User: Non
 * Date: 12/21/2018
 * Time: 9:57 PM
 */
class Logincustomer extends CI_Controller
{
    function checklogin()
    {
        $username = $this->input->post('username');
        $pwd = $this->input->post('pwd');
        $query = $this->db->select('*')->from('customer')->where('cs_user',$username)->where('cs_pwd',$pwd)->get();
        if($query->num_rows() > 0){
            foreach ($query->result() as $item) {
                $this->session->set_userdata(array('customer_login'=>$item->cs_id));
                redirect('welcome/index','refresh');
                exit();
            }
        }
        redirect('welcome/index','refresh');
        exit();
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome/index');
    }
}