<?php
// Налаштування відправки
require 'config.php';



// $name = $_POST['form']['name'] ?? '';
// $email = $_POST['form']['email'] ?? '';
// $messageText = $_POST['form']['message'] ?? '';





//Від кого лист
$mail->setFrom('', 'Лист від BorysTimo'); // Вказати потрібний E-mail
//Кому відправити
$mail->addAddress(''); // Вказати потрібний E-mail
//Тема листа
$mail->Subject = 'Вітання!';

//Тіло листа
$body = '<h1>Зустрічайте супер листа для !</h1>';


// if ($name) {
// 	$body .= "<p><strong>Им'я:</strong> $name</p>";
// }
// if ($email) {
// 	$body .= "<p><strong>Email:</strong> $email</p>";
// }
// if ($messageText) {
// 	$body .= "<p><strong>Повідомлення:</strong> $messageText</p>";
// }



if (!empty(trim($_POST['name']))) {
	$body .= '<p>Name: ' . htmlspecialchars($_POST['name']) . '</p>';
 }
 if (!empty(trim($_POST['email']))) {
	$body .= '<p>Email: ' . htmlspecialchars($_POST['email']) . '</p>';
 }
 if (!empty(trim($_POST['message']))) {
	$body .= '<p>Message: ' . htmlspecialchars($_POST['message']) . '</p>';
 }
 



//default
// if(trim(!empty($_POST['name']))){
// 	$body.='<p>Name:' . $_POST['name'] . '</p>';
// }	
// if(trim(!empty($_POST['email']))){
// 	$body.='<p>Email:' . $_POST['email'] . '</p>';
// }	
// if(trim(!empty($_POST['message']))){
// 	$body.='<p>Message:' . $_POST['message'] . '</p>';
// }	



/*
	//Прикріпити файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//шлях завантаження файлу
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузимо файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото у додатку</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

$mail->Body = $body;

//Відправляємо
if (!$mail->send()) {
	$message = 'Помилка';
} else {
	$message = 'Дані надіслані!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
