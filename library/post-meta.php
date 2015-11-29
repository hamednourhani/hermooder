<?php
/*
*
*/?>
		<div class="post-meta">
				
						<ul class="post-meta-list">
							
							<?php if( 'post' == get_post_type() && is_singular()){
											// $cat_list =get_the_term_list( get_the_ID(), 'news_cat', '<span class="cats-title">' . __( 'News category :', 'hermooder' ) . '</span> ', ', ' );
											$tag_list =get_the_term_list( get_the_ID(), 'post_tag', '<span class="tags-title">' . __( 'Tags :', 'hermooder' ) . '</span> ', ', ' );
											?>
								
									
								
									<?php if ( $tag_list) { ?>
											


												<li class="meta-tag">
													<i class="fa fa-tags"></i>
													<?php echo $tag_list ;?>
												</li>
									<?php } ?>
									
							<?php } ?>

						
							
							<?php if( 'product' == get_post_type() && is_singular()){
											// $cat_list =get_the_term_list( get_the_ID(), 'news_cat', '<span class="cats-title">' . __( 'News category :', 'hermooder' ) . '</span> ', ', ' );
											$tag_list =get_the_term_list( get_the_ID(), 'product_tag', '<span class="tags-title">' . __( 'Tags :', 'hermooder' ) . '</span> ', ', ' );
											$cat_list =get_the_term_list( get_the_ID(), 'product_cat', '<span class="cats-title">' . __( 'Categories :', 'hermooder' ) . '</span> ', ', ' );
											?>
								
									
									<?php if ( $cat_list) { ?>
											

												<li class="meta-tag">
													<i class="fa fa-bookmark"></i>
													<?php echo $cat_list ;?>
												</li>
									<?php } ?>

									<?php if ( $tag_list) { ?>
											

												<li class="meta-tag">
													<i class="fa fa-tags"></i>
													<?php echo $tag_list ;?>
												</li>
									<?php } ?>
									
							<?php } ?>
													
							
							
						</ul><!--.post-meta-list-->
							
						
									
		</div><!--.post-meta-->		