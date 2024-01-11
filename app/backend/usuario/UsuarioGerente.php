<?php
namespace app\backend\usuario;

use app\backend\servico\Fornecedor;
use app\backend\servico\Produto;
use app\backend\servico\Estoque;

    class UsuarioGerente extends UsuarioMaster {

        //@override
        final public function cadFornecedor(Fornecedor $f) {

            $cadastrar = "INSERT INTO fornecedor(id_fornecedor, fk_pj, fk_gerente) VALUES (?,?,?)";

            $fornecedor = Conexao::Conn()->prepare($cadastrar);
            $fornecedor->bindValue(1, $f->getIdFornecedor());
            $fornecedor->bindValue(2, $f->getFkPessoa());
            $fornecedor->bindValue(3, $f->getFkUsuario());
            $fornecedor->execute();
        }

        //@override
        final public function cadProduto(Produto $p) {
            $produto = "INSERT INTO produto(id_produto, fk_fornecedor, fk_gerente, fk_estoque, nomeProduto, codigo, marca, modelo, serie, qntd, preco_venda, data_venda) 
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

        //@override
        final public function cadEstoque(Estoque $e) {
            $estoque = "INSERT INTO estoque VALUES(?,?,?,?,?,?,?,?,?,?)";

            $ce = Conexao::Conn()->prepare($estoque);
            $ce->bindValue(1, $e->getIdEstoque());
            $ce->bindValue(2, $e->getQntdComprada());
            $ce->bindValue(3, $e->getDataCompra());
            $ce->bindValue(4, $e->getDataEntrega());

            $ce->execute();
        }
        
        final protected function gerenciarAutomacao() {
            
            $automacao = "INSERT INTO automacao(fk_gerente) VALUES (?)";

            $gerenciar = Conexao::Conn()->prepare($automacao);
            $gerenciar->bindValue(1, $this->getIdUser());
        }

        final protected function gerenciarDesenvWeb() {
            
            $desenvWeb = "INSERT INTO automacao(fk_gerente) VALUES (?)";

            $gerenciar = Conexao::Conn()->prepare($desenvWeb);
            $gerenciar->bindValue(1, $this->getIdUser());
        }

        final protected function gerenciarCompra() {
            
            $compra = "INSERT INTO automacao(fk_gerente) VALUES (?)";

            $gerenciar = Conexao::Conn()->prepare($compra);
            $gerenciar->bindValue(1, $this->getIdUser());
        }
    }
?>