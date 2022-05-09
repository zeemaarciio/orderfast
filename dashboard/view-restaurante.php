<?php
session_start();
if($_SESSION["logado"] == true && $_SESSION["nivel"] == 1){
?>

<?php

include_once("settings/conexao.php");

?>

<?php

	$id = $_GET['id'];
	$result = mysql_query("SELECT * FROM restaurante WHERE idRestaurant = '$id' LIMIT 1");
	
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
                            Dashboard <small>Visualizar Restaurante</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="/dashboard">Home</a></li>
					  <li><a href="/dashboard/restaurante">Restaurante</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
			
            <div id="page-inner">

				
			<div class="row">
			 	<div class="table-responsive">          
				  <table class="table table-striped">
				    <tbody>
				      <tr>
				        <td class="col-md-3">Id:</td>
				        <td><?php echo utf8_encode($resultado['idRestaurant']); ?></td>
				      </tr>
				      <tr>
				        <td>Nome Fantasia:</td>
				        <td><?php echo utf8_encode($resultado['nomeFantasia']); ?></td>
				      </tr>
				      <tr>
				        <td>CNPJ:</td>
				        <td><?php echo utf8_encode($resultado['cnpj']); ?></td>
				      </tr>
				      <tr>
				        <td>Razão Social:</td>
				        <td><?php echo utf8_encode($resultado['razaoSocial']); ?></td>
				      </tr>
				      <tr>
				        <td>Nome Completo:</td>
				        <td><?php echo utf8_encode($resultado['nomeCompleto']); ?></td>
				      </tr>
				      <tr>
				        <td>Email Restaurante:</td>
				        <td><?php echo utf8_encode($resultado['emailRestaurant']); ?></td>
				      </tr>
				      <tr>
				        <td>CPF:</td>
				        <td><?php echo utf8_encode($resultado['cpf']); ?></td>
				      </tr>
				      <tr>
				        <td>Telefone:</td>
				        <td><?php echo utf8_encode($resultado['fone']); ?></td>
				      </tr><tr>
				        <td>Celular:</td>
				        <td><?php echo utf8_encode($resultado['celular']); ?></td>
				      </tr>
				      <tr>
				        <td>Endereço:</td>
				        <td><?php echo utf8_encode($resultado['endereco']); ?></td>
				      </tr>
				      <tr>
				        <td>Número:</td>
				        <td><?php echo utf8_encode($resultado['numero']); ?></td>
				      </tr>
				      <tr>
				        <td>CEP:</td>
				        <td><?php echo utf8_encode($resultado['cep']); ?></td>
				      </tr>
				      <tr>
				        <td>Bairro:</td>
				        <td><?php echo utf8_encode($resultado['bairro']); ?></td>
				      </tr>
				      <tr>
				        <td>Cidade:</td>
				        <td><?php echo utf8_encode($resultado['cidade']); ?></td>
				      </tr>
				      <tr>
				        <td>UF:</td>
				        <td><?php echo utf8_encode($resultado['uf']); ?></td>
				      </tr>
				      <td>Data de Modificação:</td>
				        <td><?php echo utf8_encode($resultado['modified']); ?></td>
				      </tr>
				      <tr>
				        <td>Data de Criação:</td>
				        <td><?php echo utf8_encode($resultado['created']); ?></td>
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
