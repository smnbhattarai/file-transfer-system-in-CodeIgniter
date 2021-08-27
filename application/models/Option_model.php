<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Option_model extends CI_Model
{

    // Loads database after this class call
    public function __construct()
    {
        parent::__construct();
        $this->load->database('options');
    }


    public function GetOptions()
    {
        $query = $this->db->get('options');
        $out = [];
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $out[$row->name] = $row->value;
            }
            return $out;
        } else {
            return false;
        }
    }


    public function UpdateOptions()
    {

        $data = array(
            array(
                'name' => 'Office_name',
                'value' => $this->input->post('office_name')
            ),
            array(
                'name' => 'office_address',
                'value' => $this->input->post('office_address')
            ),
            array(
                'name' => 'office_phone',
                'value' => $this->input->post('office_phone')
            )
        );

        $query = $this->db->update_batch('options', $data, 'name');
        return true;

    }
}