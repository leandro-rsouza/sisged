<?php
session_start();
require_once 'vendor/autoload.php';

    $user = new app\backend\usuario\Login();
    
    $user->setUser($_POST['user']);
    $user->setSenha($_POST['password']);

    if ($user->log() == true):
        if(isset($_SESSION['id_master'])):
            header('Location: main-master.php');
        elseif(isset($_SESSION['id_user'])):
            header('Location: main-comum.php');
        elseif(isset($_SESSION['id_gerente'])):
            header('Location: main-gerente.php');
        elseif(isset($_SESSION['id_especial'])):
            header('Location: index.php');
        endif;
    else:
        $_SESSION['msg'] = '<span> Usuário ou Senha Incorretos! </span>';
        header('Location: index.php');
        exit();
    endif;
?>