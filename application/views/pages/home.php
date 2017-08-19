
   <?php if($header) echo $header; // Пример подгрузки хедера?>


    <!--Секшн большой-->
    <section>

        <?php if($this->session->userdata('userData')) {  //Если сессии нет вообще, то не показывает ?>
        <div class="row text-center">

            <div class="nav-buttons_wrapper col-lg-5 col-lg-offset-7">
                <?php
                if($_SESSION['userData']['logged_In']) { //Показывает, только после полного входа(logged_In должна быть = 1)
                    echo anchor('admin_contr', 'Go to admin page', array('class' => 'Nbtn btn btn-info')); //Go to main page
                    echo anchor('photo_contr', 'Go to my photos', array('class'=>'Nbtn btn btn-success')); //Go to main page
                    echo anchor('search_contr', 'Go to search page', array('class'=>'Nbtn btn btn-warning'));
                }
                echo anchor('admin_contr/logout', 'Logout', array('class'=>'Nbtn btn btn-danger')); //Logout in CI
                ?>
            </div>
        </div>
        <?php } ?>

        <div class="row text-center">
            <div class="col-lg-12">

                <!--1большаястрока-->
                <div class="row">
                    <!--Столбециз2-х-->
                    <div class="wrap2colls col-lg-7">
                        <div class="row">

                            <!--Перый столбец-->
                            <div class="col-lg-4">

                                <!--1-->
                                <div class="wiev_report col-lg-12">
                                    <!--Место для СВГ, заменить им первую картинку-->
                                    <img src="<?php echo base_url('img/wiew-visits.png')?>" alt="Diagramm" width="280px">
                                    <p> <img src="<?php echo base_url('img/icons/male.png')?>" alt="male_icon" width="30px">
                                        1227 people</p>
                                    <a href="#">View complete report</a>
                                </div>
                                <!--1-->

                                <!--6-->
                                <div class="skills col-lg-12">
                                    <h4><img src="<?php echo base_url('img/icons/male.png')?>" alt="male_icon" width="30px"> My skills</h4>
                                    <p>Photoshop
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">  </div>
                                    </div>
                                    </p>
                                    <p>Illustrator
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">  </div>
                                    </div>
                                    </p>
                                    <p>Wordpress
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">  </div>
                                    </div>
                                    </p>
                                    <p>Joomla
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">  </div>
                                    </div>
                                    </p>

                                    <a href=""><img src="<?php echo base_url('img/icons/cloudd.png')?>" alt="Cloud" width="30px"> Download my resume</a>

                                </div>
                                <!--6-->

                                <!--10-->
                                <div class="chat col-lg-12 text-left">
                                    <h4>MY CHAT<img src="<?php echo base_url('img/icons/sun-3bf.png')?>" alt="Sun" width="25px"></h4>
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Menu
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="#">Twitter</a></li>
                                            <li><a href="#">Facebook</a></li>
                                            <li><a href="#">Dribbble</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>

                                    <div class="active">
                                        <ul>
                                            <li>
                                                <img class="hold" src="<?php echo base_url('img/icons/male_profile.png')?>" alt="Man" height="50px">
                                                <h5> Joseph Abadi</h5>
                                                <img src="<?php echo base_url('img/icons/Ellipse-gr.png')?>" alt="green" class="img-circle"> Avaliable
                                            </li>
                                            <li>
                                                <img class="hold" src="<?php echo base_url('img/icons/male_profile.png')?>" alt="Man" height="50px">
                                                <h5> John Mitho</h5>
                                                <img src="<?php echo base_url('img/icons/Ellipse-gr.png')?>" alt="green" class="img-circle"> Avaliable
                                            </li>
                                            <li>
                                                <img class="hold" src="<?php echo base_url('img/icons/male_profile.png')?>" alt="Man" height="50px">
                                                <h5> Steve Jobs</h5>
                                                <img src="<?php echo base_url('img/icons/Ellipse-or.png')?>" alt="green" class="img-circle"> Busy
                                            </li>
                                            <li>
                                                <img class="hold" src="<?php echo base_url('img/icons/male_profile.png')?>" alt="Man" height="50px">
                                                <h5> Prasad Prechu</h5>
                                                <img src="<?php echo base_url('img/icons/Ellipse-grey.png')?>" alt="green" class="img-circle"> Not avaliable
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--10-->

                                <!--11-->
                                <div class="eleven col-lg-12">
                                    <ul>
                                        <li>
                                            <img src="<?php echo base_url('img/icons/twitter-copy.png')?>" alt="Twitter" width="">
                                            <span>1524</span> Followers
                                        </li>
                                        <li>
                                            <img src="<?php echo base_url('img/icons/facebook-copy.png')?>" alt="Facebook" width="">
                                            <span>20K</span> Likes
                                        </li>
                                        <li>
                                            <img src="<?php echo base_url('img/icons/dribbble-copy.png')?>" alt="Dribbble" width="">
                                            <span>3000</span> Followers
                                        </li>
                                    </ul>
                                </div>
                                <!--11-->

                                <!--14-->
                                <div class="fourteen col-lg-12">
                                    <img src="<?php echo base_url('img/profile-pic.png')?>" alt="ava" width="132px">
                                    <h4>HRITHIK</h4>
                                    <ul class="list-group">
                                        <li class="list-group-item" id="yellow">
                                            <span class="badge">5</span>
                                            <h6><img src="<?php echo base_url('img/icons/small-star.png')?>" alt="Male-icon">Prifile activity</h6>

                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge">125</span>
                                            <h6><img src="<?php echo base_url('img/icons/small-male.png')?>" alt="Male-icon">Friends</h6>
                                        </li>
                                        <li class="list-group-item" id="yellow">
                                            <span class="badge">2</span>
                                            <h6><img src="<?php echo base_url('img/icons/small-mess.png')?>" alt="Message-icon">Messages</h6>

                                        </li>
                                    </ul>
                                </div>
                                <!--14-->
                            </div>
                                <!--Перый столбец-->

                            <!--Второй столбец-->
                            <div class="col-lg-8">

                                <!--2-->
                                <div class="network col-lg-12">
                                    <h4>MY NETWORK</h4>
                                    <ul>
                                        <li>
                                            <img src="<?php echo base_url('img/icons/twitter.png')?>" alt="twitter" width="120px">
                                            <p>Twitter</p>
                                        </li>
                                        <li>
                                            <img src="<?php echo base_url('img/icons/facebook.png')?>" alt="facebook" width="120px">
                                            <p>Facebook</p>
                                        </li>
                                        <li>
                                            <img src="<?php echo base_url('img/icons/dribbble.png')?>" alt="dribbble" width="120px">
                                            <p>Dribbble</p>
                                        </li>
                                    </ul>
                                </div>
                                <!--2-->

                                <!--4-->
                                <div class="album col-lg-12">

                                    <div class="profile col-lg-6">
                                        <img src="<?php echo base_url('img/icons/male_profile.png')?>" alt="male2" width="100px">
                                        <h4>Wiev profile</h4>
                                    </div>
                                    <div class="polaroid col-lg-6">
                                        <img src="<?php echo base_url('img/icons/polaroid.png')?>" alt="palaroid" width="100px">
                                        <h4>Wiev Album</h4>
                                    </div>
                                    <img src="<?php echo base_url('img/icons/or.png')?>" alt="circle or" width="100px">
                                </div>
                                <!--4-->

                                <!--7-->
                                <div class="seven col-lg-12">
                                    <img src="<?php echo base_url('img/profile-pic.png')?>" alt="ava" width="120px">
                                    <h4>HRITHIK ROSHAN</h4>
                                    <p>Actor/Director</p>
                                    <div class="social-box">
                                        <div class="likes">
                                            <img src="<?php echo base_url('img/icons/like-heart.png')?>" alt="heart" width="30px"> <p>1254</p>
                                        </div>
                                        <div class="friends">
                                            <img src="<?php echo base_url('img/icons/male_profile.png')?>" alt="man" width="25px">
                                            <p>32 friends</p>
                                        </div>
                                        <div class="photos">
                                            <img src="<?php echo base_url('img/icons/polaroid-white.png')?>" alt="photo" width="32px">
                                            <p>0 Photos</p>
                                        </div>
                                        <div class="settings">
                                            <img src="<?php echo base_url('img/icons/sun-3bf.png')?>" alt="sun" width="25px"> Settings
                                        </div>
                                    </div>
                                </div>
                                <!--7-->

                                <!--8-->
                                <div class="eight col-lg-12">
                                    <div class="mes-header">
                                        <img src="<?php echo base_url('img/profile-pic.png')?>" alt="ava" width="132px">
                                        <h4>HRITHIK ROSHAN</h4>
                                        <p>Actor/Director</p>
                                    </div>
                                    <div class="navmes">
                                        <ul class="nav nav-tabs nav-justified">
                                            <li>
                                                <img src="<?php echo base_url('img/icons/male.png')?>" alt="man" width="20px"> About me
                                            </li>
                                            <li>
                                                <img src="<?php echo base_url('img/icons/mess.png')?>" alt="message" width="20px"> Message
                                            </li>
                                            <li>
                                                <img src="<?php echo base_url('img/icons/plus.png')?>" alt="plus logo" width="20px"> Add as a friend
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-mes">
                                        <form class="form-horizontal">
                                            <input type="text" class="form-control" placeholder="Subject">

                                            <textarea class="form-control" rows="5" placeholder="Message"></textarea>

                                            <input type="checkbox" aria-label="..."> Reply to my email

                                            <a href="#">Send</a>

                                        </form>
                                    </div>
                                </div>
                                <!--8-->

                                <!--12-->
                                <div class="twelve col-lg-12">
                                    <div class="vidos_sobaka">
                                        <video controls>
                                            <source src="<?php echo base_url('video/12block.mp4')?>" type="video/mp4">
                                        </video>
                                    </div>
                                    <h4>Vidos_kak_zayehal_na_Yamahu</h4>
                                    <ul class="buttons">
                                        <li>
                                            <img src="<?php echo base_url('img/icons/rev-button.png')?>" alt="rev_btn" width="">
                                        </li>
                                        <li>
                                            <img src="<?php echo base_url('img/icons/play.png')?>" alt="play" width="120px">
                                        </li>
                                        <li>
                                            <img src="<?php echo base_url('img/icons/ff-button.png')?>" alt="ff_btn" width="">
                                        </li>
                                    </ul>
                                    <ul class="songs">
                                        <li>Njan gandarvan_song1</li>
                                        <li>Yezda_na_mopede</li>
                                        <li>05. Ya_lechu_kak_hochu</li>
                                    </ul>
                                </div>
                                <!--12-->
                            </div>
                                <!--Второй столбец-->
                        </div>
                            <!--Столбециз2-х-->

                        <!--16-->
                        <div class="sixteen col-lg-12">
                            <p><img src="<?php echo base_url('img/icons/sun-3bf.png')?>" alt="sun" width="20px">Duration</p>
                            <h4><img src="<?php echo base_url('img/icons/small-download.png')?>" alt="cloud" width="45px">DOWNLOAD REPORT</h4>
                            <img src="<?php echo base_url('img/Diagramm.png')?>" alt="Diagramm">
                        </div>
                        <!--16-->

                        <!--18-->
                        <div class="eighteen col-lg-12">
                            <div class="week">
                                <p>
                                    <img src="<?php echo base_url('img/icons/sun-3bf-white.png')?>" alt="sun" width="20px">Settings
                                </p>
                                <p>
                                    <span>21<sup>0</sup></span>21<sup>0</sup>  / 21<sup>0</sup>
                                </p>
                                <div class="big-cloud">
                                    <img src="<?php echo base_url('img/icons/CS.png')?>" alt="big cloud" width="">
                                    <h4>Mostly Sunny</h4>
                                </div>
                            </div>
                            <div class="calendar ">
                                <div class="days">
                                    SUN
                                    <img src="<?php echo base_url('img/icons/goodweather.png')?>" alt="good_weather">
                                    21<sup>0</sup>
                                </div>
                                <div class="days">
                                    MON
                                    <img src="<?php echo base_url('img/icons/cloudyweather.png')?>" alt="cloudy_weather">
                                    20<sup>0</sup>
                                </div>
                                <div class="days">
                                    TUE
                                    <img src="<?php echo base_url('img/icons/cloudyweather.png')?>" alt="cloudy_weather">
                                    23<sup>0</sup>
                                </div>
                                <div class="days">
                                    WEN
                                    <img src="<?php echo base_url('img/icons/rainyweather.png')?>" alt="rainy_weather">
                                    19<sup>0</sup>
                                </div>
                                <div class="days">
                                    THU
                                    <img src="<?php echo base_url('img/icons/flashweather.png')?>" alt="flash-weather">
                                    30<sup>0</sup>
                                </div>
                                <div class="days">
                                    FRI
                                    <img src="<?php echo base_url('img/icons/cloudyweather.png')?>" alt="cloudy_weather">
                                    20<sup>0</sup>
                                </div>
                                <div class="days">
                                    SAT
                                    <img src="<?php echo base_url('img/icons/goodweather.png')?>" alt="good_weather">
                                    19<sup>0</sup>
                                </div>

                            </div>
                        </div>
                        <!--18-->
                    </div>


                    <!--Третий столбец-->
                    <div class="col-lg-5 ">

                        <!--3-->
                        <div class="welcome col-lg-12">

                            <ul>

                                <?php if( !$this->session->userdata('userData')) { // Если не залогинен, то:?>


                                    <h4>Login, please</h4>
                                    <li>
                                        <span id="errors"><?php echo form_error('login'); //Выводит ошибки при валидации?></span>
                                        <span id="errors"><?php echo form_error('password'); //Выводит ошибки при валидации?></span>
                                        <span id="errors"><?php echo $this->session->flashdata('error');  //Выводит ошибку, если некорректный логин/пароль?></span>
                                    <?php echo form_open('main/userLogin'); ?>

                                    <label for="login"></label> <br>
                                    <input type="text" name="login" id="login" placeholder="Your email" value="<?php echo set_value('login') ?>">

                                    <label for="password"></label>
                                    <input type="text" name="password" id="password" placeholder="Enter password" value="<?php echo set_value('password') ?>">

                                    <input type="image" src="<?php echo base_url('img/icons/arrow-thin-right.png')?>" width="55px" alt="submit" name="log_button" id="btn_3">

                                    </form>

                                    </li>



                                <?php } else {//print_r($_SESSION); //Просим ввести код
                                   if($_SESSION['userData']['logged_In'] === 1) {
                                       ?>

                                       <li id="sun">
                                           <img src="<?php echo base_url('img/icons/sun-3.png') ?>" alt="sun"
                                                width="50px">
                                       </li>
                                       <h4>
                                       <!--  <img src="<?php echo base_url('img/profile-pic.png') ?>" alt="ava" width="120px"> -->
                                       <?php if ($_SESSION['userData']['image']) { ?>
                                           <img src="<?php echo base_url('upload/' . $_SESSION['userData']['id'].'/thumbs/'.$_SESSION['userData']['image']); ?>"
                                                class="img-circle" alt="ava" width="120px">
                                           <?php
                                           echo 'Рады Вас видеть, ' . $_SESSION['userData']['first_name'];
                                       } else echo $this->session->flashdata('welcome');  //Выводит приветствие
                                   }
                                    if($_SESSION['userData']['logged_In'] !== 1)
                                    {
                                    if ($_SESSION['userData']['image']) { ?>
                                           <img src="<?php echo base_url('upload/' . $_SESSION['userData']['id'].'/thumbs/'.$_SESSION['userData']['image']); ?>"
                                                class="img-circle" alt="ava" width="120px">
                                           <?php
                                           echo 'Рады Вас видеть, ' . $_SESSION['userData']['first_name'];
                                       } else echo $this->session->flashdata('welcome');  //Выводит приветствие

                                    ?>

                                </h4>
                                   <h4 id="welcome"> <?php //echo $this->session->flashdata('welcome');  //Выводит приветствие?></h4>

                                    <span id="errors"><?php echo form_error('secCode'); //Выводит ошибки при валидации?></span>
                                    <span id="errors"><?php echo $this->session->flashdata('error');  //Выводит ошибку, если некорректный код для входа?></span>
                                </li>
                                <li>

                                    <?php echo form_open('main/secureCode_login'); ?>

                                        <label for="secCode"></label>
                                        <input type="text" name="secCode" id="secCode" placeholder="Security Code" value="<?php echo set_value('secCode') ?>">
                                        <input type="image" src="<?php echo base_url('img/icons/arrow-thin-right.png')?>" width="55px" alt="submit" name="sec_button" id="btn_3">



                                    </form>
                                </li>

                                <?php }} ?>

                            </ul>
                        </div>
                        <!--3-->

                        <!--5-->
                        <div class="register col-lg-12">
                            <h4><img src="<?php echo base_url('img/icons/register.png')?>" alt="register" width="35px"> REGISTER NOW</h4>

                            <?php //echo validation_errors(); //Выводим сдесь ошибки при регистрации ?>

                            <?php echo form_open('main/form');?>

                            <span id="errors"><?php echo form_error('fName'); ?></span>
                                <label for="fName"></label>
                                <input id="fName" type="text" name="fName" placeholder="Your name" value="<?php echo set_value('fName') ?>">

                            <span id="errors"><?php echo form_error('lName'); ?></span>
                                <label for="lName"></label>
                                <input id="lName" type="text" name="lName" placeholder="Your last name" value="<?php echo set_value('lName') ?>">
                                <br>

                            <span id="errors"><?php echo form_error('email'); ?></span>
                                <label for="email"></label>
                                <input id="email" type="email" name="email" placeholder="Email adress" value="<?php echo set_value('email') ?>">

                            <span id="errors"><?php echo form_error('tel'); ?></span>
                                <label for="tel"></label>
                                <input id="tel" type="tel" name="tel" placeholder="Phone" value="<?php echo set_value('tel') ?>">
                                <br>

                            <span id="errors"><?php echo form_error('country');   //Вывод ошибок  ?></span>
                            <?php
                            foreach($countries as $country){
                                $data_country[$country['id']]=  $country['country_name']; // !!!Должен быть именно ассоциативный масиив $data_country = ( $k=> $v)
                            }
                         //   $curContr=array($user_data['id_country'],$user_data['country_name']); //Именно через этот массив ($k => $v) будет выводиться выбранное юзером раннее
                            echo form_dropdown('country', $data_country,set_value('country')); //, $user_data['country_name'] // поле формы с
                            ?>

                            <span id="errors"><?php echo form_error('town'); ?></span>
                            <?php
                            foreach ($towns as $town){
                                $data_town[$town['id']]=$town['name'];
                            }
                          //  $curTown=array($user_data['id_towns'],$user_data['name']);
                            echo form_dropdown('town', $data_town, set_value('town'));?>

                            <span id="errors"><?php echo form_error('street'); ?></span>
                            <?php

                            foreach ($streets as $street){
                                $data_street[$street['id']]=$street['street'];
                            }
                          //  $curStreet=array($user_data['id_streets'],$user_data['street']);
                            echo form_dropdown('street', $data_street, set_value('street'));?>


                            <span id="errors"><?php echo form_error('gender'); ?></span>
                                <p>
                                    <input type="radio" name="gender" value="male" id="except5" <?php echo set_radio('gender','male')?> > Male
                                    <input type="radio" name="gender" value="female" id="except5" <?php echo set_radio('gender','female')?> > Female
                                </p>
                                <input type="hidden" name="secure_code" value="<?php echo rand(123,99999); ?>">
                                <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s',time()); ?>">

                            <span id="errors"><?php echo form_error('salary'); ?></span>
                            <label for="salary"></label>
                            <input type="text" name="salary" id="salary" placeholder="Ваша ЗП в у.е." value="<?php set_value('salary'); ?>">

                            <span id="errors"><?php echo form_error('birthdate'); ?></span>
                            <label for="birthdate"></label>
                            <input type="text" name="birthdate" id="birthdate" placeholder="Ваш ДР гггг-мм-дд" value="<?php set_value('birthdate'); ?>">

                            <span id="errors"><?php echo form_error('pass1'); ?></span>
                                <label for="pass"></label>
                                <input id="pass" type="password" name="pass1" placeholder="Yor password" value="<?php echo set_value('pass1') ?>">

                            <span id="errors"><?php echo form_error('pass2'); ?></span>
                                <label for="pass2"></label>
                                <input id="pass2" type="password" name="pass2" placeholder="Yor password again" value="<?php echo set_value('pass2') ?>">

                                <p>
                                    <input type="checkbox" name="accept" id="except5" required> Accept all conditions
                                    <input type="submit" name="done" value="Register me !" id="button-22">
                                </p>
                            </form>
                        </div>
                        <!--5-->

                        <!--9-->
                        <div class="navigation col-lg-12">
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1069.4236399919898!2d30.494447214288755!3d50.39391472961579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4c8cf7601676b%3A0x84ae9f4775bf7a76!2z0LLRg9C70LjRhtGPINCS0LDRgdC40LvRjNC60ZbQstGB0YzQutCwLCAyMS8xOCwg0JrQuNGX0LI!5e0!3m2!1sru!2sua!4v1492679328427" width="696" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <div class="office">
                                <!--Я не знаю,как сделать такие кнопки-->
                                <h4>OUR OFFICE</h4>
                                <p>State dictrict</p>

                            </div>
                            <ul>
                                <li>
                                    <button id="opacity9">+</button>
                                </li>
                                <li>
                                    <button id="opacity9">-</button>
                                </li>
                                <li>
                                    <button>
                                        <img src="<?php echo base_url('img/icons/location-copy.png')?>" alt="location" width="20px">
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <!--9-->

                        <!--13-->
                        <div class="thirteen col-lg-12">
                            <video controls>
                                <source src="<?php echo base_url('video/13block.mp4')?>" type="video/mp4">
                            </video>
                        </div>
                        <!--13-->

                        <!--15-->
                        <div class="traffic col-lg-12">
                            <h5><img src="<?php echo base_url('img/icons/sun-3bf-white.png')?>" alt="Sun" width="25px"> OUR TRAFIC OVERVIEW</h5>
                            <img src="<?php echo base_url('img/trafic.png')?>" alt="Graphic">
                            <!-- DRAW A GRAFIC!!!-->
                        </div>
                        <!--15-->

                        <!--17-->
                        <div class="seventeen col-lg-12">
                            <div class="drag-and-drop">
                                <img src="<?php echo base_url('img/icons/upload.png')?>" alt="uploadcloud">
                                <span>Drag and drop</span>  <span>to upload</span>
                            </div>
                            <button><h4>Upload file</h4></button>
                            <ul>
                                <li>
                                    <p>
                                        <img src="<?php echo base_url('img/icons/video.png')?>" alt="polaroid" width="">Kunfu panda.mov
                                    </p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                        </div> <!--здесь должна быть индикация в % справа и цвет-градиент -->
                                    </div>
                                </li>
                                <li>
                                    <p>
                                        <img src="<?php echo base_url('img/icons/polaroid.png')?>" alt="polaroid" width="25px">My album_dc3321.png
                                    </p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p>
                                        <img src="<?php echo base_url('img/icons/polaroid.png')?>" alt="polaroid" width="25px">My album_dc3321.png
                                    </p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--17-->

                        <!--Третий столбец-->

                 </div>
               </div>
               <!--1большаястрока-->

            <!--2большаястрока-->

            <!--2большаястрока-->

            <!--3большаястрока-->

            <!--3большаястрока-->

            <!--4большаястрока-->

            <!--4большаястрока-->

            <!--5большаястрока-->

            <!--5большаястрока-->
    <?php  if($footer) echo $footer; // Пример подгрузки footer'ра, ставим это где нужно его всунуть?>