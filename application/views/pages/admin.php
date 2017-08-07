<?php if($header) echo $header; // Пример подгрузки хедера?>

<section class="adminWrapper container-fluid">
    <div class="row text-center">
        <div class="admin col-md-12 table-responsive">

            <div class="nav-buttons_wrapper">
                <?php
                    echo anchor('main', 'Return to main page', array('class'=>'Nbtn btn btn-info')); //Go to main page
                    echo anchor('photo_contr', 'Go to my photos', array('class'=>'Nbtn btn btn-info')); //Go to main page
                    echo anchor('search_contr', 'Go to search page', array('class'=>'Nbtn btn btn-warning')); //Go to main page
                    echo anchor('admin_contr/logout', 'Logout', array('class'=>'Nbtn btn btn-danger')); //Logout in CI

                ?>
                </div>


          <table class="dataTable table-bordered table-hover">
              <?php
      //      print_r($old);
        //    echo '<pre>';
          //    print_r($_SESSION);

              ?>
            <tr>
                    <?php if($user_data['image'] ) { //Если нет у юзера авки, то не покажет ?>
                <th>
                    Avatar
                </th>
                  <?php } ?>
                <th>
                    Last name
                </th>
                <th>
                    First name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Phone number
                </th>
                <th>
                    Password
                </th>
                <th>
                    Security code
                </th>
                <th>
                    Country
                </th>
                <th>
                    Town
                </th>
                <th>
                    Adress
                </th>
                <th>
                    Registration date
                </th>
                <th>
                    Your old / AVG old
                </th>
                <th>
                    Your salary/ av. salary
                </th>
                <th>
                    Update
                </th>
            </tr>
            <tr>
                <?php if($user_data['image']) { ?>
                <td>
                    <img class="img-circle" src="<?php echo base_url('upload/'.$_SESSION['userData']['id'].'/thumbs/'.$user_data['image']);?>" alt="ava">
                </td>
            <?php } ?>
                <td>
                <?php echo $user_data['last_name']?>
                </td>
                <td>
                    <?php echo $user_data['first_name']?>
                </td>
                <td>
                    <?php echo $user_data['email']?>
                </td>
                <td>
                    <?php echo $user_data['phone_number']?>
                </td>
                <td>
                    <?php echo  $user_data['pass'] ?>
                </td>
                <td>
                    <?php echo  $user_data['security_code'] ?>
                </td>
                <td>
                    <?php echo  $user_data['country_name'] ?>
                </td>
                <td>
                    <?php echo  $user_data['name'] ?>
                </td>
                <td>
                    <?php echo  $user_data['street'] ?>
                </td>
                <td>
                    <?php echo  $user_data['date']; ?>
                </td>
                <td>
                    <?php echo $old. ' / '.$avg_old;  ?>
                </td>
                <td>
                    <?php echo $user_data['salary'].' / '.round($avg_salary['salary'],0); //need av. salary ?>
                </td>
                <td>
                    <?php echo form_button('wantToUpdate','Update')?>
                </td>
            </tr>
          </table>

            <table>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </table>

            <span id="errors"><?php echo $this->session->flashdata('error');  //Выводит ошибку, если некорректный код для входа?></span>
            <span id="welcome"><?php echo $this->session->flashdata('greetings');  //Выводит ошибку, если некорректный код для входа?></span>

            <?php
            echo $this->calendar->generate(); //Calendar ?>
        <?php
        //print_r(($_SESSION));
                //Форма для изменения данных
        // if(isset($_POST['wantToUpdate']))
        //        {
            echo form_open('admin_contr/updateData', $user_data);

            $data_fName=array(
                'name'          => 'fName',
                'id'            => 'fName',
                'value'         =>  $user_data['first_name'],
            );
            $data_lName=array(
                'name'          => 'lName',
                'id'            => 'lName',
                'value'         =>  $user_data['last_name'],
            );
            $data_email=array(
                'name'          => 'email',
                'id'            => 'email',
                'value'         =>  $user_data['email'],
            );
            $data_tel=array(
                'name'          => 'tel',
                'id'            => 'tel',
                'value'         =>  $user_data['phone_number'],
            );
            $data_radio1 = array(
                'name'          => 'gender',
                'id'            => 'except5',
                'value'         => 'male',
            );
            $data_radio2 = array(
                'name'          => 'gender',
                'id'            => 'except6',
                'value'         => 'female',

            );

            $data_salary=array(
                'name'          => 'salary',
                'id'            => 'salary',
                'value'         =>  $user_data['salary'],
            );
            $data_birthdate=array(
                'name'          => 'birthdate',
                'id'            => 'birthdate',
                'value'         =>  $user_data['birthdate'],
            );

            $data_sCode=array(
                'name'          => 'secure_code',
                'id'            => 'secure_code',
                'value'         =>  $user_data['security_code'],
            );
            $data_pass1=array(
                'name'          => 'pass1',
                'id'            => 'pass1',
                'value'         =>  $user_data['pass'],
            );
            $data_pass2=array(
                'name'          => 'pass2',
                'id'            => 'pass2',
                'value'         =>  $user_data['pass'],
            );


            echo form_error('fName');
            echo form_label('', 'fName');
            echo form_input($data_fName);

            echo form_error('lName');
            echo form_label('', 'lName');
            echo form_input($data_lName);

            echo form_error('email');
            echo form_label('', 'email');
            echo form_input($data_email);

            echo form_error('tel');
            echo form_label('', 'tel');
            echo form_input($data_tel);

            echo form_error('country');   //Вывод ошибок
            foreach($countries as $country){
                $data_country[$country['id']]=  $country['country_name']; // !!!Должен быть именно ассоциативный масиив $data_country = ( $k=> $v)
               }
            $curContr=array($user_data['id_country'],$user_data['country_name']); //Именно через этот массив ($k => $v) будет выводиться выбранное юзером раннее
            echo form_dropdown('country', $data_country, $curContr); //, $user_data['country_name'] // поле формы с

            echo form_error('town');
            foreach ($towns as $town){
            $data_town[$town['id']]=$town['name'];
             }
            $curTown=array($user_data['id_towns'],$user_data['name']);
            echo form_dropdown('town', $data_town, $curTown);

            echo form_error('street');
            foreach ($streets as $street){
                $data_street[$street['id']]=$street['street'];
            }
            $curStreet=array($user_data['id_streets'],$user_data['street']);
            echo form_dropdown('street', $data_street, $curStreet);

            echo form_error('gender');
            echo '<p>';
            echo form_radio($data_radio1);
            echo form_label('Male', 'except5');
            echo form_radio($data_radio2);
            echo form_label('Female', 'except6');
            echo '</p>';

            echo '<p>';
            echo form_error('salary');
            echo form_label('Your salary in $', 'salary');
            echo form_input($data_salary);

            echo form_error('birthdate');
            echo form_label('Your date of birth in YYYY-MM-DD : ', 'birthdate');
            echo form_input($data_birthdate);
            echo '</p>';

            echo form_error('secure_code');
            echo form_label('Your Security code (min 3 chr)', 'secure_code');
            echo form_input($data_sCode);

            echo form_error('pass1');
            echo form_label('Password 1', 'pass1');
            echo form_password($data_pass1);

            echo form_error('pass2');
            echo form_label('Retype Password', 'pass2');
            echo form_password($data_pass2);

       // echo date( 'H:i:s d n Y', time() );
      //  echo date( 'Y-m-d H:i:s', time() );

            $time = date( 'Y-m-d H:i:s', time() );
            echo form_hidden('upd_date', $time);

            echo form_submit('update_btn', 'Let\'s Update');

            echo form_close();
        //}

           //Image upload form
           echo form_open_multipart('admin_contr/upload_avatar');
           $data_fileToUpload=array(
               'name'          => 'fileToUpload',
               'id'            => 'fileToUpload',
                'value'         => "set_data['fileToUpload']",
           ); ?>
            <span id="welcome"><?php echo $this->session->flashdata('success');  //Выводит, что загрузка прошла успешно?></span>
            <?php
           echo form_upload($data_fileToUpload);
           echo form_submit('upload_btn', 'Upload image');
           echo form_close();

           if($this->input->post('fileToUpload') === FALSE) { //Если загрузка не прошла, то выводит ошибку.
               //Если написать без условия, то ошибку будет выдавать при загрузке странице и успешной загрузке файла.
               //Все равно вылазит ошибка при обновлении данных пользователя.
               echo $this->upload->display_errors('<span id="errors">', '</span>');
               echo $this->image_lib->display_errors();
           } ?>



        </div>

    </div>

</section>



<?php if($footer) echo $footer; // Пример подгрузки хедера
