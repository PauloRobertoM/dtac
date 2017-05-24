<header id="page">
   <div class="wraper">
      <span class="left"></span>
      <h1><?php echo $titulo; ?></h1>
      <span class="right"></span>
   </div><!-- end wrapper -->
</header><!-- end page -->

<section id="atendimento_page">
   <div class="container">
      <div class="row">
         <div class="col-sm-6">
            <button id="toggleAtendimento" class="toggle_atendimento_page">Orçamento Online</button>
         </div><!-- end col-sm-6 -->

         <div class="col-sm-6 text-right">
            <ol class="_breadcrumb clearfix">
               <?php foreach ($breadcrumb as $value) : ?>
               <li>
                  <?php if (empty($value['href'])) : ?>
                     <span><?php echo $value['content']; ?></span>
                  <?php else : ?>
                     <a href="<?php echo $value['href']; ?>"><?php echo $value['content']; ?></a>
                  <?php endif; ?>
               </li>
               <?php endforeach; ?>
            </ol>
         </div><!-- end col-sm-6 -->
      </div><!-- end row -->
   </div><!-- end container -->
</section><!-- end atendimento_page -->

<?php get_template_part('components/atendimento'); ?>