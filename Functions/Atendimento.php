<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Atendimento {
	public $emails = array('paulo1rm23@gmail.com');

	public function __construct() {
		add_action('wp_ajax_nopriv_atendimento', array($this, 'action_atendimento') );
     	add_action('wp_ajax_atendimento' ,  array($this, 'action_atendimento') );
      add_action('init', array($this, 'init'), 0 );
      add_filter('rwmb_meta_boxes', array($this, 'atendimentos_rwmb_meta_boxes'));

      add_action('admin_init', array($this, 'add_theme_caps'));

      add_filter('manage_atendimentos_posts_columns' , array($this,'set_atendimentos_columns'));
      add_action('manage_atendimentos_posts_custom_column' , array($this, 'custom_atendimentos_column'), 10, 2);
   }

   public function set_atendimentos_columns($columns) {
       return array(
           'cb'             => '<input type="checkbox" />',
           'title'          => __('Title'),
           'empresa'        => __( 'Empresa'),
           'site'           => __( 'Site'),
           'funcao'         => __( 'Função'),
           'fone_endereco'  => __( 'Fone e Endereço'),
           'email'          => __( 'E-mail'),
           'telefone'       => __( 'Telefone'),
           'anexo'          => __( 'Anexo'),
           'especificacoes' => __( 'Especificacões'),
           'date'           => __('Date'),
       );
   }

   public function custom_atendimentos_column( $column, $post_id ) {
      switch ( $column ) {
         case 'empresa' :
            echo get_post_meta($post_id, 'atendimentos_empresa' , true); 
         break;
         case 'site' :
            echo get_post_meta($post_id, 'atendimentos_site' , true); 
         break;
         case 'funcao' :
            echo get_post_meta($post_id, 'atendimentos_funcao' , true); 
         break;
         case 'fone_endereco' :
            echo get_post_meta($post_id, 'atendimentos_fone_endereco' , true); 
         break;
         case 'email' :
            echo get_post_meta($post_id, 'atendimentos_email' , true); 
         break;

         case 'telefone' :
            echo get_post_meta($post_id, 'atendimentos_telefone' , true); 
         break;

         case 'anexo' :

            $anexo = get_post_meta($post_id, 'atendimentos_anexo' , true);

            if ( $anexo ) {
               $post = get_post($anexo);
               echo "<a href='{$post->guid}' class='button' target='_blank'>Arquivo</a>";
            } else { echo 'Não disponível'; }
               
         break;
         case 'especificacoes' :
            echo get_post_meta($post_id, 'atendimentos_especificacoes' , true); 
         break;
      }
   }

   public function add_theme_caps() {

      /*------------ ADMINISTRATOR */
      $admins = get_role( 'administrator' );

      $admins->add_cap('read_atendimento', true);
      $admins->add_cap('read_private_atendimentos', true);

      $admins->add_cap('edit_atendimento', true);
      $admins->add_cap('edit_atendimentos', true);
      $admins->add_cap('edit_others_posts', true);

      $admins->add_cap('delete_atendimento', true);
      $admins->add_cap('delete_atendimentos', true);

      $admins->add_cap('publish_atendimentos', true);

      /*------------ EDITOR */
      $editor = get_role( 'editor' );
      $editor->add_cap('read_atendimento', true);
      $editor->add_cap('read_private_atendimentos', true);

      $editor->add_cap('edit_atendimento', false);
      $editor->add_cap('edit_atendimentos', true);

      $editor->add_cap('delete_atendimento', true);
      $editor->add_cap('delete_atendimentos', true);
   }


   public function init() {
      $this->atendimentos_post_type();
   }

   public function configure_smtp($phpmailer) {
      if (isset($this->replyto_address) && isset($this->replyto_name))
         $phpmailer->addReplyTo($this->replyto_address, $this->replyto_name);
   }

	public function action_atendimento() {
		
   date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

   $server = $_SERVER['SERVER_NAME'];
   $endereco = $_SERVER ['REQUEST_URI'];

   ################# SCRIPT DE ENVIO DE E-MAIL #################
      $nome = utf8_decode($_POST["nome"]);
      $email = utf8_decode($_POST["email"]);
      $area = utf8_decode($_POST["area"]);
      $mensagem = utf8_decode(nl2br($_POST["mensagem"]));
      //if($nome == "" || $email == "" || $mensagem == ""){ echo 'Algum campo ficou em branco! Por favor, preencha-o.'; exit; }

      // Destinatário
      $para = "paulo1rm23@gmail.com";

      // Assunto do e-mail
      $assunto = "Curriculum enviado - Clínica Pedro Cavalcanti";


      $logotipo = '<img src="http://www.clinicapedrocavalcanti.com.br/novo/wp-content/themes/pedrocavalcanti/images/logo.png" width="178" height="auto" />';

      $corpo = '<center><table width="700" border="1" cellpadding="0" cellspacing="0" style="border: 1px #ec792c solid; border-collapse: collapse;">
               <tr>
                  <td style="padding: 5px;" bgcolor="#FFF"  width="210" align="center" >'.$logotipo.'</td>
                  <td width="480" align="center" bgcolor="#ec792c" style=" padding: 15px; font-family: Verdana, Geneva, sans-serif; color: #FFF; font-weight: bold;">NOVO CURRICULUM ENVIADO PELO SITE</td>
               </tr>
               <tr>
                  <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
                     NOME
                  </td>
                  <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
                     '.$nome.'
                  </td>
               </tr>
               <tr>
                  <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
                     E-MAIL
                  </td>
                  <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
                     '.$email.'
                  </td>
               </tr>
               <tr>
                  <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
                     ÁREA DE INTERESSE
                  </td>
                  <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
                     '.$area.'
                  </td>
               </tr>
               <tr>
                  <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
                     MENSAGEM
                  </td>
                  <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
                     '.$mensagem.'
                  </td>
               </tr>
               <tr>
                  <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
                     ARQUIVO
                  </td>
                  <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
                     <a href="'.$link_arquivo.'">'.$link_arquivo.'</a>
                  </td>
               </tr>
               <tr>
                  <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
                     INFO
                  </td>
                  <td style="padding: 20px; font-family: Arial; color: #666; font-weight: bold; text-align: justify;">
                     Enviado em '.date('d/m/Y').' - '.date("H:i:s").'
                  </td>
               </tr>
               <tr>
                  <td bgcolor="#ec792c" colspan="2" style="padding: 10px; font-family: Arial; color: #FFF; font-weight: bold; text-align: center;">CLINICA PEDRO CAVALCANTI</td>
               </tr>
               </table></center>';

      // Cabeçalho do e-mail
      $header = "MIME-Version: 1.0" . "\r\n".
      "Content-type: text/html; charset=iso-8859-1" . "\r\n".
      "From: SITE@clinicapedrocavalcanti.com.br" . "\r\n" .
      "Bcc: \n".
      "Reply-To: nao-responda@clinicapedrocavalcanti.com.br";
      mail($para, $assunto, $corpo, $header);
    ################# /SCRIPT DE ENVIO DE E-MAIL #################
	}

   public function atendimentos_post_type() {

      $labels = array(
         'name'                => _x( 'Atendimentos', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'Atendimento', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Atendimentos', 'text_domain' ),
         'name_admin_bar'      => __( 'Atendimentos', 'text_domain' ),
         'parent_item_colon'   => __( 'Atendimento pai:', 'text_domain' ),
         'all_items'           => __( 'Todos atendimentos', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar novo atendimento', 'text_domain' ),
         'add_new'             => __( 'Adicionar novo', 'text_domain' ),
         'new_item'            => __( 'Novo atendimento', 'text_domain' ),
         'edit_item'           => __( 'Editar atendimento', 'text_domain' ),
         'update_item'         => __( 'Atualizar atendimento', 'text_domain' ),
         'view_item'           => __( 'Ver atendimento', 'text_domain' ),
         'search_items'        => __( 'Procurar atendimento', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $capabilities_type = 'atendimento';
      $capabilities = array(
         'read_post'              => "read_{$capabilities_type}",
         'edit_post'              => "edit_{$capabilities_type}",
         'delete_post'            => "delete_{$capabilities_type}",
         'delete_posts'           => "delete_{$capabilities_type}s",
         'delete_published_posts' => "delete_published_{$capabilities_type}s",
         'delete_private_posts'   => "delete_private_{$capabilities_type}s",
         'delete_others_posts'    => "delete_others_{$capabilities_type}s",
         'edit_posts'             => "edit_{$capabilities_type}s",
         'edit_others_posts'      => "edit_others_{$capabilities_type}s",
         'publish_posts'          => "publish_{$capabilities_type}s",
         'read_private_posts'     => "read_private_{$capabilities_type}s",
         'create_posts'           => "create_{$capabilities_type}s",
      );
      $args = array(
         'label'               => __( 'atendimentos', 'text_domain' ),
         'description'         => __( 'Post Type Description', 'text_domain' ),
         'labels'              => $labels,
         'supports'            => array( 'title', ),
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
         'capabilities_type'   => $capabilities_type,
         'capabilities'        => $capabilities,
      );

      register_post_type('atendimentos', $args );
   }

   public function atendimentos_rwmb_meta_boxes( $meta_boxes )
   {
      $prefix = 'atendimentos_';

      $meta_boxes[] = array(
         'id'         => 'empresa',
         'title'      => 'Empresa',
         'post_types' => array( 'atendimentos' ),
         'context'    => 'advanced',
         'priority'   => 'high',
         'autosave'   => true,
         'fields' => array(
            array(
               'name'        => null,
               'id'          => "{$prefix}empresa",
               'clone'       => false,
               'rows'        => 5,
               'columns'     => 5,
            ),
         ),
      );

      $meta_boxes[] = array(
         'id'         => 'site',
         'title'      => 'Site',
         'post_types' => array( 'atendimentos' ),
         'context'    => 'advanced',
         'priority'   => 'high',
         'autosave'   => true,
         'fields' => array(
            array(
               'name'        => null,
               'id'          => "{$prefix}site",
               'clone'       => false,
               'rows'        => 5,
               'columns'     => 5,
            ),
         ),
      );

      $meta_boxes[] = array(
         'id'         => 'funcao',
         'title'      => 'Funcão',
         'post_types' => array( 'atendimentos' ),
         'context'    => 'advanced',
         'priority'   => 'high',
         'autosave'   => true,
         'fields' => array(
            array(
               'name'        => null,
               'id'          => "{$prefix}funcao",
               'clone'       => false,
               'rows'        => 5,
               'columns'     => 5,
            ),
         ),
      );

      $meta_boxes[] = array(
         'id'         => 'fone_endereco',
         'title'      => 'Telefone e Endereço',
         'post_types' => array( 'atendimentos' ),
         'context'    => 'advanced',
         'priority'   => 'high',
         'autosave'   => true,
         'fields' => array(
            array(
               'name'        => null,
               'id'          => "{$prefix}fone_endereco",
               'clone'       => false,
               'rows'        => 5,
               'columns'     => 5,
            ),
         ),
      );

      $meta_boxes[] = array(
         'id'         => 'email',
         'title'      => 'E-mail',
         'post_types' => array( 'atendimentos' ),
         'context'    => 'side',
         'priority'   => 'high',
         'autosave'   => true,
         'fields' => array(
            array(
               'name'        => null,
               'id'          => "{$prefix}email",
               'clone'       => false,
            ),
         ),
      );

      $meta_boxes[] = array(
         'id'         => 'telefone',
         'title'      => 'Telefone',
         'post_types' => array( 'atendimentos' ),
         'context'    => 'side',
         'priority'   => 'high',
         'autosave'   => true,
         'fields' => array(
            array(
               'name'        => null,
               'id'          => "{$prefix}telefone",
               'clone'       => false,
            ),
         ),
      );

      $meta_boxes[] = array(
         'id'         => 'anexo',
         'title'      => 'Anexo',
         'post_types' => array( 'atendimentos' ),
         'context'    => 'advanced',
         'priority'   => 'high',
         'autosave'   => true,
         'fields' => array(
            array(
               'id'               => "{$prefix}anexo",
               'type'             => 'file_advanced',
               'force_delete'     => false,
               'max_file_uploads' => 1,
            ),
         ),
      );

      $meta_boxes[] = array(
         'id'         => 'especificacoes',
         'title'      => 'Especificações',
         'post_types' => array( 'atendimentos' ),
         'context'    => 'advanced',
         'priority'   => 'high',
         'autosave'   => true,
         'fields' => array(
            array(
               'name'        => null,
               'id'          => "{$prefix}especificacoes",
               'clone'       => false,
               'rows'        => 5,
               'columns'     => 5,
            ),
         ),
      );

      return $meta_boxes;
   }

}