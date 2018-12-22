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
    function updatebookingpaymentonline()
    {
        $id = $this->input->post('id');
        $payment = $this->input->post('payment');
        $data1 = array(
            'book_id'=>$id,
            'check_price'=>$payment
        );
        $this->db->insert('checkinpayment',$data1);
        $data = array(
            "book_status"=>3
        );
        $this->db->where('book_id',$this->input->post('id'))->update('booking',$data);
    }
    function updatecheckinonline()
    {
        $data = array(
            'book_status'=>4
        );
        $this->UpdateModel->updatecheckinonline($data,$this->input->post('id'));
    }
    function updatechangeroom()
    {
        $dataid = $this->input->post('dataid');
        $dataidroom = $this->input->post('dataidroom'); // ห้องเก่า
        $roomid = $this->input->post('roomid'); // ห้องใหม่
        $chid = $this->input->post('chid');
        $data = array(
            'room_id'=>$roomid,
            'room_status'=>'n'
        );
        $this->db->where('ch_id',$chid)->update('changeroom',['ch_status'=>2]);
        $this->db->where('book_id',$dataid)->update('booking',$data);
        $this->db->where('room_id',$dataidroom)->update('room',['room_status'=>'y']);
    }
}