<?php
/**
 * Plugin Name: Gestion Chalets
 * Description: Ce plugin ajoute des custom Post Type spécifiques à la gestion des chalets pour la vente et la location. Il ajoute également les templates des ces CPT pour un affichage personnalisé.
 * Author: Grégory Barile
 * Version: 0.1
 */
//**********************CUSTOM POST TYPE *********************************************

//Chalets à vendre-------------------------------

function wpm_custom_post_type() {

	// Dénominations affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Chalets à vendre', 'Post Type General Name', 'OceanWP'),
		// Le nom au singulier
		'singular_name'       => _x( 'Chalet à vendre', 'Post Type Singular Name', 'OceanWP'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Chalets Vente', 'OceanWP'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Tous les chalets à vendre', 'OceanWP'),
		'view_item'           => __( 'Voir les chalets à vendre', 'OceanWP'),
		'add_new_item'        => __( 'Ajouter un nouveau chalet à vendre', 'OceanWP'),
		'add_new'             => __( 'Ajouter', 'OceanWP'),
		'edit_item'           => __( 'Editer le chalet à vendre', 'OceanWP'),
		'update_item'         => __( 'Modifier le chalet à vendre', 'OceanWP'),
		'search_items'        => __( 'Rechercher un chalet à vendre', 'OceanWP'),
		'not_found'           => __( 'Non trouvé', 'OceanWP'),
		'not_found_in_trash'  => __( 'Non trouvé dans la corbeille', 'OceanWP'),
	);
	
	// Autres options pour chalet à vendre
	
	$args = array(
		'label'               => __( 'Chalets à vendre', 'OceanWP'),
		'description'         => __( 'Tous les chalets à vendre', 'OceanWP'),
		'labels'              => $labels,
        'menu_icon'           => 'dashicons-admin-multisite',
		'supports'            => array( 'title', ),
		
		//Options supplémentaires
		
		'show_in_rest' 		  => true,
		'hierarchical'        => false,
		'show_ui' 			  => true, 
		'show_in_menu' 		  => true, 
		'show_in_nav_menus'	  => true,
		'show_in_admin_bar'   => true, 
		'menu_position' 	  => 6, 
		'can_export' 		  => true,
		'exclude_from_search' => false,
    	'publicly_queryable'  => true,
    	'capability_type' 	  => 'post',
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'chalets-vente'),

	);
	
	// Enregistrement CPT et arguments
	register_post_type( 'chalets_vente', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );


function prefix_gallery_metabox( $types ) {
    $types[] = 'chalets_vente';
    return $types;
}
add_filter( 'ocean_gallery_metabox_post_types', 'prefix_gallery_metabox' );


//Chalets à louer-------------------------------

function wpn_custom_post_type() {

	// Dénominations affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Chalets à louer', 'Post Type General Name', 'OceanWP'),
		// Le nom au singulier
		'singular_name'       => _x( 'Chalet à louer', 'Post Type Singular Name', 'OceanWP'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Chalets Location', 'OceanWP'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Tous les chalets à louer', 'OceanWP'),
		'view_item'           => __( 'Voir les chalets à louer', 'OceanWP'),
		'add_new_item'        => __( 'Ajouter un nouveau chalet à louer', 'OceanWP'),
		'add_new'             => __( 'Ajouter', 'OceanWP'),
		'edit_item'           => __( 'Editer le chalet à louer', 'OceanWP'),
		'update_item'         => __( 'Modifier le chalet à louer', 'OceanWP'),
		'search_items'        => __( 'Rechercher un chalet à louer', 'OceanWP'),
		'not_found'           => __( 'Non trouvé', 'OceanWP'),
		'not_found_in_trash'  => __( 'Non trouvé dans la corbeille', 'OceanWP'),
	);
	
	// Autres options pour chalet à vendre
	
	$args = array(
		'label'               => __( 'Chalets à louer', 'OceanWP'),
		'description'         => __( 'Tous les chalets à louer', 'OceanWP'),
		'labels'              => $labels,
        'menu_icon'           => 'dashicons-admin-multisite',
		'supports'            => array( 'title', ),
		
		//Options supplémentaires
		
		'show_in_rest' 		  => true,
		'hierarchical'        => false,
		'show_ui' 			  => true, 
		'show_in_menu' 		  => true, 
		'show_in_nav_menus'	  => true,
		'show_in_admin_bar'   => true, 
		'menu_position' 	  => 7, 
		'can_export' 		  => true,
		'exclude_from_search' => false,
    	'publicly_queryable'  => true,
    	'capability_type' 	  => 'post',
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'chalets-location'),

	);
	
	// Enregistrement CPT et arguments
	register_post_type( 'chalets_location', $args );

}

add_action( 'init', 'wpn_custom_post_type', 0 );


function prefix_gallery_metabox2( $types ) {
    $types[] = 'chalets_location';
    return $types;
}
add_filter( 'ocean_gallery_metabox_post_types', 'prefix_gallery_metabox2' );

//**********************TEMPLATES *********************************************

//Chalets à vendre-------------------------------

function enqueue_css_chalet(){
    wp_enqueue_style( 'styles_chalets', plugins_url( 'styles/styles_chalets.css', __FILE__ ));
}

function enqueue_js_chalet(){
    wp_enqueue_script( 'js-chalet', plugins_url( 'js/js-chalet.js', __FILE__ ),array(), false, true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_css_chalet');
add_action( 'wp_enqueue_scripts', 'enqueue_js_chalet');

//Supprime la metabox "attributs"
function hide_meta_box_attributes( $hidden, $screen) {

    $hidden[] = 'pageparentdiv';
    return $hidden;

} 
add_filter('hidden_meta_boxes', 'hide_meta_box_attributes', 10, 2);


function load_chalets_vente_template( $single_template ) {
    global $post;

    if ( 'chalets_vente' === $post->post_type ) {
        $single_template = dirname( __FILE__ ) . '/templates/single-chalets_vente.php';
    }

    return $single_template;

}

add_filter( 'single_template', 'load_chalets_vente_template' );

//Chalets à louer-------------------------------

function load_chalets_location_template( $single_template ) {
    global $post;

    if ( 'chalets_location' === $post->post_type ) {
        $single_template = dirname( __FILE__ ) . '/templates/single-chalets_location.php';
    }

    return $single_template;

}

add_filter( 'single_template', 'load_chalets_location_template' );



