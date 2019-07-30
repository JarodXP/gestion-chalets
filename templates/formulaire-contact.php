<form id="formulaire" action="https://chaletsetcaviar.jarod-xp.com/wp-content/plugins/gestion-chalets/templates/traitement-formulaire.php" method="post">

	<div id="formName" class="form-input">
		<label for="contact_last_name">Nom</label>
		<input type="text" name="contact_last_name" maxlength="50">
		<input type="hidden" name="email" maxlength="50" required>
		<input type="hidden" name="pageURL"<?php echo 'value="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'"';?>>
		<input type="hidden" name="typeChalet"<?php echo 'value="'.$typeChalet.'"';?>>
		<input type="hidden" name="nomChalet"<?php echo 'value="'.$nomChalet.'"';?>>
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

    <button id="formSubmit" type="submit">Envoyer le message</button>   

</form>