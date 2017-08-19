<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Search_contr extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','table','session','login'));
      //  $log= new Login(); // Инициализация не нужна, ибо он грузит саму бибилиотеку, чего достаточно.

        $this->load->helper(array('url','form'));

    }

    public function index()
    {
        $this->output->enable_profiler(TRUE); //Выводит всю информацию под страницей
        $this->load->model('users');
        $data['user_data'] = $this->users->globalUsers();

        if($data['user_data']) //Нужно делать именно так, иначе будет показывать
                                                                            //пустой запрос и ошибку на странице
        {
         //  var_dump($data['count']);
            $data['header'] = $this->load->view('templates/header', '', true); //load view header and send some data to header (if needed in the future)
            $data['footer'] = $this->load->view('templates/footer', '', true); //Ставим перед загрузкой основной страницы, иначе не видит переменную.
            $this->load->view('pages/search_page', $data);      //load page view
        }
        else
        {
           // $this->session->set_flashdata('error', 'There is no matches');
            $data['header'] = $this->load->view('templates/header', '', true); //load view header and send some data to header (if needed in the future)
            $data['footer'] = $this->load->view('templates/footer', '', true); //Ставим перед загрузкой основной страницы, иначе не видит переменную.
            $this->load->view('pages/search_page', $data);      //load page view
        }
    }
}
