<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category WP Simple Calendar
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'wpsimplecalendar_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function wpsimplecalendar_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'wpsc_';

	$meta_boxes[] = array(
		'id'         => 'wpsimplecalendar_event_meta',
		'title'      => 'Détails de l\'évènement',
		'pages'      => array( 'events', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Début le:',
				'desc' => '',
				'id'   => $prefix . 'start_date',
				'type' => 'text_date',
			),
			array(
				'name' => 'Fin le:',
				'desc' => 'Leave blank for single day events',
				'id'   => $prefix . 'end_date',
				'type' => 'text_date',
			),
			array(
	            'name' => 'Commence à:',
	            'desc' => '',
	            'id'   => $prefix . 'start_time',
	            'type' => 'text_time',
	        ),
			array(
	            'name' => 'Fini à:',
	            'desc' => '',
	            'id'   => $prefix . 'end_time',
	            'type' => 'text_time',
	        ),
			array(
				'name' => 'Inscription URL',
				'desc' => 'Full URL including http://',
				'id'   => $prefix . 'url',
				'type' => 'text',
			),
			array(
				'name' => 'Texte lien',
				'desc' => 'For example: \'Click Here\' or \'For More Information\'',
				'id'   => $prefix . 'reg_text',
				'type' => 'text',
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}