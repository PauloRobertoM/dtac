<?php get_header(); ?>

<?php
   $data =
   array(
      'titulo' => '404',
      'breadcrumb' => array(
         array('content' => 'Home', 'href' => site_url()),
         array('content' => '404', 'href' => '')
      )
   );
?>

<?php $Bootstrap::template('components/page', $data); ?>

<h1>404</h1>

<?php get_footer(); ?>