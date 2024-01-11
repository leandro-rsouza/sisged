<?php
namespace app\backend\servico;

    class Estoque {
        private $id_estoque;
        private $qntd_comprada;
        private $data_compra;
        private $data_entrega;
        private $preco_atacado;
        private $preco_unidade;
        private $qntd_estoque;
        private $vendas_ano;
        private $vendas_mes;
        private $vendas_dia;

        public function getIdEstoque()
        {
                return $this->id_estoque;
        }

        public function setIdEstoque($id_estoque)
        {
                $this->id_estoque = $id_estoque;

                return $this;
        }

        public function getQntdComprada()
        {
                return $this->qntd_comprada;
        }

        public function setQntdComprada($qntd_comprada)
        {
                $this->qntd_comprada = $qntd_comprada;

                return $this;
        }


        public function getDataCompra()
        {
                return $this->data_compra;
        }

        public function setDataCompra($data_compra)
        {
                $this->data_compra = $data_compra;

                return $this;
        }

        public function getDataEntrega()
        {
                return $this->data_entrega;
        }

        public function setDataEntrega($data_entrega)
        {
                $this->data_entrega = $data_entrega;

                return $this;
        }

        public function getPrecoAtacado()
        {
                return $this->preco_atacado;
        }

        public function setPrecoAtacado($preco_atacado)
        {
                $this->preco_atacado = $preco_atacado;

                return $this;
        }

        public function getPrecoUnidade()
        {
                return $this->preco_unidade;
        }

        public function setPrecoUnidade($preco_unidade)
        {
                $this->preco_unidade = $preco_unidade;

                return $this;
        }

        public function getQntdEstoque()
        {
                return $this->qntd_estoque;
        }

        public function setQntdEstoque($qntd_estoque)
        {
                $this->qntd_estoque = $qntd_estoque;

                return $this;
        }

        public function getVendasAno()
        {
                return $this->vendas_ano;
        }

        public function setVendasAno($vendas_ano)
        {
                $this->vendas_ano = $vendas_ano;

                return $this;
        }

        public function getVendasMes()
        {
                return $this->vendas_mes;
        }

        public function setVendasMes($vendas_mes)
        {
                $this->vendas_mes = $vendas_mes;

                return $this;
        }

        public function getVendasDia()
        {
                return $this->vendas_dia;
        }

        public function setVendasDia($vendas_dia)
        {
                $this->vendas_dia = $vendas_dia;
                
                return $this;
        }
    }

?>