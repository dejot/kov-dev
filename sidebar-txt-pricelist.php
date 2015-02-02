<?php 
/**
 * Sidebar Template
 *
 * If a `primary` widget area is active and has widgets, display the sidebar.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;
	
	if ( isset( $woo_options['woo_layout'] ) && ( $woo_options['woo_layout'] != 'layout-full' ) ) {
?>	
<div id="pricelist-bar" class="col-full">
	<?php if ( woo_active_sidebar( 'txt-pricelist' ) ) { ?>
		<?php woo_sidebar( 'txt-pricelist' ); ?>		             
	<?php } // End IF Statement ?>    
</div><!-- /#sidebar -->
<?php } // End IF Statement ?>