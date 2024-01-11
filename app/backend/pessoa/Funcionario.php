<?php
namespace app\backend\pessoa;

    class Funcionario {
        private $id_funcionario;
        private $fk_pessoa;
        private $fk_setor;
        private $fk_master;
        private $fk_cargo;

        public function getIdFuncionario()
        {
                return $this->id_funcionario;
        }

        public function setIdFuncionario($id_funcionario)
        {
                $this->id_funcionario = $id_funcionario;

                return $this;
        }

        public function getFkPessoa()
        {
                return $this->fk_pessoa;
        }

        public function setFkPessoa($fk_pessoa)
        {
                $this->fk_pessoa = $fk_pessoa;
        }

        public function getFkSetor(){
                return $this->fk_setor;
        }

        public function setFkSetor($fk_setor){
                $this->fk_setor = $fk_setor;
        }

        public function getFkMaster()
        {
                return $this->fk_master;
        }

        public function setFkMaster($fk_master)
        {
                $this->fk_master = $fk_master;
        }

        public function getFkCargo()
        {
                return $this->fk_cargo;
        }

        public function setFkCargo($fk_cargo)
        {
                $this->fk_cargo = $fk_cargo;
        }
    }
?>