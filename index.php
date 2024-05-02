<?php


//This is the controller

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload.php
require_once ('vendor/autoload.php');

//Instantiate the F3 Base class
$f3 = Base::instance();

//define a default root andrewhinkson.greenriverdev.com/328/hello-fat-free/
$f3->route('GET /', function()
{
    //echo '<h1>Hello Fat-Free!</h1>';

    //Render a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// Run fat-free
$f3->run();