<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="app/backend/css/index.css">
    <title> SISGED - Sistema de Gerenciamento de Dados Eletro Home </title>
</head>
<?php
session_start();
    if(isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
?>
<body>
    <section> 
        <form method="POST" action="login.php">
            
            <label for=""> Usuário: </label>
            <input type="text" name="user">

            <label for=""> Senha: </label>
            <input type="password" name="password">

            <button> Enviar </button>
        </form>
    </section>
</body>
</html>