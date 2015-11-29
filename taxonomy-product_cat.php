<?php get_header(); ?>
	
	<main class="site-main">
		
		
		<div class="site-content">
			<section class="layout">
				
				<div class="primary">

			
						<?php get_template_part('library/banner','maker'); ?>
				
					
					<?php if(have_posts()){ ?>
						<?php while(have_posts()) { the_post(); ?>
						
							<article class="hentry">
								<header class="article-title">
									<a href="<?php the_permalink(); ?>">
										<h3><?php the_title(); ?></h3>
									</a>
								</header>
								<main class="article-body">
									<section class="layout">
										<div class="featured-image single-image">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('post-thumb'); ?>
											</a>
										</div>
										<div class="excerpt">
											<?php the_excerpt(); ?>
										</div>
									</section>
									
									<?php get_template_part('library/post','meta'); ?>
								</main>
							</article>
						<?php } ?>
					<?php } ?>		
					<nav class="pagination">
						<?php hermooder_pagination(); ?>
					</nav>		
				</div><!-- primary -->

				<div class="secondary">
					<?php get_sidebar(); ?>
				</div><!-- secondary -->
			</section>
		</div>
		
	</main>

<?php get_footer(); ?>