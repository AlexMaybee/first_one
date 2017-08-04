<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {

    private $login = false;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $userParam = $this->session->userdata('userData');
     // var_dump($userParam);
        if(isset($userParam)) {
            if(!empty($userParam)) {
                //отправлять запрос в бз
               return $this->login = true;
             //   redirect('/main', 'refresh');
              // print_r($_SESSION);
            }
        }
        if(!$this->login) {
           // print ('Войди в систему!');
              redirect('/main', 'refresh');
              //сделй отдельный УРЛ для логина
        }

    }
}