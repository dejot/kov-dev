<?php
/**
 * Template Name: KOV Kontakt Template 
 *
 * The archives page template displays a conprehensive archive of the current
 * content of your website on a single page. 
 *
 * @package WooFramework
 * @subpackage Template
 */
 
 global $woo_options; 
 get_header();
?> 
    <div id="content">
    
    	<div class="page col-full">
    		
			<section id="main" class="col-left">
				<article <?php post_class(); ?>>
				  
				    <section class="entry fix">
			            <?php
			            	if ( have_posts() ) { the_post();
			            		the_content();
			            	}
			            ?> 												  
					</section><!-- /.entry -->
				    			
				</article><!-- /.post -->  

				<?php

					$total = 4;
					if ( isset( $woo_options['woo_footer_sidebars'] ) && ( $woo_options['woo_footer_sidebars'] != '' ) ) {
						$total = $woo_options['woo_footer_sidebars'];
					}

					if ( ( woo_active_sidebar( 'footer-1' ) ||
						   woo_active_sidebar( 'footer-2' ) ||
						   woo_active_sidebar( 'footer-3' ) ||
						   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) {

				?>
					<section id="nav-widgets" class="col-<?php echo $total; ?> fix">
					
						<div class="col-full">

							<?php $i = 0; while ( $i < $total ) { $i++; ?>
								<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>
					
							<div class="block footer-widget-<?php echo $i; ?>">
					        	<?php woo_sidebar( 'footer-' . $i ); ?>
							</div>
					
						        <?php } ?>
							<?php } // End WHILE Loop ?>
						
						</div>

					</section><!-- /#footer-widgets  -->
				<?php } // End IF Statement ?>               
	                
	        </section><!-- /#main -->

	
	        <?php get_sidebar('kontakt'); ?>
		
		</div>  
    </div><!-- /#content -->
		
<?php get_footer('widget'); ?>
