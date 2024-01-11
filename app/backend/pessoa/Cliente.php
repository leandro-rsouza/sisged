<?php
namespace app\backend\pessoa;

    class Cliente {
        private $id_cliente;
        private $fk_pessoa;
        private $fk_usuario;

        public function setIdCliente($id_cliente){
            $this->id_cliente = $id_cliente;
        }

        public function getIdCliente(){
            return $this->id_cliente;
        }

        public function setFkPessoa($fk_pessoa){
            $this->fk_pessoa = $fk_pessoa;
        }

        public function getFkPessoa(){
            return $this->fk_pessoa;
        }

        public function setFkUsuario($fk_usuario){
            $this->fk_usuario = $fk_usuario;
        }

        public function getFkUsuario(){
            return $this->fk_usuario;
        }
    }
?>