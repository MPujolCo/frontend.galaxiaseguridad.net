<?php
	function requestType($val){
		switch ($val) {
			case 'P':
				return 'Petición';
				break;
			case 'Q':
				return 'Queja';
				break;
			case 'R':
				return 'Reclamo';
				break;
			case 'S':
				return 'Sugerencia';
				break;
			
			default:
				return 'Desconocido: '.$val;
				break;
		}
	}

	$owner_email = $_POST["owner_email"];
	$headers = 'De:' . $_POST["email"];
	$subject = 'Mensaje enviado de galaxiaseguridad.net: ' . $_POST["name"];
	$messageBody = "";
	
	if($_POST['name']!='nope'){
		$messageBody .= '<p>Nombre: ' . $_POST["name"] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['email']!='nope'){
		$messageBody .= '<p>E-mail: ' . $_POST['email'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}else{
		$headers = '';
	}
	if($_POST['phone']!='nope'){		
		$messageBody .= '<p>Teléfono: ' . $_POST['phone'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['request']!='nope'){
		$valRequest = requestType($_POST['request']);
		$messageBody .= '<p>Tipo de solicitud: ' . $valRequest . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['fax']!='nope'){		
		$messageBody .= '<p>Fax Number: ' . $_POST['fax'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['message']!='nope'){
		$messageBody .= '<p>Mensaje: ' . $_POST['message'] . '</p>' . "\n";
	}
	
	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}
	
	try{
		if(!mail($owner_email, $subject, $messageBody, $headers)){
			throw new Exception('correo fallido');
		}else{
			echo 'correo enviado';
		}
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
	}
?>