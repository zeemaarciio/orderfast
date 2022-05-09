<?php
	class login{
		public function logar($email, $senha){
			$buscar = mysql_query("SELECT * FROM users WHERE email='$email' AND senha='$senha' LIMIT 1");
			if(mysql_num_rows($buscar) == 1){
				$dados = mysql_fetch_array($buscar);
				if($dados["status"] == 1){
					$_SESSION["idUser"] = $dados["id"];
					$_SESSION["email"] = $dados["email"];
					$_SESSION["senha"] = $dados["senha"];
					$_SESSION["nivel"] = $dados["nivel"]; 
					//setcookie("logado",1);
				 	$_SESSION["logado"] = true;
					$log = 1;
					
					
					if($_SESSION["nivel"] == 1){
						header("Location: /projects/orderfast/dashboard");
					}else{
						header("Location: /projects/orderfast/login"); 
					}

			    }else{
			    	$flash = "Obrigado por se cadastrar! Aguarde a nossa aprovação!";
			    }
			}

			if(isset($log)){
				$flash = "Você foi logado com sucesso!";
			}else{
					if(empty($flash)){
					$flash = "Login/Senha não encontrado. Por favor, tente novamente.";
				}
			}
			echo $flash;
		}
		
	
	}

?>