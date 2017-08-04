<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->library(array('form_validation','session'));
    }

    public function index()
    {
        $this->load->model(array('countries','towns','streets'));
        $data['countries'] = $this->countries->coutriesLoad();
        $data['towns'] = $this->towns->townsLoad();
        $data['streets'] = $this->streets->streetsLoad();

        $data['header'] = $this->load->view('templates/header','',true);//Если убрать бустые кавычки и тру
        $data['footer'] = $this->load->view('templates/footer','',true);//то будет гураться, что не модет конвертивовать в строку массив.
        $this->load->view('pages/home',$data);
    }

    public function form() //Все опреации перенес в модель users->insert_users()
    {
        $this->load->model('users');
        if($this->users->insert_users() === false)
        {
            $this->session->set_flashdata('error', 'Data is not inserted');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data successfully inserted, please login');
            redirect('/main','refresh'); //после внесения данных редирект на первую страницу
        }
    }

    public function userLogin() //Все перенес в модель users->getUsers
    {
        $this->load->model('users');
        if($this->users->getUsers() === false)
        {
            $this->session->set_flashdata('error', 'Invalid login and password!');
            $this->index();
        }
        else{
                //Выводим приветствие через флеш_дату
                $this->session->set_flashdata('welcome', 'Welcome, '.$_SESSION['userData']['first_name'].' '.$_SESSION['userData']['last_name']);
                redirect('/main','refresh');
            }
    }

    public function secureCode_login() //Все операции перенесены в модель users->secureCode_load()
    { /* Логика построена таким образом:
        - если валидация не прошла или в запросе нет совпадений (т.е. пустой), то выводит сообщение, что неправильный код;
        - если валидация успешна и код правильный, то переводит на страницу админа
    */
        $this->load->model('users');
        if($this->users->secureCode_load() === false)
        {
            $this->session->set_flashdata('error', 'Invalid security code!');
            redirect(base_url(), 'main');
        }
        else
        {
            $this->session->set_flashdata('welcome',"Welcome, ".$_SESSION['userData']['first_name'].' '.$_SESSION['userData']['last_name'].'!'.' <h4>Now you are logined!</h4>');
            redirect('/admin_contr');
        }
    }

        public function logout()
    {
        $this->session->sess_destroy('userData');
        redirect('/main','refresh');
    }
}