<?php

/**
 * Created by PhpStorm.
 * User: Non
 * Date: 12/21/2018
 * Time: 8:48 PM
 */
class InsertModel extends CI_Model
{
    function insertroom($roomname, $roomprice)
    {
        $data = array(
            'room_name'=>$roomname,
            'room_price'=>$roomprice,
            'room_status'=>'y'
        );
        $this->db->insert('room',$data);
    }
    function insertcustomer($data = array())
    {
        $this->db->insert('customer',$data);
        return $this->db->insert_id();
    }
    function insertbooking($data = array()){
        $this->db->insert('booking',$data);
    }
    function paymentbooking($data1 = array()){
        $this->db->insert('bookingpayment',$data1);
    }
}