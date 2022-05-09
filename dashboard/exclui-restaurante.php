<?php
ob_start();
session_start();
if($_SESSION["logado"] == true && $_SESSION["nivel"] == 1){
?>

<?php

include_once("settings/conexao.php");
//$mensagem="";

	$idExclui = $_GET["idExclui"];

	$query		= "DELETE FROM restaurante WHERE idRestaurant = '$idExclui'";
	$resultado	= mysql_query($query);

        if(mysql_affected_rows() != 0){
        //	$flash2="Restaurante apagado com sucesso!";
           echo "<p class='msg-success'> Usuário Cadastrado com sucesso!</p>";
           header("Location: restaurante.php"); 
           exit();
            // echo "<script>location.href='restaurante';</script>"; 
        }
       
//Variáveis de estilo
if($mensagem == ""){
	$display="display:none;";
}else{
	$display="display:block;";
}

if($flash2 == ""){
	$display2="display:none;";
}else{
	$display2="display:block;";
}
?>

<?php

	$idExclui = $_GET['idExclui'];
	$result = mysql_query("SELECT * FROM restaurante WHERE idRestaurant = '$idExclui' LIMIT 1");
	
	$resultado = mysql_fetch_assoc($result);

?>

			<div class="message bradius " style="<?php echo $display;?>" ><?php echo $mensagem; ?> </div>
			<div class="flash2 bradius " style="<?php echo $display2;?>" ><?php echo $flash2; ?> </div>


<?php  
}else{
  	header("Location: ../login.php");
}


?>
