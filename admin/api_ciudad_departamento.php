<?php

$apiRestCiudad = "https://www.datos.gov.co/resource/xdk5-pm3f.json?c_digo_dane_del_departamento=5";


#Lectura API Ciudad
$traerInfoCiudad = array("ssl"=>array("verify_peer"=>false, "veridy_peer_name"=>false)); 
$contenidoCiudad = file_get_contents($apiRestCiudad, false, stream_context_create($traerInfoCiudad)); 
$ciudades = json_decode($contenidoCiudad);

//print_r($ciudades);

?>

