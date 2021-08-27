<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Options extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('/login');
        }
        if (is_user() || is_manager()) {
            redirect('/');
        }
    }


    public function index()
    {

        $this->form_validation->set_rules('office_name', 'Office name', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $data['office_detail'] = $this->option_model->GetOptions();
            $this->load->view('templates/header');
            $this->load->view('pages/options', $data);
            $this->load->view('templates/footer');
        } else {
            $this->option_model->UpdateOptions();
            $this->session->set_flashdata('message_success', 'Updated successfully.');
            redirect('/options');
        }

    }
}
