<?php
namespace app\backend\servico;

    class Objeto {
        private $id_objeto;
        private $fk_comodo;

        public function getIdObjeto()
        {
                return $this->id_objeto;
        }

        public function setIdObjeto($id_objeto)
        {
                $this->id_objeto = $id_objeto;

                return $this;
        }

        public function getFkComodo()
        {
                return $this->fk_comodo;
        }

        public function setFkComodo($fk_comodo)
        {
                $this->fk_comodo = $fk_comodo;

                return $this;
        }
    }
?>