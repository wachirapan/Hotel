<?php

/**
 * Created by PhpStorm.
 * User: Non
 * Date: 12/21/2018
 * Time: 9:01 PM
 */
class UpdateData extends CI_Controller
{
    function updateroom()
    {
        $roomid = $this->input->post('roomid');
        $roomname = $this->input->post('roomname');
        $roomprice = $this->input->post('roomprice');
        $data = array(
            'room_name'=>$roomname,
            'room_price'=>$roomprice
        );
        $this->UpdateModel->updateroom($data, $roomid);
    }
}