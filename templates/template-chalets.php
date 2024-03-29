<?php

function enqueue_css_single_chalet(){
	wp_enqueue_style( 'single_chalet', plugins_url( 'gestion-chalets/styles/single_chalet.css'),array(), false, 'all' );
	wp_enqueue_style( 'slider', plugins_url( 'gestion-chalets/styles/slider.css'),array(), false, 'all' );
	wp_enqueue_style( 'btn_CTA', plugins_url( 'gestion-chalets/styles/btn_CTA.css'),array(), false, 'all' );
	wp_enqueue_style( 'contact_form', plugins_url( 'gestion-chalets/styles/contact_form.css'),array(), false, 'all' );

}

function enqueue_js_toggleCTA(){
    wp_enqueue_script( 'toggleCTA', plugins_url( 'gestion-chalets/js/toggleCTA.js' ),array(), false, true );
}

function enqueue_js_contactForm(){
    wp_enqueue_script( 'cta-contact-form', plugins_url( 'gestion-chalets/js/cta-contact-form.js' ),array(), false, true );
}

function enqueue_js_swipe(){
    wp_enqueue_script( 'swipe', plugins_url( 'gestion-chalets/js/swipe.js'),array(), false, true );
}

function enqueue_js_slider(){
    wp_enqueue_script( 'slider', plugins_url( 'gestion-chalets/js/slider.js'),array(), false, true );
}

function enqueue_js_responsive(){
	wp_enqueue_script( 'responsive', plugins_url( 'gestion-chalets/js/responsive.js'),array(), false, true );
}


add_action( 'wp_enqueue_scripts', 'enqueue_css_single_chalet');
add_action( 'wp_enqueue_scripts', 'enqueue_js_toggleCTA');
add_action( 'wp_enqueue_scripts', 'enqueue_js_contactForm');
add_action( 'wp_enqueue_scripts', 'enqueue_js_swipe');
add_action( 'wp_enqueue_scripts', 'enqueue_js_slider');
add_action( 'wp_enqueue_scripts', 'enqueue_js_responsive');


//Permet de passer en layout pleine largeur
function chalets_vente_layout_class( $class ) {

	if ( is_singular( 'post' ) ) {
		$class = 'full-width';
	}

	return $class;

}
add_filter( 'ocean_post_layout_class', 'chalets_vente_layout_class', 20 );

$nomChalet=get_the_title();

//Récupère header OceanWP
get_header(); ?>

	

<div id="content" class="site-content clr">

	<h2 id="nomChalet"><?php esc_html(the_title());?></h2>

	<?php echo '<div id="sectionSlider" style="background-image:url('.WP_CONTENT_URL.'/uploads/2019/07/wood-3321348_1280.jpg)">'?>

	</div>


		<div id="sliderChalet">
			<div id="lightFilter">
			</div>
			<div id="caracQuartier" class ="caracteristiqueChalet">Quartier : <?php the_field("gc_quartier");?></div>
			<div id="caracPrix" class ="caracteristiqueChalet">Prix : 
				<?php // Champs différent si location
					if($typeChalet == "vente"){
						echo number_format(get_field("gc_prix"),0,","," ").'€' ;
					}
					else{
						echo 'A partir de '.number_format(get_field("gc_tarif"),0,","," ").'€ / sem' ;
					}
				?></div>
			<div id="caracSuperficie" class ="caracteristiqueChalet">Superficie : <?php the_field("gc_superficie");?> m²</div>

			<div id="sliderThumbnails">
				<p id="leftArrow" class = "sliderArrow"><</p>

			<?php 

				$arrayImage = oceanwp_get_gallery_ids();

				foreach ($arrayImage as $key => $id) {
					echo '<div class="chaletThumbnail" style="background-image:url('.wp_get_attachment_url($id).')"><div class="whiteFilter"></div></div>';

				}


				?>
				<p id="rightArrow" class = "sliderArrow">></p>

			</div>

		</div>



	<section id = "sectionCaracteristiques">
		<div id="descriptif">
			<h3>Caractéristiques du bien</h3>
			<p><?php the_field("gc_description");?>
			<div id="features">
				<div id="disposition">

					<div class="caseDispo">						
						<img class="iconeBien" src=<?php echo '"'.WP_CONTENT_URL.'/uploads/2019/07/surface-bleu.png"'?>>
						<p><?php echo the_field("gc_superficie").' m²'; ?></p>
					</div>

					<div class="caseDispo">						
						<img class="iconeBien" src=<?php echo '"'.WP_CONTENT_URL.'/uploads/2019/07/plan-bleu.png"'?>>
						<p>
							<?php
							//vérif singulier / pluriel
							$nbPieces = get_field('gc_pieces');
							if ($nbPieces>1){
								$motPiece=' pièces';
							}
							else{
								$motPiece=' pièce';
							}
							echo the_field("gc_pieces").$motPiece;?>
						</p>
					</div>

					<div class="caseDispo">						
						<img class="iconeBien" src=<?php echo '"'.WP_CONTENT_URL.'/uploads/2019/07/chambre-bleu.png"'?>>
						<p>
							<?php
							//vérif singulier / pluriel
							$nbChambres = get_field('gc_chambres');
							if ($nbChambres>1){
								$motChambres=' chambres';
							}
							else{
								$motChambres=' chambre';
							}
							echo the_field("gc_chambres").$motChambres;?>
						</p>
					</div>

					<div class="caseDispo">						
						<img class="iconeBien" src=<?php echo '"'.WP_CONTENT_URL.'/uploads/2019/07/sdb-bleu.png"'?>>
						<p>
							<?php
							//vérif singulier / pluriel
							$nbSDB = get_field('gc_salles_de_bain');
							if ($nbSDB>1){
								$motSDB=' salles de bain';
							}
							else{
								$motSDB=' salle de bain';
							}
							echo the_field("gc_salles_de_bain").$motSDB;?>
						</p>
					</div>

					<div class="caseDispo">						
						<img class="iconeBien" src=<?php echo '"'.WP_CONTENT_URL.'/uploads/2019/07/stairs-bleu.png"'?>>
						<p>
							<?php
							//vérif singulier / pluriel
							$nbEtages = get_field('gc_etages');
							if($nbEtages==0){
								echo 'Plain-pied';
							}
							elseif($nbEtages>1){
								$motEtage=' étages';
								echo the_field("gc_etages").$motEtage;
							}
							else{
								$motEtage=' étage';
								echo the_field("gc_etages").$motEtage;
							}
							?>
						</p>
					</div>

					

				</div>
				<div id="amenagements">
					<div id="interieur" style=<?php echo '"background-image:url('.WP_CONTENT_URL.'/uploads/2019/07/chalet8-min-med.jpg"'?>>
						<div class="bloc-amenagement">						
								<p class="titreFeature">Aménagements intérieurs</p>
								<?php 
									$arrInterieurs=get_field('gc_amenagements_interieurs');
									if($arrInterieurs!=""){
										foreach ($arrInterieurs as $key => $amenagement) {
											switch ($amenagement) {
												case 'Cuisine équipée':
												echo '<div class="amenagement-interieur"><img alt="Cuisine équipée" src="'.WP_CONTENT_URL.'/uploads/2019/07/hotte-bleu.png"><p>Cuisine équipée</p></div>';
												break;

											case 'Cuisine américaine':
												echo '<div class="amenagement-interieur"><img alt="Cuisine américaine" src="'.WP_CONTENT_URL.'/uploads/2019/07/cuisineAmericaine-bleu.png"><p>Cuisine américaine</p></div>';
												break;

											case 'Véranda':
												echo '<div class="amenagement-interieur"><img alt="Véranda" src="'.WP_CONTENT_URL.'/uploads/2019/07/veranda-bleu.png"><p>Véranda</p></div>';
												break;

											case 'Dressing':
												echo '<div class="amenagement-interieur"><img alt="Dressing" src="'.WP_CONTENT_URL.'/uploads/2019/07/cintre-bleu.png"><p>Dressing</p></div>';
												break;

											case 'Cheminée':
												echo '<div class="amenagement-interieur"><img alt="Cheminée" src="'.WP_CONTENT_URL.'/uploads/2019/07/cheminee-bleu.png"><p>Cheminée</p></div>';
												break;

											default:
												echo '<div class="amenagement-interieur"><img alt="'.$amenagement.'" src="'.WP_CONTENT_URL.'/uploads/2019/07/like-bleu.png"><p>'.$amenagement.'</p></div>';
												
												break;
											}
										}
									}
									
								?>
								
							</div>
					</div>

					<div id="exterieur" style=<?php echo '"background-image:url('.WP_CONTENT_URL.'/uploads/2019/07/exterieur.jpg"'?>>
						<div class="bloc-amenagement">	
							<p class="titreFeature">Aménagements extérieurs</p>
							<?php 
								$arrExterieurs=get_field('gc_amenagements_exterieurs');
								if($arrExterieurs!=""){
									foreach ($arrExterieurs as $key => $amenagement) {
										switch ($amenagement) {
											case 'Garage fermé':
											echo '<div class="amenagement-exterieur"><img alt="Garage fermé" src="'.WP_CONTENT_URL.'/uploads/2019/07/garage-bleu.png"><p>Garage fermé</p></div>';
											break;

											case 'Garage avec prise électrique':
											echo '<div class="amenagement-exterieur"><img alt="Garage avec prise électrique" src="'.WP_CONTENT_URL.'/uploads/2019/07/electricite-bleu.png"><p>Garage avec prise électrique</p></div>';
											break;

											case 'Coin barbecue':
											echo '<div class="amenagement-exterieur"><img alt="Coin barbecue" src="'.WP_CONTENT_URL.'/uploads/2019/07/BBQ-bleu.png"><p>Coin barbecue</p></div>';
											break;

											case 'Jardin':
											echo '<div class="amenagement-exterieur"><img alt="Jardin" src="'.WP_CONTENT_URL.'/uploads/2019/07/jardin-bleu.png"><p>Jardin</p></div>';
											break;

											default:
												echo '<div class="amenagement-exterieur"><img alt="'.$amenagement.'" src="'.WP_CONTENT_URL.'/uploads/2019/07/like-bleu.png"><p>'.$amenagement.'</p></div>';
												
											break;
										}
									}
								}

							?>
						</div>
					</div>	
				</div>
					
			</div>
				
		</div>
		<div id="tableauServices">
			<h4>La touche de l'Architecte</h4>

			<div id="listeServices">
				<?php $arrCheckBox = get_field('gc_services');

				if(!empty($arrCheckBox)){

					foreach ($arrCheckBox as $key => $service) {
						switch ($service) {
							case 'Sauna':
								echo '<div class="service"><img alt="sauna" src="'.WP_CONTENT_URL.'/uploads/2019/07/sauna-blanc.png"><p>Sauna</p></div>';
								break;

							case 'Hammam':
								echo '<div class="service"><img alt="Hammam" src="'.WP_CONTENT_URL.'/uploads/2019/07/hammam-blanc.png"><p>Hammam</p></div>';
								break;

							case 'Piscine':
								echo '<div class="service"><img alt="Piscine" src="'.WP_CONTENT_URL.'/uploads/2019/07/piscine-blanc.png"><p>Piscine</p></div>';
								break;

							case 'Jacuzzi intérieur':
								echo '<div class="service"><img alt="Jacuzzi" src="'.WP_CONTENT_URL.'/uploads/2019/07/jacuzzi-blanc.png"><p>Jacuzzi</p></div>';
								break;

							case 'Jacuzzi extérieur':
								echo '<div class="service"><img alt="Jacuzzi extérieur" src="'.WP_CONTENT_URL.'/uploads/2019/07/jacuzzi-ext-blanc.png"><p>Jacuzzi extérieur</p></div>';
								break;

							case 'Local à ski':
								echo '<div class="service"><img alt="Local à ski" src="'.WP_CONTENT_URL.'/uploads/2019/07/ski-blanc.png"><p>Local à ski</p></div>';
								break;

							case 'Salle de cinéma':
								echo '<div class="service"><img alt="Salle de cinéma" src="'.WP_CONTENT_URL.'/uploads/2019/07/cine-blanc.png"><p>Salle de cinéma</p></div>';
								break;

							case 'Vue panoramique':
								echo '<div class="service"><img alt="Vue panoramique" src="'.WP_CONTENT_URL.'/uploads/2019/07/panorama-blanc.png"><p>Vue panoramique</p></div>';
								break;

							default:
								echo '<div class="service"><img alt="Vue panoramique" src="'.WP_CONTENT_URL.'/uploads/2019/07/vue.png"><p>Vue panoramique</p></div>';
								
								break;
						}
					}

				}

				if(get_field('gc_touche')!=""){
					$touche=get_field('gc_touche');
					echo '<p id="toucheArchi">"'.$touche.'"</p>';
				}

				?>
			</div>
		</div>

	</section>

	<?php include_once 'btn-CTA.php';?>
	<aside id="contactForm" class="contact-form-hidden">		

		<?php 
		include_once 'formulaire-contact.php';?>
		
	</aside>

</div><!-- #content -->


<?php get_footer(); ?>