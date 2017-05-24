<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Parceiros {

   public function __construct() {
      add_action('init', array($this, 'init'), 0);
      add_filter('rwmb_meta_boxes', array($this, 'parceiros_register_meta_boxes'));
      add_image_size('thumb_parceiro', 220, 265, true);

      add_action('pre_get_posts', array($this, 'pre_get_parceiros'), 1);
   }

   public function pre_get_parceiros($query) {
      if ( is_post_type_archive('parceiros') ) {
         $query->set('posts_per_page', 8);
         return;
      }
   }

   public function init() {
      $this->parceiros_post_type();
   }

   public function parceiros_post_type() {

      $labels = array(
         'name'                => _x( 'Parceiros', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'Parceiro', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Parceiros', 'text_domain' ),
         'name_admin_bar'      => __( 'Parceiros', 'text_domain' ),
         'parent_item_colon'   => __( 'Parceiro pai:', 'text_domain' ),
         'all_items'           => __( 'Todos os parceiros', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar novo parceiro', 'text_domain' ),
         'add_new'             => __( 'Adicionar novo', 'text_domain' ),
         'new_item'            => __( 'Novo parceiro', 'text_domain' ),
         'edit_item'           => __( 'Ediar parceiro', 'text_domain' ),
         'update_item'         => __( 'Atualizar parceiro', 'text_domain' ),
         'view_item'           => __( 'Ver parceiro', 'text_domain' ),
         'search_items'        => __( 'Procurar parceiro', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );

      $args = array(
         'label'               => __( 'parceiros', 'text_domain' ),
         'description'         => __( 'Cadastro dos parceiros, Mardel Mármore', 'text_domain' ),
         'labels'              => $labels,
         'supports'            => array( 'title', 'thumbnail', ),
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

      register_post_type( 'parceiros', $args );

   }

   public function parceiros_register_meta_boxes( $meta_boxes ) {

      // Better has an underscore as last sign
      $prefix = 'parceiros_';
      // 1st meta box
      $meta_boxes[] = array(
         // Meta box id, UNIQUE per meta box. Optional since 4.1.5
         'id'         => "{$prefix}telefones",
         // Meta box title - Will appear at the drag and drop handle bar. Required.
         'title'      => 'Telefones',
         // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
         'post_types' => array( 'parceiros' ),
         // Where the meta box appear: normal (default), advanced, side. Optional.
         'context'    => 'side',
         // Order of meta box: high (default), low. Optional.
         'priority'   => 'high',
         // Auto save: true, false (default). Optional.
         'autosave'   => true,
         // List of meta fields
         'fields'     => array(
            array(
               'id'               => "{$prefix}telefones",
               'name'             => null,
               'type'             => 'text',
               'clone'            => true,
            ),
         )
      );

      $meta_boxes[] = array(
         // Meta box id, UNIQUE per meta box. Optional since 4.1.5
         'id'         => "{$prefix}informacoes",
         // Meta box title - Will appear at the drag and drop handle bar. Required.
         'title'      => 'Informações sobre cadastro',
         // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
         'post_types' => array( 'parceiros' ),
         // Where the meta box appear: normal (default), advanced, side. Optional.
         'context'    => 'normal',
         // Order of meta box: high (default), low. Optional.
         'priority'   => 'high',
         // Auto save: true, false (default). Optional.
         'autosave'   => true,
         // List of meta fields
         'fields'  => array(
            array(
               'type' => 'heading',
               'name' => null,
               'id'   => "{$prefix}informacao", // Not used but needed for plugin
               'desc' => '<p><b style="color: red;">*</b> Foto na proporção exata de <b>220x265</b>, foto menor ou maior do que essa proporção será cortada e redimensionada.</p>',
            ),
         )
      );

      return $meta_boxes;

   }

}