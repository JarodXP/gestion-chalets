
//-------------SLIDER-----------------------------------

var imgList = document.getElementsByClassName('chaletThumbnail');
var imgReference = imgList[0];
imgReference.id = "imageReference";

var indexImgReference = 0;
var leftArrow=document.getElementById("leftArrow");
var rightArrow=document.getElementById("rightArrow");
var slider = document.getElementById("sliderChalet");

var whiteFilter = document.querySelector("#imageReference>.whiteFilter");


if(imgList.length>4){

	leftArrow.style.display="block";
	rightArrow.style.display="block";
}

//Attribution de l'image au chargement du slider
changeImgSlider(imgReference);

//Affichage des premières images
displayThumbnails();

//Display de 4 images max sur la barre thumbanails
function displayThumbnails(){
	if(indexImgReference + 3 < imgList.length){
		for(i=0;i<imgList.length;i++){
			if(i<indexImgReference || i>indexImgReference+3){
				imgList[i].style.display="none";
			}
			else{
				imgList[i].style.display="block"
			}
			
		}

	}
}

//Attribution de la photo du thumbnail selectionné au div du slider + enlever filtre blanc
function changeImgSlider(imgReference){

	var urlSliderImage = imgReference.style.backgroundImage;
	slider.style.backgroundImage = urlSliderImage;
	imgReference.id = "imageReference";

	whiteFilter = document.querySelector("#imageReference>.whiteFilter");
	whiteFilter.style.display="none";
}


//Event click: changement d'image du slider
for(var i=0; i<imgList.length; i++){
	imgList[i].addEventListener("click", function( event ){
		changeImgSlider(event.target);
	})
}

//Défilement avec fleches
leftArrow.addEventListener("click",function( event ){
	if(indexImgReference>0){
		rightArrow.className="sliderArrow";
		whiteFilter.style.display="block";
		imgReference = document.getElementById("imageReference");
		imgReference.id = "";
		indexImgReference--;
		displayThumbnails();
		changeImgSlider(imgList[indexImgReference]);

		//si première image, fleche disabled
		if(indexImgReference==0){
			leftArrow.className="sliderArrowDisabled";
		}
		
	}
	
})

rightArrow.addEventListener("click",function( event ){
	if(indexImgReference<imgList.length){
		leftArrow.className="sliderArrow";
		whiteFilter.style.display="block";
		imgReference = document.getElementById("imageReference");
		imgReference.id = "";
		indexImgReference++;
		displayThumbnails();
		changeImgSlider(imgList[indexImgReference]);

		//si dernière image, fleche disabled
		if(indexImgReference==imgList.length-1){
			rightArrow.className="sliderArrowDisabled";
		}
	}

})

//-----------------TOGGLE BOUTON CTA----------------
function addEventsArrowCTA(){
	var btnCTA = document.getElementById('fixedBtnWrapper');
	var arrowCTA = document.getElementById('arrowBtn');

	arrowCTA.addEventListener("click", function(event){
		if (btnCTA.className == 'CTABtn-visible'){
			btnCTA.className='CTABtn-hidden';
			arrowCTA.innerText='CONTACT';
			arrowCTA.className='arrowCTA-hidden';

		}

		else if(contactForm.className=='contact-form-display'){
			contactForm.className='contact-form-hidden';
			btnCTA.className='CTABtn-visible';
			arrowCTA.className='arrowCTA-visible';
		}

		else {
			btnCTA.className='CTABtn-visible';
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


