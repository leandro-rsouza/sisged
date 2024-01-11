<?php
namespace app\backend\usuario;

use app\backend\pessoa\PessoaFisica;
use app\backend\pessoa\PessoaJuridica;
use app\backend\pessoa\Cliente;
use app\backend\servico\Automacao;
use app\backend\servico\Comodo;
use app\backend\servico\Compra;
use app\backend\servico\DesenvolvimentoWeb;
use app\backend\servico\Objeto;
use app\backend\servico\Residencia;

    class UsuarioComum extends Login {

        public function cadPessoaFisica(PessoaFisica $p){
            $endereco = "INSERT INTO endereco(id_endereco, cep, logradouro, bairro, numero) VALUES (?,?,?,?,?)";
            $cadastro = "INSERT INTO cadastro(id_cadastro, fk_endereco, nome, email, contato) VALUES (?,?,?,?,?)";
            $pf = "INSERT INTO pessoa_fisica(id_pf, fk_cadastro, cpf, rg, data_nasc) VALUES (?,?,?,?,?)";

            $ce = Conexao::Conn()->prepare($endereco);
            $ce->bindValue(1, $p->getIdEndereco());
            $ce->bindValue(2, $p->getCep());
            $ce->bindValue(3, $p->getLogradouro());
            $ce->bindValue(4, $p->getBairro());
            $ce->bindValue(5, $p->getNumero());

            $co = Conexao::Conn()->prepare($cadastro);
            $co->bindValue(1, $p->getIdCadastro());
            $co->bindValue(2, $p->getFkEndereco());
            $co->bindValue(3, $p->getNome());
            $co->bindValue(4, $p->getEmail());
            $co->bindValue(5, $p->getContato());

            $cp = Conexao::Conn()->prepare($pf);
            $cp->bindValue(1, $p->getIdFisico());
            $cp->bindValue(2, $p->getFkCadastro());
            $cp->bindValue(3, $p->getCpf());
            $cp->bindValue(4, $p->getRg());
            $cp->bindValue(5, $p->getDataNasc());

            $ce->execute();
            $co->execute();
            $cp->execute();
        }

        public function cadPessoaJuridica(PessoaJuridica $p){
            $endereco = 'INSERT INTO endereco VALUES (?,?,?,?,?)';
            $cadastro = 'INSERT INTO cadastro VALUES (?,?,?,?,?)';
            $pj = 'INSERT INTO pessoa_juridica VALUES (?,?,?)';

            $ce = Conexao::Conn()->prepare($endereco);
            $ce->bindValue(1, $p->getIdEndereco());
            $ce->bindvalue(2, $p->getCep());
            $ce->bindValue(3, $p->getLogradouro());
            $ce->bindValue(4, $p->getBairro());
            $ce->bindValue(5, $p->getNumero());

            $co = Conexao::Conn()->prepare($cadastro);
            $co->bindValue(1, $p->getIdCadastro());
            $co->bindValue(2, $p->getFkEndereco());
            $co->bindValue(3, $p->getNome());
            $co->bindValue(4, $p->getEmail());
            $co->bindValue(5, $p->getContato());

            $cp = Conexao::Conn()->prepare($pj);
            $cp->bindValue(1, $p->getIdJuridico());
            $cp->bindValue(2, $p->getFkCadastro());
            $cp->bindValue(3, $p->getCnpj());

            $ce->execute();
            $co->execute();
            $cp->execute();
        }

        public function cadClienteFisico(Cliente $c) {

            $cadastrar = "INSERT INTO cliente(id_cliente, fk_pf, fk_user) VALUES (?,?,?)";

            $cliente = Conexao::Conn()->prepare($cadastrar);
            $cliente->bindValue(1, $c->getIdCliente());
            $cliente->bindValue(2, $c->getFkPessoa());
            $cliente->bindValue(3, $c->getFkUsuario());
            $cliente->execute();
            
        }

        public function cadClienteJuridico(Cliente $c) {

            $cadastrar = "INSERT INTO cliente(id_cliente, fk_pj, fk_user) VALUES (?,?,?)";

            $cliente = Conexao::Conn()->prepare($cadastrar);
            $cliente->bindValue(1, $c->getIdCliente());
            $cliente->bindValue(2, $c->getFkPessoa());
            $cliente->bindValue(3, $c->getFkUsuario());
            $cliente->execute();
            
        }

        public function cadResidencia(Residencia $r, Comodo $c, Objeto $o) {
            
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

        public function cadAutomacao(Automacao $a) {
            
            $automacao = "INSERT INTO automacao(id_automacao, fk_residencia, fk_cliente, fk_user) VALUES (?,?,?,?)";

            $ca = Conexao::Conn()->prepare($automacao);
            $ca->bindValue(1, $a->getIdServico());
            $ca->bindValue(2, $a->getFkResidencia());
            $ca->bindValue(3, $a->getFkCliente());
            $ca->bindValue(4, $a->getFkAtendente());

            $ca->execute();
        }

        public function cadDesenvWeb(DesenvolvimentoWeb $dw) {

            $desenvWeb = "INSERT INTO desenvolvimento_web(id_desenvWeb, fk_cliente, fk_user) VALUES (?,?,?)";

            $cd = Conexao::Conn()->prepare($desenvWeb);
            $cd->bindValue(1, $dw->getIdServico());
            $cd->bindValue(2, $dw->getFkCliente());
            $cd->bindValue(3, $dw->getFkAtendente());

            $cd->execute();
        }

        public function cadCompra(Compra $c) {

            $compra = "INSERT INTO compra(id_compra, fk_cliente, fk_user) VALUES (?,?,?)";

            $cc = Conexao::Conn()->prepare($compra);
            $cc->bindValue(1, $c->getIdServico());
            $cc->bindValue(2, $c->getFkCliente());
            $cc->bindValue(3, $c->getFkAtendente());

            $cc->execute();
        }
    }
?>