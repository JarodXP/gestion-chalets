window.addEventListener('load',function(){
	if(screen.width>768){
		var btnCTA = document.getElementById('fixedBtnWrapper');
		var arrowCTA = document.getElementById('arrowBtn');
		btnCTA.className='CTABtn-visible CTA-wrapper CTA-wrapper-blanc';
		arrowCTA.innerText='>';
		arrowCTA.className='arrowCTA-visible';

	}
	
})