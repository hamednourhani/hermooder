<?php get_header(); ?>
	
	<main class="site-main">
		<div class="banner-wrapper">
			
				<?php get_template_part('library/banner','maker'); ?>
			
		</div><!-- banner-wrapper -->
		
		<div class="site-content">
			<section class="layout">
				
				<div class="primary">
					<article>
						<?php echo get_search_form('true'); ?>
					</article>
					<?php if(have_posts()){ ?>
						<?php while(have_posts()) { the_post(); ?>
						
							<article class="hentry">
								
								<header class="article-title">
									<a href="<?php the_permalink(); ?>">
										<h3><?php the_title(); ?></h3>
									</a>
								</header>
				
								
								<main class="article-body">
									<div class="featured-image single-image">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									</div>
									<?php the_excerpt(); ?>
									
								</main>
							</article>
						<?php } ?>
					<?php } ?>		
					<nav class="pagination">
						<?php karait_pagination(); ?>
					</nav>		
				</div><!-- primary -->
				
				<div class="secondary">
					<?php get_sidebar(); ?>
				</div><!-- secondary -->
				
				
			</section>
		</div>
		
	</main>

<?php get_footer(); ?>