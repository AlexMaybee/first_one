<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url','date'));
        $this->load->library(array('form_validation','session')); //upload нужно закпускать только по месту!
    }

   /* public function getUsers($login,$password)
    {
    $this->load->database();
    $query=$this->db->query("SELECT users.*,users_details.* FROM users left join users_details ON users.id=users_details.id_users WHERE users.email='$login' and users.pass='$password'");
    return $query->result_array();
    }*/
    public function getUsers() //Перенес сюда все возможное из контроллера main->userLogin()
    {
        $this->form_validation->set_rules('login', 'Your login','required|htmlspecialchars|trim'); //Удалил проверку е-мейла, т.к. логин теперь по фамилии и мейлу.
        $this->form_validation->set_rules('password','Your password','trim|required|htmlspecialchars|min_length[5]');
        if($this->form_validation->run() == false) {
            return false; //Если валидация не прошла, возвращаем фалс и выводим ошибку.
        }
        else{
            $login=$this->input->post('login');
            $password=$this->input->post('password');
            $this->load->database();
            $this->db->select('users.*, users_details.*, country.country_name, towns.name, streets.street, users_details.image');
            $this->db->from('users');
            $this->db->join('users_details','users.id=users_details.id_users','left');
            $this->db->join('country','users_details.id_country=country.id','left');
            $this->db->join('towns','users_details.id_towns=towns.id','left');
            $this->db->join('streets','users_details.id_streets=streets.id','left');
            //last edition
            $this->db->where("(email = '$login' OR last_name = '$login') AND pass='$password'");
            // $this->db->where('users_details.email',$login);
           // $this->db->where('users.pass',$password);
            $query=$this->db->get();
          //  print_r($query->result_array());
            if($query->result_array()) {
                foreach ($query->result_array() as $dat) {
                    $new_userData = $dat;
                }
             //   print_r($new_userData);
                //Session start
                $sessionData = array(
                    'id' => $new_userData['id'],
                    'first_name' => $new_userData['first_name'],
                    'last_name' => $new_userData['last_name'],
                    'image' => $new_userData['image'],
                    'email' => $new_userData['email'],
                    'logged_In' => 0,
                );
                //Отправляем данніе в сессию
                $this->session->set_userdata('userData', $sessionData);
              //  print_r($_SESSION);
                return true;
            }
            else
            {
                return false; //снова пишем, что неправильный логин и пароль
            }
        }
      /*  $this->load->database();
        $query=$this->db->query("SELECT users.*,users_details.* FROM users left join users_details ON users.id=users_details.id_users WHERE users.email='$login' and users.pass='$password'");
        return $query->result_array();*/
    }

    public function insert_users() //все операции из контроллера main теперь здесь
    {
        $this->form_validation->set_rules('fName','First name','trim|required|min_length[2]|htmlspecialchars|max_length[15]');
        $this->form_validation->set_rules('lName','Last name','trim|required|min_length[2]|htmlspecialchars');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|htmlspecialchars|trim');
        $this->form_validation->set_rules('tel', 'Phone number','trim|integer|min_length[10]|numeric');
        $this->form_validation->set_rules('country','Country','trim|required|htmlspecialchars');
        $this->form_validation->set_rules('town','Town','trim|required|htmlspecialchars');
        $this->form_validation->set_rules('street','Street','trim|required|htmlspecialchars');
        $this->form_validation->set_rules('gender','Gender','trim|required|in_list[male,female]|alpha');
        $this->form_validation->set_rules('accept','Accept','trim|required|htmlspecialchars');
        $this->form_validation->set_rules('pass1','Password 1','trim|required|htmlspecialchars|min_length[5]');
        $this->form_validation->set_rules('pass2','Password 2','trim|required|matches[pass1]');
        $this->form_validation->set_rules('secure_code','Secure code','trim|htmlspecialchars|required|numeric');
        $this->form_validation->set_rules('date','Registration data', 'trim|htmlspecialchars');
        $this->form_validation->set_rules('salary','Your salary','trim|numeric|required|htmlspecialchars');
        $this->form_validation->set_rules('birthdate','Date of your birth','min_length[10]|required|trim|htmlspecialchars');

        if($this->form_validation->run() === false){
            return false; //Если валидация не прошла, возвращаем фалс и выводим сообщение
        }
        else{
            $formData = array(
                'first_name' => $this->input->post('fName'),
                'last_name' => $this->input->post('lName'),
                'pass' => $this->input->post('pass1'),
                'security_code' => $this->input->post('secure_code'),
                'date' => $this->input->post('date')
            );

            $this->load->database();
            if($this->db->insert('users', $formData) === TRUE) {
                $result_id = $this->db->insert_id(); //Получаем ИД последнего запроса
            }
                $formData1 = array( //Пришлось разделить данные на 2 переменные, иначе выдает отшибку о несуществующих полях.
                    'id_users' => trim(htmlspecialchars($result_id)),
                    'email' => $this->input->post('email'),
                    'phone_number' => $this->input->post('tel'),
                    'salary' => $this->input->post('salary'),
                    'birthdate' => $this->input->post('birthdate'),
                    'id_country' => $this->input->post('country'),
                    'id_towns' => $this->input->post('town'),
                    'id_streets' => $this->input->post('street'),
                    'gender' => $this->input->post('gender')
                );
            $this->load->database();
            if($query=$this->db->insert('users_details', $formData1) === true)
            {
                return true;
            }
        }
    }

    public function secureCode_load() //Сюда перенесены все операции из контроллера main->secureCode_login()
    {   //validation start
        $this->form_validation->set_rules('secCode', 'Secure code', 'trim|htmlspecialchars|required|numeric|min_length[3]');
        if ($this->form_validation->run() === FALSE) {
            return false; //Если валидация не прошла, возвращаем ошибку.
        } else {
            $secCode=$this->input->post('secCode');
            $email= $_SESSION['userData']['email'];
            $uSername = $_SESSION['userData']['last_name'];
            $uName = $_SESSION['userData']['first_name'];
            //Ищем совпадение в таблице по секюр. коду в 4-х полях, чтобы юзер не зашел в чужую запись введя случайно чужой код
            $this->load->database();
            $this->db->select('users.*, users_details.*');
            $this->db->from('users');
            $this->db->join('users_details','users.id=users_details.id_users','left');
            $this->db->where('users_details.email',$email);
            $this->db->where('users.security_code',$secCode);
            $this->db->where('users.first_name',$uName);
            $this->db->where('users.last_name',$uSername);
            $query=$this->db->get();
       //     print_r($query->result_array());

            if($query->result_array())
            {
                foreach ($query->result_array() as $dat){
                    $add_userdata=$dat;
                }
                $addSession=array(
                    'logged_In' => 1,
                    'first_name' => $add_userdata['first_name'],
                    'last_name' => $add_userdata['last_name'],
                    'id' => $add_userdata['id'],
                    'email' => $add_userdata['email'],
                    'image' => $add_userdata['image']
                );
                $this->session->set_userdata('userData', $addSession);
                //print_r($_SESSION);
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function userUpdData()
    {       //2 queries for update in 1
        $this->form_validation->set_error_delimiters('<span id="errors">', '</span>'); //Задаю теги хтмл для отображения ошибок. Теперь на странице будет чисты й пхп.
        //Validation
        $this->form_validation->set_rules('fName','First name','trim|required|min_length[2]|htmlspecialchars|max_length[15]');
        $this->form_validation->set_rules('lName','Last name','trim|required|min_length[2]|htmlspecialchars');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|htmlspecialchars|trim');
        $this->form_validation->set_rules('tel', 'Phone number','trim|integer|min_length[10]|numeric');
        $this->form_validation->set_rules('country','Country','trim|required|htmlspecialchars');
        $this->form_validation->set_rules('town','Town','trim|required|htmlspecialchars');
        $this->form_validation->set_rules('street','Street','trim|required|htmlspecialchars');
        $this->form_validation->set_rules('gender','Gender','trim|required|in_list[male,female]|alpha');

        $this->form_validation->set_rules('pass1','Password 1','trim|required|htmlspecialchars|min_length[5]');
        $this->form_validation->set_rules('pass2','Password 2','trim|required|matches[pass1]');
        $this->form_validation->set_rules('secure_code','Secure code','trim|htmlspecialchars|required|numeric');
        $this->form_validation->set_rules('upd_date','Update data date', 'trim|htmlspecialchars');

        if($this->form_validation->run() === false){
            return false;
        }
        else {
            $updateDataArray1=array(
                'first_name' => $this->input->post('fName'),
                'last_name' => $this->input->post('lName'),
                'pass' => $this->input->post('pass1'),
                'security_code' => $this->input->post('secure_code'),
            );

      //      echo $this->input->post('upd_date');

            $updateDataArray2 = array( //Пришлось разделить данные на 2 переменные, иначе выдает отшибку о несуществующих полях.
                'gender' => $this->input->post('gender'),
                'phone_number' => $this->input->post('tel'),
                'email' => $this->input->post('email'),
                'salary' => $this->input->post('salary'),
                'birthdate' => $this->input->post('birthdate'),
                'id_country' => $this->input->post('country'),
                'id_towns' => $this->input->post('town'),
                'id_streets' => $this->input->post('street'),
                'last_update_data' => $this->input->post('upd_date')
            );
            $id = $_SESSION['userData']['id'];
            $this->load->database();
            $this->db->where('id', $id);
            if ($this->db->update('users', $updateDataArray1) === TRUE) {
                $this->db->where('id_users', $id);
                $this->db->update('users_details', $updateDataArray2);
            }
            return true;
        }
    }

    public function allUserDataLoad()
    {               //В этом запросе пришлось добавить ид на города, страны и улицы, т.к. потребовались для правильного отображения
                    //выпадающих списков на странице админа
        $userId = $_SESSION['userData']['id'];
        $this->load->database();
       /* $query= $this->db->query("SELECT users.*, users_details.gender, users_details.phone_number, users_details.id_country, users_details.id_towns, users_details.id_streets, country.country_name, towns.name, streets.street, users.image as avatar From users
                                    LEFT JOIN users_details ON (users.id=users_details.id_users)
                                    LEFT JOIN country ON(users_details.id_country=country.id)
                                    LEFT JOIN towns ON(users_details.id_towns=towns.id)
                                    LEFT JOIN streets ON (users_details.id_streets=streets.id)
                                    WHERE users.id=$userId");*/
        $this->db->select('users.*, users_details.*, country.country_name, towns.name, streets.street, users_details.image as avatar');
        $this->db->from('users');
        $this->db->join('users_details','users.id=users_details.id_users','left');
        $this->db->join('country','users_details.id_country=country.id','left');
        $this->db->join('towns','users_details.id_towns=towns.id','left');
        $this->db->join('streets','users_details.id_streets=streets.id','left');
        $this->db->where('users.id',$userId);
        $query=$this->db->get();
        return $query->result_array();
    }


    //new 20.07 evening
    public function ava_upload($avatar)
    {
        $id=$_SESSION['userData']['id'];
        $this->load->database();
        $this->db->where('id',$id);
        $this->db->update('users', $avatar);

    }

    public function countMatchesOfSearch()
    {
        $id=$_SESSION['userData']['id'];
        $search = $this->input->post('search_str');

        $this->load->database();
        $this->db->select('users.first_name, users.last_name, users_details.gender, users_details.email, users_details.phone_number, country.country_name, towns.name, streets.street');
        $this->db->from('users');
       // $this->db->where('users.id !=', $id); //никак не хочет работать!
        $this->db->join('users_details', 'users.id=users_details.id_users', 'left');
        $this->db->join('country','users_details.id_country=country.id','left');
        $this->db->join('towns','users_details.id_towns=towns.id','left');
        $this->db->join('streets','users_details.id_streets=streets.id','left');

        if($this->input->post('srch_name'))
        {
            $this->db->where('users.first_name', $search);
            $this->db->order_by('users.first_name', 'ASC');
        }
        if($this->input->post('srch_sername'))
        {
            $this->db->where('users.last_name', $search);
            $this->db->order_by('users.last_name', 'ASC');
        }
        if($this->input->post('srch_gender'))
        {
            $this->db->where('users_details.gender', $search);
            $this->db->order_by('users.first_name', 'ASC');
        }
        if($this->input->post('srch_email'))
        {
            $this->db->where('users_details.email', $search);
            $this->db->order_by('users_details.email', 'ASC');
        }
        if($this->input->post('srch_phone'))
        {
            $this->db->where('users_details.phone_number', $search);
            $this->db->order_by('users_details.phone_number', 'ASC');
        }
        if($this->input->post('srch_country'))
        {
            $this->db->where('country.country_name', $search);
            $this->db->order_by('users.first_name', 'ASC');
        }
        if($this->input->post('srch_town'))
        {
            $this->db->where('towns.name', $search);
            $this->db->order_by('towns.name', 'ASC');
        }
        if($this->input->post('srch_street'))
        {
            $this->db->where('streets.street', $search);
            $this->db->order_by('streets.street', 'ASC');
        }
            $this->db->or_where('users.first_name', $search);
            $this->db->or_where('users.last_name', $search);
            $this->db->or_where('users_details.email', $search);
            $this->db->or_where('users_details.phone_number', $search);
            $this->db->or_where('country.country_name', $search);
            $this->db->or_where('towns.name', $search);
            $this->db->or_where('streets.street', $search);

        //$query=$this->db->count_all_results();
        $query=$this->db->get();
    return $query->num_rows(); //считаем кол-во строк
    }

    public function globalUsers($num,$offset) //пример правильного запроса с поиском по всем полям
    {
            $id = $_SESSION['userData']['id'];
            $search = $this->input->post('search_str');
            $this->load->database();
           // $this->db->select('users.first_name, users.last_name, users_details.gender, users_details.email, users_details.phone_number, country.country_name, towns.name, streets.street');
            $this->db->select('users.first_name, users.last_name, users_details.gender, users_details.email, users_details.phone_number, country.country_name, towns.name, streets.street, users_details.salary, substr((CURRENT_DATE()- users_details.birthdate),1,2) as Old,
                (SELECT ROUND(AVG(substr((CURRENT_DATE()-users_details.birthdate),1,2)),0) from users_details) as AvgOld,
                (SELECT ROUND(AVG(users_details.salary),0) from users_details) as averge_salary');
            $this->db->from('users');
            //$this->db->where('users.id !=', $id); //никак не хочет работать!
            $this->db->join('users_details', 'users.id=users_details.id_users', 'left');
            $this->db->join('country','users_details.id_country=country.id','left');
            $this->db->join('towns','users_details.id_towns=towns.id','left');
            $this->db->join('streets','users_details.id_streets=streets.id','left');

        if($this->input->post('srch_name')) // Нужно сделать так, чтобы при нажатии галочки искало только по конкретному полю
        {                                   //Having не разрешает в подсчете результатов, а при выборе 2-х полей выводит только общее, где совпало значение в 2-х полях
            $this->db->where('users.first_name', $search);
            $this->db->order_by('users.first_name', 'ASC');
         //   $this->db->limit($num,$offset);
           // $query1=$this->db->get();
        }
        if($this->input->post('srch_sername'))
        {
            $this->db->where('users.last_name', $search);
            $this->db->order_by('users.last_name', 'ASC');
        }
        if($this->input->post('srch_gender'))
        {
            $this->db->where('users_details.gender', $search);
            $this->db->order_by('users.first_name', 'ASC');
        }
        if($this->input->post('srch_email'))
        {
            $this->db->where('users_details.email', $search);
            $this->db->order_by('users_details.email', 'ASC');
        }
        if($this->input->post('srch_phone'))
        {
            $this->db->where('users_details.phone_number', $search);
            $this->db->order_by('users_details.phone_number', 'ASC');
        }
        if($this->input->post('srch_country'))
        {
            $this->db->where('country.country_name', $search);
            $this->db->order_by('users.first_name', 'ASC');
        }
        if($this->input->post('srch_town'))
        {
            $this->db->where('towns.name', $search);
            $this->db->order_by('users.first_name', 'ASC');
        }
        if($this->input->post('srch_street'))
        {
            $this->db->where('streets.street', $search);
            $this->db->order_by('streets.street', 'ASC');
        }
        else
        {
            $this->db->or_where('users.first_name', $search);
            $this->db->or_where('users.last_name', $search);
            $this->db->or_where('users_details.email', $search);
            $this->db->or_where('users_details.phone_number', $search);
            $this->db->or_where('country.country_name', $search);
            $this->db->or_where('towns.name', $search);
            $this->db->or_where('streets.street', $search);
        }
        $this->db->limit($num,$offset);
        $query=$this->db->get();
        return $query->result_array();//получаем все данные в массив
    }
}