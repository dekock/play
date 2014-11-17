<?php
/*
Plugin Name: Play Therapy Options PAge
Plugin URI: 
Description: play's option page, here yo can set your socila network url, add google analytics code andmcuh more
Author: Eric de Kock
*/
/**
 * Play Tabbed Settings Page
 */
add_action( 'init', 'play_admin_init' );
add_action( 'admin_menu', 'play_settings_page_init' );

function play_admin_init() {
	$settings = get_option( "play_theme_settings" );
	if ( empty( $settings ) ) {
		$settings = array(
			'play_intro' => 'Here you can do some custom settings for your theme, adding social network, custom text in the footer and add analytics.',
			'play_tag_class' => false,
			'play_ga' => false
		);
		add_option( "play_theme_settings", $settings, '', 'yes' );
	}	
}

function play_settings_page_init() {
	$theme_data = wp_get_theme('Play');
	$settings_page = add_theme_page( $theme_data['Name']. ' Theme Settings', $theme_data['Name']. ' Theme Settings', 'edit_theme_options', 'theme-settings', 'play_settings_page' );
	add_action( "load-{$settings_page}", 'play_load_settings_page' );
}

function play_load_settings_page() {
	if ( $_POST["play-settings-submit"] == 'Y' ) {
		check_admin_referer( "play-settings-page" );
		play_save_theme_settings();
		$url_parameters = isset($_GET['tab'])? 'updated=true&tab='.$_GET['tab'] : 'updated=true';
		wp_redirect(admin_url('themes.php?page=theme-settings&'.$url_parameters));
		exit;
	}
}

function play_save_theme_settings() {
	global $pagenow;
	$settings = get_option( "play_theme_settings" );
	
	if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){ 
		if ( isset ( $_GET['tab'] ) )
	        $tab = $_GET['tab']; 
	    else
	        $tab = 'social'; 

	    switch ( $tab ){ 
	        case 'social' :
				$settings['play_facebook']	  = $_POST['play_facebook'];
				$settings['play_twitter']	  = $_POST['play_twitter'];
				$settings['play_google']	  = $_POST['play_google'];				
			break; 
	        case 'analytics' : 			
				$settings['play_ga']  = $_POST['play_ga'];
			break;
			case 'footer' : 
				$settings['play_footertxt']	  = $_POST['play_footertxt'];
			break;
	    }
	}
	
	if( !current_user_can( 'unfiltered_html' ) ){
		if ( $settings['play_ga']  )
			$settings['play_ga'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['play_ga'] ) ) );
		if ( $settings['play_footertxt'] )
			$settings['play_footertxt'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['play_footertxt'] ) ) );
	}

	$updated = update_option( "play_theme_settings", $settings );
}

function play_admin_tabs( $current = 'social' ) { 
    $tabs = array( 'social' => 'Social', 'analytics' => 'Analytics', 'footer' => 'Footer' ); 
    $links = array();
    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=theme-settings&tab=$tab'>$name</a>";
        
    }
    echo '</h2>';
}

function play_settings_page() {
	global $pagenow;
	$settings = get_option( "play_theme_settings" );
	$theme_data = wp_get_theme('Play');
	?>

<div class="wrap">
  <h2><?php echo $theme_data['Name']; ?> Theme Settings</h2>
  <?php
			if ( 'true' == esc_attr( $_GET['updated'] ) ) echo '<div class="updated" ><p>Theme Settings updated.</p></div>';
			
			if ( isset ( $_GET['tab'] ) ) play_admin_tabs($_GET['tab']); else play_admin_tabs('social');
		?>
  <div id="poststuff">
    <form method="post" action="<?php admin_url( 'themes.php?page=theme-settings' ); ?>">
      <?php
				wp_nonce_field( "play-settings-page" ); 
				
				if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){ 
				
					if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab']; 
					else $tab = 'social'; 
					
					echo '<table class="form-table">';
					switch ( $tab ){
						case 'social' :
							?>
      <tr>
        <th><label for="play_tag_class">Social Network links:</label></th>
        <td><p>
            <label for="play_facebook" class="description">Please enter your Facebook url </label>
            <br>
            <input type="text" name="play_facebook" value="<?php echo esc_url ($settings['play_facebook']) ?>" placeholder="Please enter your URL here" size="60" />
          </p>
          <p>
            <label for="play_twitter" class="description">Please enter your Twitter url</label>
            <br>
            <input type="text" name="play_twitter" value="<?php echo esc_url ($settings['play_twitter']) ?>" placeholder="Please enter your URL here" size="60" />
          </p>
          <p>
            <label for="play_google" class="description">Please enter your Goolge+ url</label>
            <br>
            <input type="text" name="play_google" value="<?php echo esc_url ($settings['play_google']) ?>" placeholder="Please enter your URL here" size="60" />
          </p></td>
      </tr>
      <?php
						break; 
						case 'analytics' : 
							?>
      <tr>
        <th><label for="play_ga">Insert tracking code:</label></th>
        <td><p><label for="play_ga" class="description">Enter your Google Analytics tracking code:</label>
          <br>
          <textarea id="play_ga" name="play_ga" cols="60" rows="5" placeholder="Copy your tracking code here"><?php echo ( stripslashes( $settings["play_ga"] ) ); ?></textarea></p></td>
      </tr>
      <?php
						break;
						case 'footer' : 
							?>
      <tr>
        <th><label for="play_footertxt">Footer Text</label></th>
        <td><p><label for="play_footertxt" class="description">Please enter your custom copyright text:</label>
          <br>
          <input type="text" name="play_footertxt" value="<?php echo ($settings['play_footertxt']) ?>" placeholder="Enter your text here" size="60" /></p></td>
      </tr>
      <?php
						break;
					}
					echo '</table>';
				}
				?>
      <p class="submit" style="clear: both;">
        <input type="submit" name="Submit"  class="button-primary" value="Update Settings" />
        <input type="hidden" name="play-settings-submit" value="Y" />
      </p>
    </form>
    <p><?php echo $theme_data['Name'] ?> theme by <a href="<?php echo $theme_data['Author URI'] ?>">presslounge.co.za</a></p>
  </div>
</div>
<?php
}


?>
