<?php
session_start();
if($_SESSION["logado"] == true && $_SESSION["nivel"] == 1){
?>

<!DOCTYPE html>
<html>

 <?php  include_once("includes/head.php") ?>

<body>
    <div id="wrapper">
        
       <?php  include_once("includes/nav.php") ?>
       
        <?php  include_once("includes/sidebar-left.php") ?>
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Dashboard <small>Pedidos Recebidos</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="/dashboard">Home</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
            <div id="page-inner">

                pedidos gfdgfd

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