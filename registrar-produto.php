<?php
session_start();
require_once 'vendor/autoload.php';

$rand = rand(1,9999);

$identify = new \app\backend\usuario\Login();
    $exist_prod = $identify->verifyId('produto','id_produto', $rand);

    $produto = new \app\backend\servico\Produto();

    if($exist_prod == false):
        
    else:
        $_SESSION['msg_prod'] = "A chave correspondente a este produto já existe no sistema! Por favor, contate o administrador!";
        header('Location: painel-produto.php');
    endif;
?>