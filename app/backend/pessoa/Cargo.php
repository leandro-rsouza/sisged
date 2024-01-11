<?php

namespace app\backend\pessoa;

    class Cargo {
        private $id_cargo;
        private $nome_cargo;

        public function getIdCargo()
        {
            return $this->id_cargo;
        }

        public function setIdCargo($id_cargo)
        {
            $this->id_cargo = $id_cargo;
            return $this;
        }

        public function getNomeCargo()
        {
            return $this->nome_cargo;
        }

        public function setNomeCargo($nome_cargo)
        {
            $this->nome_cargo = $nome_cargo;
            return $this;
        }
    }

?>