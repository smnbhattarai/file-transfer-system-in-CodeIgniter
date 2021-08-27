<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('/login');
        }
        if (is_user()) {
            redirect('/');
        }
    }

    public function AllUsers()
    {

        $data['users'] = $this->user_model->allusers();
        $this->load->view('templates/header');
        $this->load->view('pages/all_users', $data);
        $this->load->view('templates/footer');
    }
}

