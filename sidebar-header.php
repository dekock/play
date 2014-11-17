<section class="header-right col-xs-6 col-sm-8 col-md-8 col-lg-8 hidden-xs">
  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Header Widgets'))
	{?>
  <?php }else{ ?>
  <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
  <?php } ?>
</section>
