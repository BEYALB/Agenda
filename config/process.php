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
   

   //atualizar contato
   }else if($data['type']==='update'){

    $id = $data['id'];
    $name = $data['name'];
    $phone = $data['phone'];
    $observations = $data['observations'];
    // aqui o :name e um parametro que sera substituido pelo valor da variavel $name

    $query = "UPDATE contacts SET name = :name, phone = :phone, observations = :observations WHERE id = :id";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':observations', $observations);
    $stmt->bindParam(':id', $id);
    try
    {
        $stmt->execute();
        $_SESSION['msg'] = "Contato atualizado com sucesso!";


   } catch (PDOException $e){
        $_SESSION['msg'] = "Erro ao atualizar contato: " . $e->getMessage();
   }

   }else if($data['type']==='delete'){

    $id = $data['id'];
    $query = "DELETE FROM contacts WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    try
    {
        $stmt->execute();
        $_SESSION['msg'] = "Contato deletado com sucesso!";

   } catch (PDOException $e){
        $_SESSION['msg'] = "Erro ao deletar contato: " . $e->getMessage();
   }

   }
   // redirect
   header("Location:" . $BASE_URL . "../index.php");

   // SELECÇÃO DE DADOS
} else{
    
$id;
$type;
//esta invertido true se existirem parametros na url
if(!empty($_GET)){
    $id =$_GET['id'];

 
}
// Retorna dados de um contato
if(!empty($id)){
   // print_r($type); exit;

    $query = "SELECT * FROM contacts WHERE id = :id";
    $pronto= $conn->prepare($query);
    $pronto->bindParam(':id',$id);
    $pronto->execute();

    $contacts = $pronto->fetch();


    //deletar contato
    
    
  //  header("Location:" . $BASE_URL . "../index.php");
     

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