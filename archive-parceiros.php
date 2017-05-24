<?php if (is_paged()) : ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <div class="col-md-3 col-sm-6">
      <article class="parceiro">

         <div class="thumbParceiro">
            <?php the_post_thumbnail('thumb_parceiro'); ?>
         </div><!-- end thumbParceiro -->

         <h1 class="tituloParceiro"><?php the_title(); ?></h1>

         <div class="telefonesParceiro">
            <?php $telefones = rwmb_meta('parceiros_telefones', array('type' => 'text')); ?>
            <?php foreach ($telefones as $indice => $telefone) : ?>
               <span class="telefone"><?php echo $telefone; ?></span>

               <?php if ( count($telefones) > $indice+1 ) : ?>
               <span style="color: #ccc;">|</span>
               <?php endif; ?>

            <?php endforeach; ?>
         </div><!-- end telefonesParceiro -->

      </article><!-- end parceiro -->
   </div><!-- end col-md-3 col-sm-6 -->
<?php endwhile; endif; ?>
<?php die(); endif; ?>


<?php get_header(); ?>

<?php
   $data =
   array(
      'titulo' => 'Parceiros',
      'breadcrumb' => array(
         array('content' => 'Home', 'href' => site_url()),
         array('content' => 'Parceiros', 'href' => null)
      )
   );
?>

<?php $Bootstrap::template('components/page', $data); ?>

<div class="container">

   <section id="contentParceiros">

      <h2 class="sub"><span>Nossos Parceiros</span></h2>

      <div class="row">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
         <div class="col-md-3 col-sm-6">
            <article class="parceiro">

               <div class="thumbParceiro">
                  <?php the_post_thumbnail('thumb_parceiro'); ?>
               </div><!-- end thumbParceiro -->

               <h1 class="tituloParceiro"><?php the_title(); ?></h1>

               <div class="telefonesParceiro">
                  <?php $telefones = rwmb_meta('parceiros_telefones', array('type' => 'text')); ?>
                  <?php foreach ($telefones as $indice => $telefone) : ?>
                     <span class="telefone"><?php echo $telefone; ?></span>

                     <?php if ( count($telefones) > $indice+1 ) : ?>
                     <span style="color: #ccc;">|</span>
                     <?php endif; ?>

                  <?php endforeach; ?>
               </div><!-- end telefonesParceiro -->

            </article><!-- end parceiro -->
         </div><!-- end col-md-3 col-sm-6 -->
      <?php endwhile; endif; ?>
      </div><!-- end row -->

      <?php if ( $wp_query->max_num_pages > 1 ) : ?>
      <div class="text-center">
         <button id="maisParceiros" data-count="<?php echo $wp_query->max_num_pages; ?>">VEJA MAIS</button>
      </div><!-- end text-center -->
      <?php endif; ?>

   </section><!-- end conentProdutos -->

</div><!-- end container -->

<?php get_footer(); ?>