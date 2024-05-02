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
$f3->route('GET /', function($f3)
{
    //echo '<h1>Hello Fat-Free!</h1>';

    //Render a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// survey
$f3->route('GET|POST /survey', function($f3) {


    global $f3;
    $f3->set('checks', array('easy'=>'This midterm is easy', 'like'=>'I like midterms', 'monday'=>'Today is Monday'));

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //echo "<p>You got here using the POST method</p>";
        //var_dump ($_POST);

        // Get the data from the post array
        $name = $_POST['nameIn'];
        $checks = $_POST['checks'];

        // If the data valid
        if (true) {

            // Add the data to the session array
            $f3->set('SESSION.name', $name);
            $f3->set('SESSION.checks', $checks);

            // Send the user to the next form
            $f3->reroute('summary');
        } else {
            // Temporary
            echo "<p class='text-center text-danger'>Please ensure you filled out all fields!</p>";
        }
    }

    // Render a view page
    $view = new Template();
    echo $view->render('views/survey.html');

});



// summary
$f3->route('GET|POST /summary', function($f3) {
//    echo '<h1>Personal Info</h1>';


    // Render a view page
    $view = new Template();
    echo $view->render('views/summary.html');
});



// Run fat-free
$f3->run();