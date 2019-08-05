<?php

function contact_form_shortcode(){

	$form='

		<section id="contactForm">
		<form id="formulaire" action="https://chaletsetcaviar.jarod-xp.com/wp-content/plugins/gestion-chalets/templates/traitement-formulaire.php" method="post">

		<div id="formName" class="form-input">
			<label for="contact_last_name">Nom</label>
			<input type="text" name="contact_last_name" maxlength="50">
			<input type="hidden" name="email" maxlength="50" required>
			<input type="hidden" name="pageURL" value="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'">
		</div>

		<div id="formFirstName" class="form-input">
			<label for="contact_first_name">Prénom</label>
			<input type="text" name="contact_first_name" maxlength="50" required>
		</div>

		<div id="formMail" class="form-input">
			<label for="contact_mail">Email</label>
			<input type="email" name="contact_mail" maxlength="50" required>
		</div>

		<div id="formMessage" class="form-input">
			<label for="contact_message">Message</label>
			<textarea name="contact_message" rows="3" cols="40"  wrap="hard" required></textarea>  
		</div>			

	    <button id="formSubmit" type="submit">Envoyer le message</button>   

	</form>
	</aside>';

return $form;
}

add_shortcode( 'contactform', 'contact_form_shortcode' );