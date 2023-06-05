<?php

    $usuario = 'root';
    $senha = '';
    $database = 'login';
    $host = 'localhost';
    //$port = 3306;

    $mysqli = new mysqli($host, $usuario, $senha, $database);

        if ($mysqli->error) {
            die("Falha ao conectar" . $mysqli->error);
        }


//
       // try
       // {
       //     $conn = new PDO("mysql:host=$host;port=$port;database=". $database, $usuario, $senha);
       // } catch (PDOException $err){
       //     echo "Erro ao conectar no bando de dados" . $err->getmessage();
       // }



?>