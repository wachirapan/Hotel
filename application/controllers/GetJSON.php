<?php

/**
 * Created by PhpStorm.
 * User: Non
 * Date: 12/21/2018
 * Time: 8:56 PM
 */
class GetJSON extends CI_Controller
{
    function geteditroom()
    {
        echo json_encode($this->QueryModel->geteditroom($this->input->get('id')));
    }
    function getdetailpayonline()
    {
        echo json_encode($this->BQueryModel->getdetailpayonline($this->input->get('id')));
    }
}