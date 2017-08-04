<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Towns extends CI_Model {

    public function townsLoad()
    {
        $this->load->database();
        $query=$this->db->get('towns');
        return $query->result_array();
    }

}