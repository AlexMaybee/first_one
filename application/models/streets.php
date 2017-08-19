<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Streets extends CI_Model{

    public function streetsLoad()
    {
        $this->load->database();
        $query=$this->db->get('streets');
        return $query->result_array();
    }

    public function addColumn()
    {
        $this->load->database();
        $this->load->dbforge(); //Грузим класс для вставки столбца.
        $query=$this->dbforge->add_field("label varchar(100) NOT NULL DEFAULT 'default label'");
        if($query) echo "<h1>"."Поле создано успешно!"."</h1>";
    }

    public function insertData()
    {
        $data=array(
            'id_towns' => 1,
            'street' => 'Платона Майбороды',
            'label' => 'TEST-TEST-MY-TEST'
        );

        $this->load->database();
        $this->db->insert('streets',$data);
    }
}