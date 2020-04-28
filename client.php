<?php 
    $location = 'http://localhost/projetox/webservice/rest.php';
    $parameters = [];
    $parameters['class'] = 'PessoaServices'; 
    $parameters['method'] = 'getData'; 
    $parameters['id'] = '1';
    $url = $location .'?'.http_build_query($parameters);
     var_dump(file_get_contents($url)); 


 