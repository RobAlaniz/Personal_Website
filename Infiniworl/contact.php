<?php

require_once 'mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();

$mustache = new Mustache_Engine;

    $header = file_get_contents('templates/header.html');
    $body = file_get_contents('templates/contactform.html');
    $footer = file_get_contents('templates/footer.html');


    $header_data = ["pagetitle" => "Contact Me"];

    $body_data = ["pagebody" => "" , "body" => "body"];
    
    $footer_data = ["localtime" => date('l jS \of F Y h:i:s A'), "footertitle" => "Contact Robert Roboto"];

echo $mustache->render($header, $header_data) . PHP_EOL;
echo $mustache->render($body, $body_data) . PHP_EOL;
echo $mustache->render($footer, $footer_data) . PHP_EOL;