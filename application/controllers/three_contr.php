<?php
class Three_contr extends CI_Controller{

    public function index()
    {
        $this->load->helper(array('url','form'));

        $param3=array(); //Позже что-то внесу

        $data['header']=$this->load->view('templates/header',$param3,true);
        $data['footer']=$this->load->view('templates/footer',$param3,true);
        $this->load->view('pages/row_3',$data);
    }
}