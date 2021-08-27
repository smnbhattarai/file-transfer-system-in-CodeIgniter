<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_previlage_model extends CI_Model
{

    // Loads database after this class call
    public function __construct()
    {
        parent::__construct();
        $this->load->database('user_previlage');
    }


    // Insert user previlage level when user registers
    public function AssignUserPrevilage($user_id, $userlevel)
    {
        $data = array(
            'user_id' => $user_id,
            'user_level' => $userlevel
        );
        return $this->db->insert('user_previlage', $data);
    }


    // Get user previlage level
    public function UserPrevilage()
    {
        $user_id = $this->session->userdata('user_id');
        if ($user_id) {
            $query1 = $this->db->get_where('user_previlage', array('user_id' => $user_id), 1);
            $user_level = $query1->result()[0]->user_level;
            $query2 = $this->db->get_where('user_level', array('id' => $user_level), 1);
            $user_slug = $query2->result()[0]->user_level_slug;
            return $user_slug;
        } else {
            return;
        }
    }


    // Get user previlage level
    public function UserPrevilageFromID($user_id)
    {
        if ($user_id) {
            $query1 = $this->db->get_where('user_previlage', array('user_id' => $user_id), 1);
            $user_level = $query1->result()[0]->user_level;
            $query2 = $this->db->get_where('user_level', array('id' => $user_level), 1);
            $user_slug = $query2->result()[0]->user_level_slug;
            return $user_slug;
        } else {
            return;
        }
    }


}