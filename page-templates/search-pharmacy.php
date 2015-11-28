<?php
/**
 * Template Name: search nearest pharmacy
 *
 * 
 */
 get_header(); ?>
	<?php $ajax_pharmacy_nonce = wp_create_nonce("Hermooder_search_pharmacy_nonce"); ?>
	<main class="site-main">
		<div class="banner-wrapper">
			
				<?php get_template_part('library/banner','maker'); ?>
			
		</div><!-- banner-wrapper -->
		<?php if(have_posts()){ ?>
			<?php while(have_posts()) { the_post(); ?>
				<div class="site-content without-sidebar all-products">
					
						
						<div class="primary">
							<?php the_content(); ?>		
						</div><!-- primary -->

					
				</div>
			<?php }
		} ?>
	</main>
	
<?php get_footer(); ?>