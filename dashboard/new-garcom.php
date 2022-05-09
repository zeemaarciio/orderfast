<?php
session_start();
if($_SESSION["logado"] == true && $_SESSION["nivel"] == 1){
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
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Library</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
            <div id="page-inner">

            <form action="cadastro?acao=cadastrar" method="post">
			  <!-- area de campos do form -->
			  <div class="row">
				 <div class="form-group col-md-6">
				   <label for="nameGarcom">Nome:</label>
				   <input type="text" class="form-control" id="nameGarcom" name="nameGarcom" placeholder="Nome Completo do Garçom">
				 </div>
				 
				 <div class="form-group col-md-6">
				   <label for="cpfGarcom">CPF:</label>
				   <input type="text" class="form-control" id="cpfGarcom" name="cpfGarcom" placeholder="CPF do Garçom">
				 </div>
				 
				 <div class="form-group col-md-4">
				   <label for="emailGarcom">E-mail:</label>
				   <input type="text" class="form-control" id="emailGarcom" name="emailGarcom" placeholder="E-mail do Garçom">
				 </div>
				
				<div class="form-group col-md-4">
				   <label for="senhaGarcom">Senha:</label>
				   <input type="text" class="form-control" id="senhaGarcom" name="senhaGarcom" placeholder="Senha do Garçom">
				 </div>
				</div>
			  <hr />
			  <div id="actions" class="row">
			    <div class="col-md-12">
			      <input type="submit" class="btn btn-primary"></input>
			      <a href="garcom" class="btn btn-default">Cancelar</a>
			    </div>
			  </div>
			</form>
            
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