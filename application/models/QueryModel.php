<?php

/**
 * Created by PhpStorm.
 * User: Non
 * Date: 12/21/2018
 * Time: 8:51 PM
 */
class QueryModel extends CI_Model
{
    function getroom()
    {
        return $this->db->select('*')->from('room')->get()->result();
    }
    function geteditroom($id){
        return $this->db->select('*')->from('room')->where('room_id',$id)->get()->result();
    }
    function checkroom()
    {
        return $this->db->select('*')->from('room')->where('room_status','y')->get()->result();
    }
    function checkpayment()
    {
       return $this->db->select('*')->from('booking')
            ->join('room','booking.room_id = room.room_id')
            ->join('customer','booking.cs_id = customer.cs_id')
            ->where('booking.cs_id',$this->session->userdata('customer_login'))
            ->get()->result();

    }
    function checkoutroom()
    {
        return $this->db->select('*')->from('booking')
            ->join('room','booking.room_id = room.room_id')
            ->join('checkout','room.room_id = checkout.room_id')
            ->join('customer','booking.cs_id = customer.cs_id')
            ->where('booking.cs_id',$this->session->userdata('customer_login'))
            ->get()->result();
    }
    function changeroom()
    {
        return $this->db->select('*')->from('booking')
            ->join('room','booking.room_id = room.room_id')
            ->join('changeroom','room.room_id = changeroom.room_id')
            ->join('customer','booking.cs_id = customer.cs_id')
            ->where('booking.cs_id',$this->session->userdata('customer_login'))
            ->get()->result();
    }
    function closebillonline()
    {
        return $this->db->select('*')->from('openbill')
            ->join('booking','openbill.booking_id = booking.book_id')
            ->join('room','booking.room_id = room.room_id')
            ->where('booking.cs_id',$this->session->userdata('customer_login'))
            ->where('opb_status ',1 )
            ->or_where('opb_status',3)
            ->get()->result();
    }
    function countbillcomplete()
    {
        return $this->db->select('*')->from('openbill')
            ->join('booking','openbill.booking_id = booking.book_id')
            ->where('booking.cs_id',$this->session->userdata('customer_login'))
            ->where('opb_status ',2)
            ->get()->num_rows();
    }
    function getcompletebill($index)
    {
        $length = 12;
        $start = ($index - 1) * $length;

        return $this->db->select('*')->from('openbill')
            ->join('booking','openbill.booking_id = booking.book_id')
            ->join('room','booking.room_id = room.room_id')
            ->where('booking.cs_id',$this->session->userdata('customer_login'))
            ->where('opb_status ',2)
            ->limit($length, $start)
            ->get()->result();
    }
}