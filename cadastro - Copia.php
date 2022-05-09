
<!DOCTYPE HTML>
 <html lang="pt-br">
 <head>
 	<?php include_once("includes/head.php"); ?>
 	<link rel="stylesheet" type="text/css" href="http://localhost:8080/sitekim/css/register.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
 	<title>Order Fast | Cadastro</title>
 	
 </head>
 <body>
 	<?php  include_once ("includes/header.php"); ?>

 	<div class="container">
 		<div class="container-form">
	 		<div class="profile">
	 			<h2>Cadastrando Seu Restaurante</h2>
	 		</div>
	 		<br />
	 		<br />
	 		<form action="" method="post">
				 <div class="row form-group">
				  	<div class="col-xs-12">
				  		<input type="text" class="txt bradius" id="nomeRestaurante" name="nomeRestaurante" style="width:99.3%;" maxlength="40" placeholder="Nome do Restaurante" />
				  	</div>
				    
				 </div>
				  <div class="form-group">
				   <input type="tel" name="telRestaurante" id="telRestaurante" class="txt bradius" style="width:100%;" maxlength="13" placeholder="Telefone do Restaurante (apenas números)" />
				  </div>
				  <div class="form-group">
				    <input type="text" class="txt bradius" id="endRestaurante" name="endRestaurante" size="80" maxlength="40" placeholder="Endereço do Restaurante" />
				    	
				    		<input type="text" class="txt bradius" id="numeroRestaurante" name="numeroRestaurante" style="width:24%;" maxlength="4" placeholder="Número" />
				    	
				  </div>
				  	<div class="form-group">
				    	<input type="text" class="txt bradius" id="bairroRestaurante" name="bairroRestaurante" size="60" maxlength="40" placeholder="Bairro" />

				    	<input type="text" class="txt bradius" id="cepRestaurante" name="cepRestaurante" style="width:42%;" maxlength="8" placeholder="CEP (apenas números)" />
				    </div>

				  		<div class="form-group">
				    		<input type="text" class="txt bradius" id="cidadeRestaurante" name="cidadeRestaurante" size="80" maxlength="40" placeholder="Cidade" />
				    	
						 
							<select name="stateRestaurante" id="stateRestaurante" class="txt bradius" style="width:24%;" placeholder="Estado" />
								<option value="" selected disabled>Estado</option>
								<option value="AC">AC</option>
								<option value="AL">AL</option>
								<option value="AM">AM</option>
								<option value="AP">AP</option>
								<option value="BA">BA</option>
								<option value="CE">CE</option>
								<option value="DF">DF</option>
								<option value="ES">ES</option>
								<option value="GO">GO</option>
								<option value="MA">MA</option>
								<option value="MG">MG</option>
								<option value="MS">MS</option>
								<option value="MT">MT</option>
								<option value="PA">PA</option>
								<option value="PB">PB</option>
								<option value="PE">PE</option>
								<option value="PI">PI</option>
								<option value="PR">PR</option>
								<option value="RJ">RJ</option>
								<option value="RN">RN</option>
								<option value="RO">RO</option>
								<option value="RR">RR</option>
								<option value="RS">RS</option>
								<option value="SC">SC</option>
								<option value="SE">SE</option>
								<option value="SP">SP</option>
								<option value="TO">TO</option>
							</select>
									    		
				    	</div>

				 	 <hr>

				 	 	<div class="form-group">
				  		<input type="text" class="txt bradius" id="nomeResponsavel" name="nomeResponsavel" style="width:70%;" maxlength="40" placeholder="Nome Completo do Responsável" />
				  			<input type="text" class="txt bradius" id="numeroCPF" name="numeroCPF" style="width:30%;" maxlength="14" placeholder="CPF" />
				  	</div>


				  <div class="form-group">
				    <input type="text" class="txt bradius" id="email" name="email" style="width:100%;" placeholder="Email" />
				  </div>
				  <div class="form-group">
				    <input type="password" class="txt bradius" id="senha" name="senha" style="width:100%;" placeholder="Senha" />
				  </div>
				  <div class="form-group">
				    
				  <input type="submit" class="sb bradius" value="Cadastrar" />
			</form>
 		</div>
 	</div><!-- container  -->

 	<?php include_once ("includes/footer.php"); ?>
 	
 </body>
 </html>