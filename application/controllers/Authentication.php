<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{

    public function Login()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('/');
        }

        $this->form_validation->set_rules('username', 'Email address', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            // Display login page as form is not submitted
            $this->load->view('templates/header');
            $this->load->view('pages/login');
            $this->load->view('templates/footer');
        } else {
            // Login processing start
            $username = $this->input->post('username');
            $password = md5(sha1(trim($this->input->post('password'))));

            $user_id = $this->user_model->login($username, $password);

            if ($user_id) {
                $user_data = array(
                    'user_id' => $user_id,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('message_success', 'You are now logged in');
                redirect('/');
            } else {
                $this->session->set_flashdata('message_failure', 'Login detail invalid.');
                redirect('/login');
            }
        }


    }


    public function register()
    {
        if (!$this->session->userdata('logged_in') || is_user()) {
            redirect('/');
        }

        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]',
            array(
                'required' => 'You have not provided %s.',
                'is_unique' => '%s already exists. Please choose another.'
            )
        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('password1', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
        $this->form_validation->set_rules('userlevel', 'User level', 'required|is_natural');
        $this->form_validation->set_rules('office', 'Select office', 'required|is_natural');


        // Check if form is not submitted
        if ($this->form_validation->run() === FALSE) {
            // Get userlevel and office
            $data['userlevel'] = $this->user_level_model->AllUserLevel();
            $data['alloffice'] = $this->office_model->AllOffice();

            // FORM not submitted so display register page
            $this->load->view('templates/header');
            $this->load->view('pages/register', $data);
            $this->load->view('templates/footer');

        } else {

            // START registration process
            $pass = md5(sha1($this->input->post('password')));

            // INSERT user data and GET insert id of user
            $user_id = $this->user_model->register($pass);

            // Get user level and office
            $userlevel = $this->input->post('userlevel');
            $office = $this->input->post('office');

            // Assign user to its office
            $this->user_office_model->AssignUserOffice($user_id, $office);

            // Assign user previlage to user
            $this->user_previlage_model->AssignUserPrevilage($user_id, $userlevel);

            // Display user a message for successful registration
            $this->session->set_flashdata('message_success', 'Account created successfully.');
            redirect('/register');
        }
    }


    // Logout
    public function logout()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('/login');
        }
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->set_flashdata('message_success', 'You are now logged out.');
        redirect('/login');
    }
}
