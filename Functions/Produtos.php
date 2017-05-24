<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Produtos {

   public function __construct() {
      add_action('init', array($this, 'init'), 0);
      add_filter('rwmb_meta_boxes', array($this, 'produtos_register_meta_boxes'));
   }

   public function init() {
      $this->produtos_post_type();
   }

   public function produtos_post_type() {

      $labels = array(
         'name'                => _x( 'Portfólios', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'Portfólio', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Portfólios', 'text_domain' ),
         'name_admin_bar'      => __( 'Portfólios', 'text_domain' ),
         'parent_item_colon'   => __( 'Portfólio pai:', 'text_domain' ),
         'all_items'           => __( 'Todos os portfólios', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar novo portfólio', 'text_domain' ),
         'add_new'             => __( 'Adicionar novo', 'text_domain' ),
         'new_item'            => __( 'Novo portfólio', 'text_domain' ),
         'edit_item'           => __( 'Ediar portfólio', 'text_domain' ),
         'update_item'         => __( 'Atualizar portfólio', 'text_domain' ),
         'view_item'           => __( 'Ver portfólio', 'text_domain' ),
         'search_items'        => __( 'Procurar portfólio', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $args = array(
         'label'               => __( 'portfólios', 'text_domain' ),
         'description'         => __( 'Cadastro dos portfólios, Ratts', 'text_domain' ),
         'labels'              => $labels,
         'supports'            => array( 'title', 'editor', ),
         'taxonomies'          => array( ),
         'hierarchical'        => false,
         'public'              => true,
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

      register_post_type( 'produtos', $args );

   }

   public function produtos_register_meta_boxes( $meta_boxes ) {

      $prefix = 'produtos_';
      $meta_boxes[] = array(
         'id'         => "{$prefix}fotos",
         'title'      => 'Foto Principal do Portfólio',
         'post_types' => array( 'produtos' ),
         'context'    => 'normal',
         'priority'   => 'high',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'               => "{$prefix}fotos",
               'name'             => null,
               'type'             => 'image_advanced',
               'force_delete'     => false,
               'desc'             => 'Adicionar foto Principal',
               'max_file_uploads' => 1,
            ),
         )
      );

      $prefix = 'produtos_';
      $meta_boxes[] = array(
         'id'         => "{$prefix}internas",
         'title'      => 'Fotos Internas do Portfólio',
         'post_types' => array( 'produtos' ),
         'context'    => 'normal',
         'priority'   => 'high',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'               => "{$prefix}internas",
               'name'             => null,
               'type'             => 'image_upload',
               'force_delete'     => false,
               'desc'             => 'Adicionar fotos Internas',
               'max_file_uploads' => 100,
            ),
         )
      );

      return $meta_boxes;

   }

}