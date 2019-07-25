<?php

/*
 * Template Name: Fiche Chalet
 * Template Post Type: chalets_vente
*/


function chalets_vente_layout_class( $class ) {

	// Alter your layout
	if ( is_singular( 'post' ) ) {
		$class = 'full-width';
	}

	// Return correct class
	return $class;

}
add_filter( 'ocean_post_layout_class', 'chalets_vente_layout_class', 20 );


get_header(); ?>

	

<div id="content" class="site-content clr">

	<h2 id="nomChalet"><?php esc_html(the_title());?></h2>

	<div id="sectionSlider">

	</div>


		<div id="sliderChalet">
			<div id="lightFilter">
			</div>
			<div id="caracQuartier" class ="caracteristiqueChalet">Quartier : <?php the_field("gc_quartier");?></div>
			<div id="caracPrix" class ="caracteristiqueChalet">Prix : <?php the_field("gc_prix");?> €</div>
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
						<img class="iconeBien" src="http://15.188.4.60/wp-content/uploads/2019/07/surface-bleu.png">
						<p><?php echo the_field("gc_superficie").' m²'; ?></p>
					</div>

					<div class="caseDispo">						
						<img class="iconeBien" src="http://15.188.4.60/wp-content/uploads/2019/07/plan-bleu.png">
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
						<img class="iconeBien" src="http://15.188.4.60/wp-content/uploads/2019/07/chambre-bleu.png">
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
						<img class="iconeBien" src="http://15.188.4.60/wp-content/uploads/2019/07/sdb-bleu.png">
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
						<img class="iconeBien" src="http://15.188.4.60/wp-content/uploads/2019/07/stairs-bleu.png">
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
					<div id="interieur">
						<div class="bloc-amenagement">						
								<p class="titreFeature">Aménagements intérieurs</p>
								<?php 
									$arrInterieurs=get_field('gc_amenagements_interieurs');
									if($arrInterieurs!=""){
										foreach ($arrInterieurs as $key => $amenagement) {
											switch ($amenagement) {
												case 'Cuisine équipée':
												echo '<div class="amenagement-interieur"><img alt="Cuisine équipée" src="http://15.188.4.60/wp-content/uploads/2019/07/hotte-bleu.png"><p>Cuisine équipée</p></div>';
												break;

											case 'Cuisine américaine':
												echo '<div class="amenagement-interieur"><img alt="Cuisine américaine" src="http://15.188.4.60/wp-content/uploads/2019/07/cuisineAmericaine-bleu.png"><p>Cuisine américaine</p></div>';
												break;

											case 'Véranda':
												echo '<div class="amenagement-interieur"><img alt="Véranda" src="http://15.188.4.60/wp-content/uploads/2019/07/veranda-bleu.png"><p>Véranda</p></div>';
												break;

											case 'Dressing':
												echo '<div class="amenagement-interieur"><img alt="Dressing" src="http://15.188.4.60/wp-content/uploads/2019/07/cintre-bleu.png"><p>Dressing</p></div>';
												break;

											case 'Cheminée':
												echo '<div class="amenagement-interieur"><img alt="Cheminée" src="http://15.188.4.60/wp-content/uploads/2019/07/cheminee-bleu.png"><p>Cheminée</p></div>';
												break;

											default:
												echo '<div class="amenagement-interieur"><img alt="'.$amenagement.'" src="http://15.188.4.60/wp-content/uploads/2019/07/like-bleu.png"><p>'.$amenagement.'</p></div>';
												
												break;
											}
										}
									}
									
								?>
								
							</div>
					</div>

					<div id="exterieur">
						<div class="bloc-amenagement">	
							<p class="titreFeature">Aménagements extérieurs</p>
							<?php 
								$arrExterieurs=get_field('gc_amenagements_exterieurs');
								if($arrExterieurs!=""){
									foreach ($arrExterieurs as $key => $amenagement) {
										switch ($amenagement) {
											case 'Garage fermé':
											echo '<div class="amenagement-exterieur"><img alt="Garage fermé" src="http://15.188.4.60/wp-content/uploads/2019/07/garage-bleu.png"><p>Garage fermé</p></div>';
											break;

											case 'Garage avec prise électrique':
											echo '<div class="amenagement-exterieur"><img alt="Garage avec prise électrique" src="http://15.188.4.60/wp-content/uploads/2019/07/electricite-bleu.png"><p>Garage avec prise électrique</p></div>';
											break;

											case 'Coin barbecue':
											echo '<div class="amenagement-exterieur"><img alt="Coin barbecue" src="http://15.188.4.60/wp-content/uploads/2019/07/BBQ-bleu.png"><p>Coin barbecue</p></div>';
											break;

											case 'Jardin':
											echo '<div class="amenagement-exterieur"><img alt="Jardin" src="http://15.188.4.60/wp-content/uploads/2019/07/jardin-bleu.png"><p>Jardin</p></div>';
											break;

											default:
												echo '<div class="amenagement-exterieur"><img alt="'.$amenagement.'" src="http://15.188.4.60/wp-content/uploads/2019/07/like-bleu.png"><p>'.$amenagement.'</p></div>';
												
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
								echo '<div class="service"><img alt="sauna" src="http://15.188.4.60/wp-content/uploads/2019/07/sauna-blanc.png"><p>Sauna</p></div>';
								break;

							case 'Hammam':
								echo '<div class="service"><img alt="Hammam" src="http://15.188.4.60/wp-content/uploads/2019/07/hammam-blanc.png"><p>Hammam</p></div>';
								break;

							case 'Piscine':
								echo '<div class="service"><img alt="Piscine" src="http://15.188.4.60/wp-content/uploads/2019/07/piscine-blanc.png"><p>Piscine</p></div>';
								break;

							case 'Jacuzzi intérieur':
								echo '<div class="service"><img alt="Jacuzzi" src="http://15.188.4.60/wp-content/uploads/2019/07/jacuzzi-blanc.png"><p>Jacuzzi</p></div>';
								break;

							case 'Jacuzzi extérieur':
								echo '<div class="service"><img alt="Jacuzzi extérieur" src="http://15.188.4.60/wp-content/uploads/2019/07/jacuzzi-ext-blanc.png"><p>Jacuzzi extérieur</p></div>';
								break;

							case 'Local à ski':
								echo '<div class="service"><img alt="Local à ski" src="http://15.188.4.60/wp-content/uploads/2019/07/ski-blanc.png"><p>Local à ski</p></div>';
								break;

							case 'Salle de cinéma':
								echo '<div class="service"><img alt="Salle de cinéma" src="http://15.188.4.60/wp-content/uploads/2019/07/cine-blanc.png"><p>Salle de cinéma</p></div>';
								break;

							case 'Vue panoramique':
								echo '<div class="service"><img alt="Vue panoramique" src="http://15.188.4.60/wp-content/uploads/2019/07/panorama-blanc.png"><p>Vue panoramique</p></div>';
								break;

							default:
								echo '<div class="service"><img alt="Vue panoramique" src="http://15.188.4.60/wp-content/uploads/2019/07/vue.png"><p>Vue panoramique</p></div>';
								
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

		<div id="fixedBtnWrapper">

			<div id="btnContact" class="button-wrapper">
				<a href="">
					<span>CONTACTER L'AGENCE</span>
				</a>
			</div>			
		</div>
		<span id="flecheBtn">></span>

	</section>

</div><!-- #content -->


<?php get_footer(); ?>