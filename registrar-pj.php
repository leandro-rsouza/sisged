<?php
session_start();
require_once 'vendor/autoload.php';

$cad = $_POST['set'];

$rand = rand(1,9999);

$identify = new \app\backend\usuario\Login();
    $exist_cadastro = $identify->verifyId('cadastro', 'id_cadastro', $rand);
    $exist_cnpj = $identify->verifyId('pessoa_juridica', 'cnpj', $_POST['cnpj']);

    $pessoa = new \app\backend\pessoa\PessoaJuridica();

    if($exist_cadastro == false && $exist_cnpj == false):

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

        $pessoa->setIdJuridico($_POST['cnpj'].$rand);
        $pessoa->setFkCadastro($pessoa->getIdCadastro());
        $pessoa->setCnpj($_POST['cnpj']);

        if($cad == 'cliente'):
            $id_cliente = date('Y').date('m').date('d').$rand;
            $exist_cliente = $identify->verifyId('cliente','id_cliente', $id_cliente);

            if($exist_cliente == false):    
                $cliente = new \app\backend\pessoa\Cliente();
                $cliente->setIdCliente($id_cliente);
                $cliente->setFkPessoa($pessoa->getIdJuridico());

                if(isset($_SESSION['id_master'])):
                    $cliente->setFkUsuario($_SESSION['id_master']);
        
                    $acao = new \app\backend\usuario\UsuarioMaster();
                    $acao->cadPessoaJuridica($pessoa);
                    $acao->cadClienteJuridico($cliente);

                    $_SESSION['msg_cliente'] = "Cadastro de cliente realizado com sucesso! <br>";
                    header('Location: painel-pj.php?set=cliente');
                    
                elseif(isset($_SESSION['id_user'])):
                    $cliente->setFkUsuario($_SESSION['id_user']);
                    
                    $acao = new \app\backend\usuario\UsuarioComum();
                    $acao->cadPessoaJuridica($pessoa);
                    $acao->cadClienteJuridico($cliente);

                    $_SESSION['msg_cliente'] = "Cadastro de cliente realizado com sucesso! <br>";
                    header('Location: painel-pj.php?set=cliente');
                else:
            
                    $_SESSION['msg_acess'] = "Ação não autorizada! <br>";
                    header('Location: painel-pj.php?set=cliente');

                endif;
            else:

                $_SESSION['msg_cliente'] = "Ocorreu um erro: Essa chave ID de cliente já existe! <br>";
                header('Location: painel-pj.php?set=cliente');

            endif;

        elseif($cad == 'fornecedor'):
            $id_fornecedor = date('Y').date('m').date('d').$rand;
            $exist_fornecedor = $identify->verifyId('fornecedor', 'id_fornecedor', $id_fornecedor);

            if($exist_fornecedor == false):

                $fornecedor = new \app\backend\servico\Fornecedor();
                $fornecedor->setIdFornecedor($id_fornecedor);
                $fornecedor->setFkPessoa($_POST['cnpj'].$rand);

                if(isset($_SESSION['id_master'])):
                    $fornecedor->setFkUsuario($_SESSION['id_master']);

                    $acao = new \app\backend\usuario\UsuarioMaster();
                    $acao->cadPessoaJuridica($pessoa);
                    $acao->cadFornecedor($fornecedor);

                    $_SESSION['msg_for'] = "Cadastro de fornecedor realizado com sucesso! <br>";
                    header('Location: painel-pj.php?set=fornecedor');
                else:
            
                    $_SESSION['msg_acess'] = "Ação não autorizada! <br>";
                    header('Location: painel-pj.php?set=fornecedor');

                endif;
            else:

                $_SESSION['msg_for'] = "Ocorreu um erro: Essa chave ID para fornecedor já existe! <br>";
                header('Location: painel-pj.php?set=fornecedor');

            endif;
        else:

            $_SESSION['msg_cad'] = "Esta ação não é reconhecida! <br>";
            header('Location: painel-pj.php?set=fornecedor');

        endif;
    else:

        $_SESSION['msg_cnpj'] = "Essa cadastro já existe no sistema! <br> Verifique se o devido CNPJ está correto! <br>";
        header('Location: painel-pj.php?set=fornecedor');

    endif;
?>
