<?php
$to      = 'ericjivraj@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: jivrajae@aston.ac.uk' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$success = mail($to, $subject, $message, $headers);
if($success){
  echo "true";
}else{
  echo "false";
}
?>
