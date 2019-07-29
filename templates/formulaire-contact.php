<form id="formulaire" action="http://chaletsetcaviar.jarod-xp.com/wp-content/plugins/gestion-chalets/templates/traitement-formulaire.php" method="post">

	<div id="formName" class="form-input">
		<label for="contact_last_name">Nom</label>
		<input type="text" name="contact_last_name" maxlength="50">
		<input type="hidden" name="email" maxlength="50" required>
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
		<input type="textarea" name="contact_message" maxlength="400" required>
	</div>
	
    <button id="formSubmit" type="submit">Envoyer le message</button>

    <?php 

    	if ($typeChalet=='location'){
    		?>

    		<div id="blocDates">
    			<div id="formDateDu" class="form-input">
					<label for="date_du">Date d'arrivée</label>
					<input type="date" name="date_du" maxlength="50">
				</div>

				<div id="formDateAu" class="form-input">
					<label for="date_au">Date de départ</label>
					<input type="date" name="date_au" maxlength="50">
				</div>
    			
    		</div>
	<?php
    	}?>    

</form>