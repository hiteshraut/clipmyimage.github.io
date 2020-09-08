<?php
//print_r($_FILES);



$mail_to='hiteshraut22@gmail.com';
$subject="Hello with attachments";
$message="This is a test mail with attachment.";
$from_name="Vipin Sharma";
$from_mail="hiteshraut22@gmail.com";
$replyto="hiteshraut2208@gmail.com";
$eol = "<br/>";
$body="Name:".$_POST['name'].$eol;
$body.="Email:".$_POST['email'].$eol;
$body.="Phone:".$_POST['phone'].$eol;
$body.="Name:".$_POST['message'].$eol;
$eol = PHP_EOL;

$file = $path_of_uploaded_file;
$file_size = filesize($file);
$handle = fopen($file, "r");
$content = fread($handle, $file_size);
fclose($handle);

$content = chunk_split(base64_encode($content));
$uid = md5(uniqid(time()));
$filename = basename($name_of_uploaded_file);



// Basic headers
$header = "From: ".$from_name." <".$from_mail.">".$eol;
$header .= "Reply-To: ".$replyto.$eol;
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"";

// Put everything else in $message
$message = "--".$uid.$eol;
$message .= "Content-Type: text/html; charset=ISO-8859-1".$eol;
$message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$message .= $body.$eol;
$message .= "--".$uid.$eol;
$message .= "Content-Type: application/pdf; name=\"".$filename."\"".$eol;
$message .= "Content-Transfer-Encoding: base64".$eol;
$message .= "Content-Disposition: attachment; filename=\"".$filename."\"".$eol;
$message .= $content.$eol;
$message .= "--".$uid."--";

if (mail($mail_to, $subject, $message, $header))
{
    echo "mail_success";
//    header("Location:thankyou.html");
}
else
{
    echo "mail_error";
}