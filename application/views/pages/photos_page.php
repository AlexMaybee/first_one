

<?php if($header) echo $header; // Пример подгрузки хедера?>

<?php if($this->session->userdata('userData')) {  //Если сессии нет вообще, то не показывает ?>
    <div class="row text-center">

        <div class="nav-buttons_wrapper col-lg-5 col-lg-offset-7">
            <?php

                echo anchor('admin_contr', 'Go to admin page', array('class' => 'Nbtn btn btn-info')); //Go to main page
                echo anchor('main', 'Return to main page', array('class'=>'Nbtn btn btn-success')); //Go to main page
                echo anchor('search_contr', 'Go to search page', array('class'=>'Nbtn btn btn-warning'));

            echo anchor('admin_contr/logout', 'Logout', array('class'=>'Nbtn btn btn-danger')); //Logout in CI
            ?>
        </div>
    </div>
<?php } ?>


<section class="adminWrapper container-fluid">
    <div class="row text-center">
        <div class="admin col-md-12 table-responsive">
            <span id="welcome"><?php echo $this->session->flashdata('success');  //Выводит ошибку, если некорректный код для входа?></span>
            <span id="errors"><?php echo $this->session->flashdata('error');  //Выводит ошибку, если некорректный код для входа?></span>

            <?php
                echo heading('Здесь Вы можете просмотреть все свои картинки и загрузить новые',4);
                echo validation_errors(); //Вывод общих ошибок
                //Image upload form
                echo form_open_multipart('photo_contr/uploadFoto');

      //          echo validation_errors();

                $data_photoToUpload=array(
                'name'          => 'photoToUpload',
                'id'            => 'photoToUpload',
                'value'         => "set_data['photoToUpload']",
                );


                $time = date( 'Y-m-d H:i:s', time() );

                echo form_hidden('upd_date',$time);
                echo form_upload($data_photoToUpload);
                echo form_submit('upload_btn', 'Upload photo');
                echo form_close();

                if($this->input->post('photoToUpload') === FALSE) { //Если загрузка не прошла, то выводит ошибку.
                    //Если написать без условия, то ошибку будет выдавать при загрузке странице и успешной загрузке файла.
                    //Все равно вылазит ошибка при обновлении данных пользователя.
                    echo $this->upload->display_errors('<span id="errors">', '</span>');
            }

      //  print_r($user_data);
            if($count)
            {  //Если в базе нет строк с картинками, то не покажет.
                echo $this->pagination->create_links();

            //    echo validation_errors(); //Вывод общих ошибок

                foreach ($user_data as $photo)
                { //біла ошибка - контроллер передавал только 1 строку!!!
                    $userId = $_SESSION['userData']['id'];
                    $image_properties = array(
                        'src' => 'upload/'.$userId.'/photos/'. $photo['photo'],
                        'alt' => 'user foto',
                        'width' => '400',
                        //'height'=> '400',
                    );
                   $path= $image_properties['src'];
                    echo form_open('photo_contr/delPhoto');
                    echo img($image_properties);
                    echo form_hidden('path',$path);
                    echo form_checkbox('4eck', $photo['id']);
                    echo form_submit('delFoto', 'Delete Foto');
                    echo form_close();
                }
                echo $this->pagination->create_links();
            }
            ?>


        </div>
    </div>

</section>
<?php if($footer) echo $footer; // Пример подгрузки хедера?>
