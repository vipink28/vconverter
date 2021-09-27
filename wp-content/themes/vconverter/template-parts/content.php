<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vconverter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="singlepost">
<div class="row">
	<div class="col-12">
	<header class="entry-header">
	<div class="active_breadcrumb">	
	<span>&#10092;&#10092;</span> <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">News </a> 
	</div>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
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

	<?php vconverter_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
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
</div>
	<!--<footer class="entry-footer">
		<?php //vconverter_entry_footer(); ?>
	</footer> .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
