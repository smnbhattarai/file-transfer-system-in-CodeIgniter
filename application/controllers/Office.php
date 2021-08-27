<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Office extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('/login');
        }
    }

    public function AddOffice()
    {
        if (is_user()) {
            redirect('/');
        }

        $this->form_validation->set_rules('office_name', 'Office Name', 'trim|required');
        $this->form_validation->set_rules('office_address', 'Office address', 'trim|required');

        $data['alloffice'] = $this->office_model->AllOfficeDetail();

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('pages/add_office', $data);
            $this->load->view('templates/footer');
        } else {
            $this->office_model->AddOffice();
            $this->session->set_flashdata('message_success', 'Office added successfully.');
            redirect('/add-office');
        }
    }


    // Edit pffice dtails
    public function EditOffice()
    {

        $name = $_POST['name'];
        $value = trim($_POST['value']);
        $key = $_POST['pk'];
        if (empty($value)) {
            header('HTTP/1.0 400 Bad Request', true, 400);
            echo 'This field cannot be empty.';
        }

        if ($this->office_model->EditOffice($key, $value, $name)) {
            header("HTTP/1.1 200 OK");
        } else {
            header('HTTP/1.0 400 Bad Request', true, 400);
            echo 'Oops! Something went wrong. Please try again.';
        }

    }
}

