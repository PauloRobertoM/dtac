<?php get_header(); ?>

<?php
   $data =
   array(
      'titulo' => 'CONTATO',
      'breadcrumb' => array(
         array('content' => 'Home', 'href' => site_url()),
         array('content' => 'Contato', 'href' => null)
      )
   );
?>

<?php $Bootstrap::template('components/page', $data); ?>

<section id="contato">

   <form id="_form_contato">

      <?php $nonce = wp_create_nonce('21b6b697b381cfd8a3bad74e0bc813d4'); ?>
      <input type="text" name="security" class="off" id="contato_security">
      <input type="hidden" name="nonce" value="<?php echo $nonce; ?>" id="contato_nonce">

      <div class="container">

         <h2 class="sub"><span>Entre em contato conosco através do formulário abaixo</span></h2>

         <div id="_contato_callbacks"></div>

         <div class="row">
            <div class="col-md-6">
               <input type="text" placeholder="Nome" name="nome" id="contato_nome" required style="background-color: transparent;">
            </div><!-- end col-md-6 -->

            <div class="col-md-6">
               <input type="email" placeholder="E-mail" name="email" id="contato_email" required style="background-color: transparent;">
            </div><!-- end col-md-6 -->

            <div class="col-md-6">
               <input type="text" placeholder="Assunto" name="assunto" id="contato_assunto" style="background-color: transparent;">
            </div><!-- end col-md-6 -->

            <div class="col-md-6">

               <div class="row no_margin">
                  <div class="col-sm-9 no_padding">
                     <input type="text" id="contato_arquivo" disabled="disabled" value="Nenhum projeto selecionado" style="background-color: transparent;">
                  </div><!-- end col-sm-9 -->

                  <div class="col-sm-3 no_padding">
                     <div class="_file">
                        <span>Anexo</span>
                        <input type="hidden" value="contato" name="prefix" class="prefix">
                        <input type="file" id="contato_anexo" class="anexo" name="anexo">
                     </div>
                  </div><!-- end col-sm-3 -->
               </div><!-- end row -->

            </div><!-- end col-md-6 -->
         </div><!-- end row -->

         <textarea placeholder="Mensagem" id="contato_mensagem" rows="5"></textarea>

         <div class="text-center">
            <button class="env">Enviar</button>
         </div><!-- text-right -->

      </div><!-- end container -->
   </form><!-- end _form_orcamento -->

</section><!-- end contato -->

<?php get_footer(); ?>
