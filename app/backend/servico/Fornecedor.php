<?php
namespace app\backend\servico;

    class Fornecedor {
        private $id_fornecedor;
        private $fk_pj;
        private $fk_usuario;

        public function setIdFornecedor($id_fornecedor){
            $this->id_fornecedor = $id_fornecedor;
        }

        public function getIdFornecedor(){
            return $this->id_fornecedor;
        }

        public function setFkPessoa($fk_pj){
            $this->fk_pj = $fk_pj;
        }

        public function getFkPessoa(){
            return $this->fk_pj;
        }

        public function setFkUsuario($fk_usuario){
            $this->fk_usuario = $fk_usuario;
        }

        public function getFkUsuario(){
            return $this->fk_usuario;
        }
    }
?>