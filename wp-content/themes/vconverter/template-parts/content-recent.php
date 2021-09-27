<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vconverter
 */

?>
<div class="recent-post">
<div class="container">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="news-title">
	<h2>NEWS</h2>
</div>
	<div class="row">
		<div class="col-md-6">
		<?php vconverter_post_thumbnail(); ?>
		</div>
		
		<div class="col-md-6">
		
		<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				vconverter_posted_on();
				// vconverter_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		the_excerpt(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'vconverter' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vconverter' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
		</div>
	</div>
	

	<!--<footer class="entry-footer">
		<?php //vconverter_entry_footer(); ?>
	</footer> .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
</div>
</div>