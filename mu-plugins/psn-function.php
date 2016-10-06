<?php
/*
Plugin Name: Fonctions WordPress
Description: L'ensemble des fonctions globales du site.
Version: 0.1
License: No fucking licence
Author: LePoleS
Author URI: https://www.lepoles.org/
*/
/* ------------------- Fonction permettant de customiser les extraits ---------------------- */
	function excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		} else {
			$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	}

	/* ------------------- Fonction initialise Query Post ---------------------- */
	function query_post_type($query) {
		if( is_category() ) {
			$post_type = get_query_var('post_type');
			if($post_type)
				$post_type = $post_type;
			else
				$post_type = array('nav_menu_item'); // don't forget nav_menu_item to allow menus to work!
			$query->set('post_type',$post_type);
			return $query;
		}
	}
	add_filter('pre_get_posts', 'query_post_type');
	
	/* ------------------- Fonction permettant de créer un Custom Post(Ressources) ---------------------- */
	function ressource_init() {
		$labels = array(
			'name'					=>	__('Ressources', 'uep'),
			'menu_name'          	=> 	__('Ressources', 'uep' ),
			'singular_name'			=>	__('Ressources', 'uep'),
			'add_new_item'			=>	__('Ajouter une Ressource', 'uep'),
			'all_items'				=>	__('Toutes les Ressources', 'uep'),
			'edit_item'				=>	__('Modifier la Ressources', 'uep'),
			'new_item'				=>	__('Nouvelle Ressource', 'uep'),
			'view_item'				=>	__('Voir Ressources', 'uep'),
			'not_found'				=>	__('Aucune Ressource trouvé', 'uep'),
			'not_found_in_trash'	=>	__('Aucune Ressource trouvée dans la corbeille', 'uep')
		);

		register_post_type('ressources', array(
			'slug' => 'ressources',
			'public' => true,
			'labels' => $labels,
			'menu_position' => 7,
			'capability_type' => 'post',// Utilise les mêmes permissions que pour les articles
			'taxonomies' => array( 'category', 'post_tag' ),
			'supports' => array('title','editor','author','category','comments','thumbnail')
		));
	}
	add_action( 'init', 'ressource_init' );
	
	/* ------------------- Fonction permettant de créer un Custom Post(Partenaires) ---------------------- */
	function partners() {
		$labels = array(
			'name'                  =>  __('Partenaires', 'uep'),
			'singular_name'         =>  __('Partenaire', 'uep'),
			'add_new_item'          =>  __('Ajouter un Partennaire', 'uep'),
			'all_items'             =>  __('Tous les Partenaires', 'uep'),
			'edit_item'             =>  __('Modifier le Partenaire', 'uep'),
			'new_item'              =>  __('Nouveau Partenaires', 'uep'),
			'view_item'             =>  __('Voir Partenaires', 'uep'),
			'not_found'             =>  __('Aucun Parternaires trouvé', 'uep'),
			'not_found_in_trash'    =>  __('Aucun Partenaires trouvé dans la corbeille', 'uep')
		);

		register_post_type('partners', array(
			'slug' => 'partners',
			'public' => true,
			'labels' => $labels,
			'menu_position' => 8,
			'capability_type' => 'post',// Utilise les mêmes permissions que pour les articles
            'exclude_from_search' => true, //Exclus les partenaires
			'supports' => array('title', 'thumbnail'),// Definit les fonctionnalitées supporter par le plugin
		));
	}
	add_action( 'init', 'partners' );
	
	// Ajoute les Metabox pour partenaire
	function add_custom_meta_box(){
		add_meta_box("demo-meta-box", "Raison Sociale du Partenaire", "custom_meta_box_markup", "partners", "advanced", "high", null);
		add_meta_box("demo-meta-boxTer", "Information sur le partenaire", "custom_meta_box_markupTer", "partners", "advanced", "high", null);
		add_meta_box("demo-meta-boxBis", "Région d'exercice du Partenaire", "custom_meta_box_markupBis", "partners", "advanced", "high", null);
		add_meta_box("demo-meta-boxQuad", "Contact du Partenaire", "custom_meta_box_markupQuad", "partners", "advanced", "high", null);
	}
	add_action("add_meta_boxes", "add_custom_meta_box");


	// Ajoute la Metabox Raison sociale
	function custom_meta_box_markup($object){
		wp_nonce_field(basename(__FILE__), "meta-box-nonce");

		?>
			<div>
				<label for="meta-box-text">Raison Sociale du Partenaire  :&nbsp;</label><br>
				<input name="meta-box-text" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-text", true); ?>" placeholder="Raison Sociale de la personne / Raison sociale de la structure" style="width:450px;" required autofocus>*
				<br>			
			</div>
		<?php  
	}

	function save_raison_sociale_meta_box($post_id, $post, $update){
		if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
			return $post_id;

		if(!current_user_can("edit_post", $post_id))
			return $post_id;

		if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
			return $post_id;
			$slug = "partners";
		
		if($slug != $post->post_type)
			return $post_id;

		$meta_box_text_value = "";
		$meta_box_dropdown_value = "";
		$meta_box_checkbox_value = "";

		if(isset($_POST["meta-box-text"])){
			$meta_box_text_value = $_POST["meta-box-text"];
		}   
		update_post_meta($post_id, "meta-box-text", $meta_box_text_value);

		if(isset($_POST["meta-box-textBis"])){
			$meta_box_dropdown_value = $_POST["meta-box-textBis"];
		}   
		update_post_meta($post_id, "meta-box-textBis", $meta_box_dropdown_value);
	}
	add_action("save_post", "save_raison_sociale_meta_box", 10, 3);

	// Ajoute la Metabox Région
	function custom_meta_box_markupBis($object){
		wp_nonce_field(basename(__FILE__), "meta-box-nonceBis");

		?>
			<div>
				<label for="meta-box-dropdown">Region du Partenaire :</label><br>

				<select name="meta-box-dropdown" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-textBisBis", true); ?>">
					<option value="Séléctionner Une Région">Séléctionner Un Département</option>
					<option value='Ain'>01 - Ain</option> 
					<option value='Aisne'>02 - Aisne</option>
					<option value='Allier'>03 - Allier</option>
					<option value='Alpes de Haute Provence'>04 - Alpes de Haute Provence</option>
					<option value='Alpes (Hautes)'>05 - Alpes (Hautes)</option>
					<option value='Alpes Maritimes'>06 - Alpes Maritimes</option>
					<option value='Ardèche'>07 - Ard&egrave;che</option>
					<option value='Ardennes'>08 - Ardennes</option>
					<option value='Ariège'>09 - Ari&egrave;ge</option>
					<option value='Aube'>10 - Aube</option>
					<option value='Aude'>11 - Aude</option>
					<option value='Aveyron'>12 - Aveyron</option>
					<option value='Bouches du Rhône'>13 - Bouches du Rh&ocirc;ne</option>
					<option value='Calvados'>14 - Calvados</option>
					<option value='Cantal'>15 - Cantal</option>
					<option value='Charente'>16 - Charente</option>
					<option value='Charente Maritime'>17 - Charente Maritime</option>
					<option value='Cher'>18 - Cher</option>
					<option value='Corrèze'>19 - Corr&egrave;ze</option>
					<option value='Corse'>20 - Corse</option>
					<option value="Côte d'Or">21 - C&ocirc;te d&acute;Or</option>
					<option value="Côtes d'Armor">22 - C&ocirc;tes d&acute;Armor</option>
					<option value='Creuse'>23 - Creuse</option>
					<option value='Dordogne'>24 - Dordogne</option>
					<option value='Doubs'>25 - Doubs</option>
					<option value='Drôme'>26 - Dr&ocirc;me</option>
					<option value='Eure'>27 - Eure</option>
					<option value='Eure et Loire'>28 - Eure et Loire</option>
					<option value='Finistère'>29 - Finist&egrave;re</option>
					<option value='Gard'>30 - Gard</option>
					<option value='Garonne (Haute)'>31 - Garonne (Haute)</option>
					<option value='Gers'>32 - Gers</option>
					<option value='Gironde'>33 - Gironde</option>
					<option value='Hérault'>34 - H&eacute;rault</option>
					<option value='Ille et Vilaine'>35 - Ille et Vilaine</option>
					<option value='Indre'>36 - Indre</option>
					<option value='Indre et Loire'>37 - Indre et Loire</option>
					<option value='Isère'>38 - Is&egrave;re</option>
					<option value='Jura'>39 - Jura</option>
					<option value='Landes'>40 - Landes</option>
					<option value='Loire et Cher'>41 - Loire et Cher</option>
					<option value='Loire'>42 - Loire</option>
					<option value='Loire (Haute)'>43 - Loire (Haute)</option>
					<option value='Loire Atlantique'>44 - Loire Atlantique</option>
					<option value='Loiret'>45 - Loiret</option>
					<option value='Lot'>46 - Lot</option>
					<option value='Lot et Garonne'>47 - Lot et Garonne</option>
					<option value='Lozère'>48 - Loz&egrave;re</option>
					<option value='Maine et Loire'>49 - Maine et Loire</option>
					<option value='Manche'>50 - Manche</option>
					<option value='Marne'>51 - Marne</option>
					<option value='Marne (Haute)'>52 - Marne (Haute)</option>
					<option value='Mayenne'>53 - Mayenne</option>
					<option value='Meurthe et Moselle'>54 - Meurthe et Moselle</option>
					<option value='Meuse'>55 - Meuse</option>
					<option value='Morbihan'>56 - Morbihan</option>
					<option value='Moselle'>57 - Moselle</option>
					<option value='Nièvre'>58 - Ni&egrave;vre</option>
					<option value='Nord'>59 - Nord</option>
					<option value='Oise'>60 - Oise</option>
					<option value='Orne'>61 - Orne</option>
					<option value='Pas de Calais'>62 - Pas de Calais</option>
					<option value='Puy de Dôme'>63 - Puy de D&ocirc;me</option>
					<option value='Pyrénées Atlantiques'>64 - Pyr&eacute;n&eacute;es Atlantiques</option>
					<option value='Pyrénées (Hautes)'>65 - Pyr&eacute;n&eacute;es (Hautes)</option>
					<option value='Pyrénées Orientales'>66 - Pyr&eacute;n&eacute;es Orientales</option>
					<option value='Rhin (Bas)'>67 - Rhin (Bas)</option>
					<option value='Rhin (Haut)'>68 - Rhin (Haut)</option>
					<option value='Rhône'>69 - Rh&ocirc;ne</option>
					<option value='Saône (Hautes)'>70 - Sa&ocirc;ne (Haute)</option>
					<option value='Saône et Loire'>71 - Sa&ocirc;ne et Loire</option>
					<option value='Sarthe'>72 - Sarthe</option>
					<option value='Savoie'>73 - Savoie</option>
					<option value='Savoie (Haute)'>74 - Savoie (Haute)</option>
					<option value='Paris'>75 - Paris (Dept.)</option>
					<option value='Seine Maritime'>76 - Seine Maritime</option>
					<option value='Seine et Marne'>77 - Seine et Marne</option>
					<option value='Yvelines'>78 - Yvelines</option>
					<option value='Sèvres'>79 - S&egrave;vres (Deux)</option>
					<option value='Somme'>80 - Somme</option>
					<option value='Tarn'>81 - Tarn</option>
					<option value='Tarn et Garonne'>82 - Tarn et Garonne</option>
					<option value='Var'>83 - Var</option>1
					<option value='Vaucluse'>84 - Vaucluse</option>
					<option value='Vendée'>85 - Vend&eacute;e</option>
					<option value='Vienne'>86 - Vienne</option>
					<option value='Vienne (Haute)'>87 - Vienne (Haute)</option>
					<option value='Vosges'>88 - Vosges</option>
					<option value='Yonne'>89 - Yonne</option>
					<option value='Belfort (Territoire de)'>90 - Belfort (Territoire de)</option>
					<option value='Essonne'>91 - Essonne</option>
					<option value='Hauts de Seine'>92 - Hauts de Seine</option>
					<option value='Seine Saint Denis'>93 - Seine Saint Denis</option>
					<option value='Val de Marne'>94 - Val de Marne</option>
					<option value="Val d'Oise">95 - Val d&acute;Oise</option>
					<option value='Guadeloupe'>97 1 - Guadeloupe</option>
					<option value='Martinique'>97 2 - Martinique</option>
					<option value='Guyane'>97 3 - Guyane</option>
					<option value='Réunion'>97 4 - R&eacute;union</option>
					<option value='Mayotte'>98 - Mayotte</option>
				</select>
				<br>			
			</div>
<?php
	}

	function save_region_meta_box($post_id, $post, $update){
		if (!isset($_POST["meta-box-nonceBis"]) || !wp_verify_nonce($_POST["meta-box-nonceBis"], basename(__FILE__)))
			return $post_id;

		if(!current_user_can("edit_post", $post_id))
			return $post_id;

		if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
			return $post_id;
			$slug = "partners";
			
		if($slug != $post->post_type)
			return $post_id;
			$meta_box_text_value = "";

		if(isset($_POST["meta-box-dropdown"])  && $_POST["meta-box-dropdown"] !== 'Séléctionner Une Région'){
			$meta_box_text_value = $_POST["meta-box-dropdown"];
		}   
		update_post_meta($post_id, "meta-box-dropdown", $meta_box_text_value);
	}
	add_action("save_post", "save_region_meta_box", 10, 3);

	// Ajoute la Metabox Activité
	function custom_meta_box_markupTer($object){
		wp_nonce_field(basename(__FILE__), "meta-box-nonceTer");
?>
			<div>
				<label for="meta-box-textTer">Activité du Partenaire :</label><br>
				<input name="meta-box-textTer" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-textTer", true); ?>" placeholder="Emploi du Partenaire / Secteur d'activité de la Structure" style="width:450px;" required>*
				<br>			
			</div>
<?php  
	}
	function save_activite_meta_box($post_id, $post, $update){
		if (!isset($_POST["meta-box-nonceTer"]) || !wp_verify_nonce($_POST["meta-box-nonceTer"], basename(__FILE__)))
			return $post_id;

		if(!current_user_can("edit_post", $post_id))
			return $post_id;

		if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
			return $post_id;

		$slug = "partners";
		if($slug != $post->post_type)
			return $post_id;
			$meta_box_text_value = "";

		if(isset($_POST["meta-box-textTer"])){
			$meta_box_text_value = $_POST["meta-box-textTer"];
		}   
		update_post_meta($post_id, "meta-box-textTer", $meta_box_text_value);
	}
	add_action("save_post", "save_activite_meta_box", 10, 3);

	// Ajoute la Metabox Contact
	function custom_meta_box_markupQuad($object){
		wp_nonce_field(basename(__FILE__), "meta-box-nonceQuad");
?>
			<div>
				<label for="meta-box-textQuad">Contact du Partenaire :</label><br>
				<input name="meta-box-textQuad" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-textQuad", true); ?>" placeholder="Contact du Partenaire / Contact de la Structure" style="width:450px;">
				<br>				
			</div>
<?php
	}
function save_contact_meta_box($post_id, $post, $update)
	{
		if (!isset($_POST["meta-box-nonceQuad"]) || !wp_verify_nonce($_POST["meta-box-nonceQuad"], basename(__FILE__)))
			return $post_id;

		if(!current_user_can("edit_post", $post_id))
			return $post_id;

		if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
			return $post_id;

		$slug = "partners";
		if($slug != $post->post_type)
			return $post_id;
			$meta_box_text_value = "";

		if(isset($_POST["meta-box-textQuad"])){
			$meta_box_text_value = $_POST["meta-box-textQuad"];
		}   
		update_post_meta($post_id, "meta-box-textQuad", $meta_box_text_value);
	}	
	add_action("save_post", "save_contact_meta_box", 10, 3);
	
	// Ajout des termes dans les classes CSS des éléments du Events
	function events_class( $classes, $class, $ID ) {
		$taxonomy = 'category';
		$terms = get_the_terms( (int) $ID, $taxonomy );
		if( !empty( $terms ) ) {
			foreach( (array) $terms as $order => $term ) {
				if( !in_array( $term->slug, $classes ) ) {
					$classes[] = $term->slug;
				}
			}
		}
		return $classes;
	}
	add_filter('post_class', 'events_class', 10, 3);
	
	// Ajout du JavaScript isotope sur le Events
	function isotope_js() {
		if (!is_admin() && is_post_type_archive('type')) {
			isotope();
		}
	}
	add_action ('wp_footer', 'isotope_js');


/* ------------------- Fonction permettant de créer une AUTO COMPLETE ---------------------- */
function auto_search(){
    global $wpdb;
    // the query
    $args = array('posts_per_page' => 100, 'order'=> 'ASC', 'orderby' => 'date');
    $the_query = new WP_Query( $args );

    echo "<script type='text/javascript'>var availableTags = [";
    $url_pattern = '/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/';
    $url_replace = ' ';
    if ( $the_query->have_posts() ) : ?>
        <?php $completion = '';
        while ( $the_query->have_posts() ) : $the_query->the_post(); 
            $post_id =  get_the_ID();;
            $sqlTitleContent = 'SELECT post_content, post_title
                                FROM  wp_posts 
                                WHERE  ID ="'.$post_id.'"';
                                
            $result = $wpdb->get_results($sqlTitleContent);
    
            $completion .= strip_tags(strtolower($result[0]->post_title));
            $completion .= strip_tags(strtolower($result[0]->post_content));
            $completion = preg_replace('@<a[^>]*?>.*?</a>@si', '', $completion);
        endwhile;
            $completionFormat = str_replace( array( '?', ',', '.', ':', '!', '"','/>','&nbsp;'), ' ', $completion );    
            $completion = str_replace( array('É'), 'é', $completionFormat );
            $completionFormat = str_replace(array("\r\n", "\r", "\n"), "<br />", $completion);
            $tablComplet = explode(" ", $completionFormat);
            $cleanTab = array_unique($tablComplet);
       
         
        $tablComplet = [];  
    
      
        for( $i=0; $i<count($cleanTab); $i++ ){
            
            if(isset($cleanTab[$i]) && !preg_match("/[0-9]{1,2}$/", $cleanTab[$i]) && strlen($cleanTab[$i]) > 3 ){
                echo '"'.rtrim(strtolower($cleanTab[$i])).'",';
         
            }
        }
        wp_reset_postdata();
    else : endif; 
            echo "];console.table(availableTags);";
            echo "jQuery('#s').autocomplete({source:availableTags});";
            echo "jQuery('#s01').autocomplete({source:availableTags});";
            echo "</script>";

}
add_action( 'wp_footer', 'auto_search' );
?>