<?php get_header(); ?>

<section id="content" class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <h1>
      <?php the_title(); ?>
    </h1>
    <div class="entry">
      <article class="row">
        <section class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
          <?php
			if ( has_post_thumbnail() ) {
				// the current post has a thumbnail
				the_post_thumbnail(array(600, 400), array('class' => 'img-thumbnail text-center'));
			} else {
				// the current post lacks a thumbnail
			}
			?>
        </section>
        <section class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
          <?php the_content('Read more >>'); ?>
        </section>
      </article>
      <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
      <?php the_tags( 'Tags: ', ', ', ''); ?>
    </div>
    <?php edit_post_link('Edit this entry','','.'); ?>
  </div>
  <?php comment_form(); ?>
  <?php comments_template( $file, $separate_comments ); ?>
  <?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
