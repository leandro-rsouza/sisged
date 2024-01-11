<?php
namespace app\backend\usuario;

    class Login {
        private $id_user;
        private $fk_funcionario;
        private $user;
        private $senha;

        public function setIdUser($id_user){
            $this->id_user = $id_user;
        }

        public function getIdUser(){
            return $this->id_user;
        }

        public function setUser($user){
            $this->user = $user;
        }

        public function getUser(){
            return $this->user;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function getFkFuncionario(){
            return $this->fk_funcionario;
        }

        public function setFkFuncionario($fk_funcionario){
            $this->fk_funcionario = $fk_funcionario;
            return $this;
        }

        public function log(){
            session_start();
            $cont = 1;

            while($cont<5):
                if($cont==1):
                    $query = 'SELECT id_master, usuario, senha FROM usuario_master WHERE usuario=? AND senha=?';
                elseif($cont==2):
                    $query = 'SELECT id_user, usuario, senha FROM usuario_comum WHERE usuario=? AND senha=?';
                elseif($cont==3):                
                    $query = 'SELECT id_gerente, usuario, senha FROM usuario_gerente WHERE usuario=? AND senha=?';
                elseif($cont==4):               
                    $query = 'SELECT id_especial, usuario, senha FROM usuario_especial WHERE usuario=? AND senha=?';
                endif;

                $login = Conexao::Conn()->prepare($query);
                $login->bindValue(1, $this->getUser());
                $login->bindValue(2, $this->getSenha());
                $login->execute();

                if($login->rowCount() > 0):
                    $dado = $login->fetch();
                    if ($cont==1):
                        $_SESSION['id_master'] = $dado['id_master'];
                        return true;
                    elseif($cont==2):
                        $_SESSION['id_user'] = $dado['id_user'];
                        return true;
                    elseif($cont==3):
                        $_SESSION['id_gerente'] = $dado['id_gerente'];
                        return true;
                    elseif($cont==4):
                        $_SESSION['id_especial'] = $dado['id_especial'];
                        return true;
                    else:
                        return false;
                    endif;
                endif;

            $cont++;
            endwhile;
        }

        public function verifyUser(){
            $cont = 1;

            while($cont<5):
                if($cont==1):
                    $query = 'SELECT id_master, usuario, senha FROM usuario_master WHERE usuario=?';
                elseif($cont==2):
                    $query = 'SELECT id_user, usuario, senha FROM usuario_comum WHERE usuario=?';
                elseif($cont==3):                
                    $query = 'SELECT id_gerente, usuario, senha FROM usuario_gerente WHERE usuario=?';
                elseif($cont==4):               
                    $query = 'SELECT id_especial, usuario, senha FROM usuario_especial WHERE usuario=?';
                endif;

                $login = Conexao::Conn()->prepare($query);
                $login->bindValue(1, $this->getUser());
                $login->execute();

                if($login->rowCount() > 0):
                    if ($cont==1):
                        return true;
                    elseif($cont==2):
                        return true;
                    elseif($cont==3):
                        return true;
                    elseif($cont==4):
                        return true;
                    else:
                        return false;
                    endif;
                endif;

            $cont++;
            endwhile;
        }

        public function verifyId($table, $atribute, $value){
            $query = "SELECT * FROM $table WHERE $atribute = $value";

            $buscar = Conexao::Conn()->prepare($query);
            $buscar->bindValue(1, $table);
            $buscar->bindValue(2, $atribute);
            $buscar->bindValue(3, $value);
            $buscar->execute();
            
            if($buscar->rowCount() > 0):
                return true;
            endif;
        }

        public function findId($table, $atribute, $value){
            $query = "SELECT * FROM $table WHERE $atribute = $value";

            $buscar = Conexao::Conn()->prepare($query);
            $buscar->bindValue(1, $table);
            $buscar->bindValue(2, $atribute);
            $buscar->bindValue(3, $value);
            $buscar->execute();

            if($buscar->rowCount() > 0):
                $dado = $buscar->fetch();
                if($table == 'cargo'):
                    $id = $dado['id_cargo'];
                    return $id;
                elseif($table == 'setor'):
                    $id = $dado['id_setor'];
                    return $id;
                elseif($table == 'pessoa_fisica'):
                    $id = $dado['id_pf'];
                    return $id;
                elseif($table == 'usuario_master'):
                    $id = $dado['id_master'];
                    return $id;
                elseif($table == 'usuario_comum'):
                    $id = $dado['id_user'];
                    return $id;
                elseif($table == 'usuario_gerente'):
                    $id = $dado['id_gerente'];
                    return $id;
                elseif($table == 'usuario_especial'):
                    $id = $dado['id_especial'];
                    return $id;
                else:
                    echo "<br> Nenhum ID foi encontrado!";
                endif;
            endif;
        }
    }
?>