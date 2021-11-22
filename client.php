<?php

//set variables
$port =1234;
$host = "localhost";

// no timeout
set_time_limit(0);

$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP) or die ("no se pudo crear el socket");


socket_connect($socket, $host, $port) or die("no se pudo conectar el socket");

do{

    $message = readline("escrive un mensaje: ");

    socket_write($socket,$message, strlen($message)) or die("no se pudo escrivir el mensaje cliente");

    $output = socket_read($socket, 1024) or die ("no se pudo leer el mensaje cliente");

    //echo "respuesta del servidor: ",$output, PHP_EOL;
}while($output != "exit");
socket_close($socket);

?>