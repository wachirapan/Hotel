<?php

/**
 * Created by PhpStorm.
 * User: Non
 * Date: 12/21/2018
 * Time: 9:02 PM
 */
class UpdateModel extends CI_Model
{
    function updateroom($data =array(), $roomid){
        $this->db->where('room_id',$roomid)->update('room',$data);
    }
    function updatecheckinonline($data = array(), $id)
    {
        $this->db->where('book_id',$id)->update('booking',$data);
    }
}