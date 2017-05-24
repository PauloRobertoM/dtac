<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Bootstrap {

   public function __construct() {
      add_filter('show_admin_bar', '__return_false');
      add_action('after_setup_theme', array($this, 'after_setup_theme'));
      add_action('wp_enqueue_scripts', array($this,'my_enqueue') );
      add_action('phpmailer_init', array($this,'configure_smtp'));
   }

   public function configure_smtp($phpmailer) {
      $phpmailer->isSMTP();
      $phpmailer->Host = 'mail.mardelmarmore.com.br';
      $phpmailer->SMTPAuth = true;
      $phpmailer->SMTPSecure = 'ssl';
      $phpmailer->Port = 465;
      $phpmailer->Username = 'naoresponda@mardelmarmore.com.br';
      $phpmailer->Password = 't4g~4+rShlD=';
      $phpmailer->isHTML(true);
   }
   
   public function after_setup_theme() {
      add_theme_support('post-thumbnails', array('post', 'parceiros'));
   }

   public static function template($template, $params = null) {

   	foreach ($params as $key => $value)
   		$$key = $value;

   	include(locate_template($template.'.php'));
   }

   public function my_enqueue($hook) {
      wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), false, true );
      wp_localize_script( 'scripts', 'theme', array(
         'ajax_url' => wp_make_link_relative(site_url('wp-admin/admin-ajax.php')),
         'theme_url' => wp_make_link_relative(get_template_directory_uri())
         )
      );
   }

}