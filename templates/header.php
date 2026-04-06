<?php
  include_once('config/url.php');
  include_once('config/process.php');
 // include_once('config/connection.php');

 //limpa a mensagem
  if(isset($_SESSION['msg'])){
      $printMsg = $_SESSION['msg'];
      $_SESSION['msg'] = '';
     
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.8/css/bootstrap.rtl.min.css" integrity="sha512-4W9f7EnJgM33kD11Ux2XNF9DSpJ7LoQXCvBNhzKTorRSyjPHmjXhHMZMafIYqYvTNWahUk2ulNsarMMLDEv4zA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- css -->
      <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="<?=$BASE_URL?>index.php">
        <img src="<?= $BASE_URL?>img/logo.svg" alt="Agenda">
      </a>

      <div>
        <div class="navbar-nav">
          <a class="nav-link  active" id="home-link" href="<?= $BASE_URL?>index.php">Agenda</a>
          <a class="nav-link active"  href="<?= $BASE_URL?>create.php">Adicionar Contato</a>
        </div>
            
      </div>
    </nav>


  </header>