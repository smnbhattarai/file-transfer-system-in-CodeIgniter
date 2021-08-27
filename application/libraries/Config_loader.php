<?php

defined('BASEPATH') or exit('No direct script access allowed.');

class Config_loader
{
    protected $CI;

    public function __construct()
    {
        $ci =& get_instance();
        $ci->load->database();
        $query = $ci->db->get('options');

        if ($query->result() > 0) {
            $meta = array();
            foreach ($query->result() as $row) {
                $meta[$row->name] = $row->value;
            }
            $ci->load->vars($meta);
        }


    }
}

