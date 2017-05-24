<?php
// WP_Query arguments
$args = array (
   'post_status'            => 'publish',
   'pagination'             => false,
   'posts_per_page'         => '3',
);

// The Query
$posts = new WP_Query( $args );
?>

<?php if ( $posts->have_posts() ) : ?>
<section id="novidades">
         <div class="row">

            <?php $count = 1; while ( $posts->have_posts() ) : $posts->the_post(); ?>

                  <?php if ($count != 2) : ?>
                     <div class="col-md-12 blog-item-2">
                        <?php if ( has_post_thumbnail() ) : ?>
                           <div class="col-md-5">
                              <a href="<?php the_permalink(); ?>" class="thumb border">
                                 <?php the_post_thumbnail('crop_blog_mini'); ?> 
                              </a><!-- end thumb -->
                           </div>
                        <?php endif; ?>
                        
                        <div class="col-md-7">
                           <div class="content">
                              <a href="<?php the_permalink(); ?>" class="thumb border">
                                 <div class="info" style="margin-top: 0; margin-bottom: -15px;">
                                    <?php $mes = ucfirst(get_the_date('F')); ?>
                                    <?php $dia = get_the_date('d'); ?>
                                    <?php $ano = get_the_date('Y'); ?>
                                    <date class="date"><?php echo "{$mes} {$dia}, {$ano}"; ?></date>
                                 </div><!-- end info -->

                                 <h4 class="collective-title" style="margin-bottom: -15px; text-transform: none;"><?php the_title(); ?></h4>

                                 <p class="p1"><?php echo excerpt(150, get_the_excerpt()); ?></p>

                                 <?php $tags = get_the_tags(); ?>
                                  <?php if ($tags) : ?>
                                      <!-- TAGS WIDGET -->
                                      <div class="tresno_widget">
                                          <div class="tresno_tags_widget">
                                              <div class="tresno_widget_content">
                                                  <div class="tresno_tag_list">
                                                      <?php foreach ($tags as $tag) : ?>
                                                         <p>Autor: <?= $tag->name; ?></p>
                                                      <?php endforeach; ?>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- TAGS WIDGET -->
                                  <?php endif; ?>
                              </a>
                           </div><!-- end info -->
                        </div>
                     </div>

                  <?php else : ?>
                     <div class="col-md-12 blog-item-2">
                        <?php if ( has_post_thumbnail() ) : ?>
                           <div class="col-md-5">
                              <a href="<?php the_permalink(); ?>" class="thumb border">
                                 <?php the_post_thumbnail('crop_blog_mini'); ?> 
                              </a><!-- end thumb -->
                           </div>
                        <?php endif; ?>
                        
                        <div class="col-md-7">
                           <div class="content">
                              <a href="<?php the_permalink(); ?>" class="thumb border">
                                 <div class="info" style="margin-top: 0; margin-bottom: -15px;">
                                    <?php $mes = ucfirst(get_the_date('F')); ?>
                                    <?php $dia = get_the_date('d'); ?>
                                    <?php $ano = get_the_date('Y'); ?>
                                    <date class="date"><?php echo "{$mes} {$dia}, {$ano}"; ?></date>
                                 </div><!-- end info -->

                                 <h4 class="collective-title" style="margin-bottom: -15px; text-transform: none;"><?php the_title(); ?></h4>

                                 <p class="p1"><?php echo excerpt(150, get_the_excerpt()); ?></p>

                                 <?php $tags = get_the_tags(); ?>
                                  <?php if ($tags) : ?>
                                      <!-- TAGS WIDGET -->
                                      <div class="tresno_widget">
                                          <div class="tresno_tags_widget">
                                              <div class="tresno_widget_content">
                                                  <div class="tresno_tag_list">
                                                      <?php foreach ($tags as $tag) : ?>
                                                         <p>Autor: <?= $tag->name; ?></p>
                                                      <?php endforeach; ?>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- TAGS WIDGET -->
                                  <?php endif; ?>
                              </a>
                           </div><!-- end info -->
                        </div>
                     </div>
                  <?php endif; ?>

            <?php $count++; endwhile; ?>

         </div><!-- row -->

</section><!-- end novidades -->
<?php endif; ?>