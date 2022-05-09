<?php
$host=getenv('IP');
$user="zeemaarciio1";
$pass="zaqxswcde";
$dbname="orderfastdb";
$conexao=mysql_connect($host,$user,$pass) or die ("Erro na conexão!"); 
mysql_select_db($dbname);
?>

<?php
    $metodoHttp = $_SERVER['REQUEST_METHOD'];
    if($metodoHttp == 'GET'){
        $jsonArray = array();
        //$sql = "SELECT * FROM itens ORDER BY 'idItem'";
        mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
        $resultado = mysql_query("SELECT * FROM itens ORDER BY 'idItem'");
        $linhas = mysql_num_rows($resultado);
            while($linhas = mysql_fetch_array($resultado)){
                $jsonLinha = array(
                    //"idItem"        => $linhas["idItem"],
                    "nomeItem"      => $linhas["nomeItem"],
                    "descricao"      => $linhas["descricao"],
                    "preco"         => $linhas["preco"]);
                    //"categoria_Id"  => $linhas["categoria_Id"]);
                $jsonArray[] = $jsonLinha;
            }
        echo json_encode($jsonArray, JSON_UNESCAPED_UNICODE);
        // O JSON_UNESCAPED_UNICODE deixa os nomes acentuados
    }

?>

   

