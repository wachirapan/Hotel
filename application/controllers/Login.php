<?php

/**
 * Created by PhpStorm.
 * User: aungpoa
 * Date: 12/4/2018
 * Time: 5:12 PM
 */
class Login extends CI_Controller
{
    function loginpage()
    {
        $result = array('cate' => $this->QueryModel->qcatelogin());
        $this->load->view('login/login', $result);
    }

    function checklogin()
    {
        if ($this->input->post('category') == 1) {
            $username = $this->input->post('username');
            $pass = $this->input->post('pass');
            $query = $this->db->select('*')->from('staff')->where('st_username', $username)->where('st_pwd', $pass)->get();

            if ($query->num_rows() > 0) {
                $this->session->set_userdata(array('userlogin' => $username, 'status' => "staff"));
                redirect("welcome/index", "refresh");
                exit();
            } else {
                redirect("Login/loginpage", "refresh");
                exit();
            }
        } else {
            $username = $this->input->post('username');
            $pass = $this->input->post('pass');
            $query = $this->db->select('*')->from('customer')
                ->where('cus_username', $username)
                ->where('cus_pwd', $pass)->get();
            if ($query->num_rows() > 0) {
                $this->session->set_userdata(array('userlogin' => $username, 'status' => "customer"));
                redirect("welcome/index", "refresh");
                exit();
            } else {
                redirect("Login/loginpage", "refresh");
                exit();
            }
        }

    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect("Login/loginpage", 'refresh');
        exit();
    }

}