<?php
ob_start();
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
					  <li class="active">Itens</li>
					</ol> 
									
		</div>
            <div id="page-inner">
              
                
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
                    <h2>Itens</h2>
                </div>
             
                <div class="col-md-6">
                    <div class="input-group h2">
                        <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Item">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
             
                <div class="col-md-3">
                    <a href="new-item" class="btn btn-primary pull-right h2">Novo Item</a>
                </div>
            </div> <!-- /#top -->
            </br>
            <div id="list" class="row">
 
                <div class="table-responsive col-md-12">
                    
                    <?php
                    //Deixa os caracteres acentuados
                    mysql_query("SET NAMES 'utf8'");
                    mysql_query('SET character_set_connection=utf8');
                    mysql_query('SET character_set_client=utf8');
                    mysql_query('SET character_set_results=utf8');
                        $resultado = mysql_query("SELECT * FROM itens ORDER BY 'idItem'");
                        
                        $linhas = mysql_num_rows($resultado);

                    ?>
                   
                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Categoria</th>
                                <th>Situação</th>
                                <!--<th>Header 3</th>-->
                                <th class="actions">Ações</th>
                             </tr>
                        </thead>
                        <tbody>
                     <?php
                     
                     if(empty($linhas)){
                         echo '<td colspan="6" style="text-align:center;" >Não há registros</td></tr>';
                     }
                     else{
                    
                    while($linhas = mysql_fetch_array($resultado)){
                        echo "<tr>";
                            echo "<td>".$linhas['idItem']."</td>";
                            echo "<td>".$linhas['nomeItem']."</td>";
                            echo "<td>".$linhas['preco']."</td>";
                            echo "<td>".$linhas['categoria_Id']."</td>";
                            echo "<td>".$linhas['situacao_Id']."</td>";
                            ?><td><a class='btn btn-success btn-xs' href='view-item?id=<?php echo $linhas['idItem']; ?>'>Visualizar</a> 
                            <a class='btn btn-warning btn-xs' href='editar-item?id=<?php echo $linhas['idItem']; ?>'>Editar</a>
                            <a class='btn btn-danger btn-xs'  href='exclui-item?idExclui=<?php echo $linhas['idItem']; ?>'>Excluir</a><?php
                        echo "<tr>";
                    }
                    // tira o resultado da busca da memória
                    mysql_free_result($resultado);
                     }
                    ?>
                            
             
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