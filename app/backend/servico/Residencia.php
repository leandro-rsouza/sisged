<?php
namespace app\backend\servico;

    class Residencia {
        private $id_residencia;
        private $fk_endereco;

        public function getIdResidencia()
        {
                return $this->id_residencia;
        }

        public function setIdResidencia($id_residencia)
        {
                $this->id_residencia = $id_residencia;

                return $this;
        }

        public function getFkEndereco()
        {
                return $this->fk_endereco;
        }

        public function setFkEndereco($fk_endereco)
        {
                $this->fk_endereco = $fk_endereco;

                return $this;
        }
    }
?>