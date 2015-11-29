<?php
/**
 * Template Name: search nearest pharmacy
 *
 * 
 */
 get_header(); ?>
	

	<main class="site-main">
		<div class="banner-wrapper">
			
				<?php get_template_part('library/banner','maker'); ?>
			
		</div><!-- banner-wrapper -->
		<?php if(have_posts()){ ?>
			<?php while(have_posts()) { the_post(); ?>
				<div class="site-content without-sidebar all-products">
					<section class="layout">						
												
						<div class="primary">
							<?php the_content(); ?>		

							<div>
							    <input type="text" id="addressInput" size="10"/>
							    <select id="radiusSelect">
							      <option value="25" selected>25mi</option>
							      <option value="100">100mi</option>
							      <option value="200">200mi</option>
							    </select>

							    <input type="button" onclick="searchLocations()" value="Search"/>
							</div>
							<div>
								<select id="locationSelect" style="width:100%;visibility:hidden"></select>
							</div>
							<div id="map" style="width: 100%; height: 80%"></div>
						</div><!-- primary -->
						<script type="text/javascript">
							jQuery(document).ready(function($){
								loadMap();
							});
						</script>
					</section>
				</div>
			<?php }
		} ?>
	</main>
	<?php 
		$ajax_pharmacy_nonce = wp_create_nonce("Hermooder_search_pharmacy_nonce"); 
		 $ajax_url = admin_url('admin-ajax.php');
	?>
	<span id="ajax-pharmacy_search" data-nonce="<?php echo $ajax_pharmacy_nonce; ?>" data-url="<?php echo esc_url($ajax_url); ?>"></span>
	
<?php get_footer(); ?>