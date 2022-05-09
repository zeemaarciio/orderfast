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

	if(isset($_POST['sendRestaurant'])){

    $nomeFantasia               = utf8_decode(ucwords(strtolower($_POST["nomeFantasia"])));
    $cnpj                       = $_POST["cnpj"];
    $razaoSocial                = utf8_decode(ucwords(strtolower($_POST["razaoSocial"])));
    $nomeCompleto               = utf8_decode($_POST["nomeCompleto"]);
    $emailRestaurant            = $_POST["emailRestaurant"];
    $cpf                        = $_POST["cpf"];
    $fone                       = $_POST["fone"];
    $celular                    = $_POST["celular"];
    $endereco                   = utf8_decode($_POST["endereco"]);
    $numero                     = $_POST["numero"];
    $cep                        = $_POST["cep"];
    $bairro                     = utf8_decode($_POST["bairro"]);
    $cidade                     = utf8_decode($_POST["cidade"]);
    $uf                         = $_POST["uf"];
    
    if(empty($nomeFantasia) || empty($cnpj) || empty($razaoSocial) || empty($nomeCompleto) || 
    empty($emailRestaurant) || empty($cpf) || empty($fone) || empty($celular) || empty($endereco) || 
    empty($numero) || empty($cep) || empty($bairro) || empty($cidade) || empty($uf)){
			 //$mensagem = "Preencha todos os campos!";
	}
	
	function validMail($emailRestaurant){// função para verificar se o email é válido
	if(preg_match('/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/',$emailRestaurant)){
		return true;
	}else{
		return false;
	}
}
	if ( ( ! isset( $emailRestaurant ) || ! validMail( $emailRestaurant, FILTER_VALIDATE_EMAIL ) )) {
	$mensagem = 'Digite seu e-mail corretamente!';
}

	else{
		
    	 $validaremail = mysql_query("SELECT * FROM restaurante WHERE emailRestaurant='$emailRestaurant'");
		 $contar = mysql_num_rows($validaremail);
		 if($contar == 0){

	    $query = mysql_query("INSERT INTO restaurante (nomeFantasia, cnpj, razaoSocial, nomeCompleto, emailRestaurant, cpf, fone, celular,
	    endereco, numero, cep, bairro, cidade, uf, created) VALUES ('$nomeFantasia', '$cnpj', '$razaoSocial', '$nomeCompleto', 
	    '$emailRestaurant', '$cpf', '$fone', '$celular', '$endereco', '$numero', '$cep', '$bairro', '$cidade', '$uf', NOW())");
	    
		 }
		 else{
		 	$flash2="Oops! Este email já está cadastrado em nosso sistema!";
		 }
		 if(isset($query)){
		 	if(mysql_affected_rows() != 0){
			   $flash2="Cadastro realizado com sucesso!";
			   
		 	}
		   }else{
		   		if($flash2 == ""){
			   		$flash2="Ops! Houve um erro no sistema, tente novamente!";
			 }
		   }

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
					  <li><a href="/dashboard/restaurante">Restaurante</a></li>
					  <li class="active">Novo Restaurante</li>
					</ol> 
									
		</div>
			<div class="message bradius " style="<?php echo $display;?>" ><?php echo $mensagem; ?> </div>
			<div class="flash2 bradius " style="<?php echo $display2;?>" ><?php echo $flash2; ?> </div>
            <div id="page-inner">

				<form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				  <!-- area de campos do form -->
				  
				  <section style="margin: 10px;">
					<fieldset style="border-radius: 5px; padding: 5px; min-height:150px;">
						<legend><b>Dados da Empresa</b> </legend>
						<label> <br/> </label>
						
						<div class="row">
						    <div class="form-group col-md-9">
							  <label for="nomeFantasia">Nome Fantasia<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="nomeFantasia" name="nomeFantasia" placeholder="nome fantasia da empresa" required>
					 		</div>
					 		
					 		<div class="form-group col-md-9">
							  <label for="cnpj">CNPJ<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="ex: xx.xxx.xxx/xxxx-xx" required>
					 		</div>
					 		
					 		<div class="form-group col-md-9">
							  <label for="razaoSocial">Razão Social<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="razaoSocial" name="razaoSocial" placeholder="razão social da empresa" required>
					 		</div>
					 
						</div>
						<label> <br/> </label>
					</fieldset>
					
					<label> <br/> </label>
					
					<section style="margin: 1px;">
					<fieldset style="border-radius: 5px; padding: 5px; min-height:150px;">
						<legend><b>Dados Pessoais</b> </legend>
						<label> <br/> </label>
						
						<div class="row">
						    <div class="form-group col-md-9">
							  <label for="nomeCompleto">Nome Completo<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="ex: José da Silva" required>
					 		</div>
					 		
					 		<div class="form-group col-md-9">
							  <label for="emailRestaurant">E-mail<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="emailRestaurant" name="emailRestaurant" placeholder="ex: saci@perere.com.br" required>
					 		</div>
					 		
					 		<div class="form-group col-md-9">
							  <label for="cpf">CPF<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="cpf" name="cpf" placeholder="ex: xxx.xxx.xxx-xx " required>
					 		</div>
					 		
					 		<div class="form-group col-md-4">
							  <label for="fone">Fone<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="fone" name="fone" placeholder="telefone" required>
					 		</div>
					 		
					 		<div class="form-group col-md-4">
							  <label for="celular">Celular<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="celular" name="celular" placeholder="celular" required>
					 		</div>
					 
					 
						</div>
						<label> <br/> </label>
					</fieldset>
					
					<label> <br/> </label>
					
					<section style="margin: 1px;">
					<fieldset style="border-radius: 5px; padding: 5px; min-height:150px;">
						<legend><b>Endereço</b> </legend>
						<label> <br/> </label>
						
						<div class="row">
						    <div class="form-group col-md-6">
							  <label for="endereco">Endereço<span style="color:red">*</span><span style="color:red"></span></label>
							  <input type="text" class="form-control" id="fone" name="endereco" placeholder="ex: rua do saci perere" required>
					 		</div>
					 		
					 		<div class="form-group col-xs-2">
							   <label for="numero">Número<span style="color:red">*</span></label>
							   <input type="text" class="form-control" id="numero" name="numero" placeholder="N°" maxlength="5" required>
							</div>
							
							<div class="form-group col-xs-3">
							   <label for="cep">CEP<span style="color:red">*</span></label>
							   <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" maxlength="10"onkeyup="MaskData(this)" required>
							</div>
					 		
					 		<div class="form-group col-md-4">
							  <label for="bairro">Bairro<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="bairro" name="bairro" placeholder="ex: Centro" required>
					 		</div>
					 		
					 		<div class="form-group col-md-4">
							  <label for="cidade">Cidade<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="cidade" name="cidade" placeholder="ex: Garça " required>
					 		</div>
					 		
					 		<div class="form-group col-xs-3">
		                        <label>UF<span style="color:red">*</span></label>
		                        <select class="form-control" name="uf" id="uf">
		                            <option disabled selected>Estado</option>
		                            <option value="ac">Acre</option> 
								    <option value="al">Alagoas</option> 
								    <option value="am">Amazonas</option> 
								    <option value="ap">Amapá</option> 
								    <option value="ba">Bahia</option> 
								    <option value="ce">Ceará</option> 
								    <option value="df">Distrito Federal</option> 
								    <option value="es">Espírito Santo</option> 
								    <option value="go">Goiás</option> 
								    <option value="ma">Maranhão</option> 
								    <option value="mt">Mato Grosso</option> 
								    <option value="ms">Mato Grosso do Sul</option> 
								    <option value="mg">Minas Gerais</option> 
								    <option value="pa">Pará</option> 
								    <option value="pb">Paraíba</option> 
								    <option value="pr">Paraná</option> 
								    <option value="pe">Pernambuco</option> 
								    <option value="pi">Piauí</option> 
								    <option value="rj">Rio de Janeiro</option> 
								    <option value="rn">Rio Grande do Norte</option> 
								    <option value="ro">Rondônia</option> 
								    <option value="rs">Rio Grande do Sul</option> 
								    <option value="rr">Roraima</option> 
								    <option value="sc">Santa Catarina</option> 
								    <option value="se">Sergipe</option> 
								    <option value="sp">São Paulo</option> 
								    <option value="to">Tocantins</option> 
		                        </select>
		                    </div>

						</div>
						<label> <br/> </label>
					</fieldset>
		  
				  <hr />
				  <div id="actions" class="row">
				    <div class="col-md-12">
				      <!--<button type="submit" class="btn btn-primary">Cadastrar Restaurante</button>-->
				      <input type="submit" class="btn btn-primary" name="sendRestaurant" value="Cadastrar Restaurante" />
				      <a href="restaurante" class="btn btn-default">Cancelar</a>
				    </div>
				  </div>
			

		   </form>
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
