<?php get_header();?>

<main id="primary" class="site-main">
<div id="myCarousel" class="carousel slide">
<ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>               
              <div class="carousel-inner">
              <?php query_posts('post_type=slides&showposts=1&order=ASC'); ?>
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="active carousel-item">
                  <?php the_post_thumbnail('', array('class' => 'main-home')); ?>
                  <div class="carousel-caption">
                  <?php the_content() ?>
                  </div>
                </div>
              <?php endwhile; endif; ?>
              <?php wp_reset_query(); ?>

              <?php query_posts('post_type=slides&showposts=5&offset=1&order=ASC'); ?>
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="carousel-item">
                  <?php the_post_thumbnail('', array('class' => 'main-home')); ?>
                  <div class="carousel-caption">
                    <?php the_content() ?>
                  </div>
                </div>
              <?php endwhile; endif; ?>
              </div>
              <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
     <div class="carousel-icon-round">     
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </div>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
  <div class="carousel-icon-round">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</div>
  </a>
            </div>
            <?php wp_reset_query(); ?>
   


		
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();

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