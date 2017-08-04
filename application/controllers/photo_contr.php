<?php
class Photo_contr extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','date', 'html','form','file'));
        $this->load->library(array('form_validation','session')); //'upload' - Запускать толлько по месту, иначе перестает грузить в папку!
    }

    public function index()
    {
        $loginUserParameter = $_SESSION['userData']['logged_In'];
        if($loginUserParameter) {
            $this->load->model(array('photos_model'));
            $this->output->enable_profiler(TRUE); //Выводит всю информацию под страницей
            if($data['count'] = $this->photos_model->countFotos())
            {                                                        //запрос для подсчета количества строк(ид, фото, ид_юзер),
                                                                    //чтобы вставить это число в 'total_rows' ниже.
               // print_r($data['user_data']);

            //    var_dump($data['count']);
                //Pagination start
                $this->load->library('pagination');
                $config=array(
                    'base_url' => base_url().'/photo_contr/index', //метод должен быть ОБЯЗАТЕЛЬНО!
                    'total_rows' => $data['count'],// $this->photos_model->countFotos(), //Сколько строк массива загружается из базы
                                                    //Лучше вставлять переменную, а не функцию запроса, иначе будет 1 лишний.
                    'per_page' => '5', //Сколько отображается на странице
                    'full_tag_open' => '<ul class="pagination">',
                    'full_tag_close' => '</ul>',
                    'num_tag_open' => '<li>',
                    'num_tag_close' => '</li>',
                    'cur_tag_open' => '<li class="disabled"><li class="active"><a href="#">',
                    'cur_tag_close' => "<span class='sr-only'></span></a></li>",
                    'next_tag_open' => '<li>',
                    'next_tag_close' => '</li>',
                    'prev_tag_open' => '<li>',
                    'prev_tag_close' => '</li>',
                    'first_tag_open' => '<li>',
                    'first_tag_close' => '</li>',
                    'last_tag_open' => '<li>',
                    'last_tag_close' => '</li>',
                );
                $this->pagination->initialize($config);
                //Далее данные передаются в запрос
                $data['user_data'] = $this->photos_model->loadFotosData($config['per_page'],$this->uri->segment(3));
                //Pagination start
            //    print_r($data['user_data']);
                $data['header'] = $this->load->view('templates/header', '', true); //load view header and send some data to header (if needed in the future)
                $data['footer'] = $this->load->view('templates/footer', '', true); //Ставим перед загрузкой основной страницы, иначе не видит переменную.
                $this->load->view('pages/photos_page', $data);      //load page view
            }
            else //Если фоток в базе нет, то грузит просто страницу
            {
                $data['header'] = $this->load->view('templates/header', '', true); //load view header and send some data to header (if needed in the future)
                $data['footer'] = $this->load->view('templates/footer', '', true); //Ставим перед загрузкой основной страницы, иначе не видит переменную.
                $this->load->view('pages/photos_page', $data);      //load page view
            }
        }

    }

    public function uploadFoto() //Все скопировал в photos_model->insertFotos()
    {
        $this->load->model('photos_model');
        if($this->photos_model->insertFotos() === false)
        {
            $this->session->set_flashdata('error','Something wrong woth uploading!');
            $this->index();
        }
        else {
            $this->session->set_flashdata('success','Your foto uploaded successfully!');
            $this->index();
        }
    }

    public function delPhoto() //Нужно додумать, чтобы удаляло не только из базы, но и из папки сам файл.
    {  // $this->load->library(array('ftp','upload'));

      // echo base_url().$this->input->post('path');
        $this->load->model('photos_model');
        if($this->photos_model->deletePhoto())
        {
           unlink($this->input->post('path')); //Функция удаления. Вышел из ситуации передачей пути файла путем скрытого поля формы $this->ftp->delete_file

            $this->session->set_flashdata('success','Your foto deleted successfully!');
            $this->index();
        }
    }
}