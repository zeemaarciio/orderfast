<?php   
$page = "Order Fast - Painel Administrativo";
include("header.php");
?>

<div id="cadastrar"><a href="login?acao=logout" title="Fazer Logout!">Logout &raquo;<a/></div>
    <div id="login" class="form bradius">
       <div class="message" style="<?php echo $display;?>"><?php echo $msg;?></div>
       <div class="logo"><a href="<?php echo $home;?>" title="<?php echo $title;?>"><img src="css/imagens/logo2.png" alt="<?php echo $title;?>" title="<?php echo $title;?>" width="200" height="100"/></a></div>
       <div class="acomodar">
       <?php
       if($nivel == 2){

     ?>

        <table width="140%" border="0" style="padding-right: 0px; padding-top: 23px; margin: 0 0 0 -40px;">
        	<tr>
        		<td><strong>Nome:</strong></td>
        		<td><strong>Status:</strong></td>
        		<td><strong>Ação:</strong></td>
        		<td><strong>Data:</strong></td>
        	
        	</tr>
        	<?php
	        	$buscarusuarios = mysql_query("SELECT * FROM users WHERE nivel='1' order by nome");//verifica o nivel do usuario cadastrado
	        	if(mysql_num_rows($buscarusuarios) == 0){
	        		echo "Nenhúm usuário cadastrado no sistema!";//melhorar a frase no css
	        	}else{
	        		while($linha = mysql_fetch_array($buscarusuarios)){

        	?>

        	<tr>
        		<td><?php  echo utf8_encode($linha["nome"]); ?></td>
        		<td><?php  echo $linha["status"]; ?></td>
        		<td><?php $id=$linha["id"]; if($linha["status"] == 0){echo "<a href=\"login.php?acao=aprovar&amp;id=$id\">Aprovar</a>";}else{echo "<a href=\"login.php?acao=bloquear&amp;id=$id\">Bloquear</a>";} ?></td>
        		<td><?php echo $linha["data"]; ?></td>
        	</tr>
        	<?php } } ?>
        </table>
        <?php }else{
            header("Location:/projects/orderfast/dashboard");
        ?>
        
        <?php } ?>
        
       </div>
       
       </div>
</body>
</html>