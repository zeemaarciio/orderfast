<?php $page = "Order Fast - Login";
include("header.php");
?>

<!DOCTYPE HTML>
 <html lang="pt-br">
 <head>
 	<?php include_once("includes/head.php"); ?>
 	<title>Order Fast | Contato</title>
 </head>
 <body>
 	<?php  include_once ("includes/topo.php"); ?>

 	<div class="container">
 		
 		<!--<div id="cadastrar"><a href="https://sistema-tcc-zeemaarciio1.c9users.io/cadastro" title="Cadastre-se e confira fotos exclusivas!">Cadastre-se &raquo;<a/></div> -->
        <div id="login" class="form bradius">
       <div class="message" style="<?php echo $display;?>"><?php echo $msg;?></div>
       <div class="logo-login"><a href="<?php echo $home;?>" title="<?php echo $title;?>"><img src="css/imagens/logo2.png" alt="<?php echo $title;?>" title="<?php echo $title;?>" width="200" height="100"/></a></div>
       <div class="acomodar">
          <form action="login?acao=logar" method="post">
          <label for="email">E-mail:</label><input id="email" type="text" class="txt bradius" name="email" value="" placeholder="Digite seu e-mail"/>
          <label for="senha">Senha:</label><input id="senha" type="password" class="txt bradius" name="senha" value="" placeholder="Digite sua senha"/>
          <input type="submit" class="sb bradius" value="Entrar" />
          </form>
        
       <!--</div> -->
       
       </div>
 	</div><!-- container  -->

 	<?php include_once ("includes/footer.php"); ?>
 	
 </body>
 </html>