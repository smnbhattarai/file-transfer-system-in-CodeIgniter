<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_office_model extends CI_Model
{

    // Loads database after this class call
    public function __construct()
    {
        parent::__construct();
        $this->load->database('user_office');
    }


    // Insert user office level when user registers
    public function AssignUserOffice($user_id, $office)
    {
        $data = array(
            'user_id' => $user_id,
            'office_id' => $office
        );
        return $this->db->insert('user_office', $data);
    }


    // Get office assigned to a user
    public function UsersOfficeId($user_id)
    {
        $query = $this->db->get_where('user_office', array('user_id' => $user_id), 1);
        if (count($query->result()) > 0) {
            $office_id = $query->result()[0]->office_id;
            return $office_id;
        } else {
            return false;
        }

    }
}