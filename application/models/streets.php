<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Streets extends CI_Model{

    public function streetsLoad()
    {
        $this->load->database();
        $query=$this->db->get('streets');
        return $query->result_array();
    }
}