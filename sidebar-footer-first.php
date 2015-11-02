<?php if ( is_active_sidebar( 'footer-col1' ) || is_active_sidebar( 'footer-col2' ) || is_active_sidebar( 'footer-col3' ) || is_active_sidebar( 'footer-col4' )) : ?>
		
		<div class="footer-widget-area">
			<section class="layout">
				<?php dynamic_sidebar( 'footer-col1' ); ?>
				<?php dynamic_sidebar( 'footer-col2' ); ?>
				<?php dynamic_sidebar( 'footer-col3' ); ?>
				
				
				
<!-- 
				<aside class="widget oneFourth product-widget">
					<header class="widgettitle">
						<h4>کانتر</h4>
					</header>
					<main class="widgetbody">
						<ul class="products-list">
							<li><img src="images/thumb/counter/thumb1.png" alt=""><span>Air</span></li>
							<li><img src="images/thumb/counter/thumb2.png" alt=""><span>Curva</span></li>
							<li><img src="images/thumb/counter/thumb3.png" alt=""><span>Estel</span></li>
							<li><img src="images/thumb/counter/thumb5.png" alt=""><span>Kube</span></li>
						</ul>
						
					</main>
				</aside>
 -->

			</section>
		</div>		

		  
				
 <?php endif; ?>