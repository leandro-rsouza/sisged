<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="app/frontend/css/painel.css">
</head>

<body>
    <section>
        <form method="POST" action="registrar-pf.php">
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
                    if($set != 'cliente' && $set != 'funcionario'):
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

                if(isset($_SESSION['msg_cpf'])):
                    echo "<p class='msg_erro'>" .$_SESSION['msg_cpf']. "</p>";
                    unset($_SESSION['msg_cpf']);
                endif;

                if(isset($_SESSION['msg_func'])):
                    echo "<p class='msg_erro'>" .$_SESSION['msg_func']. "</p>";
                    unset($_SESSION['msg_func']);
                endif;

                if(isset($_SESSION['msg_cliente'])):
                    echo "<p class='msg_erro'>" .$_SESSION['msg_cliente']. "</p>";
                    unset($_SESSION['msg_cliente']);
                endif;

                if(isset($_SESSION['msg_acess'])):
                    echo "<p class='msg_erro'>" .$_SESSION['msg_acess']. "</p>";
                    unset($_SESSION['msg_acess']);
                endif;

                if(isset($_SESSION['msg_user'])):
                    echo "<p class='msg_erro'>" .$_SESSION['msg_user']. "</p>";
                    unset($_SESSION['msg_user']);
                endif;
            ?>

            <label for=""> Nome: </label>
            <input type="text" name="nome" required>

            <label for=""> Email: </label>
            <input type="email" name="email" required>

            <label for=""> Contato: </label>
            <input type="number" name="contato" required>
            <br> <br>
            <label for=""> CPF: </label>
            <input type="number" name="cpf" required>

            <label for=""> RG: </label>
            <input type="number" name="rg" required>

            <label for=""> Data de Nascimento: </label>
            <input type="text" name="data_nasc" required>
            <br> <br>
            <label for=""> CEP: </label>    
            <input type="number" name="cep" required>
            
            <label for=""> Logradouro: </label>
            <input type="text" name="logradouro" required>

            <label for=""> Bairro: </label>
            <input type="text" name="bairro" required>

            <label for=""> Número: </label>
            <input type="number" name="numero" required>
            <br> <br>

            <?php
                if($set == 'funcionario'):
                    echo 
                    "<label for=''> Cargo: </label>
                     <select name='cargo'>
                        <option selected disabled> Selecione </option>
                        <option value='1'> Chefe </option>
                        <option value='2'> Auxiliar Administrativo </option>
                        <option value='3'> Auxiliar Contábil </option>
                        <option value='4'> Gerente de Vendas </option>
                        <option value='5'> Gerente de Produtos </option>
                        <option value='6'> Gerente de Dados </option>
                        <option value='7'> Analista de Dados </option>
                        <option value='8'> Desenvolvedor Web Frontend </option>
                        <option value='9'> Desenvolvedor Web Backend </option>
                        <option value='10'> Atendente </option>
                        <option value='11'> Arquiteto </option>
                        <option value='12'> Analista de Obra </option>
                        <option value='13'> Auxiliar Analista de Obra </option>
                        <option value='14'> Analista de Software </option>
                        <option value='15'> Engenheiro de Software </option>
                        <option value='16'> Engenheiro Eletricista </option>
                        <option value='17'> Motorista </option>
                     </select>";

                    echo
                    "<label for=''> Setor: </label>
                     <select name='setor'>
                        <option selected disabled> Selecione </option>
                        <option value='1'> CEO </option>
                        <option value='2'> Informática </option>
                        <option value='3'> Atendimento </option>
                        <option value='4'> Recursos Humanos </option>
                        <option value='5'> Administração </option>
                        <option value='6'> Financeiro </option>
                        <option value='7'> Tesouraria </option>
                        <option value='8'> Gerencia </option>
                        <option value='9'> Jurídico </option>
                        <option value='10'> Engenharia </option>
                        <option value='11'> Programação </option>
                        <option value='12'> Arquitetura </option>
                        <option value='13'> Projeto </option>
                     </select>";
                     
                    echo
                    "<label for=''> Tipo de Usuário: </label>
                     <select name='tipo'>
                        <option selected disabled> Selecione </option>
                        <option value='usuario_master'> Usuário Master </option>
                        <option value='usuario_user'> Usuário Comum </option>
                        <option value='usuario_gerente'> Usuário Gerente </option>
                        <option value='usuario_especial'> Usuário Especial </option>
                     </select>
                     
                     <label for=''> Usuário: </label>
                     <input type='text' name='user'>
                    
                     <label for=''> Senha: </label>
                     <input type='password' name='password'>";
                endif;
            ?>
            <button> Enviar </button>
        </form>
    </section>
</body>
</html>

