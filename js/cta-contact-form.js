//-----------------TOGGLE BOUTON CTA----------------
function addEventsArrowCTA(){
	var btnCTA = document.getElementById('fixedBtnWrapper');
	var arrowCTA = document.getElementById('arrowBtn');

	arrowCTA.addEventListener("click", function(event){
		if (btnCTA.className == 'CTABtn-visible CTA-wrapper CTA-wrapper-blanc'){
			btnCTA.className='CTABtn-hidden';
			arrowCTA.innerText='CONTACT';
			arrowCTA.className='arrowCTA-hidden';

		}

		else if(contactForm.className=='contact-form-display'){
			contactForm.className='contact-form-hidden';
			btnCTA.className='CTABtn-visible CTA-wrapper CTA-wrapper-blanc';
			arrowCTA.className='arrowCTA-visible';
		}

		else {
			btnCTA.className='CTABtn-visible CTA-wrapper CTA-wrapper-blanc';
			arrowCTA.className='arrowCTA-visible';
			arrowCTA.innerText='>';
		}
	})
}

//---------------FORMULAIRE DE CONTACT -------------
//Securisation


function verifChamps(){
	var email=document.querySelector("#formMail>input");
	var nom=document.querySelector("#formName>input");
	var prenom=document.querySelector("#formFirstName>input");
	var message=document.querySelector("#formMessage>input");
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
	})
}


function addEventBtnCTA(){
	var contactForm=document.getElementById("contactForm");
	var btnCTA = document.getElementById('fixedBtnWrapper');
	var arrowCTA = document.getElementById('arrowBtn');

	btnCTA.addEventListener("click", function(event){
		contactForm.className='contact-form-display';
		btnCTA.className='CTABtn-hidden';
		arrowCTA.className='arrowCTA-close';
		console.log("En attente");
		})
}

addEventsArrowCTA();
addEventBtnCTA();
addEventSubmit();


