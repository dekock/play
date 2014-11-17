</div>
</section>
<!--Content ends here-->
<?php
//get theme options

$play_settings = get_option( 'play_theme_settings' ); ?>
<!--Footer starts here-->

<footer id="footer" class="container-fluid">
  <div class="container">
    <div class="row"> <span class="site-info col-xs-12 col-sm-12 col-md-3">
      <?php if($play_settings['play_footertxt'] == "")
{?>
      &copy; <?php echo date("Y") . " "; echo bloginfo('name'); ?>
      <?php } else {?>
      &copy; <?php echo date("Y") . " "; echo $play_settings['play_footertxt']; ?>
      <?php }?>
      </span>
      <section class="footer-left col-xs-12 col-sm-6 col-md-6">
        <nav id="menu" class="bottomnav">
          <?php wp_nav_menu( array( 'theme_location' => 'secondary' , 'menu_class'=>'nav nav-pills' ) ); ?>
        </nav>
      </section>
      <section class="footer-right col-xs-12 col-sm-6 col-md-3">
        <ul class="list-inline pull-right">
          <?php if($play_settings['play_facebook'] == "")
{?>
          <?php } else {?>
          <li class="facebook"><a href="<?php echo $play_settings['play_facebook']; ?>/" title="Facebook" class="sprite facebookicon"></a></li>
          <?php }?>
          <?php if($play_settings['play_twitter'] == "")
{?>
          <?php } else {?>
          <li class="twitter"><a href="<?php echo $play_settings['play_twitter']; ?>/" title="Twitter" class="sprite twittericon"></a></li>
          <?php }?>
          <?php if($play_settings['play_google'] == "")
{?>
          <?php } else {?>
          <li class="google"><a href="<?php echo $play_settings['play_google']; ?>/" title="G+" class="sprite googleicon"></a></li>
          <?php }?>
        </ul>
      </section>
      <section class="footerbottom">
        <?php get_sidebar('footer'); ?>
      </section>
    </div>
  </div>
  <div class="row "> 
    <!-- site-info -->
    <section class="copyright col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <p>
        <?php do_action( 'play_credits' ); ?>
        Designed and Coded by <a href="<?php echo esc_url( __( 'http://www.ericdekock.co.za', 'play' ) ); ?>" title="<?php esc_attr_e( 'Eric de Kock Theme', 'play' ); ?>"><?php printf( __( ' %s', 'play' ), 'Eric de Kock' ); ?></a></p>
    </section>
    <!-- site-info --> 
  </div>
</footer>
<!--Footer ends here-->
</div>
<!--Page ends here-->
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri('template_url'); ?>/js/bootstrap.min.js"></script> 
<script src="<?php echo get_template_directory_uri('template_url'); ?>/js/main.js"></script>
<?php if (!wp_is_mobile()) {?>
<script src="<?php echo get_template_directory_uri('template_url'); ?>/js/sidebar.js"></script>
<?php } ?>
</body></html>