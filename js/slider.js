//-------------SLIDER-----------------------------------

var imgList = document.getElementsByClassName('chaletThumbnail');
var imgReference = imgList[0];
imgReference.id = "imageReference";

var indexImgReference = 0;
var leftArrow=document.getElementById("leftArrow");
var rightArrow=document.getElementById("rightArrow");
var slider = document.getElementById("sliderChalet");

var whiteFilter = document.querySelector("#imageReference>.whiteFilter");

//Attribution de l'image au chargement du slider
changeImgSlider(imgReference);

if(imgList.length>4){

	leftArrow.style.display="block";
	rightArrow.style.display="block";
}

//Affichage des premières images
displayThumbnails();

//Display des images max sur la barre thumbanails
function displayThumbnails(){
	
	indexImgReference=searchIndexImgRef();	

	
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

	displayThumbnails();

	indexImgReference=searchIndexImgRef();	

	//si dernière image, fleche disabled
		if(indexImgReference==imgList.length-1){
			rightArrow.className="sliderArrowDisabled";
		}

	//si première image, fleche disabled
		else if(indexImgReference==0){
			leftArrow.className="sliderArrowDisabled";
		}

		else{
			rightArrow.className="sliderArrow";
			leftArrow.className="sliderArrow";
		}
}

//Recherche de l'index de la l'image courante du slider
function searchIndexImgRef(){
	return Array.from(imgList,function(e) { return e.id; }).indexOf('imageReference');

}


//Change image: click sur image
for(var i=0; i<imgList.length; i++){
	imgList[i].addEventListener("click", function( event ){

		//Gère le problème du target différend entre le mobile et le PC
		var targetElt = event.target;
		if(targetElt.className=="whiteFilter"){
			targetElt=targetElt.parentElement;
		}

		if(targetElt != document.getElementById("imageReference")){
			whiteFilter.style.display="block";
			imgReference = document.getElementById("imageReference");
			imgReference.id = "";
			imgReference=targetElt;
			changeImgSlider(imgReference);
		}
	})
}

//Change image avec fleches
leftArrow.addEventListener("click",function( event ){

	indexImgReference = searchIndexImgRef();

	if(indexImgReference >0){
		whiteFilter.style.display="block";
		imgReference = document.getElementById("imageReference");
		imgReference.id = "";
		indexImgReference--;
		changeImgSlider(imgList[indexImgReference]);
		
	}
	
})

rightArrow.addEventListener("click",function( event ){

	indexImgReference = searchIndexImgRef();

	if(indexImgReference<imgList.length){
		whiteFilter.style.display="block";
		imgReference = document.getElementById("imageReference");
		imgReference.id = "";
		indexImgReference++;
		changeImgSlider(imgList[indexImgReference]);
	}

})

//Change image avec Swipe
swipedetect(slider, function(swipedir){

	indexImgReference = searchIndexImgRef();

    if(swipedir =='right'){
    	if(indexImgReference>0){
    		whiteFilter.style.display="block";
			imgReference = document.getElementById("imageReference");
			imgReference.id = "";
			indexImgReference--;
			changeImgSlider(imgList[indexImgReference]);

    	}
    	
    }

    else if(swipedir =='left'){
    	if(indexImgReference<imgList.length-1){
    		whiteFilter.style.display="block";
			imgReference = document.getElementById("imageReference");
			imgReference.id = "";
			indexImgReference++;
			changeImgSlider(imgList[indexImgReference]);

    	}
    	
    }
});




