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
                'co_status'=>1,
                'book_id'=>$item->book_id
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
                'ch_status'=>1,
                'book_id'=>$item->book_id
            );
            $this->db->insert('changeroom',$data);
        }
        redirect('welcome/index','refresh');
        exit();
    }
    function insertcheckincounter()
    {
        $name = $this->input->post('name');
        $idacard = $this->input->post('idacard');
        $phone = $this->input->post('phone');
        $roomid = $this->input->post('roomid');
        $data = array(
            'cs_name'=>$name,
            'cs_idcard'=>$idacard,
            'cs_phone'=>$phone,
            'cs_user'=>$idacard,
            'cs_pwd'=>$phone
        );
        $insert_id = $this->InsertModel->insertcheckincounter($data);
        $data1 = array(
            'cs_id'=>$insert_id,
            'room_id'=>$roomid,
            'book_status'=>1
        );
        $this->db->insert('booking',$data1);
        $data2 = array(
            'room_status'=>'n'
        );
        $this->db->where('room_id',$roomid)->update('room',$data2);
    }
    function insertpaymentfront()
    {
        $dataid = $this->input->post('dataid');
        $price = $this->input->post('price');
        $data = array(
            'book_id'=>$dataid,
            'check_price'=>$price
        );
        $this->db->insert('checkinpayment',$data);
        $data1 = array(
            'book_status'=>4
        );
        $this->db->where('book_id',$dataid)->update('booking',$data1);
    }
    function insertcheckoutroom()
    {
        $dataid = $this->input->post('dataid');
        $query = $this->db->select('*')->from('booking')->where('book_id',$dataid)->get()->result();
        foreach($query as $item){
            $bookingdata = array(
                'book_status'=>5
            );
            $this->db->where('book_id',$item->book_id)->update('booking',$bookingdata);
            $this->db->where('room_id',$item->room_id)->update('room',['room_status'=>'y']);
            $this->db->where('book_id',$item->book_id)->update('checkout',['co_status'=>2]);
        }
    }
    function insertopenbill()
    {
        $bookingid = $this->input->post('bookingid');
        $waterdata = $this->input->post('waterdata');
        $firedata = $this->input->post('firedata');
        $priceroom = $this->input->post('priceroom');
        $data = array(
            'opb_priceroom'=>$priceroom,
            'opb_water'=>$waterdata,
            'opb_fire'=>$firedata,
            'booking_id'=>$bookingid,
            'opb_status'=>1
        );
        $this->db->insert('openbill',$data);
    }
    function pricebillorder()
    {
        $billid = $this->input->post('billid');
        $billsum = $this->input->post('billsum');
        $data = array(
            'price_tax'=>$billsum,
            'opb_id'=>$billid
        );
        $this->db->insert('priceroom',$data);
        $this->db->where('opb_id',$billid)->update('openbill',['opb_status'=>2]);

    }
    function insertclosebillonline()
    {
        $config['upload_path']   = './pictures/paymentbill';
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
            $data = array(
                'opb_id'=>$this->input->post('billid'),
                'pbo_file'=>$data['file_name']
            );
            $this->db->insert('paybillonline',$data);
            $this->db->where('opb_id',$this->input->post('billid'))->update('openbill',['opb_status'=>3]);
            redirect("welcome/closebillonline",'refresh');
            exit();

        }
    }
}