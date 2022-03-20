<?php

    /* Informando trabalharemos com dados json */
    header('Content-Type: application/json');
    
    /* Criando conexão com banco de dados */
    $pdo = new PDO('mysql:host=localhost; dbname=comments_aula;', 'root', '');
    
    /* Query que insere o comentário no banco de dados */
    $select = $pdo->prepare("SELECT * FROM comments");
    $select->execute();
    
    /* Verificando se foi possível inserir no banco de dados */
    if($select->rowCount() >= 1){
        echo json_encode($select->fetchAll(PDO::FETCH_ASSOC));
    }else{
        echo json_encode(0);
    }