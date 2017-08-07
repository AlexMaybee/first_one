<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login { //extends CI_Controller - пока в єтом смісла не вижу!

    private $login = false;

    public function __construct()
    {
        //parent::__construct();
        $CI =& get_instance(); //так нужно крузить в библиотеке методы контроллера

        $CI->load->library('session');
        $CI->load->helper('url');
        $userParam = $CI->session->userdata('userData');

        if(isset($userParam)) {
            if(!empty($userParam)) {
                //отправлять запрос в бз
                $this->login = true;
             // echo "ok!";
            }
        }
        if(!$this->login) {
              redirect('/main', 'refresh');
              //сделй отдельный УРЛ для логина
        }

    }
}