<?php
	date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

	$server = $_SERVER['SERVER_NAME'];
	$endereco = $_SERVER ['REQUEST_URI'];

	################# SCRIPT DE ENVIO DE E-MAIL #################
		$nome = utf8_decode($_POST["nome"]);
		$email = utf8_decode($_POST["email"]);
		$area = utf8_decode($_POST["area"]);
		$mensagem = utf8_decode(nl2br($_POST["mensagem"]));
		//if($nome == "" || $email == "" || $mensagem == ""){ echo 'Algum campo ficou em branco! Por favor, preencha-o.'; exit; }

		// Destinatário
		$para = "paulo1rm23@gmail.com";

		// Assunto do e-mail
		$assunto = "Curriculum enviado - Clínica Pedro Cavalcanti";


		$logotipo = '<img src="http://www.clinicapedrocavalcanti.com.br/novo/wp-content/themes/pedrocavalcanti/images/logo.png" width="178" height="auto" />';

		$corpo = '<center><table width="700" border="1" cellpadding="0" cellspacing="0" style="border: 1px #ec792c solid; border-collapse: collapse;">
					<tr>
						<td style="padding: 5px;" bgcolor="#FFF"  width="210" align="center" >'.$logotipo.'</td>
						<td width="480" align="center" bgcolor="#ec792c" style=" padding: 15px; font-family: Verdana, Geneva, sans-serif; color: #FFF; font-weight: bold;">NOVO CURRICULUM ENVIADO PELO SITE</td>
					</tr>
					<tr>
						<td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
							NOME
						</td>
						<td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
							'.$nome.'
						</td>
					</tr>
					<tr>
						<td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
							E-MAIL
						</td>
						<td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
							'.$email.'
						</td>
					</tr>
					<tr>
						<td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
							ÁREA DE INTERESSE
						</td>
						<td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
							'.$area.'
						</td>
					</tr>
					<tr>
						<td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
							MENSAGEM
						</td>
						<td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
							'.$mensagem.'
						</td>
					</tr>
					<tr>
						<td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
							ARQUIVO
						</td>
						<td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
							<a href="'.$link_arquivo.'">'.$link_arquivo.'</a>
						</td>
					</tr>
					<tr>
						<td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
							INFO
						</td>
						<td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
							Enviado em '.date('d/m/Y').' - '.date("H:i:s").'
						</td>
					</tr>
					<tr>
						<td bgcolor="#ec792c" colspan="2" style="padding: 10px; font-family: Arial; color: #FFF; font-weight: bold; text-align: center;">CLINICA PEDRO CAVALCANTI</td>
					</tr>
					</table></center>';

		// Cabeçalho do e-mail
		$header = "MIME-Version: 1.0" . "\r\n".
		"Content-type: text/html; charset=iso-8859-1" . "\r\n".
		"From: SITE@clinicapedrocavalcanti.com.br" . "\r\n" .
		"Bcc: \n".
		"Reply-To: nao-responda@clinicapedrocavalcanti.com.br";
		mail($para, $assunto, $corpo, $header);
		echo '<script> alert("Enviado com sucesso!"); history.back("-1"); </script>';
		// Mostra a mensagem acima e redireciona para index.html
    ################# /SCRIPT DE ENVIO DE E-MAIL #################
?>