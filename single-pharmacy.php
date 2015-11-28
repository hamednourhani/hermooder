<?php get_header(); ?>
	
	<main class="site-main">
		<?php if(have_posts()){ ?>
			<?php while(have_posts()) { the_post(); ?>

				
				
				<div class="site-content">
					<section class="layout">
						
						<div class="primary">

						
								<?php get_template_part('library/banner','maker'); ?>
							
							
								
							<article class="hentry">
									<header class="article-title">
										<a href="<?php the_permalink(); ?>">
											<h3><?php the_title(); ?></h3>
										</a>
									</header>
								<main class="article-body">
									<ul class="pharmacy-information-list">
										<li class="pharmacy-address"><i class="fa fa-map-marker"></i><?php echo __(' Address : ','hermooder').get_post_meta(get_the_ID(), '_hermooder_address', 1); ?></li>
										<li class="pharmacy-phone"><i class="fa fa-phone"></i><?php echo __(' Phone : ','hermooder').get_post_meta(get_the_ID(), '_hermooder_phone', 1); ?></li>
										<li class="pharmacy-email"><i class="fa fa-envelope"></i><?php echo __(' Email : ','hermooder').get_post_meta(get_the_ID(), '_hermooder_email', 1); ?></li>
									</ul>

									<?php the_content(); ?>
									
									<!-- comments template -->
									
										<!-- <div class="comment-area">
											<?php //comments_template(); ?>	
										</div> -->
									
								</main>
							</article>
											
						</div><!-- primary -->

						<div class="secondary">
							<?php get_sidebar(); ?>
						</div><!-- secondary -->
					</section>
				</div>
			<?php } ?>

		<?php } else { ?>	
			
			<div class="site-content">
				<section class="layout">
					<div class="secondary">
						<?php get_sidebar(); ?>
					</div><!-- secondary -->
				</section>
			</div>

		<?php } ?>
		
	</main>

<?php get_footer(); ?>