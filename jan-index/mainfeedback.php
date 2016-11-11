<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Ян энов обратный звонок</title>
	<link rel="stylesheet" href="css/style.css" />
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
	<div id="popup">
		<div id="popup-box">
			<div id="popup-border">
				<a href="http://www.yanenov.ru/"><button id="popup-close" type="button" class="close"><span>×</span></button></a>
				<div id="message">
<?php
if(isset($_POST['submit'])) {
     
    $email_to = "manakov55@yandex.ru, eva.zadorozhnaya@inbox.ru";
     
    $email_subject = "Заявка на обратный звонок";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['firstname']) ||
        !isset($_POST['cellphone']) ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $first_name = $_POST['firstname']; // required
    $telephone = $_POST['cellphone']; // required
     
    $error_message = "";
	
  if(strlen($first_name) < 2) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
  if(strlen($telephone) < 2) {
    $error_message .= 'The Telephone you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    echo $msg_box = "<span style='color: green;'>Сообщение успешно отправлено!\n<a href='http://www.yanenov.ru/'>Вернуться на главную страницу</a></span>"; 
    $email_message .= "Имя: ".clean_string($first_name)."\n";
    $email_message .= "Телефон: ".clean_string($telephone)."\n";
     
     
// create email headers
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: Заявка на обратный звонок.ru\r\n"; //
@mail($email_to, $email_subject, $email_message, $headers);  
?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
 
<?php
}
die();
?>
