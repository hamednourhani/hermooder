<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the hermooder directory)
 *
 * Be sure to replace all instances of 'hermooder_' with your pharmacy's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_hermooder
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/hermooder
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}


function ed_metabox_include_front_page( $display, $meta_box ) {
    if ( ! isset( $meta_box['show_on']['key'] ) ) {
        return $display;
    }

    if ( 'front-page' !== $meta_box['show_on']['key'] ) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    if ( ! $post_id ) {
        return !$display;
    }

    // Get ID of page set as front page, 0 if there isn't one
    $front_page = get_option( 'page_on_front' );

    // there is a front page set and we're on it!
    return $post_id == $front_page;
}
//add_filter( 'cmb2_show_on', 'ed_metabox_include_front_page', 10, 2 );
/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' hermooder_box parameter
 *
 * @param  hermooder object $cmb hermooder object
 *
 * @return bool             True if metabox should show
 */
function hermooder_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  hermooder_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function hermooder_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  hermooder_Field object $field      Field object
 */
function hermooder_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}








/******************************************************************/
/*--------------------Product Features-------------------------------*/
/******************************************************************/
//  add_action( 'cmb2_init', 'hermooder_register_product_features_metabox' );
// function hermooder_register_product_features_metabox() {

// 	$prefix = '_hermooder_';

// 	/**
// 	 * Sample metabox to demonstrate each field type included
// 	 */
// 	$cmb_demo = new_cmb2_box( array(
// 		'id'            => $prefix . 'prodct_features',
// 		'title'         => __( 'Product Features', 'hermooder' ),
// 		'object_types'  => array( 'pharmacy' ), // Post type
		
// 	) );


	
// 	$cmb_demo->add_field( array(
// 		'name'         => __( 'address', 'hermooder' ),
// 		'desc'         => __( 'Enter pharmacy address', 'hermooder' ),
// 		'id'           => $prefix . 'address',
// 		'type'         => 'text',
		
// 	) );

	
// }
/******************************************************************/
/*--------------------Pharmacy-------------------------------*/
/******************************************************************/
add_action( 'cmb2_init', 'hermooder_register_pharmacy_images_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function hermooder_register_pharmacy_images_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_hermooder_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'pharmacy_information',
		'title'         => __( 'pharmacy Information', 'hermooder' ),
		'object_types'  => array( 'pharmacy' ), // Post type
		// 'show_on_cb' => 'hermooder_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );


	
	$cmb_demo->add_field( array(
		'name'         => __( 'address', 'hermooder' ),
		'desc'         => __( 'Enter pharmacy address', 'hermooder' ),
		'id'           => $prefix . 'address',
		'type'         => 'text',
		
	) );

	$cmb_demo->add_field( array(
		'name'         => __( 'Latitude', 'hermooder' ),
		'desc'         => __( 'Enter address Latitude', 'hermooder' ),
		'id'           => $prefix . 'Latitude',
		'type'         => 'text',
		
	) );
	
	$cmb_demo->add_field( array(
		'name'         => __( 'Longitude', 'hermooder' ),
		'desc'         => __( 'Enter address Longitude', 'hermooder' ),
		'id'           => $prefix . 'Longitude',
		'type'         => 'text',
		
	) );

	

	$cmb_demo->add_field( array(
		'name'         => __( 'email', 'hermooder' ),
		'desc'         => __( 'Enter pharmacy email address', 'hermooder' ),
		'id'           => $prefix . 'email',
		'type'         => 'text',
		
	) );

	$cmb_demo->add_field( array(
		'name'         => __( 'phone', 'hermooder' ),
		'desc'         => __( 'Enter pharmacy phone', 'hermooder' ),
		'id'           => $prefix . 'phone',
		'type'         => 'text',
		
	) );

	

}


/******************************************************************/
/*--------------------Page Banner -------------------------------*/
/******************************************************************/

add_action('cmb2_init','hermooder_register_page_banner_metabox');
// add_action('cmb2_init','hermooder_register_tour_information_metabox');
function hermooder_register_page_banner_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_hermooder_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'page_banner',
		'title'         => __( 'Page Banner', 'hermooder' ),
		'object_types'  => array( 'post','page','product'), // Post type
		// 'show_on_cb' => 'hermooder_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	

	$cmb_demo->add_field( array(
		'name'       => __( 'Banner', 'hermooder' ),
		'desc'       => __( 'Choose Banner Mod, SlideShow , Image Banner or Nothing', 'hermooder' ),
		'id'         => $prefix . 'banner_mod',
		'type'       => 'radio_inline',
		'show_option_none' => true,
		'options'          => array(
			'slider' => __( 'Slider', 'hermooder' ),
			'image' => __( 'Image', 'hermooder' ),
			
		),	
		
		//'show_on_cb' => 'hermooder_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	
	$cmb_demo->add_field( array(
		'name'       => __( 'Slider Shortcode', 'hermooder' ),
		'desc'       => __( 'write this page Revolotion Slider shortcode with alis name here', 'hermooder' ),
		'id'         => $prefix . 'slider_shortcode',
		'type'       => 'text',
	
	) );

	$cmb_demo->add_field( array(
		'name'       => __( 'Banner Image', 'hermooder' ),
		'desc'       => __( 'Upload an image to show as the banner', 'hermooder' ),
		'id'         => $prefix . 'image',
		'type'       => 'file',
	
	) );

	$cmb_demo->add_field( array(
		'name'       => __( 'Page Title', 'hermooder' ),
		'desc'       => __( 'show Page Title or Not?', 'hermooder' ),
		'id'         => $prefix . 'title',
		'type'       => 'radio_inline',
		'options'          => array(
			'yes' => __( 'Yes', 'hermooder' ),
			'no' => __( 'No', 'hermooder' ),
			
		),
		'default' => 'yes',
	
	) );

	
	
}


