<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Upload_record_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('upload_records');
    }


    public function AddUploadFileDetail($filename)
    {
        $data = array(
            'title' => $this->input->post('title'),
            'file_url' => $filename,
            'uploaded_by' => $this->session->userdata('user_id')
        );
        if ($this->db->insert('upload_records', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }


    public function FileDetailsFromId($file_id)
    {
        $query = $this->db->get_where('upload_records', array('id' => $file_id), 1);
        $file = [];
        foreach ($query->result() as $row) {
            $file['title'] = $row->title;
            $file['name'] = $row->file_url;
            $file['uploaded_by'] = $row->uploaded_by;
            $file['uploaded_on'] = $row->created_at;
        }
        return $file;
    }


    public function num_rows()
    {
        $user_id = $this->session->userdata('user_id');
        $this->db->where('uploaded_by', $user_id);
        $this->db->from('upload_records');
        $query = $this->db->get();
        return $query->num_rows();
    }


}

