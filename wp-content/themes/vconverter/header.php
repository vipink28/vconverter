<?php
/**
 * The header for our theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'vconverter' ); ?></a>
	<div class="d-flex top-header">
		<div class="top-header-logo">
		<?php
			if(get_theme_mod( 'ad_top_header_link' )){
				?>
		<a href = "<?php echo get_theme_mod('ad_top_header_link')?>" target="_blank">
		
		<img src="<?php echo get_theme_mod('ad_top_header') ?>" alt="secondary-logo"
		</a>
		<?php
			}
			?>
		</div>		
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'topheader',
					'container'         => 'div',
            		'container_class'   => 'top-menu',
            		'container_id'      => 'ad_topnav',
					'menu_id'        => 'top-menu',
					'menu_class'	=> 'nav'
				)
			);
			?>

			<ul class="social-links">
			
				<li>
				<?php
			if(get_theme_mod( 'ad_facebook_link' )){
				?>
				<a class="social-icons facebook" href="<?php echo get_theme_mod('ad_facebook_link')?>"></a>
				<?php
			}
			?>
				</li>
				<li>
				<?php
			if(get_theme_mod( 'ad_linkedin_link' )){
				?>
				<a class="social-icons linkedin" href="<?php echo get_theme_mod('ad_linkedin_link')?>"></a>
				<?php
			}
			?>	
				</li>
				<li>
				<?php
			if(get_theme_mod( 'ad_location_link' )){
				?>
				<a class="social-icons location" href="<?php echo get_theme_mod('ad_location_link')?>"></a></li>
				<?php
			}
			?>	
			</ul>
	</div>
	<header id="masthead" class="site-header sticky-top">
		<div class="site-branding">
			<?php			
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$vconverter_description = get_bloginfo( 'description', 'display' );
			if ( $vconverter_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $vconverter_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
        <?php the_custom_logo(); ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ad_navbar" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'         => 'div',
            		'container_class'   => 'collapse navbar-collapse',
            		'container_id'      => 'ad_navbar',
					'menu_id'        => 'primary-menu',
					'menu_class'	=> 'nav navbar-nav ml-auto'	
				)
			);
			?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
