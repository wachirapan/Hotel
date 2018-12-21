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
}