<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_contr extends CI_Controller{ //CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url','date'));
        $this->load->library(array('form_validation','session','login')); //upload нужно закпускать только по месту!
    }

    public function index()
    {
       /* $loginUserParameter = $_SESSION['userData']['logged_In'];//$this->session->userData();
        //Если есть данные сессии в виде $loginUserParameter, то вытягиваем данные из таблицы и выводим КРАСИВО
        if($loginUserParameter) */
   //     if(parent::index()=== true)
    //    {
            // var_dump($loginUserParameter);

            //caledar
            $prefs= array(
                'start_day' => 'Monday',
                'show_next_prev' => true,
                'month_type' => 'long',
                'local_time'
                //'next_prev_url'  => base_url().'/admin_contr/'
            );
            $this->load->library('calendar',$prefs);
            //calendar

            //Загружаем данные из таблицы по совпадению с ИД и передаем в переменную $data, чтобы вывести на странице админа
            $this->load->model(array('users','users_details','countries','towns','streets'));

            $data['avg_old']=$this->users_details->avgCountOld();
            $data['old']= $this->users_details->countOld();
            $data['avg_salary']= $this->users_details->avarge_salary();
            $data['countries'] = $this->countries->coutriesLoad();
            $data['towns'] = $this->towns->townsLoad();
            $data['streets'] = $this->streets->streetsLoad();

            $userData=$this->users->allUserDataLoad();
            foreach ($userData as $column)
            {
                $data['user_data']=$column;
            }
           //var_dump($data['user_data']);
            $data['header'] = $this->load->view('templates/header', '', true); //load view header and send some data to header (if needed in the future)
            $data['footer'] = $this->load->view('templates/footer', '', true); //Ставим перед загрузкой основной страницы, иначе не видит переменную.
            $this->load->view('pages/admin', $data);      //load page view
    //    }

    }

    public function updateData()
    {
       //Все действия перенесены в модель users/userUpdData();
        $this->load->model('users');
        if($this->users->userUpdData() === false)
        {
           // show_error('Error with your data','Error'); - выводит шаблон страницы с ошибкой
            $this->session->set_flashdata('error', 'Data is not updated');
            $this->index();
        }
        else
        { //Попытался переставить сессию в модель, но т.к. функция используется
            // Session refresh
        /*    $userData=$this->users->allUserDataLoad();

         foreach ($userData as $column)
            {
                $add_userdata=$column;
            }
            $addSession=array(
                'logged_In' => 'true',
                'first_name' => $add_userdata['first_name'],
                'last_name' => $add_userdata['last_name'],
                'id' => $add_userdata['id'],
                'email' => $add_userdata['email'],
                'image' => $add_userdata['image']
            );
            $this->session->set_userdata('userData', $addSession);
            // Session refresh
*/

            $this->session->set_flashdata('greetings','Your data updated successfully!');
            redirect('/admin_contr','refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy('userData');
        redirect('/main','refresh');
    }

    // New funct. 20.07
    public function upload_avatar() //Все перенес в модель users_details->ava_upload()
    {
        $this->load->model('users_details'); //грузим модель, в которой будет весь код
        if($this->users_details->ava_upload() === false) //здесь метод для загрузки
        {
            $this->index();
        }
        else
        {
            $this->session->set_flashdata('success','Your image uploaded successfully!');
            $this->index();
        }
    }

}