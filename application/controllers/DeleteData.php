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
        $this->db->where('book_id',$this->input->post('id'))->delete('booking');
    }
}