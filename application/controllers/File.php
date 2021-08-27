<?php

defined('BASEPATH') or exit('No direct script access allowed');

class File extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('/login');
        }
    }

    public function file()
    {

        $this->form_validation->set_rules('title', 'File title', 'trim|required');
        $this->form_validation->set_rules('location[]', 'Location', 'required');

        if (empty($_FILES['file']['name'])) {
            $this->form_validation->set_rules('file', 'Select file', 'required');
        }

        if ($this->form_validation->run() === FALSE) {
            $data['alloffice'] = $this->office_model->AllOffice();
            $this->load->view('templates/header');
            $this->load->view('pages/file', $data);
            $this->load->view('templates/footer');
        } else {
            // Process file upload
            $config['upload_path'] = './storage/';
            $config['allowed_types'] = 'gif|jpg|png|JPEG|JPG|pdf|doc|xls|ppt|docx|xlsx|pptx|txt|rtf';
            $config['max_size'] = 7600;
            $new_name = rand(000000, 999999) . '_' . $_FILES["file"]['name'];
            $config['file_name'] = $new_name;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('templates/header');
                $this->load->view('pages/file', $error);
                $this->load->view('templates/footer');
            } else {
                $file_id = $this->upload_record_model->AddUploadFileDetail($this->upload->data()['file_name']);
                $this->file_transfer_model->AddFileTransferData($file_id);
                $this->session->set_flashdata('message_success', 'File uploaded successfully.');
                redirect('/add-file');
            }

        }

    }


    public function MyUploads()
    {
        $user = $this->session->userdata('user_id');

        // PAGINATION 
        $this->load->library('pagination');
        $config = [
            'base_url' => base_url('/my-uploads'),
            'per_page' => 20,
            'total_rows' => $this->upload_record_model->num_rows()
        ];

        $this->pagination->initialize($config);

        $this->db->order_by('id', 'DESC')->where('uploaded_by', $user);
        $this->db->from('upload_records')->limit($config['per_page'], $this->uri->segment(2));
        $query = $this->db->get();

        $file = [];
        if (count($query->result()) > 0) {
            foreach ($query->result() as $k => $row) {
                $file[$k]['id'] = $row->id;
                $file[$k]['title'] = $row->title;
                $file[$k]['name'] = $row->file_url;
                $file[$k]['upload_date'] = $row->created_at;
            }
            $data['files'] = $file;
            $this->load->view('templates/header');
            $this->load->view('pages/my_uploads', $data);
            $this->load->view('templates/footer');
        } else {
            $data['files'] = $file;
            $this->load->view('templates/header');
            $this->load->view('pages/my_uploads', $data);
            $this->load->view('templates/footer');
        }
    }

}

