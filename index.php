<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//incluindo conexão 
include_once 'conexao.php';

$query_produtos = "SELECT id, titulo, descricao FROM produtos ORDER BY id DESC";
$result_produtos = $connPdo->prepare($query_produtos);
$result_produtos->execute();

if(($result_produtos) AND ($result_produtos->rowCount() != 0)){
    while($row_produto = $result_produtos->fetch(PDO::FETCH_ASSOC)){
        extract($row_produto);

        $lista_produto["records"][$id] = [
            'id' => $id,
            'titulo' => $titulo,
            'descricao' => $descricao
        ];
    }

    http_response_code(200);

    echo json_encode($lista_produto);
}
