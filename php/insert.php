<?php
    /* Informando trabalharemos com dados json */
    header('Content-Type: application/json');

    /* Salvando os dados recebidos em uma variável */
    $name = $_POST['nome'];
    $comment = $_POST['comentario'];
    
    /* Criando conexão com banco de dados */
    $pdo = new PDO('mysql:host=localhost; dbname=comments_aula;', 'root', '');
    
    /* Query que insere o comentário no banco de dados */
    $insert = $pdo->prepare("INSERT INTO `comments` (username,comment) VALUES (?,?)");
    $insert->execute([$name,$comment]);
    
    /* Verificando se foi possível inserir no banco de dados */
    if($insert->rowCount() >= 1){
        echo json_encode('Comentário salvo com sucesso');
    }else{
        echo json_encode('Não foi possível salvar o comentário!');
    }
    
    