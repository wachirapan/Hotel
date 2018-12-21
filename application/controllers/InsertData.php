<?php

/**
 * Created by PhpStorm.
 * User: Non
 * Date: 12/21/2018
 * Time: 8:25 PM
 */
class InsertData extends CI_Controller
{
    function insertroom()
    {
        $roomname = $this->input->post('roomname');
        $roomprice = $this->input->post('roomprice');
        $this->InsertModel->insertroom($roomname, $roomprice);
    }
    function insertbooking()
    {
        $name = $this->input->post('name');
        $idacard = $this->input->post('idacard');
        $phone = $this->input->post('phone');
        $username = $this->input->post('username');
        $pwd = $this->input->post('pwd');
        $room = $this->input->post('room');
        $data = array(
            'cs_name'=>$name,
            'cs_idcard'=>$idacard,
            'cs_phone'=>$phone,
            'cs_user'=>$username,
            'cs_pwd'=>$pwd
        );
        $insert_id = $this->InsertModel->insertcustomer($data);
        $this->session->set_userdata(array('customer_login'=>$insert_id));
        $data1 = array(
            'cs_id'=>$insert_id,
            'room_id'=>$room,
            'book_status'=>'1'
        );
        $this->InsertModel->insertbooking($data1);
        $data2 = array(
            'room_status'=>'n'
        );
        $this->db->where('room_id',$room)->update('room',$data2);
        redirect("welcome/payment",'refresh');
        exit();
    }
    function paymentbooking()
    {
        $config['upload_path']   = './pictures/paymentbooking';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 0;
        $config['max_width']     = 1200;
        $config['max_height']    = 1200;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());

            echo json_encode($error);
        }else {

           $data = $this->upload->data();
           echo $data['file_name'] ;
            $data1 = array(
                'book_id'=>$this->input->post('bookingid'),
                'bp_file'=>$data['file_name'],
                'bp_dateset'=>$this->input->post('datetime')
            );
            $this->InsertModel->paymentbooking($data1);
            $data2 = array(
                'book_status'=>2
            );
            $this->db->where('book_id',$this->input->post('bookingid'))->update('booking',$data2);
            redirect("welcome/payment",'refresh');
            exit();

        }
    }
    function insertcheckout()
    {
        $checkout = $this->input->post('checkout');
        $query = $this->db->select('*')->from('booking')->where('cs_id',$this->session->userdata('customer_login'))->get()->result();
        foreach($query as $item){
            $data = array(
                'co_text'=>$checkout,
                'room_id'=>$item->room_id,
                'co_status'=>1
            );
            $this->db->insert('checkout',$data);
        }
        redirect('welcome/index','refresh');
        exit();
    }
    function insertchangroom()
    {
        $detail= $this->input->post('detail');
        $query = $this->db->select('*')->from('booking')->where('cs_id',$this->session->userdata('customer_login'))->get()->result();
        foreach($query as $item){
            $data = array(
                'ch_detail'=>$detail,
                'room_id'=>$item->room_id,
                'ch_status'=>1
            );
            $this->db->insert('changeroom',$data);
        }
        redirect('welcome/index','refresh');
        exit();
    }
}