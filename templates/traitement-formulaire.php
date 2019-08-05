<?php

// Verification du "piège à bot"
if(isset($_POST['email']) && $_POST['email']==""){

	//validation des champs
	if(isset($_POST['nomChalet']) && preg_match('/[a-zA-Z\'áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ-]{1,50}$/', $_POST['nomChalet'])){
		$nomChalet=strip_tags($_POST['nomChalet']);
		error_log('Nom chalet: '.$nomChalet);
	}

		//Si vient de la page d'accueil, pas de traitement du type chalet.
	if(isset($_POST['pageURL']) && $_POST['pageURL']!='https://chaletsetcaviar.jarod-xp.com/'){
		error_log($_POST['pageURL']);
		if(isset($_POST['typeChalet']) && preg_match('/^[a-zA-Z]{1,8}$/', $_POST['typeChalet'])){
			$typeChalet=strip_tags($_POST['typeChalet']);
			error_log('Type chalet: '.$typeChalet);
		}
	}

	if(isset($_POST['contact_last_name']) && preg_match('/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ-]{1,50}$/', $_POST['contact_last_name'])){
		$nom=strip_tags($_POST['contact_last_name']);
		error_log('Nom: '.$nom);
	}

	if(isset($_POST['contact_first_name']) && preg_match('/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ-]{1,50}$/', $_POST['contact_first_name'])){
		$prenom=strip_tags($_POST['contact_first_name']);
		error_log('Prenom: '.$prenom);
	}

	if(isset($_POST['contact_mail']) && preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $_POST['contact_mail'])){
		$email=strip_tags($_POST['contact_mail']);
		error_log('Email: '.$email);
	}

	//Vérif pour la location uniquement
	if(isset($_POST['date_du']) && preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$_POST['date_du'])){
		$date_du=date_format(date_create(strip_tags($_POST['date_du'])),'d/m/Y');
		error_log('Date du : '.$date_du);
	}

	if(isset($_POST['date_au']) && preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$_POST['date_au'])){
		$date_au=date_format(date_create(strip_tags($_POST['date_au'])),'d/m/Y');
		error_log('Date au: '.$date_au);
	}

	if(isset($_POST['contact_message'])){
		$message='<p>Vous avez reçu une nouvelle demande pour le chalet: '.$nomChalet.'</p><p><strong>Nom :</strong> '.$nom.'</p><p><strong>Prénom :</strong> '.$prenom.'</p><p><strong>Email :</strong> '.$email.'</p>';
		if($typeChalet=="location"){
			$message.='<p></strong>Dates de réservation demandées:</strong> du: '.$date_du.' au :'.$date_au.'</p>';
		}
		$message.='<p>'.strip_tags($_POST['contact_message']).'</p>';

		error_log('Message complet : '.$message);
	}

	//HEADERS
	$headers = 'MIME-Version: 1.0' . "\r\n".
			'From: Chalets et Caviar <contactchalets@jarod-xp.com>' . "\r\n" .
			'Content-type: text/html; charset=iso-8859-1' . "\r\n".
           'Reply-To: noreply@jarod-xp.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

     //Changement objet en fonction du type de résa
     if($typeChalet=="location"){
     	$subject="Demande de réservation";
     }
     else{
     	$subject="Demande d'information";
     }

	try{
		mail("gregory.barile@gmail.com",$subject,$message,$headers);
	}

	catch(Exception $e){
		error_log('Exception reçue :'. $e->getMessage().'\n');
	}

}
	
	

if(isset($_POST['pageURL'])){
	header('Location: '.$_POST['pageURL']);
}

exit();
?>