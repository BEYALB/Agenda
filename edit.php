<?php
    include_once 'templates/header.php';
 ?>
 
     <div class="container">
         <?php
           include_once('templates/backbtn.html');
         ?>
       <h1 id="main-title">Editar Contato</h1>
       <form action="<?=$BASE_URL?>config/process.php" method="POST" id="create-form">
        <!-- dentro do type ira create assim poder identifica o tipo de ação que esta sendo feita -->
       <input type="hidden" name="type" value="update">
       <!-- leva o id no post tambem  -->
        <input type="hidden" name="id" value="<?=$contacts['id']?>">  
         <div class="form-group>
            <label for="name">Nome do contato:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do contato" required value="<?=$contacts['name']?>">
         </div>
         <div class="form-group>
            <label for="phone">Telefone do contato:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone do contato" required value="<?=$contacts['phone']?>">
         </div>
         <div class="form-group>
            <label for="observations">Observações do contato:</label>
            <textarea class="form-control" id="observations" name="observations" placeholder="Digite as observações do contato" rows="3" required><?=$contacts['observations']?></textarea></textarea>
         </div>

         <button type="submit" class="btn btn-primary">Atualizar</button></button>
      </div>


 <?php
    include_once 'templates/footer.php';
    ?>