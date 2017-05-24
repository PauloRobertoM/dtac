<?php get_header(); ?>

<?php
   $data =
   array(
      'titulo' => 'Blog',
      'breadcrumb' => array(
         array('content' => 'Home', 'href' => site_url()),
         array('content' => 'Blog', 'href' => 'blog')
      )
   );
?>

   <style type='text/css'>.single-portfolio-container .portfolio-images{margin-top: -7.5px;margin-bottom: -7.5px;margin-right: -7.5px;margin-left: -7.5px;}.single-portfolio-container .portfolio-images .portfolio-image{margin-top: 7.5px;margin-bottom: 7.5px;padding-left: 7.5px;padding-right: 7.5px;}</style>



<div class="single-portfolio-container" id="left-side">
   <div class="container">
      <div class="col-md-7">
         <?php get_template_part('content', 'novidades'); ?>
      </div>

      <div class="col-md-1"></div>
      
      <div class="col-md-4">
            <div class="margin-top-lg">   
               <h4 class="collective-title">RECENTES</h4>
               <?php
               $args = array (
                  'post_status'            => 'publish',
                  'posts_per_page'         => '5',
                  'post__not_in'           => array($post->ID),
               );

               $posts = new WP_Query( $args );
               ?>

               <?php if ( $posts->have_posts() ) : ?>
                  <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                     <div class="margin-bottom-lg">
                        <a href="<?php the_permalink(); ?>">
                           <p class="text-uppercase margin-bottom-xs">Título</p>
                           <h6 class="margin-none"><p><?php the_title(); ?></p></h6>
                        </a>
                     </div>
                   <?php endwhile; ?>
               <?php endif; wp_reset_postdata(); ?>

               <h4 class="collective-title">CATEGORIAS</h4>

               <?php 

               $args = array(
                  'type'                     => 'post',
                  'child_of'                 => 0,
                  'parent'                   => '',
                  'orderby'                  => 'name',
                  'order'                    => 'ASC',
                  'hide_empty'               => 1,
                  'hierarchical'             => 1,
                  'exclude'                  => '',
                  'include'                  => '',
                  'number'                   => '',
                  'taxonomy'                 => 'category',
                  'pad_counts'               => false 

               ); 

               ?>

               <?php $categories = get_categories( $args ); ?> 

                  <?php foreach ($categories as $categorie) : ?>
                     <div class="margin-bottom-lg">
                        <h6 class="margin-none"><p><a href="<?php echo get_category_link($categorie->term_id); ?>"><?php echo $categorie->name; ?> <span class="count"><?php echo $categorie->count; ?></span></a></p></h6>
                     </div>

                     

                  <?php endforeach; ?>

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
         </div><!-- col-md-4 -->

   </div>
</div>



   <? /*
      <div class="col-md-4">
         <aside>

            <h2 class="sidebar_title">RECENTES</h2>

            <?php
            $args = array (
               'post_status'            => 'publish',
               'posts_per_page'         => '5',
               'post__not_in'           => array($post->ID),
            );

            $posts = new WP_Query( $args );
            ?>

            <?php if ( $posts->have_posts() ) : ?>

            <section id="postsRecentes">
               <div class="content owl-carousel">
                  <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                  <article class="recente">
                     <a href="<?php the_permalink(); ?>">

                        <figure>
                           <?php if ( has_post_thumbnail() ) : ?>
                              <?php the_post_thumbnail('crop_blog_recente'); ?>
                           <?php endif; ?>
                           <button class="prev"></button>
                           <button class="next"></button>
                        </figure>

                        <h1><?php the_title(); ?></h1>
                     </a>
                  </article><!-- end recente -->
                   <?php endwhile; ?>
               </div><!-- end content -->

            </section><!-- end postsRecentes -->
            <?php endif; wp_reset_postdata(); ?>
   

         </aside>
      </div><!-- end col-md-4 -->
   */ ?>
  
<?php get_footer(); ?>