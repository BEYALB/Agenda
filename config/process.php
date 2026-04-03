<?php

session_start();

include_once 'config/url.php';
include_once 'config/connection.php';
$id;
//esta invertido true se existirem parametros na url
if(!empty($_GET)){
    $id =$_GET['id'];
 
}
// Retorna dados de um contato
if(!empty($id)){

    $query = "SELECT * FROM contacts WHERE id = :id";
    $pronto= $conn->prepare($query);
    $pronto->bindParam(':id',$id);
    $pronto->execute();

    $contacts = $pronto->fetch();

}else{

//Retorna todos  os contatos 
$contacts = [];

$query = "SELECT * FROM contacts";

$stmt= $conn->prepare($query);
$stmt->execute();

$contacts = $stmt->fetchAll();
}

?>