<?php
session_start();
require_once 'vendor/autoload.php';

$cad = $_POST['set'];

$rand = rand(1,9999);

$identify = new \app\backend\usuario\Login();
    $exist_cadastro = $identify->verifyId('cadastro', 'id_cadastro', $rand);
    $exist_cpf = $identify->verifyId('pessoa_fisica', 'cpf', $_POST['cpf']);
    $exist_rg = $identify->verifyId('pessoa_fisica', 'rg', $_POST['rg']);

    $pessoa = new \app\backend\pessoa\PessoaFisica();

    if($exist_cadastro == false && $exist_cpf == false && $exist_rg == false):

        $pessoa->setIdEndereco($_POST['cep'].$_POST['numero']);
        $pessoa->setCep($_POST['cep']);
        $pessoa->setLogradouro($_POST['logradouro']);
        $pessoa->setBairro($_POST['bairro']);
        $pessoa->setNumero($_POST['numero']);

        $pessoa->setIdCadastro($rand);
        $pessoa->setFkEndereco($pessoa->getIdEndereco());
        $pessoa->setNome($_POST['nome']);
        $pessoa->setEmail($_POST['email']);
        $pessoa->setContato($_POST['contato']);

        $pessoa->setIdFisico($_POST['cpf'].$rand);
        $pessoa->setFkCadastro($pessoa->getIdCadastro());
        $pessoa->setCpf($_POST['cpf']);
        $pessoa->setRg($_POST['rg']);
        $pessoa->setDataNasc($_POST['data_nasc']);

        if($cad == 'cliente'):
            $id_cliente = date('Y').date('m').date('d').$rand;
            $exist_cliente = $identify->verifyId('cliente','id_cliente', $id_cliente);

            if($exist_cliente == false):    
                $cliente = new \app\backend\pessoa\Cliente();
                $cliente->setIdCliente($id_cliente);
                $cliente->setFkPessoa($pessoa->getIdFisico());

                if(isset($_SESSION['id_master'])):
                    $cliente->setFkUsuario($_SESSION['id_master']);
        
                    $acao = new \app\backend\usuario\UsuarioMaster();
                    $acao->cadPessoaFisica($pessoa);
                    $acao->cadClienteFisico($cliente);

                    $_SESSION['msg_cliente'] = "Cadastro de cliente realizado com sucesso! <br>";
                    header('Location: painel-pf.php?set=cliente');
                    
                elseif(isset($_SESSION['id_user'])):
                    $cliente->setFkUsuario($_SESSION['id_user']);
                    
                    $acao = new \app\backend\usuario\UsuarioComum();
                    $acao->cadPessoaFisica($pessoa);
                    $acao->cadClienteFisico($cliente);

                    $_SESSION['msg_cliente'] = "Cadastro de cliente realizado com sucesso! <br>";
                    header('Location: painel-pf.php?set=cliente');
        
                endif;
            else:

                $_SESSION['msg_cliente'] = "Ocorreu um erro: Essa chave ID de cliente já existe! <br>";
                header('Location: painel-pf.php?set=cliente');

            endif;

        elseif($cad == 'funcionario'):
            $id_funcionario = date('Y').date('m').date('d').$rand;
            $id_cargo = $identify->findId('cargo', 'id_cargo', $_POST['cargo']); 
            $id_setor = $identify->findId('setor', 'id_setor', $_POST['setor']);
            $exist_funcionario = $identify->verifyId('funcionario', 'id_funcionario', $id_funcionario);

            if($exist_funcionario == false):

                $funcionario = new \app\backend\pessoa\Funcionario();
                $funcionario->setIdFuncionario($id_funcionario);
                $funcionario->setFkPessoa($_POST['cpf'].$rand);
                $funcionario->setFkCargo($id_cargo);
                $funcionario->setFkSetor($id_setor);

                if(isset($_SESSION['id_master'])):
                    $funcionario->setFkMaster($_SESSION['id_master']);

                    $rand_user = rand(1,99999);
                    $usuario = new \app\backend\usuario\Login();
                    $usuario->setIdUser($rand_user);
                    $usuario->setUser($_POST['user']);
                    $usuario->setSenha($_POST['password']);
                    $usuario->setFkFuncionario($funcionario->getIdFuncionario());

                    if($usuario->verifyUser() == false):
                        $acao = new \app\backend\usuario\UsuarioMaster();
                        $acao->cadPessoaFisica($pessoa);
                        $acao->cadFuncionario($funcionario);
                        $acao->cadUsuario($usuario, $_POST['tipo']);

                        $_SESSION['msg_func'] = "Cadastro de funcionário realizado com sucesso! <br>";
                        header('Location: painel-pf.php?set=funcionario');
                    else:

                        $_SESSION['msg_user'] = "Esse nome de usuário já existe! <br>";
                        header('Location: painel-pf.php?set=funcionario');

                    endif;
                else:
            
                    $_SESSION['msg_acess'] = "Ação não autorizada! <br>";
                    header('Location: painel-pf.php?set=funcionario');

                endif;
            else:

                $_SESSION['msg_func'] = "Ocorreu um erro: Essa chave ID para funcionário já existe! <br>";
                header('Location: painel-pf.php?set=funcionario');

            endif;
        else:

            $_SESSION['msg_cad'] = "Esta ação não é reconhecida! <br>";
            header('Location: painel-pf.php?set=funcionario');

        endif;
    else:

        $_SESSION['msg_cpf'] = "Essa cadastro já existe no sistema! <br> Verifique se o devido CPF e RG estão corretos! <br>";
        header('Location: painel-pf.php?set=funcionario');

    endif;
?>
