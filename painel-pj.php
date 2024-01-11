<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="app/frontend/css/painel.css">
</head>

<body>
    <section>
        <form method="POST" action="registrar-pj.php">

        <?php
            session_start();
                $set = $_GET['set'];
                echo '<input type="hidden" name="set" value="'.$set.'">';
                
                if($set == null):
                    if(isset($_SESSION['id_master'])):
                        header('Location: main-master.php');
                    elseif(isset($_SESSION['id_user'])):
                        header('Location: main-comum.php');
                    endif;
                elseif(isset($_SESSION['id_master'])):
                    if($set != 'cliente' && $set != 'fornecedor'):
                        header('Location: main-master.php');
                    endif;
                elseif(isset($_SESSION['id_user'])):
                    if($set != 'cliente'):
                        header('Location: main-comum.php');
                    endif;
                endif;

                if(isset($_SESSION['msg_cad'])):
                    echo "<p class='msg_erro'>" .$_SESSION['msg_cad']. "</p>";
                    unset($_SESSION['msg_cad']);
                endif;

                if(isset($_SESSION['msg_cnpj'])):
                    echo "<p class='msg_erro'>" .$_SESSION['msg_cnpj']. "</p>";
                    unset($_SESSION['msg_cnpj']);
                endif;

                if(isset($_SESSION['msg_for'])):
                    echo "<p class='msg_erro'>" .$_SESSION['msg_for']. "</p>";
                    unset($_SESSION['msg_for']);
                endif;

                if(isset($_SESSION['msg_cliente'])):
                    echo "<p class='msg_erro'>" .$_SESSION['msg_cliente']. "</p>";
                    unset($_SESSION['msg_cliente']);
                endif;

                if(isset($_SESSION['msg_acess'])):
                    echo "<p class='msg_erro'>" .$_SESSION['msg_acess']. "</p>";
                    unset($_SESSION['msg_acess']);
                endif;
            ?>
            
            <label for=""> Nome: </label>
            <input type="text" name="nome">

            <label for=""> Email: </label>
            <input type="email" name="email">

            <label for=""> Contato: </label>
            <input type="number" name="contato">

            <label for=""> CNPJ: </label>
            <input type="number" name="cnpj">
            <br> <br>
            <label for=""> CEP: </label>
            <input type="number" name="cep">

            <label for=""> Logradouro: </label>
            <input type="text" name="logradouro">

            <label for=""> Bairro: </label>
            <input type="text" name="bairro">

            <label for=""> Número: </label>
            <input type="number" name="numero">
            <br> <br>
            <button> Enviar </button>
        </form>
    </section>
</body>
</html>

