<?php
namespace app\backend\usuario;

use app\backend\pessoa\Cliente;
use app\backend\pessoa\Funcionario;
use app\backend\pessoa\Setor;
use app\backend\pessoa\Cargo;
use app\backend\servico\Estoque;
use app\backend\servico\Fornecedor;
use app\backend\servico\Produto;
use app\backend\servico\Residencia;
use app\backend\servico\Comodo;
use app\backend\servico\Objeto;
use app\backend\servico\Automacao;
use app\backend\servico\DesenvolvimentoWeb;
use app\backend\servico\Compra;

    class UsuarioMaster extends UsuarioComum {

        //@override
        final public function cadClienteFisico(Cliente $c) {

            $cadastrar = "INSERT INTO cliente(id_cliente, fk_pf, fk_master) VALUES (?,?,?)";

            $cliente = Conexao::Conn()->prepare($cadastrar);
            $cliente->bindValue(1, $c->getIdCliente());
            $cliente->bindValue(2, $c->getFkPessoa());
            $cliente->bindValue(3, $c->getFkUsuario());
            $cliente->execute();
            
        }

        //@override
        final public function cadClienteJuridico(Cliente $c) {

            $cadastrar = "INSERT INTO cliente(id_cliente, fk_pj, fk_master) VALUES (?,?,?)";

            $cliente = Conexao::Conn()->prepare($cadastrar);
            $cliente->bindValue(1, $c->getIdCliente());
            $cliente->bindValue(2, $c->getFkPessoa());
            $cliente->bindValue(3, $c->getFkUsuario());
            $cliente->execute();
            
        }

        //@override
        final public function cadResidencia(Residencia $r, Comodo $c, Objeto $o) {
            
            $residencia = "INSERT INTO residencia VALUES (?,?)";
            $comodo = "INSERT INTO comodo VALUES (?,?)";
            $objeto = "INSERT INTO objeto VALUES (?,?)";
            
            $cr = Conexao::Conn()->prepare($residencia);
            $cr->bindValue(1, $r->getIdResidencia());
            $cr->bindValue(2, $r->getFkEndereco());

            $cc = Conexao::Conn()->prepare($comodo);
            $cc->bindValue(1, $c->getIdComodo());
            $cc->bindValue(2, $c->getFkResidencia());

            $co = Conexao::Conn()->prepare($objeto);
            $co->bindValue(1, $o->getIdObjeto());
            $co->bindValue(2, $o->getFkComodo());

            $cr->execute();
            $cc->execute();
            $co->execute();
        }

        //@override
        final public function cadAutomacao(Automacao $a) {
            
            $automacao = "INSERT INTO automacao(id_automacao, fk_residencia, fk_cliente, fk_user) VALUES (?,?,?,?)";

            $ca = Conexao::Conn()->prepare($automacao);
            $ca->bindValue(1, $a->getIdServico());
            $ca->bindValue(2, $a->getFkResidencia());
            $ca->bindValue(3, $a->getFkCliente());
            $ca->bindValue(4, $a->getFkAtendente());

            $ca->execute();
        }

        //@override
        final public function cadDesenvWeb(DesenvolvimentoWeb $dw) {

            $desenvWeb = "INSERT INTO desenvolvimento_web(id_desenvWeb, fk_cliente, fk_user) VALUES (?,?,?)";

            $cd = Conexao::Conn()->prepare($desenvWeb);
            $cd->bindValue(1, $dw->getIdServico());
            $cd->bindValue(2, $dw->getFkCliente());
            $cd->bindValue(3, $dw->getFkAtendente());

            $cd->execute();
        }

        //@override
        final public function cadCompra(Compra $c) {

            $compra = "INSERT INTO compra(id_compra, fk_cliente, fk_user) VALUES (?,?,?)";

            $cc = Conexao::Conn()->prepare($compra);
            $cc->bindValue(1, $c->getIdServico());
            $cc->bindValue(2, $c->getFkCliente());
            $cc->bindValue(3, $c->getFkAtendente());

            $cc->execute();
        }

        public function cadFornecedor(Fornecedor $f) {

            $cadastrar = "INSERT INTO fornecedor(id_fornecedor, fk_pj, fk_master) VALUES (?,?,?)";

            $fornecedor = Conexao::Conn()->prepare($cadastrar);
            $fornecedor->bindValue(1, $f->getIdFornecedor());
            $fornecedor->bindValue(2, $f->getFkPessoa());
            $fornecedor->bindValue(3, $f->getFkUsuario());
            $fornecedor->execute();
        }
        
        final public function cadFuncionario(Funcionario $f) {

            $cad_funcionario = "INSERT INTO funcionario VALUES (?,?,?,?,?)";

            $funcionario = Conexao::Conn()->prepare($cad_funcionario);
            $funcionario->bindValue(1, $f->getIdFuncionario());
            $funcionario->bindValue(2, $f->getFkMaster());
            $funcionario->bindValue(3, $f->getFkPessoa());
            $funcionario->bindValue(4, $f->getFkSetor());
            $funcionario->bindValue(5, $f->getFkCargo());
            $funcionario->execute();
        }

        final public function cadSetor(Setor $s){
            $cad_setor = "INSERT INTO setor(nome_setor) VALUES (?)";
            
            $setor = Conexao::Conn()->prepare($cad_setor);
            $setor->bindValue(1, $s->getNomeSetor());
            $setor->execute();
        }

        final public function cadCargo(Cargo $c){
            $cad_cargo = "INSERT INTO cargo(nome_cargo) VALUES (?)";

            $cargo = Conexao::Conn()->prepare($cad_cargo);
            $cargo->bindValue(1, $c->getNomeCargo());
            $cargo->execute();
        }

        final public function cadUsuario(Login $l, $tipo) {
            if($tipo == 'usuario_master'):
                $query = "INSERT INTO usuario_master VALUES (?,?,?,?)";
            elseif($tipo == 'usuario_user'):
                $query = "INSERT INTO usuario_comum VALUES (?,?,?,?)";
            elseif($tipo == 'usuario_gerente'):
                $query = "INSERT INTO usuario_gerente VALUES (?,?,?,?)";
            elseif($tipo == 'usuario_especial'):
                $query = "INSERT INTO usuario_especial VALUES (?,?,?,?)";
            else:
                $_SESSION['msg'] = "<span> Ação não permitida! </span>";
                header('Location: painel-pf.php?set=funcionario');
            endif;

            $login = Conexao::Conn()->prepare($query);
            $login->bindValue(1, $l->getIdUser());
            $login->bindValue(2, $l->getUser());
            $login->bindValue(3, $l->getSenha());
            $login->bindValue(4, $l->getFkFuncionario());
            $login->execute();
        }

        public function cadProduto(Produto $p) {
            
            $produto = "INSERT INTO produto(id_produto, fk_fornecedor, fk_master, fk_estoque, nomeProduto, codigo, marca, modelo, serie, qntd, preco_venda, data_venda) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            
            $cp = Conexao::Conn()->prepare($produto);
            $cp->bindValue(1, $p->getIdProduto());
            $cp->bindValue(2, $p->getFkFornecedor());
            $cp->bindValue(3, $p->getFkUsuario());
            $cp->bindValue(4, $p->getFkEstoque());
            $cp->bindValue(5, $p->getNomeProduto());
            $cp->bindValue(6, $p->getCodigo());
            $cp->bindValue(7, $p->getMarca());
            $cp->bindValue(8, $p->getModelo());
            $cp->bindValue(9, $p->getSerie());
            $cp->bindValue(10, $p->getQntd());
            $cp->bindValue(11, $p->getPrecoVenda());
            $cp->bindValue(12, $p->getDataVenda());

            $cp->execute();
        }

        public function cadEstoque(Estoque $e) {
            $estoque = "INSERT INTO estoque VALUES(?,?,?,?,?,?,?,?,?,?)";

            $ce = Conexao::Conn()->prepare($estoque);
            $ce->bindValue(1, $e->getIdEstoque());
            $ce->bindValue(2, $e->getQntdComprada());
            $ce->bindValue(3, $e->getDataCompra());
            $ce->bindValue(4, $e->getDataEntrega());

            $ce->execute();
        }
    }
?>