<?php
    const KEY = "sua_chave_publica";
    const TS = "1";
    const HASH = "hash_gerado_a_partir_das_chaves";
    
    // URL base para acessar a API
    $baseUrl = "http://gateway.marvel.com/v1/public/";
 
    // Definindo os parâmetros que serão usados na consulta
    $characterId = "1009610"; // Id do Spider-Man (veja mais no site)
    $limit = 50;
    $format = "comic";
    $formatType = "comic";
    $startYear = "1962";
    $endYear = "2016";
    $dateRange = $startYear . "-01-01%2C" . $endYear . "-12-31";
    $orderBy = "onsaleDate";
 
    // Compondo a URL: Veja na documentação as possíveis formas de consulta à API
    $url = $baseUrl . "characters/" . $characterId . "/comics";
    $url.= "?limit=" . $limit;
    $url.= "&format=" . $format;
    $url.= "&formatType=" . $format;
    $url.= "&dateRange=" . $dateRange;
    $url.= "&orderBy=" . $orderBy;
    $url.= "&ts=" . TS;
    $url.= "&apikey=" . KEY;
    $url.= "&hash=" . HASH;
    
    // A função "file_get_contents" executa a URL e retorna o conteúdo à variável
    $json = file_get_contents($url);
 
    // Convertendo a string JSON em um objeto
    $obj = json_decode($json);
    
    // Verifica se retornou algo, e se tudo ok, então imprime os resultados no navegador
    if ($obj->code == 200 and $obj->status = 'Ok') {
        echo 'copyright ' . $obj->copyright . '<br>';
        echo $obj->attributionHTML . '<br><br>';
        foreach ($obj->data->results as $result) {
            echo '<b>' . $result->title . '</b><br>';
            echo $result->description . '<br>';
            echo '<img src="' . $result->thumbnail->path . '.' . $result->thumbnail->extension . '" />';
            echo '<br><br>';
        }
    } else {
        echo 'Sorry!!!';
    }
?>