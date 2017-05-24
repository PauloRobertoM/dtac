<?php get_header(); ?>

<?php
   array(
      'titulo' => 'Projetos',
      'breadcrumb' => array(
         array('content' => 'Home', 'href' => site_url()),
         array('content' => 'Projetos', 'href' => site_url('produtos')),
         array('content' => get_the_title(), 'href' => null),
      )
   );
?>

<style type='text/css'>.single-portfolio-container .portfolio-images{margin-top: -7.5px;margin-bottom: -7.5px;margin-right: -7.5px;margin-left: -7.5px;}.single-portfolio-container .portfolio-images .portfolio-image{margin-top: 7.5px;margin-bottom: 7.5px;padding-left: 7.5px;padding-right: 7.5px;}</style>

   <div class="single-portfolio-container contentProduto" id="left-side">
      <div class="container">

         <div class="col-md-7">
            <div class="contProd">
               <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                     <h4 class="collective-title" style="font-size: 30px; text-transform: none;"><?php the_title(); ?></h4>
                     <div class="p-cont">
                        <?php the_content(); ?>
                     </div>

                     <div class="fotorama" data-nav="thumbs">
                        <?php $internas = rwmb_meta('produtos_internas', array('type' => 'image_advanced', 'size' => 'thumb_produtos_full')); ?>
                        <?php $primeiraInterna = (!empty($internas)) ? current($internas) : null; ?>

                        <?php foreach ($internas as $indice => $interna) : ?>
                           <img src="<?php echo $interna['url']; ?>" alt="<?php echo $interna['title']; ?>">
                        <?php endforeach; ?>
                     </div><!-- end fotorama -->
                  
               <?php endwhile; endif; ?>
            </div>
         </div>

         <div class="col-md-1"></div>

         <div class="col-md-4">
            <div class="side">
               <h4 class="collective-title" style="font-size: 30px; text-transform: none;">Outros Projetos</h4>
               <?php
               $args = array (
                  'post_type'              => 'produtos',
                  'post_status'            => 'publish',
                  'posts_per_page'         => '100',
                  'post__not_in'           => array($post->ID),
               );

               $produtos = new WP_Query( $args );

               if ( $produtos->have_posts() ) : ?>
                  <?php while ( $produtos->have_posts() ) : $produtos->the_post(); ?>
                     <?php $fotos = rwmb_meta('produtos_fotos', array('type' => 'plupload_image', 'size' => 'thumb_produtos')); ?>
                     <?php $primeiraFoto = (!empty($fotos)) ? current($fotos) : null; ?>
                     <article class="produto">
                        <a href="<?php the_permalink(); ?>" class="produtoThumb">
                           <h4><?php the_title(); ?></h4>
                           <?php if ($primeiraFoto) : ?>
                              <img src="<?php echo $primeiraFoto['url']; ?>" alt="<?php the_title(); ?>">
                           <?php endif; ?>
                        </a><!-- end thumb -->
                     </article><!-- end produto -->
                  <?php endwhile; wp_reset_postdata(); ?>
               <?php endif; ?>

               <div class="margin-bottom-lg"></div>

               <div class="news">
                  <p>Receba novidades <b>DO TETO AO CHÃO</b></p>

                  <form action="/envia">
                     <input type="text" name="nome" value="" placeholder="Seu nome" />
                  
                     <input type="email" name="email" value="" placeholder="Seu e-mail" />

                     <p class="text-center" style="margin-top: 28px; text-align: right;"><a href="" class="botao">CADASTRAR</a></p>
                  </form>
               </div><!-- news -->
               
               <div class="eventos">
                  <h4 class="collective-title">Parceiros e Eventos</h4>

                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/evento1.png" alt="">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/evento2.png" alt="">
               </div><!-- eventos -->
            </div>
         </div>

      </div>
   </div>

<?php get_footer(); ?>