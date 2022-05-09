<?php
  /*class DB{
	  public function conectar(){
		  $host=getenv('IP');
		  $user="zeemaarciio1";
		  $pass="zaqxswcde";
		  $dbname="orderfastdb";
		  
		  $conexao=mysql_connect($host,$user,$pass);
		  $selectdb=mysql_select_db($dbname);
		  
		  return $conexao;
		  
		  
	  }
	  
  }*/
  
      $host="mysql.hostinger.com.br";
		  $user="u530538035_orderfast";
		  $pass="zaqxswcde";
		  $dbname="u530538035_orderfastdb";
      
      $conexao=mysql_connect($host,$user,$pass) or die ("Erro na conexão!"); 
	  	mysql_select_db($dbname);


?>