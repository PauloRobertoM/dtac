<div class="atendimento">
   <img class="r-back" src="<?php echo get_template_directory_uri(); ?>/assets/images/r.png" alt="">
   
   <div class="container content-tres">
      <h1>INICIAR ATENDIMENTO AGORA</h1>
      
      <form id="_form_atendimento">
         <h2>IDENTIFICAÇÃO</h2>
         <div id="_atendimentos_callbacks">
         </div><!-- _atendimentos_callbacks -->

         <input type="text" placeholder="QUAL O SEU NOME?" name="nome" id="atendimento_nome">
         <input type="text" placeholder="QUAL O NOME DA EMPRESA?" name="empresa" id="atendimento_empresa">
         <input type="text" placeholder="A EMPRESA TEM SITE?" name="site" id="atendimento_site">
         <input type="text" placeholder="QUAL A SUA FUNÇÃO NA EMPRESA?" name="funcao" id="atendimento_funcao">
         <input type="text" placeholder="FONE E ENDEREÇO PARA ENTREGA" name="fone_endereco" id="atendimento_fone_endereco">
         <input type="text" placeholder="E-MAIL" name="email" id="atendimento_email">
         
         <? /*
         <input type="text" id="atendimento_arquivo" disabled="disabled" value="Nenhum projeto selecionado">
         <div class="_file">
            <span>Anexo</span>
            <input type="hidden" value="atendimento" name="prefix" class="prefix">
            <input type="file" id="atendimento_anexo" class="anexo" name="anexo">
         </div>

         <textarea placeholder="Especificações do serviço" id="atendimento_especificacoes" style="height: 156px;"></textarea>
         */ ?>

         <input type="submit" id="enviar" value="">

         <div class="outros-forms">
            <h2>BRIEFING</h2>
            
            <div class="tab-content">
               <a href="#detalhes" aria-controls="detalhes" role="tab" data-toggle="tab" class="verde"><b>CLIQUE AQUI</b> E DIGA TUDO QUE PRECISA, COM DETALHES.</a>
               <div role="tabpanel" class="tab-pane" id="detalhes">
                  <textarea placeholder="Especificações do briefing" id="atendimento_especificacoes" style="height: 156px;"></textarea>
                  <input type="submit" id="enviar" value="">
               </div>

               <a href="#previo" aria-controls="previo" role="tab" data-toggle="tab" class="cinza">Caso queira responder um modelo prévio de briefing, clique aqui</a>
               <div role="tabpanel" class="tab-pane" id="previo">
                  <textarea placeholder="Especificações do briefing" id="atendimento_especificacoes" style="height: 156px;"></textarea>
                  <input type="submit" id="enviar" value="">
               </div>
            </div><!-- tab-content -->

            <h2>atendimento virtual</h2>
            <p>Gostaria de complementar com um atendimento em nossa sala virtual?</p>
            
            <div class="tab-content">
               <a href="#virtual" class="verde"><b>CLIQUE AQUI.</b></a>
            </div><!-- tab-content -->

            <h2>atendimento presencial</h2>
            <p>Gostaria de uma reunião presencial com um profissional de atendimento?</p>
            
            <div class="tab-content">
               <a href="#agende" aria-controls="agende" role="tab" data-toggle="tab" class="verde"><b>CLIQUE AQUI</b> E AGENDE.</a>
               <div role="tabpanel" class="tab-pane" id="agende">
                  <textarea placeholder="Dia e Horário" id="atendimento_especificacoes" style="height: 156px;"></textarea>
                  <input type="submit" id="enviar" value="">
               </div>
            </div><!-- tab-content -->

            <h2>CONSULTORIA</h2>
            <p>Precisa de uma reunião consultiva com um de nossos diretores?</p>
            
            <div class="tab-content">
               <a href="#cunsultoria" aria-controls="cunsultoria" role="tab" data-toggle="tab" class="verde"><b>CLIQUE AQUI</b> E cunsultoria.</a>
               <div role="tabpanel" class="tab-pane" id="cunsultoria">
                  <textarea placeholder="Dia e Horário" id="atendimento_especificacoes" style="height: 156px;"></textarea>
                  <input type="submit" id="enviar" value="">
               </div>
            </div><!-- tab-content -->
         </div><!-- outros-forms -->
      </form><!-- end _form_atendimento -->
   </div><!-- container content-tres -->
</div><!-- antendimento -->