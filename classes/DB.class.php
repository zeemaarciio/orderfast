<?php
  class DB{
	  public function conectar(){
		  $host="mysql.hostinger.com.br";
		  $user="u530538035_orderfast";
		  $pass="zaqxswcde";
		  $dbname="u530538035_orderfastdb";
		  
		  $conexao=@mysql_connect($host,$user,$pass);
		  $selectdb=@mysql_select_db($dbname);
		  
		  return $conexao;
		  
		  
	  }
	  
  }


?>