<?php
namespace app\backend\servico;

    class Automacao extends Compra {
        private $fk_residencia;

        public function setFkResidencia($fk_residencia){
            $this->fk_residencia = $fk_residencia;
        }

        public function getFkResidencia(){
            return $this->fk_residencia;
        }
    }
?>