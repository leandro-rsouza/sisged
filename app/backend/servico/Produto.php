<?php
namespace app\backend\servico;

    class Produto {
        private $id_produto;
        private $fk_fornecedor;
        private $fk_usuario;
        private $fk_servico;
        private $fk_estoque;
        private $nome_produto;
        private $codigo;
        private $marca;
        private $modelo;
        private $serie;
        private $qntd;
        private $preco_venda;
        private $data_venda;

        public function getIdProduto()
        {
                return $this->id_produto;
        }

        public function setIdProduto($id_produto)
        {
                $this->id_produto = $id_produto;

                return $this;
        }

        public function getFkFornecedor()
        {
                return $this->fk_fornecedor;
        }

        public function setFkFornecedor($fk_fornecedor)
        {
                $this->fk_fornecedor = $fk_fornecedor;

                return $this;
        }

        public function getFkUsuario()
        {
                return $this->fk_usuario;
        }

        public function setFkMaster($fk_usuario)
        {
                $this->fk_usuario = $fk_usuario;

                return $this;
        }

        public function getFkServico()
        {
                return $this->fk_servico;
        }

        public function setFkServico($fk_servico)
        {
                $this->fk_servico = $fk_servico;

                return $this;
        }

        public function getFkEstoque()
        {
                return $this->fk_estoque;
        }

        public function setFkEstoque($fk_estoque)
        {
                $this->fk_estoque = $fk_estoque;

                return $this;
        }

        public function getNomeProduto()
        {
                return $this->nome_produto;
        }

        public function setNomeProduto($nome_produto)
        {
                $this->nome_produto = $nome_produto;

                return $this;
        }

        public function getCodigo()
        {
                return $this->codigo;
        }

        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;

                return $this;
        }

        public function getMarca()
        {
                return $this->marca;
        }

        public function setMarca($marca)
        {
                $this->marca = $marca;

                return $this;
        }

        public function getModelo()
        {
                return $this->modelo;
        }

        public function setModelo($modelo)
        {
                $this->modelo = $modelo;

                return $this;
        }

        public function getSerie()
        {
                return $this->serie;
        }

        public function setSerie($serie)
        {
                $this->serie = $serie;

                return $this;
        }

        public function getQntd()
        {
                return $this->qntd;
        }

        public function setQntd($qntd)
        {
                $this->qntd = $qntd;

                return $this;
        }

        public function getPrecoVenda()
        {
                return $this->preco_venda;
        }

        public function setPrecoVenda($preco_venda)
        {
                $this->preco_venda = $preco_venda;

                return $this;
        }

        public function getDataVenda()
        {
                return $this->data_venda;
        }

        public function setDataVenda($data_venda)
        {
                $this->data_venda = $data_venda;

                return $this;
        }
    }

?>