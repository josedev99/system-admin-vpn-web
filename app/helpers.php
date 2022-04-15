<?php

function get_days(){
    date_default_timezone_set('America/El_Salvador');
    $fecha_actual = date("d-m-Y");
    $fecha = date("d-m-Y",strtotime($fecha_actual."+ ".session('days')." days")); 
    $divFecha = explode("-",$fecha);
    $validFecha = strval($divFecha[2]."-".$divFecha[1]."-".$divFecha[0]);
    return $validFecha;
}

function connect($host,$user,$passwd,$port){
    //Validation function ssh
    if (!function_exists('ssh2_connect')) {
        die('No existe la funcion ssh2_connect.'); 
    }
    if (!($connection = ssh2_connect($host, $port))) {
        die('No se puede conectar con el servidor VPS.'); 
    }
    if (!ssh2_auth_password($connection, $user, $passwd)) {
        die('No se puede autenticar con el usuario y clave suministrados.'); 
    }
    //Return conexion
    return $connection;
}


