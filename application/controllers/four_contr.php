<?php
class Four_contr extends CI_Controller{

    public function index()
    {
        $this->load->helper(array('url','form'));

        $param4=array();

        $data['header']=$this->load->view('templates/header',$param4,true);
        $data['footer']=$this->load->view('templates/footer',$param4,true);
        $this->load->view('pages/row_4',$data);
    }
}