<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

    private $login = false;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $userParam = $this->session->userdata('userData');

        if(isset($userParam)) {
            if(!empty($userParam)) {
                //отправлять запрос в бз
                $this->login = true;
                echo 'Сессия пустая';
            }
        }
        if(!$this->login) {
              redirect('/admin', 'refresh');
              //сделй отдельный УРЛ для логина
        }

    }
}