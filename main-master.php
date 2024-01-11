<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="app/frontend/css/main.css">
</head>
<?php
session_start();
    if(isset($_SESSION['id_master'])):
        echo '<p> Seja bem-vindo,'.$_SESSION['id_master'].' </p>';
    else:
        header('Location: index.php');
    endif;
?>
<body>
    <a href="painel-pf.php?set=cliente"> Cadastrar Cliente Como Pessoa Física </a> <br>
    <a href="painel-pj.php?set=cliente"> Cadastrar Cliente Como Pessoa Juridica </a> <br>
    <a href="painel-pf.php?set=funcionario"> Cadastrar Funcionário </a> <br>
    <a href="painel-pj.php?set=fornecedor"> Cadastrar Fornecedor </a> <br>
    <a href="painel-produto"> Cadastrar Produto </a> <br>
    <a href="painel-servico.php"> Cadastrar Servico </a> <br>
    <a href="listar-servicos.php"> Serviços </a>
    <a href="listar-clientes.php"> Clientes </a>
    <a href="listar-funcionarios.php"> Funcionários </a>
    <a href="logout.php"> Sair </a>
</body>
</html>