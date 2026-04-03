<?php

 $host="localhost";
 $dbname="agenda";
 $username="root";
 $pass="";

 try{
    $conn= new PDO("mysql:host=$host;dbname=$dbname",$username,$pass);

    // ativar o modo erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch(PDOException $e){
    // erro na conexao
    $error= $e->getMessage();
    echo "Erro: $error";
 }