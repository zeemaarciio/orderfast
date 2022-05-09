<?php
session_start();
if($_SESSION["logado"] == true && $_SESSION["nivel"] == 1){
?>


<?php

include_once("settings/conexao.php");

?>

<!DOCTYPE html>
<html ng-app>

 <?php  include_once("includes/head.php") ?>
 <script src="angular/controllers/controllers.js"></script>

<body>
    <div id="wrapper">
        
       <?php  include_once("includes/nav.php") ?>
       
        <?php  include_once("includes/sidebar-left.php") ?>
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Dashboard <small>Resumo do seu App</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="/dashboard">Home</a></li>
					  <li class="active">Restaurante</li>
					</ol> 
									
		</div>
            <div id="page-inner">
                
                <!--<div id="main" class="container-fluid">-->
                <!-- <h3 class="page">Visualizar Item #0001 - pagina editar</h3>-->
                 
                <!-- <div class="row">-->
                <!--  <div class="col-md-4">-->
                <!--    <p><strong>Nome do Campo</strong></p>-->
                <!--    <p>{Valor do Campo}</p>-->
                <!--  </div>-->
                <!--  <div class="col-md-4">-->
                <!--    <p><strong>Nome do Campo</strong></p>-->
                <!--    <p>{Valor do Campo}</p>-->
                <!--  </div>-->
                <!--  <div class="col-md-4">-->
                <!--    <p><strong>Nome do Campo</strong></p>-->
                <!--    <p>{Valor do Campo}</p>-->
                <!--  </div>-->
                <!--</div> <!-- .row -->
                
                <!--<hr />-->
                <!--<div id="actions" class="row">-->
                <!-- <div class="col-md-12">-->
                <!--   <a href="edit.html" class="btn btn-primary">Editar</a>-->
                <!--   <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Excluir</a>-->
                <!--   <a href="index.html" class="btn btn-default">Voltar</a>-->
                <!-- </div>-->
                <!--</div>-->
                
                <!-- Modal -->
                <!--<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">-->
                <!--  <div class="modal-dialog" role="document">-->
                <!--    <div class="modal-content">-->
                <!--      <div class="modal-header">-->
                <!--        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>-->
                <!--        <h4 class="modal-title" id="modalLabel">Excluir Item</h4>-->
                <!--      </div>-->
                <!--      <div class="modal-body">-->
                <!--        Deseja realmente excluir este item?-->
                <!--      </div>-->
                <!--      <div class="modal-footer">-->
                <!--        <button type="button" class="btn btn-primary">Sim</button>-->
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div> <!-- /.modal -->
                
                <div id="main" class="container-fluid">
                 <div id="top" class="row">
             
                 </div> <!-- /#top -->
             
                 <hr />
                 <div id="list" class="row">
                 
                 </div> <!-- /#list -->
             
                 <div id="bottom" class="row">
                 
                 </div> <!-- /#bottom -->
             </div>  <!-- /#main -->
             
             <div id="top" class="row">
                <div class="col-md-3">
                    <h2>Restaurante</h2>
                </div>
             
                <div class="col-md-6">
                    <div class="input-group h2">
                        <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Restaurante">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
             
                <div class="col-md-3">
                    <a href="new-restaurante" class="btn btn-primary pull-right h2">Novo Restaurante</a>
                </div>
            </div> <!-- /#top -->
            </br>
            <div id="list" class="row">
 
                <div class="table-responsive col-md-12">
                    
                    <?php
                        $resultado = mysql_query("SELECT * FROM restaurante ORDER BY 'idRestaurant'");
                        
                        $linhas = mysql_num_rows($resultado);
                    
                    ?>
                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fantasia</th>
                                <th>E-mail</th>
                                <!--<th>Header 3</th>-->
                                <th class="actions">Ações</th>
                             </tr>
                        </thead>
                        <tbody>
                            <? 
                               if(!empty($lista))//se não estiver vazia
                               {
                                   for ($i = 0; $i < count($lista); $i++) //gera as linhas conforme os registros
                                   {
                                       // tira o resultado da busca da memória colocar no final
                                        //mysql_free_result($dados);
                                        
                            ?>
                            <tr>
                                <td><?=$lista[$i]['idRestaurant']?></td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                                <td>Jes</td>
                                <td>01/01/2015</td>
                                <td class="actions">
                                    <a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
                                    <a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
                                    <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                                </td>
                            </tr>
                            <? } //for
                             }else{ //if ?>
                              <tr>
                                <td colspan="5" style="text-align:center;" >Não há registros</td></tr>
                                <? } ?>
                          <!--  <tr>
                                <td>1001</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                                <td>Jes</td>
                                <td>01/01/2015</td>
                                <td class="actions">
                                    <a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
                                    <a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
                                    <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1001</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                                <td>Jes</td>
                                <td>01/01/2015</td>
                                <td class="actions">
                                    <a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
                                    <a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
                                    <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1001</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                                <td>Jes</td>
                                <td>01/01/2015</td>
                                <td class="actions">
                                    <a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
                                    <a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
                                    <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                                </td>
                            </tr>-->
                            
             
                        </tbody>
                     </table>
             
                 </div>
             </div> <!-- /#list -->
             
             
             <div id="bottom" class="row">
                <div class="col-md-12">
                     
                    <ul class="pagination">
                        <li class="disabled"><a>&lt; Anterior</a></li>
                        <li class="disabled"><a>1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
                    </ul><!-- /.pagination -->
             
                </div>
            </div> <!-- /#bottom -->
            
            <!-- Modal -->
            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
                        </div>
                        <div class="modal-body">Deseja realmente excluir este item? </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Sim</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
  <?php include_once("includes/js.php"); ?>
</body>

</html>

<?php  
}else{
  	header("Location: ../login.php");
}
?>