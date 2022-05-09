<?php
ob_start();
session_start();
if($_SESSION["logado"] == true && $_SESSION["nivel"] == 1){
?>

<?php

include_once("settings/conexao.php");
//$mensagem="";
$erro = false;

foreach ( $_POST as $chave => $valor ) {
	// Remove todas as tags HTML
	// Remove os espaços em branco do valor
	$chave = trim( strip_tags( $valor ) );
	
	// Verifica se tem algum valor nulo
	if ( empty ( $valor ) ) {
		$erro = 'Existem campos em branco.';
	}
}

	if(isset($_POST['sendItem'])){

    $nomeItem        = utf8_decode(ucwords(strtolower($_POST["nomeItem"])));
    $descricao       = utf8_decode(ucwords(strtolower($_POST["descricao"])));
    //$tag             = utf8_decode(ucwords(strtolower($_POST["tag"])));
    //$description     = utf8_decode(ucwords(strtolower($_POST["description"])));
    $preco           = $_POST["preco"];
    $imagem          = $_FILES['imagem']['name'];
    $categoria_Id    = utf8_decode($_POST["categoria_Id"]);
    $situacao_Id	 = utf8_decode($_POST["situacao_Id"]);
   
   /* 
    //Pasta onde a foto vai ser salva
    $_UP['pasta'] = '../uploads';
    
    //Tamanho máximo da foto
    $_UP['tamanho'] = 1024*1024*100; //capacidade 5mb
    
    //Array de extensões permitidas
    $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'git');
    
    //Renomear a imagem
    $_UP['renomear'] = false;
    
    //Array com tipo de erros de uploads
    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'A imagem no upload é maior que o limite';
    $_UP['erros'][2] = 'A imagem ultrapassa o limite de tamanho';
    $_UP['erros'][3] = 'O upload da imagem foi feito parcialmente';
    $_UP['erros'][4] = 'Não foi feito o upload da imagem';
    
    //Verificar se houve erro no upload
    if($_FILES['imagem']['error'] != 0){
    	die("Não foi possivel fazer o upload");
    	exit;
    }
    
    //verifica extensao
    $extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));
    if(array_search($extensao, $_UP['extensoes']) === false){
    	$mensagem = "Somente imagens png, jpg e jpeg são permitidas!";
    }
    //verifica o tamanho da imagem
    else if($_UP['tamanho'] < $_FILES['imagem']['size']){
    	echo "Imagem Enviado é muito Grande. Envie até 2 mb.";
    }
    
    else{
    	if($_UP['renomear'] == true){
    		$nome_final = time().'.jpg';
    	}else{
    		//mantem nome original
    		$nome_final = $_FILES['imagem']['name'];
    	}
    	//verifica se pode mover a foto
    	if(move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'].$nome_final)){
    		//Faz o Upload
    		$mensagem = "Imagem carregada com sucesso!";
    	}else{
    		$mensagem = "Imagem nao foi carregada!";
    	}
    }
    */
    
    
 //   if(empty($nomeFantasia) || empty($cnpj) || empty($razaoSocial) || empty($nomeCompleto) || 
 //   empty($emailRestaurant) || empty($cpf) || empty($fone) || empty($celular) || empty($endereco) || 
 //   empty($numero) || empty($cep) || empty($bairro) || empty($cidade) || empty($uf)){
	// 		 //$mensagem = "Preencha todos os campos!";
	// }
	
	if(empty($nomeItem)){
			 $mensagem = "Preencha o campo Item!";
	}
	
	else
	if(strlen($nomeItem) < 5){
		$mensagem = "O nome do Item deve ter no mínimo 5 caracteres!";
	}
	else
	if(empty($descricao)){
		$mensagem = "Preencha o campo Descrição!";
	}
	
	else
	if(empty($preco)){
		$mensagem = "Preencha o campo Preço!";
	}
	
	else
	if(! is_numeric($preco)){
		$mensagem = "Preencha o campo Preço com numeros!";
	}
	
	else
	if(empty($categoria_Id)){
		$mensagem = "Selecione uma Categoria!";
	}
	
	else
	if(empty($situacao_Id)){
		$mensagem = "Selecione uma Situação!";
	}
	
	else{
		
		$verifica = mysql_query("SELECT * FROM itens WHERE nomeItem='$nomeItem'");//verifica se ja tem um nome cadastrado
		$contar = mysql_num_rows($verifica);
		if($contar == 0){
    	
    	$query = mysql_query("INSERT INTO itens (nomeItem, descricao, preco, imagem, categoria_Id, situacao_Id, created) VALUES ('$nomeItem',
    	'$descricao', '$preco', '$imagem', '$categoria_Id', '$situacao_Id', NOW())");
    	
		}
		else{
		 	$flash2="Oops! Este Item já está cadastrado!";
		 }
		 if(isset($query)){
		 	if(mysql_affected_rows() != 0){
			   $flash2="Item cadastrado com sucesso!";
			   
		 	}
		   }else{
		   		if($flash2 == ""){
			   		$flash2="Ops! Houve um erro no sistema, tente novamente!";
			 }
		   }
    
       // if(mysql_affected_rows() != 0){
        	//$flash2="Categoria cadastrada com sucesso!";
            //header("Location: restaurante.php");
            //exit();
        //}
        //$flash2="Cadastro realizado com sucesso!";
	}
//	echo "<script>location.href='restaurante';</script>"; 
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
                            Dashboard <small>Resumo do seu App</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="/dashboard">Home</a></li>
					  <li><a href="/dashboard/itens">Itens</a></li>
					  <li class="active">Novo Item</li>
					</ol> 
									
		</div>
			<div class="message bradius " style="<?php echo $display;?>" ><?php echo $mensagem; ?> </div>
			<div class="flash2 bradius " style="<?php echo $display2;?>" ><?php echo $flash2; ?> </div>
            <div id="page-inner">

				<form name="formItem" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
				  <!-- area de campos do form -->
				  
				  <section style="margin: 10px;">
					<fieldset style="border-radius: 5px; padding: 5px; min-height:150px;">
						<legend><b>Cadastro de Itens</b> </legend>
						<label> <br/> </label>
						
						<div class="row">
						    <div class="form-group col-md-9">
							  <label for="nomeItem">Título<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="nomeItem" name="nomeItem" placeholder="Nome do Item">
					 		</div>
					 		
					 		<div class="form-group col-md-9">
							  <label for="descricao">Descrição<span style="color:red">*</span></label>
							  <!--<input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do Item">-->
							  <textarea class="form-control" rows="3" id="descricao" name="descricao"></textarea>
					 		</div>
					 		
					 		<div class="form-group col-md-4">
							  <label for="preco">Preço<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="preco" name="preco" placeholder="10.50">
					 		</div>
					 		
					 		<div class="form-group col-md-4">
	                        <label>Categoria<span style="color:red">*</span></label>
	                        <select class="form-control" name="categoria_Id" id="categoria_Id">
	                            <option disabled selected>Escolha uma Categoria</option>
	                            <?php
	                            
		                            $resultado = mysql_query("SELECT * FROM categoria order by nomeCategoria");
		                            while($dados = mysql_fetch_assoc($resultado)){
	                            ?>
	                            	<option value="<?php echo utf8_encode($dados['nomeCategoria']); ?>"><?php echo utf8_encode($dados['nomeCategoria']); ?></option>
	                            <?php } ?>

	                        </select>
	                    </div>

					 		<div class="form-group col-md-6">
							  <label for="imagem">Foto (620 x 620px)<span style="color:red">*</span></label>
							  <input type="file" class="form-control" id="imagem" name="imagem">
					 		</div>
		
					 	<div class="form-group col-xs-4">
		                        <label>Situação<span style="color:red">*</span></label>
		                        <select class="form-control" name="situacao_Id" id="situacao_Id">
		                            <option disabled selected>Escolha a Situação</option>
		                            <?php
	                            
		                            $resultado = mysql_query("SELECT * FROM situacao");
		                            while($dados = mysql_fetch_assoc($resultado)){
	                            ?>
	                            	<option value="<?php echo utf8_encode($dados['nome']); ?>"><?php echo utf8_encode($dados['nome']); ?></option>
	                            <?php } ?>
		                        </select>
		                    </div>
					 
						</div>

						<label> <br/> </label>
					</fieldset>
				
				  <hr />
				  <div id="actions" class="row">
				    <div class="col-md-12">
				      <!--<button type="submit" class="btn btn-primary">Cadastrar Restaurante</button>-->
				      <input type="submit" class="btn btn-primary" name="sendItem" value="Cadastrar Item" />
				      <a href="itens" class="btn btn-default">Cancelar</a>
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