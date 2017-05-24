<?php get_header(); ?>

<?php
   array(
      'titulo' => 'CONTATO',
      'breadcrumb' => array(
         array('content' => 'Home', 'href' => site_url()),
         array('content' => 'Contato', 'href' => null)
      )
   );
   $page = 'online';
?>

   <header class="head-interna">
      <div class="logo">
         <a href="<?php echo site_url(''); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png">
         </a>
      </div><!-- logo -->

      <?php get_template_part('components/menu'); ?>

      <div class="video-hero jquery-background-video-wrapper demo-video-wrapper">
         <video class="jquery-background-video" autoplay muted loop poster="https://d3k5xyayaartr5.cloudfront.net/_assets/home-video/beach-waves-loop.jpg">
            <source src="https://d3k5xyayaartr5.cloudfront.net/_assets/home-video/beach-waves-loop.mp4" type="video/mp4">
            <source src="https://d3k5xyayaartr5.cloudfront.net/_assets/home-video/beach-waves-loop.webm" type="video/webm">
            <source src="https://d3k5xyayaartr5.cloudfront.net/_assets/home-video/beach-waves-loop.ogv" type="video/ogg">
         </video>
         <div class="video-overlay"></div>
         <div class="page-width">
            <div class="video-hero--content">
               <div class="container">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ratts.png" alt="">
               </div><!-- container -->
            </div><!-- video-hero-content -->
         </div><!-- page-width -->
      </div><!-- video-hero -->
   </header><!-- end topo -->

   <section class="online geral">
      <div class="row no-gutter">
         <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="no-gutter">
               <div class="col-lg-4 col-md-4 col-sm-4">
                  <a class="" href="">
                     <img class='img-portfolio' src='<?php echo get_template_directory_uri(); ?>/assets/images/serv1.png' alt='' />
                     
                     <div class="content-dois">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/call.png" alt="">
                        <h2>Serviço <span>UM</span></h2>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mollis vel ligula ut tempor. Ut sollicitudin Lorem ipsum dolor sit amet.</p>

                        <img class="pull-right" src="<?php echo get_template_directory_uri(); ?>/assets/images/plus2.png" alt="">
                     </div>
                  </a>
               </div><!-- col-lg-4 -->
               <div class="col-lg-4 col-md-4 col-sm-4">
                  <a class="" href="">
                     <img class='img-portfolio' src='<?php echo get_template_directory_uri(); ?>/assets/images/serv2.png' alt='' />
                     
                     <div class="content-dois">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/call.png" alt="">
                        <h2>Serviço <span>DOIS</span></h2>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mollis vel ligula ut tempor. Ut sollicitudin Lorem ipsum dolor sit amet.</p>

                        <img class="pull-right" src="<?php echo get_template_directory_uri(); ?>/assets/images/plus2.png" alt="">
                     </div>
                  </a>
               </div><!-- col-lg-4 -->
               <div class="col-lg-4 col-md-4 col-sm-4">
                  <a class="" href="">
                     <img class='img-portfolio' src='<?php echo get_template_directory_uri(); ?>/assets/images/serv1.png' alt='' />
                     
                     <div class="content-dois">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/call.png" alt="">
                        <h2>Serviço <span>TRÊS</span></h2>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mollis vel ligula ut tempor. Ut sollicitudin Lorem ipsum dolor sit amet.</p>

                        <img class="pull-right" src="<?php echo get_template_directory_uri(); ?>/assets/images/plus2.png" alt="">
                     </div>
                  </a>
               </div><!-- col-lg-4 -->
            </div><!-- no-gutter -->
         </div><!-- col-lg-10 -->

         <div class="col-lg-2 col-md-2 col-sm-2">
            <div class="item">
               <a href="">
                  <div class="content">
                     <img style="margin-top: 0;" src="<?php echo get_template_directory_uri(); ?>/assets/images/plus3.png" alt=""><br />
                  </div><!-- content -->
                  <img class="back img-portfolio" src="<?php echo get_template_directory_uri(); ?>/assets/images/back2.png" alt="">
               </a>
            </div><!-- item -->
         </div><!-- col-lg-2 -->
      </div><!-- no-gutter -->

      <div class="funciona">
         <div class="row no-gutter">
            <h1>COMO FUNCIONA?</h1>

            <div class="container content-tres">
               <img class="pull-left" src="<?php echo get_template_directory_uri(); ?>/assets/images/person.png" alt="">

               <div class="text-left">
                  <h4>PASSO 1</h4>
                  <h1>IDENTIFICAÇÃO</h1>
                  <p>O atendimento inicia com sua identificação.<br />Nos fale sobre a sua empresa, seu produto ou sua marca.<br />Já é nosso cliente cadastrado? Siga direto para PASSO 2.</p>
               </div>
            </div><!-- container content-tres -->
            <div class="container content-tres">
               <img class="pull-left" src="<?php echo get_template_directory_uri(); ?>/assets/images/paper.png" alt="">

               <div class="text-left">
                  <h4>PASSO 2</h4>
                  <h1>BRIEFING</h1>
                  <p>Seu atendimento inicia pelo briefing.<br />Nos diga o que precisa com todos os detalhes.</p>
               </div>
            </div><!-- container content-tres -->
            <div class="container content-tres">
               <img class="pull-left" src="<?php echo get_template_directory_uri(); ?>/assets/images/orcamento.png" alt="">

               <div class="text-left">
                  <h4>PASSO 3</h4>
                  <h1>orçamento</h1>
                  <p>Nosso atendimento virtual apresenta um orçamento.<br />Você aprova o orçamento e faz o pagamento.</p>
               </div>
            </div><!-- container content-tres -->
            <div class="container content-tres">
               <img class="pull-left" src="<?php echo get_template_directory_uri(); ?>/assets/images/check.png" alt="">

               <div class="text-left">
                  <h4>PASSO 4</h4>
                  <h1>APROVAÇÃO</h1>
                  <p>Nesta etapa você aprova, reprova ou pede alterações na sua peça, ideia, ação ou campanha.</p>
               </div>
            </div><!-- container content-tres -->
            <div class="container content-tres">
               <img class="pull-left" src="<?php echo get_template_directory_uri(); ?>/assets/images/entrega.png" alt="">

               <div class="text-left">
                  <h4>PASSO 5</h4>
                  <h1>entrega</h1>
                  <p class="desta">CRIAÇÃO</p>
                  <p>Em até 48 horas (em média) você recebe a sua peça, ideia, ação ou campanha criada.</p>
                  <p class="desta">PRODUCÃO</p>
                  <p>Para a produção, os prazos variam de acordo com o tipo de trabalho.</p>
               </div>
            </div><!-- container content-tres -->
         </div><!-- no-gutter -->
      </div><!-- funciona -->

      <div class="video">
         <div id="quemsomos" class="bgParallax" data-speed="15">
            <article>
               <a href="">
                  <h1>ASSISTA AO VÍDEO EXPLICATIVO AQUI</h1>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/play2.png" alt="">
               </a>
            </article>
         </div><!-- #quemsomos -->
      </div><!-- video -->
   </section><!-- online -->

   <?php get_template_part('content', 'atendimento'); ?>

   <section class="depoimentos">
      <div class="container content-depo">
         <h1>VEJA DEPOIMENTOS DE QUEM JA USOU A RATS ONLINE</h1>

         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
               <div class="item active">
                  <img class="um" src="<?php echo get_template_directory_uri(); ?>/assets/images/aspas.png" alt="">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean placerat tellus turpis, a volutpat leo consectetur eget. Integer id faucibus augue. Maecenas ut est orci. Quisque ultrices metus sed augue imperdiet, tempor lobortis dui hendrerit. Phasellus mollis augue et aliquet mattis. Donec rhoncus tempor nunc, quis varius ipsum facilisis dignissim. Cras vel odio dui. Donec ut consequat mi, pharetra sagittis orci. Fusce semper mi nec massa pharetra consectetur.</p>
                  <img class="dois" src="<?php echo get_template_directory_uri(); ?>/assets/images/aspas2.png" alt="">

                  <div class="autor">
                     <h2>Francisco Teles</h2>
                     <p>38 anos, Chef de cozinha</p>
                  </div>
               </div><!-- item -->
               <div class="item">
                  <img class="um" src="<?php echo get_template_directory_uri(); ?>/assets/images/aspas.png" alt="">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean placerat tellus turpis, a volutpat leo consectetur eget. Integer id faucibus augue. Maecenas ut est orci. Quisque ultrices metus sed augue imperdiet, tempor lobortis dui hendrerit. Phasellus mollis augue et aliquet mattis. Donec rhoncus tempor nunc, quis varius ipsum facilisis dignissim. Cras vel odio dui. Donec ut consequat mi, pharetra sagittis orci. Fusce semper mi nec massa pharetra consectetur.</p>
                  <img class="dois" src="<?php echo get_template_directory_uri(); ?>/assets/images/aspas2.png" alt="">

                  <div class="autor">
                     <h2>Francisco Teles</h2>
                     <p>38 anos, Chef de cozinha</p>
                  </div>
               </div><!-- item -->
            </div><!-- carousel-inner -->

            <!-- Indicators -->
            <ol class="carousel-indicators">
               <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
               <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>
         </div><!-- carousel-example-generic -->
      </div><!-- container content-depo -->
   </section><!-- depoimentos -->

<?php get_footer(); ?>
