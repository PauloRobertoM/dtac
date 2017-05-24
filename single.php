<?php get_header(); ?>

<?php
   $data =
   array(
      'titulo' => 'Blog',
      'breadcrumb' => array(
         array('content' => 'Home', 'href' => site_url()),
         array('content' => 'Blog', 'href' => '')
      )
   );
?>

   <style type='text/css'>.single-portfolio-container .portfolio-images{margin-top: -7.5px;margin-bottom: -7.5px;margin-right: -7.5px;margin-left: -7.5px;}.single-portfolio-container .portfolio-images .portfolio-image{margin-top: 7.5px;margin-bottom: 7.5px;padding-left: 7.5px;padding-right: 7.5px;}</style>

   <div class="single-portfolio-container" id="left-side">
      <div class="container">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <div class="col-md-7">
               <div class="info">
                  <?php $mes = ucfirst(get_the_date('F')); ?>
                  <?php $dia = get_the_date('d'); ?>
                  <?php $ano = get_the_date('Y'); ?>
                  <date class="date"><?php echo "{$mes} {$dia}, {$ano}"; ?></date>
               </div><!-- end info -->

               <h4 class="collective-title" style="font-size: 30px; text-transform: none;"><?php the_title(); ?></h4>
               <p style="font-size: 14px;"><?php the_content(); ?></p>

               <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('img-blog'); ?>
               <?php endif; ?>

               <p class="margin-bottom-md">
                  <span class="share-text"></span>
               </p>

               <ul class="post-shares">
                  <li><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="facebook" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></a></li>
                  <li><a href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>" class="twitter" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
                  <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="google" target="_blank"><i class="fa fa-google-plus"></i> Google Plus</a></li>
               </ul>

               <div class="row">
            <div class="col-md-12">
               <!-- COMMENTS -->
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7&appId=300193366983202";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>

                        <div class="fb-comments" data-href="<?php the_permalink() ?>" data-width="100%" data-numposts="5"></div>
            </div>
         </div>
               
            </div><!-- col-md-7 -->
            <div class="col-md-1"></div>

         <?php endwhile; else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
         <?php endif; ?>

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