<?php
class Photos_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','date', 'html','form','file'));
        $this->load->library(array('form_validation','session')); //'upload' - Запускать толлько по месту, иначе перестает грузить в папку!
    }

    public function countFotos() //В контроллере названия параметров другие
    {
        $id = $_SESSION['userData']['id'];
        $this->load->database();
        $this->db->where('id_users', $id);
        $this->db->from('photos');
        $query= $this->db->count_all_results();

       return $query; //->result_array();
    }

    public function loadFotosData($num,$offset) //В контроллере названия параметров другие
    {
        $id = $_SESSION['userData']['id'];
        $this->load->database();
        $query=$this->db->get_where('photos', array("id_users"=>$id), $num, $offset);
        return $query->result_array();
    }

    public function insertFotos() //Все скопировано из photo_contr->uploadFoto()
    {
        $userId = $_SESSION['userData']['id'];
        //Validation first - кажется бесполезно!
        $this->form_validation->set_rules('photoToUpload','Photo To Upload', 'trim|htmlspecialchars');
        $this->form_validation->set_rules('upd_date','Update data date', 'trim|htmlspecialchars');
        //Uploading proto to directory
        if($this->form_validation->run() == false) {
            return false; //Если валидация не прошла, возвращаем фалс и выводим ошибку.
        }
        else
            {
                if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/upload/'.$userId.'/photos'))
                {
                    mkdir($_SERVER['DOCUMENT_ROOT'].'/upload/'.$userId.'/photos'); //Создал папку колхозно, т.к. местная ф-я не хочет этого делать.
                }
                $config= array(
                    'upload_path' => './upload/'.$userId.'/photos/', //Путь к папке для загрузки
                    'allowed_types' => 'gif|jpg|png|jpeg', //Разрешенные расширения файлов.
                    'max_size' => '0', // ограничение в килобайтах
                    'encrypt_name' => true , //изменяет стоковое имя файла на шифр
                    'remove_spaces' => true, //del spaces from name
                );
                $this->load->library('upload',$config);
                if($this->upload->do_upload('photoToUpload') === FALSE) //Библиотека загружена в конструкторе
                {
                    return false;
                    //На странице ошибка выводится, если $this->input->post('photoToUpload') === FALSE
                }
                else
                {
                    $image_info = $this->upload->data(); // Вызываем массив информации о загруженном файле.
                    $this->load->library('image_lib'); //Вызываем библиотеку.

                    //Watermark on original foto
                    $config = array(
                        'source_image' => $image_info['full_path'], //картинка, кот. берется за основу.
                        'wm_text' => 'Copyright 2017, by Alex Mayboroda', //текст, кот. будет печататься.
                        'wm_type' => 'text',
                        'wm_padding' => '10',
                        'wm_vrt_alignment' => 'top', //расположение по вертикали
                        'wm_hor_alignment' => 'center', //расположение печати по горизонтали
                        'wm_font_color' => 'fff', //цыет печати.
                        'wm_font_size' => '100', //размер шрифта печати зависит от разрешения картинки: чем больше разрешение, тем мельче шрифт!!!
                    );
                    $this->image_lib->initialize($config);
                    $this->image_lib->watermark();   //НЕ получается, чтобы сначала делало копию в миниатюры, а потом ставило знак.
                    //Watermark on original foto
                }

                //В этот раз я все данные из формы вносил из модели, а не из контроллера
                $name=$image_info['file_name'];
                $data = array(
                    'id_users' => $userId,
                    'photo' => $name,
                    'date' => $this->input->post('upd_date'),
                );
                $this->load->database();
                $this->db->insert('photos', $data);
            }
    }

    public function deletePhoto()
    {   $this->load->database();
        $this->form_validation->set_rules('4eck','Check','trim|required|htmlspecialchars');
        $id=$this->input->post('4eck');
        $this->db->delete('photos', array('id' => $id));
        return true;
    }
}