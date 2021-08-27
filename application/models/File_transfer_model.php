<?php

defined('BASEPATH') or exit('No direct script access allowed');

class File_transfer_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('file_transfers');
    }


    public function AddFileTransferData($file_id)
    {
        $to_office = $this->input->post('location');
        $user_office = $this->user_office_model->UsersOfficeId($this->session->userdata('user_id'));
        foreach ($to_office as $one_office) {
            $data = array(
                'file_id' => $file_id,
                'sender_location' => $user_office,
                'receiver_location' => $one_office,
                'uploader_id' => $this->session->userdata('user_id')
            );
            $this->db->insert('file_transfers', $data);
        }

        return true;
    }


    public function GetFileTransferData($limit, $offset)
    {
        $user_office = $this->user_office_model->UsersOfficeId($this->session->userdata('user_id'));

        $this->db->order_by('id', 'DESC')->where('receiver_location', $user_office);
        $this->db->from('file_transfers')->limit($limit, $offset);
        $query = $this->db->get();
        $file = [];
        if ($query->result()) {
            foreach ($query->result() as $k => $row) {
                $file[$k]['filename'] = $row->file_id;
                $file[$k]['sender_location'] = $row->sender_location;
                $file[$k]['uploader'] = $row->uploader_id;
            }
            return $file;
        } else {
            return false;
        }

    }


    public function num_rows()
    {
        $user_office = $this->user_office_model->UsersOfficeId($this->session->userdata('user_id'));
        $this->db->order_by('id', 'DESC')->where('receiver_location', $user_office);
        $this->db->from('file_transfers');
        $query = $this->db->get();
        return $query->num_rows();
    }


}

