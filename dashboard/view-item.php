<?php
session_start();
if($_SESSION["logado"] == true && $_SESSION["nivel"] == 1){
?>

<?php

include_once("settings/conexao.php");

?>

<?php

	$id = $_GET['id'];
	$result = mysql_query("SELECT * FROM itens WHERE idItem = '$id' LIMIT 1");
	
	$resultado = mysql_fetch_assoc($result);

?>

<!DOCTYPE html>
<html ng-app>

 <?php  include_once("includes/head.php") ?>
 <link href="assets/css/estilo.css" rel="stylesheet" />
 <script src="angular/controllers/controllers.js"></script>


<body>
    <div id="wrapper">
        
       <?php  include_once("includes/nav.php") ?>
       
        <?php  include_once("includes/sidebar-left.php") ?>
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Dashboard <small>Visualizar Item</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="/dashboard">Home</a></li>
					  <li><a href="/dashboard/itens">Itens</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
			
            <div id="page-inner">

				
			<div class="row">
			 	<div class="table-responsive">          
				  <table class="table table-striped">
				    <tbody>
				      <tr>
				        <td class="col-md-3">ID:</td>
				        <td><?php echo utf8_encode($resultado['idItem']); ?></td>
				      </tr>
				      <tr>
				        <td>Nome do Item:</td>
				        <td><?php echo utf8_encode($resultado['nomeItem']); ?></td>
				      </tr>
				      <tr>
				        <td>Categoria do Item:</td>
				        <td><?php echo utf8_encode($resultado['categoria_Id']); ?></td>
				      </tr>
				      <tr>
				        <td>Descrição do Item:</td>
				        <td><?php echo utf8_encode($resultado['descricao']); ?></td>
				      </tr>
				      <tr>
				        <td>Preço:</td>
				        <td><?php echo "R$" . " " .utf8_encode($resultado['preco']); ?></td>
				      </tr>
				      <tr>
				        <td>Situação:</td>
				        <td><?php echo utf8_encode($resultado['situacao_Id']); ?></td>
				      </tr>
				      <tr>
				        <td>Data de Modificação:</td>
				        <td><?php echo utf8_encode($resultado['modified']); ?></td>
				      </tr>
				      <tr>
				        <td>Data de Criação:</td>
				        <td><?php echo utf8_encode($resultado['created']); ?></td>
				      </tr>
				      <tr>
				        <td>Foto:</td>
				        <td><?php echo utf8_encode($resultado['imagem']); ?></td>
				      </tr>
				    </tbody>
				  </table>
  				</div>
  		    </div>
  		    
				
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
     <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 
 		<script src="assets/css/MascaraValidacao.js"></script>
  <?php include_once("includes/js.php"); ?>
</body>

</html>

<?php  
}else{
  	header("Location: ../login.php");
}


?>
