<?php get_header(); ?>

<?php
   $data =
   array(
      'titulo' => 'Galerias',
      'breadcrumb' => array(
         array('content' => 'Home', 'href' => site_url()),
         array('content' => 'Galerias', 'href' => site_url('galerias'))
      )
   );
?>

<?php $Bootstrap::template('components/page', $data); ?>

<?php $galeria = $wp_query->query_vars['galeria']; ?>

<div class="portfolio_single">
  
  <div class="container">
      <div id="filters-container" class="cbp-l-filters-alignCenter two">
         <div class="content">
            <button data-filter="*" class="<?php echo (empty($galeria)) ? 'cbp-filter-item-active cbp-filter-item' : 'cbp-filter-item'; ?>">Todas</button>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
               <button data-filter=".cat_<?php echo $post->ID; ?>" class="<?php echo ($galeria == $post->ID) ? 'cbp-filter-item-active cbp-filter-item' : 'cbp-filter-item'; ?>"><?php the_title(); ?></button>
            <?php endwhile; endif; ?>
         </div><!-- end content -->
      </div>

      <div id="grid-container" class="cbp-l-grid-projects three cbp cbp-chrome cbp-animation-flipOut cbp-ready">
        <ul class="cbp-wrapper">
         
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

         <?php $galerias = rwmb_meta('galerias_imagens', array('type' => 'plupload_image', 'size' => 'galerias-thumb-mini')); ?>

         <?php foreach ($galerias as $galeria) : ?>
         <li class="cbp-item cat_<?php echo $post->ID; ?>">
            <div class="cbp-item-wrapper cbp-animation-flipOut-in">
               <div class="cbp-caption three">
                  <div class="cbp-caption-defaultWrap">
                     <img src="<?php echo $galeria['url']; ?>" alt="">
                  </div>

                  <?php $src = wp_get_attachment_image_src($galeria['ID'], 'galerias-thumb'); ?>

                  <a href="<?php echo $src[0]; ?>" class="cbp-lightbox" data-title="<?php echo $galeria['title']; ?><br><?php echo $galeria['caption']; ?>"></a>
               </div>
               <div class="threeborder">
                  <div class="cbp-l-grid-projects-title three"><?php echo $galeria['title']; ?></div>
                  <div class="cbp-l-grid-projects-desc"><?php echo $galeria['caption']; ?></div>
               </div>
            </div>
         </li>
         <?php endforeach; ?>

         <?php endwhile; endif; ?>

        </ul>
      </div>

    </div>
  
  
  </div>

<?php get_footer(); ?>