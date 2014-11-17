<?php get_header(); ?>
<section id="content" class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
<?php if (have_posts()) : ?>

<h1>Search Results</h1>
<?php get_template_part (TEMPLATEPATH . '/inc/nav.php' ); ?>
<?php while (have_posts()) : the_post(); ?>
<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
  <h2>
    <?php the_title(); ?>
  </h2>
  <?php get_template_part (TEMPLATEPATH . '/inc/meta.php' ); ?>
  <div class="entry">
    <?php the_excerpt(); ?>
  </div>
</div>
<?php endwhile; ?>
<?php get_template_part (TEMPLATEPATH . '/inc/nav.php' ); ?>
<?php else : ?>
<h2>No posts found.</h2>
<?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
