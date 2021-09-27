<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vconverter
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="blog-header">
			
		</div>

		
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			query_posts('showposts=1');
			$ids = array();


			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				$ids[] = get_the_ID();
				
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-recent', get_post_type() );

			endwhile;

			// the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

<!--secondary loop -->
<?php
		if ( have_posts() ) :			
			query_posts(array(
				'post__not_in' => $ids,
				'posts_per_page' => 3,
				'paged'          => $paged
			));
?>
<div class="latest-post">
				<div class="container">
				
<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */			
				
					get_template_part( 'template-parts/content-main', get_post_type() );
			

			endwhile;
			
			?>
			</div>
			</div>			
			<?php
			the_posts_pagination( array(
				'mid_size'  => 5,
				'prev_text' => __( '&laquo;', 'textdomain' ),
				'next_text' => __( '&raquo;', 'textdomain' ),
			) );
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		?>



	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
