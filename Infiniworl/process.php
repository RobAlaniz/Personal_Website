<?php

/*
 * this is simulating input, validation, processing, and output
 */




 function successpage($result) {
    echo $result;

      
 }
 
  function failurepage($result) {

    $result = strlen($result);
    echo $result;
    

    
 }
 
 function main() {
        $result = "";

     if (!empty($_POST)) {
         


        $to = "";
        $subject = "";
        $message = "";
        $from = "";
         
        $to = $_POST['to'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $from = $_POST['from'];
         
        $to = trim($to);
        $subject = trim($subject);
        $message = trim($message);
        $from = trim($from);

        
        
        if (!empty($to) && !empty($subject) && !empty($message) && !empty($from)) {

            $tolength = strlen($to);
            $subjectlength = strlen($subject);
            $messagelength = strlen($message);
            $fromlength = strlen($from);

            
            if (($tolength > 0 && $tolength <65) && ($subjectlength > 0 && $subjectlength <65) && ($messagelength > 0 && $messagelength <65) && ($fromlength > 0 && $fromlength <65)) {

            $result = $titlelength;
            
            successpage($result);
            
            }
                if(mail($to, $subject, $message)){
            echo 'Your mail has been sent successfully.';
            } 
            else {
            echo 'Unable to send email. Please try again.';
            }    
        }
        
     
        else {

                failurepage($result);
        }
     }
        else{

            failurepage($result);
        }
        

}

main();
         


