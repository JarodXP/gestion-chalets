
//---------------FORMULAIRE DE CONTACT -------------
//Securisation


function verifChamps(){
	var email=document.querySelector("#formMail>input");
	var nom=document.querySelector("#formName>input");
	var prenom=document.querySelector("#formFirstName>input");
	var message=document.querySelector("#formMessage>textarea");
	var verifMail = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;	
	var verifNom = /^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ-]{1,50}$/;

	if(verifMail.exec(email.value)==null){
		alert("Votre email est incorrect");
		return false;
	}
	else if(verifNom.exec(nom.value)==null){
		alert("Votre nom est incorrect");
		return false;
	}
	else if(verifNom.exec(prenom.value)==null){
		alert("Votre prénom est incorrect");
		return false;
	}
	else if(message==""||message.length<10){
		alert("Votre message est trop court");
		return false;
	}
	else{
		return true;
	}

}

function addEventSubmit(){
	var formulaire=document.getElementById("formulaire");
	formulaire.addEventListener("submit", function(e){
		if(verifChamps()==false){

			e.preventDefault();
		}
		else{
			alert('Votre demande a bien été envoyée');
		}
	})
}


addEventSubmit();


