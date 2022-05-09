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

            	<form>
	    		<br />
			  <div class="form-group">
			    <label for="exampleInputEmail1"style="margin-left: 15px;">Nome</label>
			    <br />
			    <div class=col-md-6>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nome do Restaurante">	
			  </div>
			  	<br />
			  	<br />
			  <div class="form-group">
			    <label for="exampleInputEmail1"style="margin-left: 15px;">Telefone</label>
			    <br />
			    <div class=col-md-6>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Telefone do Restaurante">	
			  </div>
			  	<br />
			  	<br />
			  <div class="form-group">
			    <label for="exampleInputEmail1"style="margin-left: 15px;">Endereço</label>
			    <br />
			    <div class=col-md-6>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Endereço do Restaurante + Numero">	
			  </div>
			  	<br />
			  	<br />
			  <div class="form-group">
			    <label for="exampleInputEmail1" style="margin-left: 15px;">Bairro</label>
			    <br />
			    <div class=col-md-6>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Bairro">	
			  </div>
			  <div class="form-group">
			  	<br />
			  	<br />
			    <label for="exampleInputEmail1" style="margin-left: 15px;">CEP</label>
			    <br />
			    <div class=col-md-6>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="CEP">	
			  </div>
			  <div class="form-group">
			  	<br />
			  	<br />
			    <label for="exampleInputEmail1" style="margin-left: 15px;">Cidade</label>
			    <br />
			    <div class=col-md-6>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Cidade + Estado">	
			  </div>
			    <br />
			    <br />
			    <br />
			  
			  <button type="submit" class="btn btn-default"style="margin-left: 15px;">Submit</button>
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