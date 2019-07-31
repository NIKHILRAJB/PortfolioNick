<?php 

if(isset($_POST['email'])) {

    $email_to = "nikhilrajb1421@gmail.com";
    
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['messege'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $subject = $_POST['subject'];
    $messege = $_POST['messege']; 
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    f(!preg_match($email_exp,$email)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
      }
     
        $string_exp = "/^[A-Za-z .'-]+$/";
     
      if(!preg_match($string_exp,$name)) {
        $error_message .= 'The First Name you entered does not appear to be valid.<br />';
      }
      if(!preg_match($string_exp,$subject)) {
        $error_message .= 'The First Name you entered does not appear to be valid.<br />';
      }
     
      if(strlen($messege) < 2) {
        $error_message .= 'The Comments you entered do not appear to be valid.<br />';
      }
     
      if(strlen($error_message) > 0) {
        died($error_message);
      }
     
        $email_message = "Form details below.\n\n";
     
         
        function clean_string($string) {
          $bad = array("content-type","bcc:","to:","cc:","href");
          return str_replace($bad,"",$string);
        }
        $email_message .= "Name: ".clean_string($name)."\n";
        $email_message .= "Email: ".clean_string($email)."\n";
        $email_message .= "Subject: ".clean_string($subject)."\n";
        $email_message .= "Messege: ".clean_string($messege)."\n";
      }

   // create email headers
   $headers = 'From: '.$email_from."\r\n".
   'Reply-To: '.$email_from."\r\n" .
   'X-Mailer: PHP/' . phpversion();
   @mail($email_to, $subject, $email_message, $headers);  

}

?>