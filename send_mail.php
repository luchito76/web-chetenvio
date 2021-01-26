<?php 

$name = $_POST['name']; 
$telefono = $_POST['telefono']; 
$direccion = $_POST['direccion']; 
$email_address = $_POST['email']; 
$subject = $_POST['subject']; 
$message = $_POST['message']; 

require("class.phpmailer.php");
$mail = new PHPMailer(true);
print_r( $_POST );
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");


$mail->SMTPDebug = 2;                                 // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'wo22.wiroos.host';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'lucho@doshorizontes.com.ar';                 // SMTP username
$mail->Password = 'cami&juli83';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

//Recipients
$mail->setFrom('lucho@doshorizontes.com.ar', 'Chetenvio');
$mail->addAddress('luisparadawagner@gmail.com', 'Luis Parada');     // Add a recipient
// $mail->addCC('luisparadawagner@gmail.com');

 //Content
 

 $mail->isHTML(true);  
 
 $footer .= '<table style="width: 95%;">';
 $footer .= '<tr>';
 $footer .= '<td>';
 $footer .= "<strong><span style='color: #4E4D4D; font-size: 15px;'>Mensaje enviado desde Chetenvio.com </span></strong><br/><br/> 
 <strong><span style='color: #4E4D4D; font-size: 12px'>Nombre y Apellido: </span></strong> $name <br/>
 <strong><span style='color: #4E4D4D; font-size: 12px'>Dirección: </span></strong> $direccion <br/>
 <strong><span style='color: #4E4D4D; font-size: 12px'>Teléfono: </span></strong> $telefono <br/>
 <strong><span style='color: #4E4D4D; font-size: 12px'>e-mail: </span></strong> $email_address <br/>
 <strong><span style='color: #4E4D4D; font-size: 12px'>Asunto: </span></strong> $subject <br/>
 <strong><span style='color: #4E4D4D; font-size: 12px'>Mensaje: </span></strong> $message <br/>";				 
 $footer .= '</td>';
 $footer .= '</tr>';
 $footer .= '</table>';

 
 $mail->Subject = 'Mail enviado desde Chetenvio';
 $mail->Body    = $message;//'This is the HTML message body <b>in bold!</b>';
 $mail->msgHTML($footer);

 if($mail->Send()) {
	echo "Message sent!";
  } else {
	echo "Mailer Error: " . $mail->ErrorInfo;
  }
?>
