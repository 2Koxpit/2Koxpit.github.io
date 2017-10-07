<?php

mb_internal_encoding("UTF-8");

if(isset($_POST['message'])){
    // Проверяем данные
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
    
	
	$to = 'alievaleksandr2001@gmail.com'; // Адрес на который будут приходить сообщения
	$subject = 'Site Contact Form'; // тема письма

    // Вид сообщения
	$message = " 
    User name: ". htmlspecialchars($name) ."<br />
	Email: ". htmlspecialchars($email) ."<br />
    Message: ". htmlspecialchars($message);

	$headers = 'From: '. $email . "\r\n" .
    'Reply-To: '. $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    /* $headers = "From: My Personal Page Portfolio\r\nContent-type: text/html; charset=UTF-8 \r\n"; */

	$status = mail($to, $subject, $message, $headers);

	if($status == TRUE){	
		$res['sendstatus'] = 'done';
	
		//Edit your message here
		$res['message'] = 'Form Submission Successful';
    }
	else{
		$res['message'] = 'Failed to send mail. Please mail me to alievaleksandr2001@gmail.com';
	}
	
	
	echo json_encode($res);
}

?>