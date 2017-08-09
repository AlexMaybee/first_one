<?php if($header) echo $header; // Пример подгрузки хедера?>

<section class="adminWrapper container-fluid">
    <div class="row text-center">
        <div class="admin col-md-12 table-responsive">

            <div class="nav-buttons_wrapper">
                <?php
                echo anchor('main', 'Return to main page', array('class'=>'Nbtn btn btn-info')); //Go to main page
                echo anchor('photo_contr', 'Go to my photos', array('class'=>'Nbtn btn btn-info')); //Go to main page
                echo anchor('admin_contr', 'Go to admin page', array('class' => 'Nbtn btn btn-info')); //Go to main page
                echo anchor('admin_contr/logout', 'Logout', array('class'=>'Nbtn btn btn-danger')); //Logout in CI
                ?>
            </div>

            <h3>Здесь Вы можете искать юзеров по следующим параметрам:</h3>
            <span id="errors"><?php echo $this->session->flashdata('error');  //Выводит ошибку, если нет совпадений в поиске ?></span>

            <span id="errors"><?php echo validation_errors(); //Вывод общих ошибок ?></span>
            <?php
            $data_search=array(
                'name'          => 'search_str',
                'id'            => 'search_str',
                'placeholder' => 'Search...',
                'value'         =>  set_value('search_str'),
            );
            $data_fName=array(
                'name' => 'srch_name',
                'id' => 'srch_name',
                'value' => 1
            );
            $data_lName=array(
                'name' => 'srch_sername',
                'id' => 'srch_sername',
                'value' => 1
            );
            $data_gender=array(
                'name' => 'srch_gender',
                'id' => 'srch_gender',
                'value' => 1
            );
            $data_email=array(
                'name' => 'srch_email',
                'id' => 'srch_email',
                'value' => 1
            );
            $data_phone=array(
                'name' => 'srch_phone',
                'id' => 'srch_phone',
                'value' => 'OK!'
            );
            $data_country=array(
                'name' => 'srch_country',
                'id' => 'srch_country',
                'value' => 1
            );
            $data_town=array(
                'name' => 'srch_town',
                'id' => 'srch_town',
                'value' => 1
            );
            $data_street=array(
                'name' => 'srch_street',
                'id' => 'srch_street',
                'value' => 1
            );
            echo form_open('search_contr/index');
           // echo form_error('search_str');
            echo form_label('Введите слово для поиска','search_str');
            echo form_input($data_search);
            echo form_submit('search_submit','Search!');
            echo form_fieldset('You can use for searching');

            //Создал форму, внес данные массивом и запихнул все это в тадицу для красоты (в одну строку).
            $this->table->set_heading('Use these options:');
            $this->table->add_row(
                form_checkbox($data_fName). form_label('by first name','srch_name'),
                form_checkbox($data_lName).form_label('by last name','srch_sername'),
                form_checkbox($data_gender).form_label('by gender','srch_gender'),
                form_checkbox($data_email).form_label('by email','srch_email'),
                form_checkbox($data_phone).form_label('by phone','srch_phone'),
                form_checkbox($data_country).form_label('by country','srch_country'),
                form_checkbox($data_town).form_label('by town','srch_town'),
                form_checkbox($data_street).form_label('by street','srch_street')
            );
           echo $this->table->generate(); //Генерация таблицы с одной строкой

           echo form_fieldset_close();
        //    echo $this->input->post('search_str');
           //print_r($query);

            //Пришлось заменить переменную $count на строку запроса, чтобы не показывало ошибку при пустом поиске и старте страницы:
           if($count)//$this->users->countMatchesOfSearch())//isset($_POST['search_submit']))
           {
                echo $this->pagination->create_links();
               echo '<br>'.$count.' совпадений найдено!';
                echo '<table class="dataTable table-bordered table-hover">';
                $i = 1;
               foreach ($user_data as $data) {

                    echo '<tr><td>' . $i . '</td><td>' . $data['first_name'] . '</td><td>' . $data['last_name'] . '</td><td>'. $data['Old'] . '</td><td>' . $data['email'] . '</td><td>' . $data['phone_number'] . '</td><td>' . $data['country_name'] . '</td><td>' . $data['name'] . '</td><td>' .
                        $data['street'] . '</td>';
                    $i++;
                }
                echo '</table>';

                echo '<ul id="welcome"><li>';
                echo 'Средний возраст: '.$data['AvgOld'].'</li>';
                echo 'Средняя зарплата: '.$data['averge_salary'].' у.е. </li></ul>';

           }
            ?>



<?php if($footer) echo $footer; // Пример подгрузки хедера?>
