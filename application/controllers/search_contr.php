<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Search_contr extends MY_Controller{//CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->library(array('form_validation','table','session'));
    }

    public function index()
    {
       /* $loginUserParameter = $_SESSION['userData']['logged_In']; //Если человек не залогинен, то он не сможет попать на эту страницу.
        if($loginUserParameter)*/ if(parent::index())
        {
            $this->output->enable_profiler(TRUE); //Выводит всю информацию под страницей
            $this->load->model('users');
          $this->form_validation->set_rules('search_str','Search string','trim|required|min_length[2]|htmlspecialchars');
            if($this->form_validation->run() === true) {

                if($data['count'] = $this->users->countMatchesOfSearch())
                {
                    //Pagination
                    $this->load->library('pagination');
                    $config = array(
                        'base_url' => base_url() . '/search_contr/index', //Если не указать метод, то при переходе на след. страницу пагинации выдаст 404.
                        'total_rows' => $data['count'],//$this->users->countMatchesOfSearch(), //Сколько строк массива загружается из базы
                        'per_page' => '10', //Сколько отображается на странице
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
                    //Далее данные передаются в запрос для загрузки пагинации
                   $data['user_data'] = $this->users->globalUsers($config['per_page'],$this->uri->segment(3));

                 //  var_dump($data['count']);
                    /*    echo '<br>';
                        //echo time();
                        echo date( 'H:i:s d n Y', time() );
                        echo '<br>';
                        print_r($data['user_data']); */
                    //Pagination
                    $data['links'] = $this->pagination->create_links();
                    $data['header'] = $this->load->view('templates/header', '', true); //load view header and send some data to header (if needed in the future)
                    $data['footer'] = $this->load->view('templates/footer', '', true); //Ставим перед загрузкой основной страницы, иначе не видит переменную.
                    $this->load->view('pages/search_page', $data);      //load page view
                }
                else
                {   $this->session->set_flashdata('error', 'There is no matches');
                    $data['header'] = $this->load->view('templates/header', '', true); //load view header and send some data to header (if needed in the future)
                    $data['footer'] = $this->load->view('templates/footer', '', true); //Ставим перед загрузкой основной страницы, иначе не видит переменную.
                    $this->load->view('pages/search_page', $data);      //load page view
                }
            }
          else {
              //echo "Валидация не прошла";
              $data['header'] = $this->load->view('templates/header', '', true); //load view header and send some data to header (if needed in the future)
              $data['footer'] = $this->load->view('templates/footer', '', true); //Ставим перед загрузкой основной страницы, иначе не видит переменную.
              $this->load->view('pages/search_page', $data);      //load page view
              // redirect('/search_contr','refresh');
          }
        }
    }
}
