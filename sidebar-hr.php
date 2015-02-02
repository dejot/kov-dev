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
<aside id="sidebar" class="col-right">
	<?php if ( woo_active_sidebar( 'hr-services' ) ) { ?>
    <div class="primary">
		<?php woo_sidebar( 'hr-services' ); ?>		           
	</div>        
	<?php } // End IF Statement ?>    
</aside><!-- /#sidebar -->
<?php } // End IF Statement ?>