<?php get_header(); ?>

<section id="content" class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
  <?php if (have_posts()) : ?>
  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
  <?php /* If this is a category archive */ if (is_category()) { ?>
  <h1>
    <?php single_cat_title(); ?>
  </h1>
  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
  <h1>Posts Tagged &#8216;
    <?php single_tag_title(); ?>
    &#8217;</h1>
  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
  <h1>Archive for
    <?php get_option( 'date_format' ) ?>
  </h1>
  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
  <h1>Archive for
    <?php get_option( 'date_format' ) ?>
  </h1>
  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
  <h1>Archive for
    <?php get_option( 'date_format' ) ?>
  </h1>
  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
  <h1>Author Archive</h1>
  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h1>Blog Archives</h1>
    <?php } ?>
  <?php get_template_part (TEMPLATEPATH . '/inc/nav.php' ); ?>
  <?php while (have_posts()) : the_post(); ?>
  <div <?php post_class() ?>>
    <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>">
      <?php the_title(); ?>
      </a></h3>
    <?php get_template_part (TEMPLATEPATH . '/inc/meta.php' ); ?>
    <div class="entry">
      <div class="row">
        <div class="col-xs-6 col-md-3">
          <?php
			if ( has_post_thumbnail() ) {
				// the current post has a thumbnail
				the_post_thumbnail(array(150,150), array('class' => 'img-thumbnail'));
			} else {
				// the current post lacks a thumbnail
			}
			?>
        </div>
        <article class="col-xs-6 col-md-9">
          <?php
			if (is_sticky()) {
			  global $more;    // Declare global $more (before the loop).
			  $more = 1;       // Set (inside the loop) to display all content, including text below more.
			  the_content();
			} else {
			  global $more;
			  $more = 0;
			  the_content('Read more >>');
			}
			?>
        </article>
      </div>
    </div>
  </div>
  <?php endwhile; ?>
  <?php get_template_part (TEMPLATEPATH . '/inc/nav.php' ); ?>
  <?php else : ?>
  <h1>Nothing found</h1>
  <?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
