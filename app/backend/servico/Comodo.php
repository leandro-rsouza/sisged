<?php
namespace app\backend\servico;

    class Comodo {
        private $id_comodo;
        private $fk_residencia;

        public function getIdComodo()
        {
                return $this->id_comodo;
        }

        public function setIdComodo($id_comodo)
        {
                $this->id_comodo = $id_comodo;

                return $this;
        }

        public function getFkResidencia()
        {
                return $this->fk_residencia;
        }

        public function setFkResidencia($fk_residencia)
        {
                $this->fk_residencia = $fk_residencia;

                return $this;
        }
    }
?>