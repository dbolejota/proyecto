<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';
    // Logica para nueva clave aleatoria 
    $emailFor = "luisa.vega3@misena.edu.co";
    //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // Configuración de acceso al servidor de gmail
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'soportebotellita10@gmail.com';                     //SMTP username
    $mail->Password   = 'fuqnjvubxhlixtii';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    // Emsisor datos de quien envia el email
    $mail->setFrom('soportebotellita10@gmail.com', 'Soporte Botellita S&W');
    //Receptor: Datos de quién recibe el email
    $mail->addAddress($emailFor);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);   
    $mail->CharSet="UTF-8";
    //Asunto del email                               //Set email format to HTML
    $mail->Subject = 'Botellita S&W-Recuperación clave';
    $mail->Body    = '<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>NOTIFICACION LIVING SAFE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding: 10px 0 30px 0;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
					style="border: 1px solid #cccccc; border-collapse: collapse;">
					<tr>
						<td align="center" bgcolor="#010A43"
							style="padding: 20px 0 20px 0; color: #ffffff; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
							<img src="https://raw.githubusercontent.com/codingnow2022/living-safe-dashboard/main/assetsLogin/img/logo-mail-living.png" alt="" width="120"
								height="120" style="display: block;" />
						</td>
					</tr>
					<tr>
						<td bgcolor="#010A43" style="padding: 40px 30px 40px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td align="center"
										style="color:#FFFFFF; font-family: Arial, sans-serif; font-size: 24px;">
										<b>RECUPERACIÓN DE CONTRASEÑA</b>
									</td>
								</tr><tr>
									
								</tr>
								<tr>
									<td>
										<table border="0" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td style="font-size: 0; line-height: 0;" width="100">
													&nbsp;
												</td>
												<td width="400" valign="top">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td align="center">
                                                            <p style="color:#fff; font-size:22px; padding-top: 30px">Hola Pinche puto tu nueva clave de acceso para nuestro sistema es: </p>
                                                            <p style="color:#fff; font-size:25px; padding-top: 30px">123456 </p>
															</td>
														</tr>
														<tr>
															<td align="center"
																style="padding: 0; color: #FFFFFF; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">

															</td>
														</tr>
													</table>
												</td>
												<td style="font-size: 0; line-height: 0;" width="100">
													&nbsp;
												</td>

											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#33CB98" style="padding: 30px 30px 30px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td align="center"
										style="color: #010A43; font-family: Arial, sans-serif; font-size: 14px;"
										width="75%; text-aling:center">
										&reg; Luis Felipe Restrepo - 2023<br />
										<a href="https://www.youtube.com/@codingnow6059" target="_blank"
											style="color: #010A43;">
											<font color="#010A43">www.coding-now.com.co/</font>
										</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>

</html>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script> alert("Se ha enviado el email con la nueva clave asignada")</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>