<?php

session_start();
include_once("conexao.php");
$mensagem="";


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
			echo $mensagem = "Preencha todos os campos!";
	}else{
    

    $query = mysql_query("INSERT INTO restaurante (nomeFantasia, cnpj, razaoSocial, nomeCompleto, emailRestaurant, cpf, fone, celular,
    endereco, numero, cep, bairro, cidade, uf, created) VALUES ('$nomeFantasia', '$cnpj', '$razaoSocial', '$nomeCompleto', 
    '$emailRestaurant', '$cpf', '$fone', '$celular', '$endereco', '$numero', '$cep', '$bairro', '$cidade', '$uf', NOW())");
    
        if(mysql_affected_rows() != 0){
            //header("Location: ../restaurante.php"); 
        }
	}




//Variáveis de estilo
if($msg == ""){
	$display="display:none;";
}else{
	$display="display:block;";
}
?>