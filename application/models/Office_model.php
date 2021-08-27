<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Office_model extends CI_Model
{

    // Loads database after this class call
    public function __construct()
    {
        parent::__construct();
        $this->load->database('offices');
    }


    //  ADD NEW OFFICE
    public function AddOffice()
    {
        $data = array(
            'office_name' => $this->input->post('office_name'),
            'office_address' => $this->input->post('office_address'),
            'office_phone' => $this->input->post('office_phone')
        );
        if ($this->db->insert('offices', $data)) {
            return true;
        } else {
            return false;
        }
    }


    // Get all user level data and slug
    public function AllOffice()
    {
        $query = $this->db->get('offices');
        $out = [];
        if (count($query->result()) > 0) {
            foreach ($query->result() as $row) {
                $out[$row->id] = $row->office_name . ', ' . $row->office_address;
            }
            return $out;
        } else {
            return $out;
        }
    }


    // Get all user level data and slug
    public function AllOfficeDetail()
    {
        $query = $this->db->get('offices');
        $out = [];
        if (count($query->result()) > 0) {
            foreach ($query->result() as $k => $row) {
                $out[$k]['off_id'] = $row->id;
                $out[$k]['off_name'] = $row->office_name;
                $out[$k]['off_address'] = $row->office_address;
                $out[$k]['off_phone'] = $row->office_phone;
            }
            return $out;
        } else {
            return $out;
        }
    }


    // Get office name from Office id
    public function OfficeDetailFromId($office_id)
    {
        $query = $this->db->get_where('offices', array('id' => $office_id), 1);
        $out = [];
        if (count($query->result()) > 0) {
            foreach ($query->result() as $row) {
                $out = $row->office_name . ' - ' . $row->office_address;
            }
            return $out;
        } else {
            return false;
        }

    }


    // Edit office single detail
    public function EditOffice($key, $value, $col)
    {
        if ($col == 'office_name') {
            $data = array('office_name' => $value);
            $this->db->where('id', $key);
            $this->db->update('offices', $data);
            return true;
        } elseif ($col == 'office_address') {
            $data = array('office_address' => $value);
            $this->db->where('id', $key);
            $this->db->update('offices', $data);
            return true;
        } elseif ($col == 'office_phone') {
            $data = array('office_phone' => $value);
            $this->db->where('id', $key);
            $this->db->update('offices', $data);
            return true;
        }
    }

}

