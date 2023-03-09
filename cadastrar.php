<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

//incluindo conexão 
include_once 'conexao.php';

$response_json = file_get_contents("php://input");
$dados = json_decode($response_json, true);

if($dados){

    $query_produto = "INSERT INTO produtos (titulo, descricao) VALUES (:titulo, :descricao)";
    $cad_produto = $connPdo->prepare($query_produto);

    $cad_produto->bindParam(':titulo', $dados['produto']['titulo'], PDO::PARAM_STR);
    $cad_produto->bindParam(':descricao', $dados['produto']['descricao'], PDO::PARAM_STR);

    $cad_produto->execute();

    if($cad_produto->rowCount()){
        $response = [
            "erro" => false,
            "mensagem" => "Produto cadastrado com sucesso!"
        ];
    }else{
        $response = [
            "erro" => true,
            "mensagem" => "Não foi possível cadastrar o produto!"
        ];
    }
 
}else{
    $response = [
        "erro" => true,
        "mensagem" => "Não foi possível cadastrar o produto!"
    ];
}

http_response_code(200);
echo json_encode($response);
