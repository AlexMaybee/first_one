<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <link href="<?php echo base_url('css/normalize.css'); ?>" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>

<?php //Выводим цифры из многомерного массива
/*
if(isset($test)) {
    if(is_array($test)) {
        foreach ($test as $userKey=>$userValue) {
            echo $userValue;
        }
    }
} */
?>


<div class="container-fluid">

<header>
    <div class="row text-center">
        <div class="col-lg-5 col-lg-offset-4">
            <div class="row">
                <div class="col-lg-12">
                    <img src="<?php echo base_url('img/Flatui-kit.png'); ?>" alt="Flatui-kit" width="400px">
                </div>
                <div class="col-lg-12">
                    <img src="<?php echo base_url('img/By-WebdesignerDepot.png'); ?>" alt="By" width="400px">
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <img src="<?php echo base_url('img/logofreepik.png'); ?>" alt="freepiklogo" width="150px">
        </div>
    </div>

</header>