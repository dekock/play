<section class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
  <div class="row">
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Home right widgets')) : ?>
    
    <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
    
    <?php endif; ?>
  </div>
</section>
