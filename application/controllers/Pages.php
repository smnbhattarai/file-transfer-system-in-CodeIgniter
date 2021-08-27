<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

    // Display homepage 
    public function home()
    {

        if ($this->session->userdata('logged_in')) {
            $one = [];

            // PAGINATION 
            $this->load->library('pagination');
            $config = [
                'base_url' => base_url(),
                'per_page' => 20,
                'total_rows' => $this->file_transfer_model->num_rows()
            ];

            $this->pagination->initialize($config);

            $files_transfer = $this->file_transfer_model->GetFileTransferData($config['per_page'], $this->uri->segment(1));

            if ($files_transfer) {
                foreach ($files_transfer as $k => $one_file) {
                    $one[$k]['filename'] = $this->upload_record_model->FileDetailsFromId($one_file['filename']);
                    $one[$k]['sender_location'] = $this->office_model->OfficeDetailFromId($one_file['sender_location']);
                    $one[$k]['uploader'] = $this->user_model->UserDetail($one_file['uploader']);
                }


                $data['files'] = $one;
                $this->load->view('templates/header');
                $this->load->view('pages/home', $data);
                $this->load->view('templates/footer');
            } else {
                $data['files'] = [];
                $this->load->view('templates/header');
                $this->load->view('pages/home', $data);
                $this->load->view('templates/footer');
            }

        } else {
            redirect('/login');
        }

    }


}

