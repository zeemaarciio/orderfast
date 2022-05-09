<?php
session_start();
if($_SESSION["logado"] == true && $_SESSION["nivel"] == 1){
?>

<?php

include_once("settings/conexao.php");
$mensagem="";

	if(isset($_POST['sendRestaurant'])){
 
	$id            				= $_POST["id"];
	$nomeFantasia               = utf8_decode(ucwords(strtolower($_POST["nomeFantasia"])));
    //$cnpj                       = htmlspecialchars(mysql_real_escape_string($_POST["cnpj"]));
    $razaoSocial                = utf8_decode(ucwords(strtolower($_POST["razaoSocial"])));
    $nomeCompleto               = utf8_decode($_POST["nomeCompleto"]);
    //$emailRestaurant            = htmlspecialchars(mysql_real_escape_string($_POST["emailRestaurant"]));
    //$cpf                        = htmlspecialchars(mysql_real_escape_string($_POST["cpf"]));
    $fone                       = $_POST["fone"];
    $celular                    = $_POST["celular"];
    $endereco                   = utf8_decode($_POST["endereco"]);
    $numero                     = $_POST["numero"];
	$cep                        = $_POST["cep"];
    $bairro                     = utf8_decode($_POST["bairro"]);
    $cidade                     = utf8_decode($_POST["cidade"]);
    //$uf                         = $_POST["uf"];
    
    	$query = mysql_query ("UPDATE restaurante SET nomeFantasia = '$nomeFantasia', razaoSocial = '$razaoSocial',
    	nomeCompleto = '$nomeCompleto', fone = '$fone', celular = '$celular', endereco = '$endereco',
    	numero = '$numero', cep = '$cep', bairro = '$bairro', cidade = '$cidade', modified = NOW() WHERE idRestaurant = '$id'");
    
        if(mysql_affected_rows() != 0){
            $flash2="Editado com sucesso!";
        }

}
		$id = mysql_real_escape_string($_GET['id']);
		$result = mysql_query("SELECT * FROM restaurante WHERE idRestaurant = '$id' LIMIT 1");
		$resultado = mysql_fetch_assoc($result);

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
                            Dashboard <small>Editar Restaurante</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="/dashboard">Home</a></li>
					  <li><a href="/dashboard/restaurante">Restaurante</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
			<div class="message bradius " style="<?php echo $display;?>" ><?php echo $mensagem; ?> </div>
			<div class="flash2 bradius " style="<?php echo $display2;?>" ><?php echo $flash2; ?> </div>
            <div id="page-inner">

				<form name="formRestaurant" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				  <!-- area de campos do form -->
				  
				  <section style="margin: 10px;">
					<fieldset style="border-radius: 5px; padding: 5px; min-height:150px;">
						<legend><b>Dados da Empresa</b> </legend>
						<label> <br/> </label>
						
						<div class="row">
						    <div class="form-group col-md-9">
							  <label for="nomeFantasia">Nome Fantasia<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="nomeFantasia" name="nomeFantasia" placeholder="nome fantasia da empresa" value="<?php
							    echo utf8_encode($resultado['nomeFantasia']); ?>">
					 		</div>
					 		
					 		<div class="form-group col-md-9">
							  <label for="cnpj">CNPJ<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="ex: xx.xxx.xxx/xxxx-xx" value="<?php
							  echo utf8_encode($resultado['cnpj']); ?>" disabled>
					 		</div>
					 		
					 		<div class="form-group col-md-9">
							  <label for="razaoSocial">Razão Social<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="razaoSocial" name="razaoSocial" placeholder="razão social da empresa" 
							  value="<?php
							  echo utf8_encode($resultado['razaoSocial']); ?>">
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
							  <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="ex: José da Silva" value="<?php
							  echo utf8_encode($resultado['nomeCompleto']); ?>">
					 		</div>
					 		
					 		<div class="form-group col-md-9">
							  <label for="emailRestaurant">E-mail<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="emailRestaurant" name="emailRestaurant" placeholder="ex: saci@perere.com.br" value="<?php
							  echo utf8_encode($resultado['emailRestaurant']); ?>" disabled>
					 		</div>
					 		
					 		<div class="form-group col-md-9">
							  <label for="cpf">CPF<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="cpf" name="cpf" placeholder="ex: xxx.xxx.xxx-xx " value="<?php
							  echo utf8_encode($resultado['cpf']); ?>" disabled>
					 		</div>
					 		
					 		<div class="form-group col-md-4">
							  <label for="fone">Fone<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="fone" name="fone" placeholder="telefone" value="<?php
							  echo utf8_encode($resultado['fone']); ?>">
					 		</div>
					 		
					 		<div class="form-group col-md-4">
							  <label for="celular">Celular<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="celular" name="celular" placeholder="celular" value="<?php
							  echo utf8_encode($resultado['celular']); ?>">
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
							  <input type="text" class="form-control" id="endereco" name="endereco" placeholder="ex: rua do saci perere" value="<?php
							  echo utf8_encode($resultado['endereco']); ?>">
					 		</div>
					 		
					 		<div class="form-group col-xs-2">
							   <label for="numero">Número<span style="color:red">*</span></label>
							   <input type="text" class="form-control" id="numero" name="numero" placeholder="N°" maxlength="5" value="<?php
							  echo utf8_encode($resultado['numero']); ?>">
							</div>
							
							<div class="form-group col-xs-3">
							   <label for="cep">CEP<span style="color:red">*</span></label>
							   <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" maxlength="10"onkeyup="MaskData(this)" value="<?php
							  echo utf8_encode($resultado['cep']); ?>">
							</div>
					 		
					 		<div class="form-group col-md-4">
							  <label for="bairro">Bairro<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="bairro" name="bairro" placeholder="ex: Centro" value="<?php
							  echo utf8_encode($resultado['bairro']); ?>">
					 		</div>
					 		
					 		<div class="form-group col-md-4">
							  <label for="cidade">Cidade<span style="color:red">*</span></label>
							  <input type="text" class="form-control" id="cidade" name="cidade" placeholder="ex: Garça " value="<?php
							  echo utf8_encode($resultado['cidade']); ?>">
					 		</div>
					 		
					 		<div class="form-group col-xs-3">
		                        <label>UF<span style="color:red">*</span></label>
		                        <select class="form-control" name="uf" id="uf" value="<?php
							  echo utf8_encode($resultado['uf']); ?>" disabled>
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
				  
				  <input type="hidden" name="id" id="id" value="<?php echo $resultado['idRestaurant'];  ?>">
				  
				  <div id="actions" class="row">
				    <div class="col-md-12">
				      <!--<button type="submit" class="btn btn-primary">Cadastrar Restaurante</button>-->
				      <input type="submit" class="btn btn-primary" name="sendRestaurant" value="Editar Restaurante" />
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
