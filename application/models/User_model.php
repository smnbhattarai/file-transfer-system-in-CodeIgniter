<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    // Loads database after this class call
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    // Register new user
    public function register($pass)
    {
        $data = array(
            'fname' => $this->input->post('firstname'),
            'lname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => $pass
        );
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }


    // User Login processing
    public function login($username, $password)
    {
        // validate
        $this->db->where('email', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('users');
        if ($result->num_rows() == 1) {
            // Update last login
            $data = array('last_login' => date('Y-m-d H:i:s'));
            $this->db->where('id', $result->row(0)->id);
            $this->db->update('users', $data);
            // return row id for session
            return $result->row(0)->id;
        } else {
            return false;
        }
    }


    // Get all users record.
    public function allusers()
    {
        $query = $this->db->order_by('id', 'DESC')->get('users');
        $out = [];
        if (count($query->result()) > 0) {
            foreach ($query->result() as $k => $user) {
                if (($this->user_previlage_model->UserPrevilageFromID($user->id)) !== 'super_admin') {
                    $out[$k]['fname'] = $user->fname;
                    $out[$k]['lname'] = $user->lname;
                    $out[$k]['email'] = $user->email;
                    $out[$k]['last_login'] = $user->last_login;
                    $out[$k]['office'] = ($this->office_model->OfficeDetailFromId($this->user_office_model->UsersOfficeId($user->id)));
                }
            }
            return $out;
        } else {
            return false;
        }
    }


// GET USER DETAIL OF ONE USER FROM ID
    public function UserDetail($user_id)
    {
        $query = $this->db->get_where('users', array('id' => $user_id), 1);
        if ($query) {
            foreach ($query->result() as $row) {
                $user['fname'] = $row->fname;
                $user['lname'] = $row->lname;
                $user['email'] = $row->email;
            }
            return $user;
        } else {
            return false;
        }
    }

}
