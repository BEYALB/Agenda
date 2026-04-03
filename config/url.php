<?php
    $BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/';

  //  $BASE_URL define o endereço base do seu projeto para facilitar acessar arquivos e páginas sem quebrar os caminhos.
  // http ou https dependendo do protocolo usado, SERVER_NAME para pegar o nome do servidor, dirname para pegar o diretório atual e adicionar uma barra no final.
  //dirname elimina o nome do arquivo da URL, deixando apenas o caminho do diretório. O '?', é adicionado para garantir que query strings sejam ignoradas ao determinar o diretório.