<?php

//set variables
$port =1234;
$host = "localhost";

// no timeout
set_time_limit(0);

//creacion del socket
$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP) or die ("no se pudo crear el socket");

$socket_binded = socket_bind($socket,$host,$port) or die ("no se pudo bindear el puerto");

$socket_listened = socket_listen($socket, SOMAXCONN) or die ("no se pudo escuchar el socket");

$socket_accepted = socket_accept($socket) or die ("no se pudo aceptar el socket");

//lectura del socket
do{
    $input = socket_read($socket_accepted, 1024) or die ("no se pudo leer el socket");

    //quitar espacios en blanco
    $input = trim($input);

    echo "mensaje del cliente: ",$input, PHP_EOL;

    socket_write($socket_accepted, $input, strlen($input)) or die ("no se pudo escrivir el input");
}while($input != "exit");
//cerrar la conexion

socket_close($socket_accepted);
socket_close($socket);


?>