<?php

session_start();

include_once 'connection.php';
include_once 'url.php';

$data= $_POST;
//MODIFICÇÕES NO BANCO
//verifica se existe dados no post 
if(!empty($data)){
 // print_r($data); exit;
  //criar contato
   if($data['type']==='create'){
    $name = $data['name'];
    $phone = $data['phone'];
    $observations = $data['observations'];

    $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':observations', $observations);
    try
    {
        $stmt->execute();
        $_SESSION['msg'] = "Contato criado com sucesso!";

    
   }catch(PDOException $e){
        $_SESSION['msg'] = "Erro ao criar contato: " . $e->getMessage();
   }
    //header("Location:" . $BASE_URL . "../index.php");
   }
   // redirect
   header("Location:" . $BASE_URL . "../index.php");

   // SELECÇÃO DE DADOS
}else{
    
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
}

//fechar conexao

$conn = null;

?>