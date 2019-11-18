<?
  @ini_set( 'upload_max_size' , '64M' );
  @ini_set( 'post_max_size', '64M');
  @ini_set( 'max_execution_time', '300' );
  
  add_theme_support('post-thumbnails'); 

  function remove_extra_wp_header() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action("wp_head", "rel_canonical");
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');

    wp_deregister_script('wp-embed');

    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'rest_output_link_wp_head' );
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
    /* удаление левых ссылок из шапки */
    add_filter('xmlrpc_enabled', '__return_false');
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
    remove_action( 'wp_head', 'wp_shortlink_wp_head');
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'index_rel_link' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head');

    add_filter('show_admin_bar', '__return_false');
  }

  function disable_emojis_tinymce( $plugins ) {
      if ( is_array( $plugins ) ) {
          return array_diff( $plugins, array( 'wpemoji' ) );
      } else {
          return array();
      }
  }

  add_action('init', 'remove_extra_wp_header');

  function theme_resources() {
    wp_enqueue_style('style', get_template_directory_uri().'/css/styles.css', false, filemtime(get_theme_file_path('css/styles.css')));
    //wp_enqueue_script('my-scripts', get_template_directory_uri().'/js/scripts.js', false, filemtime(get_theme_file_path('js/scripts.js')), true);
    if (!is_user_logged_in()) {
      wp_deregister_style('dashicons'); //comment this line for query monitor plugin
    }
    
  }
  add_action('wp_enqueue_scripts', 'theme_resources');
?>