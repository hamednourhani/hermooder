<?php get_header(); ?>
	
	<main class="site-main">
		
				<div class="banner-wrapper">
					
							<?php get_template_part('library/banner','maker'); ?>
						
				</div><!-- banner-wrapper -->
				
				<div class="site-content">
					<section class="layout">
						
						<div class="primary">
							
								
							<article class="hentry page404">
								
								<main class="article-body">
									<p><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'hermooder' ); ?></p>
									<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'hermooder' ); ?></p>
									<div><?php get_search_form( true ); ?></div>
								</main>
							</article>
											
						</div><!-- primary -->

						<div class="secondary">
							<?php get_sidebar(); ?>
						</div><!-- secondary -->
					</section>
				</div>
			
			
			<div class="site-content">
				<section class="layout">
					<div class="secondary">
						<?php get_sidebar(); ?>
					</div><!-- secondary -->
				</section>
			</div>

		
		
	</main>

<?php get_footer(); ?>