<?php
   $args = array(
      'posts_per_page'   => 8,
      'post_type'        => 'produtos',
   );

   $produtos = get_posts($args);
?>                                        

      <?php foreach ($produtos as $produto) : ?>
         <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item-container">
            <div class="portfolio-item">
               <div class="overlay-container">

                  <a href="<?php the_permalink($produto->ID); ?>">
                     <?php
                        $medias = rwmb_meta('produtos_fotos', 'type=plupload_image', $produto->ID);
                        foreach ( $medias as $media ) {
                           echo "<img src='{$media['url']}' alt='{$media['alt']}' />";
                        }
                     ?>
                     <div class="overlay  text-middle-middle">
                        <div class="bordered">
                           <div class="overlay-text-container ">
                              <div class="vertical-center2-container">
                                 <div class="vertical-center2-content">
                                    <div class="text">
                                       <h4 class="margin-bottom-none"><?= $produto->post_title ?></h4>
                                       <h6 class="text-uppercase"><?php the_content(); ?></h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>   
                     </div>
                  </a>
               </div>
            </div>
         </div>
      <?php endforeach; ?>