<?php
/**
 * Template Name: Home Page
 *
 *
 */
 ?>
<?php get_header(); ?>

<div class="container">
  <div class="row">
    <section class="jumbotron focustop">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <section class="post" id="post-<?php the_ID(); ?>">
        <section class="entry">
          <?php the_content(); ?>
          <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
        </section>
        <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
      </section>
      <?php // comments_template(); ?>
      <?php endwhile; endif; ?>
    </section>
    <section class="focusbottom">
      <div class="container">
        <?php get_sidebar('homebtfull'); ?>
        <div class="row grey">
          <?php get_sidebar('homebtleft'); ?>
          <?php get_sidebar('homebtright'); ?>
        </div>
      </div>
    </section>
  </div>
</div>
<?php get_footer(); ?>
