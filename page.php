<?php
/**
 * Page Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>
       
    <div id="content">
    	<div class="page col-full">
    	
    		<?php if ( isset( $woo_options['woo_breadcrumbs_show'] ) && $woo_options['woo_breadcrumbs_show'] == 'true' && !is_front_page() ) { ?>
				<section id="breadcrumbs">
					<?php woo_breadcrumbs(); ?>
				</section><!--/#breadcrumbs -->
			<?php } ?> 
			
				


    	
			<section id="main" class="col-left"> 			
			<?php
				
				if ( has_post_thumbnail() ) {
				
					echo '<div class="post-image margin-bottom-20"><div class="img-holder">';	the_post_thumbnail(); echo '</div></div>';

				}
				else {
						echo '<div class="post-image margin-bottom-20"><div class="img-holder"><img src="http://lorempixel.com/900/350/" /></div></div>';						
				}
			?>	        
			<?php
	        	if ( have_posts() ) { $count = 0;
	        		while ( have_posts() ) { the_post(); $count++;
	        ?>                                                           
	            <article <?php post_class(); ?>>
					
					
	                <section class="entry">
	                	<?php the_content(); ?>
	
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
	               	</section><!-- /.entry -->
	
					<?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
	                
	            </article><!-- /.post -->
	            
	            <?php
	            	// Determine wether or not to display comments here, based on "Theme Options".
	            	if ( isset( $woo_options['woo_comments'] ) && in_array( $woo_options['woo_comments'], array( 'page', 'both' ) ) ) {
	            		comments_template();
	            	}
	
					} // End WHILE Loop
				} else {
			?>
				<article <?php post_class(); ?>>
	            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
	            </article><!-- /.post -->
	        <?php } // End IF Statement ?>  
	        
			</section><!-- /#main -->
	
	        <?php get_sidebar(); ?>
		</div>
    </div><!-- /#content -->
		
<?php get_footer(); ?>