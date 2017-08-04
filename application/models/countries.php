<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Countries extends CI_Model {

    public function coutriesLoad()
    {
        $this->load->database();

        $query=$this->db->get('country');
        if ($query){
        return $query->result_array();
        }
    }
}