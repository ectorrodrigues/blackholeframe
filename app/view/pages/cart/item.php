<?php

  $item = $_GET['id'];

  if(!isset($_SESSION["session"])){
    session_start();
  	$_SESSION["session"] = uniqid();
    $session = $_SESSION["session"];
  } else {
    $session = $_SESSION["session"];
  }

  echo '<loop><sql>limit=sessionpass'.$session.'/'.$item.';</sql><span style="display:none;">{id}</span></loop>';

?>

<style>.col-4{max-width: 100% !important;} #top{border-bottom-color:#D71440; border-bottom-style:solid; border-bottom-width:1px;}</style>

<div class="container" id="produtos">

  <div class="row justify-content-left py-2">
    <div class="breadcrumb">
      // PRODUTOS
    </div>
  </div>

  <div class="row justify-content-around pt-2">

    <div class="col-3 py-4">
      <input type="text" name="search" class="search" id="search" placeholder="Pesquisar" onchange="search()"/>
      <loop>
        <sql>table=categorias;orderby=id;order=ASC;</sql>
        <span class="sidemenu-link" onclick="search_cat({id})">{title}</span>
      </loop>
    </div>

    <div class="col-9 pb-5">
      <h2 class="my-3">// Pedido de Orçamento</h2>
      <div class="row ml-0 mr-0 border-botttom text-white bg-dark round-corners">
        <div class="col-10 text-left py-2 pl-3">Produto</div>
        <div class="col-2 text-left py-2 pl-2">Qtd.</div>
      </div>

			<loop>
        <sql>table=carrinho;where= session = 'sessionpass' ;</sql>
        <div class="row ml-0 mr-0 border-botttom">
          <div class="col-10 text-left py-2 pl-3">{title}</div>
          <div class="col-2 text-left py-2 pl-2">{qtd}
            <i class="fas fa-plus-circle ml-3 text-success cursor-pointer" id="{id}" onclick="qtd_handle(this.id, 'cart_add')"></i>
            <i class="fas fa-minus-circle text-red cursor-pointer" id="{id}" onclick="qtd_handle(this.id, 'cart_remove')" ></i>
          </div>
        </div>
			</loop>

      <div class="row py-4 my-5 ml-0 mr-0 px-2 bg-light round-corners">

        <h2 class="pl-3 mb-4 pt-2">// Dados pessoais</h2>

        <form action="WWWcart/item/cart/finish" method="post" enctype="multipart/form-data" class="pl-0 pr-0 ml-0 mr-0 col-12">
          <div class="row ml-0 mr-0">

            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Nome Completo" />
                <input type="text" name="phone" class="form-control" placeholder="Telefone com DDD" />
                <input type="email" name="email" class="form-control" placeholder="E-mail" />
            </div>

            <div class="col">
                <select name="uf" id="cod_estados"  class="form-control col-2 pr-0 mr-4 mb-2" style="display:inline-block;">
                <loop>
                  <sql>table=estados;orderby=sigla;</sql>
                  <option value="{cod_estados}">{sigla}</option>
                </loop>
                </select>

                <span class="carregando">Aguarde, carregando...</span>

                <select name="city" id="cod_cidades" class="form-control col-9 mb-2" placeholder="Cidade"  style="display:inline-block;" >
                  <option value="">-- Escolha um estado --</option>
                </select>

                <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

                <script type="text/javascript">
                $(function(){
                  $('#cod_estados').change(function(){
                    if( $(this).val() ) {
                      $('#cod_cidades').hide();
                      $('.carregando').show();
                      $.getJSON('http://mova.ppg.br/resources/clientes/nolano/app/view/pages/carrinho/cidades.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
                        var options = '<option value=""></option>';
                        for (var i = 0; i < j.length; i++) {
                          options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
                        }
                        $('#cod_cidades').html(options).show();
                        $('.carregando').hide();
                      });
                    } else {
                      $('#cod_cidades').html('<option value="">– Escolha um estado –</option>');
                    }
                  });
                });
                </script>

                <input type="text" name="address" class="form-control" placeholder="Endereço" />
                <button type="submit" class="btn btn-primary mb-2">Enviar</button>
            </div>

          </div>

        </form>
      </div>

    </div>
  </div>
</div>

<script>
  function qtd_handle($id_qtd, $action_qtd){
    window.location.replace("WWWcart/"+$id_qtd+"/cart/"+$action_qtd);
  }
</script>

<script>
function search(){
  var search = $('#search').val();
  window.location.replace('SERVER_DIRsearch/'+search+'/1');
}
function search_cat(search_cat){
  window.location.replace('SERVER_DIRsearch/category'+search_cat+'/1');
}

function pagination(pag){
  var url  = window.location.href;
  var url_trimmed = url.substr(0, url.lastIndexOf("/"));
  //alert(url_trimmed+'/'+pag);

  window.location.replace(url_trimmed+'/'+pag);
}
</script>
