<?php
   class cadastro {
	   public function cadastrar($nome, $telefone, $cpfcnpj, $email, $senha, $data){
		   //TRATAMENTO DAS VARIÁVEIS
		   $nome		= utf8_decode(ucwords(strtolower($nome)));
		   $telefone	= ucwords(strtolower($telefone));
		   $cpfcnpj 	= ucwords(strtolower($cpfcnpj));
		   $senha		= sha1($senha."zaqxswcde");
		   $data		= date("Y-m-d");//gravando a data
		   //INSERÇÃO DO BANDO DE DADOS
		   $validaremail = mysql_query("SELECT * FROM users WHERE email='$email'");
		   $contar		 = mysql_num_rows($validaremail);
		   if($contar == 0){
		   	//aqui vai a parte de cadastrar o restaurant e colocar o id do restaurant na tabela users
		   	
		   		$insert=mysql_query("INSERT INTO users(nome, telefone, cpfcnpj, email, senha, nivel, status, data)VALUES('$nome', '$telefone', '$cpfcnpj', '$email', '$senha', 1, 0, '$data')");
			}else{
				$flash="Oops! Este email já está cadastrado em nosso sistema!";
			}
		   if(isset($insert)){
			   $flash="Cadastro realizado com sucesso, aguarde a nossa aprovação!";
		   }else{
		   		if($flash == ""){
			   		$flash="Ops! Houve um erro no sistema, tente novamente!";
			 }
		   }
		   //RETORNANDO NA TELA PARA O USUÁRIO
		   echo $flash;
		   
	   }
	   
   }


?>