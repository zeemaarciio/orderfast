
<?php 
$page = "Order Fast - Cadastro";
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
 		<!--   <div id="cadastrar"><a href="https://sistema-tcc-zeemaarciio1.c9users.io/login" title="Faça o login!">Login &raquo;<a/></div> -->
    <div id="login" class="form bradius" style="top:90px">
       <div class="message bradius " style="<?php echo $display;?>" ><?php echo $msg; ?> </div>
       <div class="logo-login"><a href="<?php echo $home;?>" title="<?php echo $title;?>"><img src="css/imagens/logo2.png" alt="<?php echo $title;?>" title="<?php echo $title;?>" width="200" height="100"/></a></div>
       <div class="acomodar">
          <form action="cadastro?acao=cadastrar" method="post">
          <label for="nome">Nome:</label><input id="nome" type="text" class="txt bradius" name="nome" placeholder="Digite seu nome"/>
          <label for="telefone">Telefone:</label><input id="telefone" type="text" class="txt bradius" name="telefone" placeholder="Digite seu telefone"/>
          <label for="cpfcnpj">Cpf/Cnpj</label><input id="cpfcnpj" type="text" class="txt bradius" name="cpfcnpj" placeholder="Digite seu Cpf/Cnpj"/>
          <label for="email">E-mail:</label><input id="email" type="text" class="txt bradius" name="email" placeholder="Digite seu e-mail"/>
          <label for="senha">Senha:</label><input id="senha" type="password" class="txt bradius" name="senha" placeholder="Digite sua senha"/>
          <input type="submit" class="sb bradius" value="Cadastrar" />
          </form>
        
       </div>
       
       <!--</div>-->
 	</div><!-- container  -->

 	<?php include_once ("includes/footer.php"); ?>
 	
 </body>
 </html>