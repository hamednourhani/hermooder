<?php
/*
*
*/?>
		<div class="post-meta">
				
						<ul class="post-meta-list">
							
							<?php if( 'post' == get_post_type() && is_singular()){
											// $cat_list =get_the_term_list( get_the_ID(), 'news_cat', '<span class="cats-title">' . __( 'News category :', 'karait' ) . '</span> ', ', ' );
											$tag_list =get_the_term_list( get_the_ID(), 'post_tag', '<span class="tags-title">' . __( 'Tags :', 'karait' ) . '</span> ', ', ' );
											?>
								
									
								
									<?php if ( $tag_list) { ?>
											


												<li class="meta-tag">
													<i class="fa fa-tags"></i>
													<?php echo $tag_list ;?>
												</li>
									<?php } ?>
									
							<?php } ?>

						
							
							<?php if( 'product' == get_post_type() && is_singular()){
											// $cat_list =get_the_term_list( get_the_ID(), 'news_cat', '<span class="cats-title">' . __( 'News category :', 'karait' ) . '</span> ', ', ' );
											$tag_list =get_the_term_list( get_the_ID(), 'product_tag', '<span class="tags-title">' . __( 'Tags :', 'karait' ) . '</span> ', ', ' );
											?>
								
									
								
									<?php if ( $tag_list) { ?>
											

												<li class="meta-tag">
													<i class="fa fa-tags"></i>
													<?php echo $tag_list ;?>
												</li>
									<?php } ?>
									
							<?php } ?>
							<?php if( 'project' == get_post_type() && is_singular()){
											$tag_list =get_the_term_list( get_the_ID(), 'project_tag', '<span class="tags-title">' . __( 'Tags :', 'karait' ) . '</span> ', ', ' );
											
											?>
								
									<?php if ( $tag_list) { ?>
											
												<li class="meta-cat">
													<i class="fa fa-tags"></i>
													<?php echo $tag_list ;?>
												</li>
											
									<?php } ?>
								
																		
							<?php } ?>

							
							
							
						</ul><!--.post-meta-list-->
							
						
									
		</div><!--.post-meta-->		