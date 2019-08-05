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
