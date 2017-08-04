<?php if($header) echo $header?>

<div class="row">
<!--Левая широкая-->
    <div class="col-lg-7">
        <!--20-->		<div class="twenty col-lg-12">
            <div class="img12">
                <img src="img/AB.png" alt="diagramm">
            </div>
            <div class="list-20">
                <ul>
                    <li>
                        <h5>
                            <img src="img/Rectangle-14.png" alt="orange">New Visit
                        </h5>
                    </li>
                    <li>
                        <h5>
                            <img src="img/Rectangle-14blue.png" alt="blue">Returning Visit
                        </h5>
                    </li>
                </ul>

                <ul>
                    <li>
                        <button class="ab">
                            <img src="img/icons/download-copy-2.png" alt="download">Download DOC Report
                        </button>
                    </li>
                    <li>
                        <button class="ab">
                            <img src="img/icons/download-copy-2.png" alt="download">Download PDF Report
                        </button>
                    </li>
                </ul>
            </div>
            <!--20-->		</div>

        <!--22-->		<div class="twenty-two col-lg-12">
                                <div class="header-22">
                                    <img src="img/icons/earth.png" alt="earth">
                                    <form>
                                        <h5>Remind me</h5>
                                        <select>
                                            <option value="Once in day">Once in day</option>
                                            <option value="Twise in day">Twise in day</option>
                                            <option value="In the morning">In the morning</option>
                                            <option value="In the evening">In the evening</option>
                                        </select>
                                        <!--	<input type="time" name="remind" placeholder="Once in a day"> -->
                                    </form>
                                </div>
                                <div class="content-22">
                                    <div id="task" class="content-22-inner">
                                        <h2>50%</h2>
                                        <p>of tasks finished</p>
                                    </div>
                                    <div class="content-22-inner">
                                        <h2>75%</h2>
                                        <p>of tasks finished</p>
                                    </div>
                                    <div class="content-22-inner">
                                        <img src="img/icons/hart.png" alt="Hart">
                                        <p>Task Completed</p>
                                    </div>
                                </div>
                                <form>
                                    <input type="time" name="remind" placeholder="Time">
                                    <input id="button-22" type="submit" value="Save">
                                </form>

            <!--22-->	</div>





        <!--Левая широкая-->	</div>

    <!--Правая узкая-->		<div class="col-lg-5">

        <!--21-->		<div class="stars col-lg-12">
            <ul>
                <li>
                    <img src="img/icons/Star-yellow.png" alt="star">
                </li>
                <li>
                    <img src="img/icons/Star-yellow.png" alt="star">
                </li>
                <li>
                    <img src="img/icons/Star-yellow.png" alt="star">
                </li>
                <li>
                    <img src="img/icons/Star-yellow.png" alt="star">
                </li>
                <li>
                    <img src="img/icons/Star-blue.png" alt="star">
                </li>
                <li>
                    <img src="img/icons/Star-blue.png" alt="star">
                </li>
            </ul>
            <h5>Rating 4/6</h5>
            <form action="" method="get">
                <input type="range" name="rating" min="0%" max="100%">
                <h5>50%</h5>
            </form>
            <div class="wrapper21">
                <div>
                    <img src="img/icons/shape-61.png" alt="shape">
                </div>
                <div class="round">
                    <h5 >50%</h5>
                </div>
            </div>
            <!--21-->		</div>

        <!--23-->       <div class="twenty-third col-lg-12">
            <div class="panda-movie">
                <!-- <img src="img/panda.jpg" alt="Panda-Movie" heigh="378px"> -->
                <div class="text-over">Kungfu panda the movie</div>
            </div>
            <div class="under-movie">
                <div class="left-arrow">
                    <img src="img/icons/left-arrow.png" alt="">
                </div>
                <div class="right-arrow">
                    <img src="img/icons/right-arrow.png" alt="">
                </div>
                <ul>
                    <li><img src="img/icons/circle-white.png" alt="Circle"></li>
                    <li><img src="img/icons/circle-blue.png" alt="Circle"></li>
                    <li><img src="img/icons/circle-white.png" alt="Circle"></li>
                    <li><img src="img/icons/circle-white.png" alt="Circle"></li>
                </ul>
            </div>
            <!--23-->       </div>





        	</div>
    <!--Правая узкая-->
</div>

<?php if($footer) echo $footer?>