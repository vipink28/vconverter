<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vconverter
 */

?>



	<footer id="colophon" class="site-footer">
	<div class="container-fluid">
	<div class="row align-items-end footer-top">
		<div class="footer col-lg-9">
			<!-- <nav class="navbar navbar-expand">
			<?php
			// wp_nav_menu(
			// 	array(
			// 		'theme_location' => 'secondary',
			// 		'container'         => 'div',
            // 		'container_class'   => 'collapse navbar-collapse',
            // 		'container_id'      => 'ad_navbar',
			// 		'menu_id'        => 'secondary-menu',
			// 		'menu_class'	=> 'nav navbar-nav mr-auto'	
			// 	)
			// );
			?>			
			</nav> -->
		</div>
		<div class="footer-address col-lg-3m text-center">
				<?php the_custom_logo( ); ?>
				<!-- <div class="address">
					<?php //if(get_theme_mod( 'ad_footer_address' )){
						?>
						<address>
						<?php// echo get_theme_mod( 'ad_footer_address' )?>
						</address>
						<?php
					//} ?>
				</div> -->
			</div>
		</div>
		</div>
		<div class="site-info text-center">
			
			
			<?php
			if(get_theme_mod( 'ad_footer_info' )){
				?>
				<span>	<?php echo get_theme_mod( 'ad_footer_info' ) ?> </span>
			<?php
			}			
			?>
			<span>All Rights Reserved</span>
			
		</div><!-- .site-info -->	
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
