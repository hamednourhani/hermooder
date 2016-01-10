<?php if ( is_active_sidebar( 'sidebar' )) : ?>
		
					<div class="sidebar-widget">
						<nav class="side-menu">
							<h4 class="widgettitle"><i class="fa fa-shopping-cart">  </i>

								<?php echo __('Products','hermooder');?></h4>
							<?php $walker = new Menu_With_Image();?>
							<?php wp_nav_menu(array(
								'container' => false,                           // remove nav container
								'container_class' => 'menu cf',                 // class of container (should you choose to use it)
								'menu' => __( 'Side Menu', 'hermooder' ),  // nav name
								'menu_class' => 'nav side-nav cf',
								'walker' => $walker,             // adding custom nav class
								'theme_location' => 'side-menu',                 // where it's located in the theme
								'before' => '',                                 // before the menu
								'after' => '',                                  // after the menu
								'link_before' => '',                            // before each link
								'link_after' => '',                             // after each link
								'depth' => 3,                                   // limit the depth of the nav
								'fallback_cb' => ''                             // fallback function (if there is one)
							)); ?>
						</nav>
						<?php dynamic_sidebar( 'sidebar' ); ?> 	

					</div>
				
				

				
	 
 <?php endif; ?>