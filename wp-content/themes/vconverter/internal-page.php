<?php
/**
* Template Name: Internal Page
*
*/


get_header();?>

	<main id="primary" class="site-main">
		
	
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<div class="internal-header-image">
				<?php the_post_thumbnail('full'); ?>
			</div>
			<div class="container">
			<?php
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
</div>
	</main><!-- #main -->

<?php
get_footer();
