<?php
namespace app\backend\servico;

    class Compra {
        private $id_servico;
        private $fk_cliente;
        private $fk_atendente;
        private $fk_gerente;
        private $data;

        public function setIdServico($id_servico){
            $this->id_servico = $id_servico;            
        }

        public function getIdServico(){
            return $this->id_servico;
        }

        public function setFkCliente($fk_cliente){
            $this->fk_cliente = $fk_cliente;
        }

        public function getFkCliente(){
            return $this->fk_cliente;
        }

        public function setFkAtendente($fk_atendente){
            $this->fk_atendente = $fk_atendente;
        }

        public function getFkAtendente(){
            return $this->fk_atendente;
        }

        public function setFkGerente($fk_gerente){
            $this->fk_gerente = $fk_gerente;
        }

        public function getFkGerente(){
            return $this->fk_gerente;
        }

        public function getData(){
            return $this->data;
        }

        public function setData($data){
            $this->data = $data;
        }
    }
?>