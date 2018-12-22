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
    function createbookingfront()
    {
        echo json_encode($this->BQueryModel->createbookingfront());
    }
    function createchangeroomcheck()
    {
        echo json_encode($this->BQueryModel->createchangeroomcheck());
    }
    function getroomchange()
    {
        echo json_encode($this->BQueryModel->getroomchange());
    }
    function getcheckout()
    {
        echo json_encode($this->BQueryModel->getcheckout());
    }
    function getdataroomforopenbill()
    {
        echo json_encode($this->BQueryModel->getdataroomforopenbill());
    }
    function pricelistbill()
    {
        echo json_encode($this->BQueryModel->pricelistbill());
    }
    function getbillpaymentonline()
    {
        echo json_encode($this->BQueryModel->getbillpaymentonline($this->input->get('id')));
    }
}