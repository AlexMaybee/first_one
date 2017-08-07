<?php
class Users_details extends CI_Model
{

 /*   public function get_user_details()
    {
        $this->load->database();
        $query=$this->db->get('users_details');
        return $query->result_array();
    }*/

    public function insert_users_details($formData1) //Уже не нужна, все сделал из users
    {
        $this->load->database();
        if($query=$this->db->insert('users_details', $formData1) === true): return true;
        endif;
    }

    public function ava_upload() //Сюда все перенесено из контроллера admin_contr->upload_avatar()
    {
        $userId = $_SESSION['userData']['id'];

        if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/upload/'.$userId))
        {
            mkdir($_SERVER['DOCUMENT_ROOT'].'/upload/'.$userId);
            mkdir($_SERVER['DOCUMENT_ROOT'].'/upload/'.$userId.'/thumbs'); //Создал папку колхозно, т.к. местная ф-я не хочет этого делать.
        }
        $config= array(
            'upload_path' => './upload/'.$userId, //Путь к папке для загрузки
            'allowed_types' => 'gif|jpg|png|jpeg', //Разрешенные расширения файлов.
            'max_size' => '0', // ограничение в килобайтах
            'encrypt_name' => true , //изменяет стоковое имя файла на шифр
            'remove_spaces' => true, //del spaces from name
        );
        //load library
        $this->load->library('upload',$config);
        if($this->upload->do_upload('fileToUpload') === FALSE)
        {
            return false;
            //На странице ошибка выводится, если $this->input->post('fileToUpload') === FALSE
        }
        else
        {
            $image_info=$this->upload->data(); // Вызываем массив информации о загруженном файле.
            $this->load->library('image_lib'); //Вызываем библиотеку.

            //Watermark on original foto
            $config = array(
                'source_image' => $image_info['full_path'], //картинка, кот. берется за основу.
                'wm_text' => 'Copyright 2017, by Alex Mayboroda', //текст, кот. будет печататься.
                'wm_type' => 'text',
                'wm_padding' => '10',
                'wm_vrt_alignment' => 'top', //расположение по вертикали
                'wm_hor_alignment' => 'left', //расположение печати по горизонтали
                'wm_font_color' => 'fff', //цыет печати.
                'wm_font_size' => '25', //размер шрифта печати зависит от разрешения картинки: чем больше разрешение, тем мельче шрифт!!!
            );
            $this->image_lib->initialize($config);
            $this->image_lib->watermark();   //НЕ получается, чтобы сначала делало копию в миниатюры, а потом ставило знак.
            //Watermark on original foto

            //Image resize
            $config = array(
                'image_library' => 'gd2',
                'source_image' => $image_info['full_path'],
                'maintain_ratio' => true,
                'create_thumb' => true, // Должно, кажется, быть в связве с путем через строку выше, иначе будеи изменять название
                'new_image' => APPPATH.'../upload/'.$userId.'/thumbs', //была здесь ошибка в точках, поэтому не грузоло в папку.
                'width' => 100,
                'height' => 100,
            );
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            //Image resize

            //Вносим в массив имя поля-значение
            $avatar=array(
                'image' => $image_info['file_name']
            );
            $this->load->database();
            $this->db->where('id_users',$userId);
            $this->db->update('users_details', $avatar);

            // Session refresh
            $this->load->model('users');
            $userData=$this->users->allUserDataLoad($userId);
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
           // return true;
        }
    }

    public function avarge_salary()
    {
        $this->load->database();
        $this->db->select_avg('salary');
        $this->db->from('users_details');
        $query=$this->db->get();
        return $query->row_array();
    }

    public function countOld() //функция вычисления полных лет для страницы админа
    {
        $userId=$_SESSION['userData']['id'];
        $time = date('Y-m-d',time());
        $this->load->database();
        $this->db->select("substr((CURRENT_DATE()-birthdate),1,2) as Old"); //last edition of query
        $this->db->from('users_details');
        $this->db->where('id_users',$userId);
        $query= $this->db->get();
        $row=$query->row_array();
       // print_r($row);
        foreach ($row as $num)
        {
            $old= $num;
        }
        /*  $this->db->select('birthdate');
          $this->db->from('users_details');
          $this->db->where('id_users',$userId);
          $query= $this->db->get();*/
     //   print_r($old);
    /*    $date1 = str_replace('-','',$row['birthdate']);
        $date2 = str_replace('-','',$time);
        $v  = abs($date1-$date2);

        return substr($v,0,-4); */
    return $old;
    }

    public function avgCountOld() //функция вычисления полных лет для страницы админа
    {

        $this->load->database();
        $this->db->select(" ROUND(AVG(substr((CURRENT_DATE()-birthdate),1,2)),0) as AvgOld"); //last edition of query
        $this->db->from('users_details');
        $query= $this->db->get();
        $row=$query->row_array();
       // print_r($query);
        foreach ($row as $num)
        {
            $old= $num;
        }
        print_r($old);
        return $old;
    }

}