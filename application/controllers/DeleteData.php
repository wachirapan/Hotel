<?php

/**
 * Created by PhpStorm.
 * User: Non
 * Date: 12/21/2018
 * Time: 11:58 PM
 */
class DeleteData extends CI_Controller
{
    function delbookingonline()
    {
        $query = $this->db->select('*')->from('booking')->where('book_id',$this->input->post('id'))->get()->result();
        foreach($query as $item){
            $data = array(
                'room_status'=>'y'
            );
            $this->db->where('room_id',$item->room_id)->update('room',$data);
        }

        $this->db->where('book_id',$this->input->post('id'))->delete('booking');

    }
}