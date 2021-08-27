<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_level_model extends CI_Model
{

    // Loads database after this class call
    public function __construct()
    {
        parent::__construct();
        $this->load->database('user_level');
    }


    // Get all user level data and slug
    public function AllUserLevel()
    {

        if ($this->user_previlage_model->UserPrevilage() == 'manager') {
            $query = $this->db->select('*')->where('user_level_slug !=', 'super_admin')->get('user_level');
            if ($query) {
                foreach ($query->result() as $row) {
                    $out[$row->id] = $row->user_level_name;
                }
                return $out;
            } else {
                return $out;
            }
        } else {
            $query = $this->db->get('user_level');
            if ($query) {
                foreach ($query->result() as $row) {
                    $out[$row->id] = $row->user_level_name;
                }
                return $out;
            } else {
                return $out;
            }
        }

    }

}