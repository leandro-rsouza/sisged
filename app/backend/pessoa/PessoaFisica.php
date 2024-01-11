<?php
namespace app\backend\pessoa;

    class PessoaFisica extends Cadastro{
        private $id_pf;
        private $fk_cadastro;
        private $cpf;
        private $rg;
        private $data_nasc;

        public function setIdFisico($id_pf){
            $this->id_pf = $id_pf;
        }

        public function getIdFisico(){
            return $this->id_pf;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function setRg($rg){
            $this->rg = $rg;
        }

        public function getRg(){
            return $this->rg;
        }

        public function setDataNasc($data_nasc){
            $this->data_nasc = $data_nasc;
        }

        public function getDataNasc(){
            return $this->data_nasc;
        }

        public function getFkCadastro(){
            return $this->fk_cadastro;
        }

        public function setFkCadastro($fk_cadastro){
            $this->fk_cadastro = $fk_cadastro;
        }
    }
?>