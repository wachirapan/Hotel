<?php

/**
 * Created by PhpStorm.
 * User: Non
 * Date: 12/21/2018
 * Time: 11:42 PM
 */
class BQueryModel extends CI_Model
{
    function bookingonline()
    {
        return $this->db->select('*')->from('booking')
            ->join('room','booking.room_id = room.room_id')
            ->join('customer','booking.cs_id = customer.cs_id')
            ->where('book_status',1)
            ->get()->result();
    }
    function paymentonline()
    {
        return $this->db->select('*')->from('booking')
            ->join('room','booking.room_id = room.room_id')
            ->join('customer','booking.cs_id = customer.cs_id')
            ->where('book_status',2)
            ->get()->result();
    }
    function getdetailpayonline($id)
    {
        return $this->db->select('*')->from('bookingpayment')->where('book_id',$id)->get()->result();
    }
    function getcheckinonline()
    {
        return $this->db->select('*')->from('booking')
            ->join('room','booking.room_id = room.room_id')
            ->join('customer','booking.cs_id = customer.cs_id')
            ->where('book_status',3)
            ->get()->result();
    }
    function getroomcheckin()
    {
        return $this->db->select('*')->from('room')->where('room_status','y')->get()->result();
    }
    function createbookingfront()
    {
        return $this->db->select('*')->from('booking')
            ->join('room','booking.room_id = room.room_id')
            ->join('customer','booking.cs_id = customer.cs_id')
            ->where('book_status',1)
            ->get()->result();
    }
    function createchangeroomcheck()
    {
        return $this->db->select('*')->from('booking')
            ->join('room','booking.room_id = room.room_id')
            ->join('customer','booking.cs_id = customer.cs_id')
            ->join('changeroom','booking.book_id = changeroom.book_id')
            ->where('changeroom.ch_status',1)
            ->get()->result();
    }
    function getroomchange()
    {
        return $this->db->select('*')->from('room')->where('room_status','y')->get()->result();
    }
    function getcheckout()
    {
        return $this->db->select('*')->from('booking')
            ->join('room','booking.room_id = room.room_id')
            ->join('customer','booking.cs_id = customer.cs_id')
            ->join('checkout','booking.book_id = checkout.book_id')
            ->where('co_status',1)
            ->get()->result();
    }
    function getdataroomforopenbill()
    {
        return $this->db->select('*')->from('booking')
            ->join('room','booking.room_id = room.room_id')
            ->join('customer','booking.cs_id = customer.cs_id')
            ->where('room_status','n')
            ->get()->result();
    }
    function pricelistbill()
    {
        return $this->db->select('*')->from('booking')
            ->join('room','booking.room_id = room.room_id')
            ->join('customer','booking.cs_id = customer.cs_id')
            ->join('openbill','booking.book_id = openbill.booking_id')
            ->where('opb_status',1)
            ->or_where('opb_status',3)
            ->get()->result();
    }
    function reportlistrevenue($date1, $date2)
    {
        return $this->db->select('*')->from('priceroom')
            ->join('openbill','priceroom.opb_id = openbill.opb_id')
            ->join('booking','openbill.booking_id = booking.book_id')
            ->join('room','booking.room_id = room.room_id')
            ->where('price_date >=',$date1)->where('price_date <=',$date2)
            ->get()->result();
    }
    function getclosebillonline()
    {
        return $this->db->select('*')->from('openbill')
            ->join('booking','openbill.booking_id = booking.book_id')
            ->join('customer','booking.cs_id = customer.cs_id')
            ->join('room','booking.room_id = room.room_id')
            ->where('booking.cs_id',$this->session->userdata('customer_login'))
            ->where('opb_status ',3)
            ->get()->result();
    }
    function getbillpaymentonline($id)
    {
        return $this->db->select('*')->from('paybillonline')->where('opb_id',$id)->get()->result();
    }
}
