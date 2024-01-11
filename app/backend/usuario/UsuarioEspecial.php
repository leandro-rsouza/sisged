<?php
namespace app\backend\usuario;

    class UsuarioEspecial extends Login {

        public function atenderAutomacao() {
            
            $automacao = "INSERT INTO servico(fk_especial, fk_automacao) VALUES (?,?)";

            $atender = Conexao::Conn()->prepare($automacao);
            $atender->bindValue(1, $this->getIdUser());
        }

        public function atenderDesenvWeb() {

            $desenvWeb = "INSERT INTO servico(fk_especial, fk_desenvWeb) VALUES (?,?)";

            $atender = Conexao::Conn()->prepare($desenvWeb);
            $atender->bindValue(1, $this->getIdUser());
        }
    }
?>
