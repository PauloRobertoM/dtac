<?php get_header(); ?>

<?php
   $data =
   array(
      'titulo' => 'Produtos',
      'breadcrumb' => array(
         array('content' => 'Home', 'href' => site_url()),
         array('content' => 'Produtos', 'href' => null)
      )
   );
?>

<div class="container">

   <section id="contentProdutos">

      <h2 class="sub"><span>Encante-se com a nossa variedade de produtos</span></h2>

      <?php if ( have_posts() ) : ?>
      <?php query_posts( array_merge($wp_query->query_vars, array('posts_per_page' => 100, )) ); ?>
      <div class="row">
         <?php while ( have_posts() ) : the_post(); ?>

         <?php $fotos = rwmb_meta('produtos_fotos', array('type' => 'plupload_image', 'size' => 'thumb_produtos')); ?>
         <?php $primeiraFoto = (!empty($fotos)) ? current($fotos) : null; ?>

         <div class="col-md-3 col-sm-6">

            <article class="produto">
               <?php if ($primeiraFoto) : ?>
               <a href="<?php the_permalink(); ?>" class="produtoThumb">
                  <img src="<?php echo $primeiraFoto['url']; ?>" alt="<?php the_title(); ?> | Mardel Mármore e Design">
                  <span></span>
               </a><!-- end thumb -->
               <?php endif; ?>
               <h1 class="produtoTitulo"><?php the_title(); ?></h1>
            </article><!-- end produto -->

         </div><!-- end col-md-3 col-sm-6 -->

         <?php endwhile; ?>
      </div><!-- end row -->
      <?php endif; ?>

   </section><!-- end conentProdutos -->

</div><!-- end container -->

<?php get_footer(); ?>