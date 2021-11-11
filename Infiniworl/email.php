<!--Robert Alaniz Jr-->
<!--Coding 05-->
<!--This processes the data from the rendered website for the Coding 05 assignment Contact webpage.-->

<?php
  
require_once 'mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();




    

 function mymail($to, $subject, $message, $headers) {
     // do not alter this function
     return true;
 }

 function successpage($mustache, $result) {
    
    $body = file_get_contents('templates/contactformresultpage.html');
    $body_data = ["pagebody" => "$result", "body" => "body"];
    
    echo $mustache->render($body, $body_data) . PHP_EOL;
      
 }

 function failurepage($mustache) {

    $result = "Something was wrong with your submission!";
    
    $body = file_get_contents('templates/contactformresultpage.html');
    $body_data = ["pagebody" => "$result", "body" => "body"];
    
    echo $mustache->render($body, $body_data) . PHP_EOL;

    
 }

 function main() {
     $mustache = new Mustache_Engine;

    $header = file_get_contents('templates/header.html');
    $footer = file_get_contents('templates/footer.html');
    
    $header_data = ["pagetitle" => "Contact Me"];
    $footer_data = ["localtime" => date('l jS \of F Y h:i:s A'), "footertitle" => "Contact Robert Roboto"];




     /* This will test to make sure we have a non-empty $_POST from
      * the form submission. */
     if (!empty($_POST)) {
          
        $name = "";
        $subject = "";
        $message = "";
        $from = "";
          
          
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $from = $_POST['email'];
        
        
        $name = trim($name);
        $subject = trim($subject);
        $message = trim($message);
        $from = trim($from);
        
        
        $namelength = strlen($title);
        $subjectlength = strlen($subject);
        $messagelength = strlen($message);
        $fromlength = strlen($message);
        
        
        $name = substr($name, 0, 64);
        $subject = substr($subject, 0, 64);
        $message = substr($message, 0, 1000);
        $from = substr($from, 0, 64);
        
        
        if(filter_var($from, FILTER_VALIDATE_EMAIL)){
         /* The cleaning routines above may leave any variable empty. If we
          * find an empty variable, we stop processing because that means
          * someone tried to send us something malicious or incorrect. */
         if (!empty($name) && !empty($from) && !empty($subject) && !empty($message)) {

             /* this forms the correct email headers to send an email */
             $headers = "From: $from\r\n";
             $headers .= "Reply-To: $from\r\n";
             $headers .= "MIME-Version: 1.0\r\n";
             $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";

             /* Now attempt to send the email. This uses a dummy email function
              * because the student email server will not send mail. On a real
              * server, you would use just "mail" instead of "mymail" and
              * it will be sent normally.
              */
             if (mymail("infiniworl@gmail.com", $subject, $name . 'wrote...\n\n' . $message, $headers)) {
                $result = "You have submitted an email!";
                 successpage($mustache, $result);
             } else {
                 failurepage($mustache);
             }
             
         } else {
                 
                 failurepage($mustache);
             }
         } else {
             failurepage($mustache);
         }
     } else {
         failurepage($mustache);
     }
         echo $mustache->render($header, $header_data) . PHP_EOL;
         echo $mustache->render($footer, $footer_data) . PHP_EOL;

 }

 // this kicks off the script
 main();
 
 
 

