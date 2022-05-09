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

            	<form action="#">
            	
				<div class="form-group">
			    <label for="exampleInputEmail1"style="margin-left: 15px;">Título*</label>
			    <br />
			    <div class=col-md-6>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nome da Categoria">	
			  </div>
			  	<br />
			  	<br />
			  	<br />
			  	<div class="form-group" style="margin-left: 15px;">
                   <label>Foto (620 x 270px)</label>
                   <input type="file">
                </div>
                
                <div class="checkbox" style="margin-left: 15px;">
                    <label>
                        <input type="checkbox" value="" >Disponível
                    </label>
                </div>
                
                <!-- area de campos do form -->
				  <hr />
				  <div id="actions" class="row">
				    <div class="col-md-12" style="margin-left: 15px;">
				      <button type="submit" class="btn btn-primary">Criar Categoria</button>
				      <a href="categories" class="btn btn-default">Cancelar</a>
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