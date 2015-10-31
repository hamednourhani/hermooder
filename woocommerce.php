<?php get_header(); ?>
	
	<main class="site-main">
					
				
				<div class="site-content">
					<section class="layout">
						
						<div class="primary">
					
							<?php woocommerce_content(); ?>		
						</div><!-- primary -->
						
						<div class="secondary">
							<?php get_sidebar(); ?>
						</div><!-- secondary -->

					</section>
				</div>
			

				
	</main>

<?php get_footer(); ?>