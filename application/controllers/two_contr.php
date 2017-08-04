<?php
class Two_contr extends CI_Controller {

    public function index()
    {
        $this->load->helper(array('url','form')); //Грузим оба хелпера в масиве

        $param2=array();//Позже есть возможность вставить данные

        $data['header']=$this->load->view('templates/header',$param2,true);
        $data['footer']=$this->load->view('templates/footer',$param2,true);
        $this->load->view('pages/row_2',$data);
    }
}