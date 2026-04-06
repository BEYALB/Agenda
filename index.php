<?php
include_once ( 'templates/header.php');
?>
<div class="container">
     
    <?php
         if(isset($printMsg) && $printMsg != ''):?>
            <p id="msg"><?=$printMsg?></p>
      
    <?php endif?>

     <h1 id="main-title">
        Minha Agenda
     </h1>
    <?php
        if(count($contacts)>0):?>
           <table class="table" id="contacts-table">
              <thead>
                <tr>

                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col"></th>

                    
                </tr>
              </thead>
               <tbody>
                 <?php foreach($contacts as $contato):?>
                    <tr>
                        <td scope="row" class="col-id"> <?=$contato['id']?></td>
                        <td scope="row"><?=$contato["name"]?></td>
                        <td scope="row"><?=$contato["phone"]?></td>
                        
                        <td class="actions"> 
                            <a href="<?=$BASE_URL?>show.php?id=<?=$contato['id']?>"><i class="fa-regular fa-eye check-icon"></i></a>
                            <a href="<?=$BASE_URL?>edit.php?id=<?=$contato['id']?>"><i class="fa-regular fa-pen-to-square edit-icon"></i></a>
                            <button type="submit" class="delete-btn">
                                <a href="" ><i class="fa-regular fa-trash-can delete-icon"></i></a>
                            </button>
                        </td>

                    </tr>
                  <?php endforeach?>
               </tbody>
           </table>

          
        <?php else:?>
            <p id="empty-list-text">Nenhum contato na sua agenda cadastrado cadastrado <a href="<?=$BASE_URL?>create.php">Clique aqui para Adicionar</a></p>
    <?php endif?>
    
           
</div>



<?php
include_once ( 'templates/footer.php');

?>