<?php
if(isset($_REQUEST['email']))
{
  $email = $_REQUEST['email'] ;
  $name = $_REQUEST['name'] ;
   $message1 = $_REQUEST['message'] ;

  $message = "Hi, <BR><BR>Below are the information submitted though website.<BR><BR>Name : ".$name."<BR>Email Id : ".$email."<BR>Enquiry Details : ".$message1."";
  $subject = "Prospective Inquiry" ;
  
  // To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  // Additional headers
  $headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";

  $to="info@clipmyimages.com";

  mail($to, $subject, $message, $headers);

  echo "<script language=\"JavaScript\">
  alert('Thank you for contacting Clipmyimages. We will get back to you with  in 24 to 48 hours.');
  location.replace('index.html');
  </script>";

}
else {
	header('Location: index.html');
}

?>