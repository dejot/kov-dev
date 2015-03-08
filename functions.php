<?php

/*
Add any custom functions to your child theme here
*/
$functions_path = get_template_directory() . '/functions/';
require_once ($functions_path . 'admin-init.php' );			// Framework Init
/**
 * Darko Jergovic // darko@dejot.ch // www.dejot.ch
 */
function whitelight_child_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Droid or Lora Serif translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$droid = _x( 'on', 'Droid Serif font: on or off', 'whitelight_child' );
	$lora = _x( 'on', 'Lora font: on or off', 'whitelight_child' );

	if ( 'off' !== $droid || 'off' !== $lora ) {
		$font_families = array();

		if ( 'off' !== $droid )
			$font_families[] = 'Droid Serif:400,700,400italic,700italic';

		if ( 'off' !== $lora )
			$font_families[] = 'Lora:400,700,400italic';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Richtige Art und Weise Scripts und Styles einzubinden // Proper way to enqueue scripts and styles
 */
function whitelight_child_scripts() {
    // Google Fonts hinzufügen, unbedingt vor den Stylesheets
    wp_enqueue_style( 'whitelight_child_fonts', whitelight_child_fonts_url(), array(), null );

    // Custom Stylesheets hinzufügen
	wp_enqueue_style( 'custom', get_stylesheet_uri() );
	//wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}



/*-----------------------------------------------------------------------------------*/
/* 29. Quote 2 - quote2
/*-----------------------------------------------------------------------------------*/
/*

Optional arguments:
 - style: boxed
 - float: left, right

*/
function woo_shortcode_quote_kov($atts, $content = null) {
   	extract(shortcode_atts(array(	'style' => '',
   									'float' => ''), $atts));
   $class = '';
   if ( $style )
   		$class .= ' '.$style;
   if ( $float )
   		$class .= ' '.$float;

   return '<div class="woo-sc-quote' . esc_attr( $class ) . '"><p><span class="quotation_wrap">' . woo_remove_wpautop($content) . '</span></p></div>';
} // End woo_shortcode_quote()



/*   Alle hier definierten skripte und funktionen ausführen, sonst läuft nichts!    */
add_action( 'wp_enqueue_scripts', 'whitelight_child_scripts' );
add_shortcode( 'quote_kov', 'woo_shortcode_quote_kov' );

function register_scripts() {
	if ( !is_admin() ) {
                // include your script
		wp_enqueue_script( 'app', get_bloginfo( 'template_url' ) . '-child/scripts/app.js' );
	}
}

add_action( 'wp_enqueue_scripts', 'register_scripts' );
    
?>