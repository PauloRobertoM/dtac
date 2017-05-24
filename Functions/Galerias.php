<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Galerias {
   public function __construct() {
      add_action('init', array($this, 'init'), 0);
      add_filter('rwmb_meta_boxes', array($this, 'galerias_rwmb_meta_boxes'));
      add_image_size('galerias-thumb-mini', 360);
      add_image_size('galerias-thumb', 800);
   }

   public function init() {
      $this->galerias_post_type();
      add_rewrite_rule('^galerias/([0-9]+)/?', 'index.php?post_type=galerias&galeria=$matches[1]', 'top');
      add_rewrite_tag('%galeria%', '([^&]+)');
   }

   public function galerias_post_type() {

      $labels = array(
         'name'                => _x( 'Galerias', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'Galeria', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Galerias', 'text_domain' ),
         'name_admin_bar'      => __( 'Galerias', 'text_domain' ),
         'parent_item_colon'   => __( 'Galeria pai:', 'text_domain' ),
         'all_items'           => __( 'Todas as galerias', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar nova galeria', 'text_domain' ),
         'add_new'             => __( 'Adicionar nova', 'text_domain' ),
         'new_item'            => __( 'Nova galeria', 'text_domain' ),
         'edit_item'           => __( 'Editar galeria', 'text_domain' ),
         'update_item'         => __( 'Atualizar galeria', 'text_domain' ),
         'view_item'           => __( 'Ver galeria', 'text_domain' ),
         'search_items'        => __( 'Procurar galeria', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $args = array(
         'label'               => __( 'gelerias', 'text_domain' ),
         'description'         => __( 'Post Type Description', 'text_domain' ),
         'labels'              => $labels,
         'supports'            => array( 'title', ),
         'taxonomies'          => array( ),
         'hierarchical'        => false,
         'public'              => false,
         'show_ui'             => true,
         'show_in_menu'        => true,
         'menu_position'       => 5,
         'show_in_admin_bar'   => true,
         'show_in_nav_menus'   => true,
         'can_export'          => true,
         'has_archive'         => true,
         'exclude_from_search' => false,
         'publicly_queryable'  => true,
         'capability_type'     => 'page',
      );
      register_post_type( 'galerias', $args );
   }

   
   public function galerias_rwmb_meta_boxes( $meta_boxes )
   {
      $prefix = 'galerias_';

      $meta_boxes[] = array(
         // Meta box id, UNIQUE per meta box. Optional since 4.1.5
         'id'         => 'imagens',
         // Meta box title - Will appear at the drag and drop handle bar. Required.
         'title'      => 'Imagens da galeria',
         // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
         'post_types' => array( 'galerias' ),
         // Where the meta box appear: normal (default), advanced, side. Optional.
         'context'    => 'normal',
         // Order of meta box: high (default), low. Optional.
         'priority'   => 'high',
         // Auto save: true, false (default). Optional.
         'autosave'   => true,
         // List of meta fields
         'fields' => array(
            array(
               'id'               => "{$prefix}imagens",
               'name'             => '',
               'type'             => 'plupload_image',
               // Delete image from Media Library when remove it from post meta?
               // Note: it might affect other posts if you use same image for multiple posts
               'force_delete'     => false,
               // Maximum image uploads
               'max_file_uploads' => 50,
            ),
         ),
      );
      return $meta_boxes;
   }

}