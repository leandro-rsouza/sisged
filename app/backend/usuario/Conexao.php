<?php
namespace app\backend\usuario;

    class Conexao {
        private static $instance;

        public static function Conn(){
            if(!isset(self::$instance)):
                self::$instance = new \PDO('mysql:host=localhost;dbname=sisged', 'root', '');
            endif;

            return self::$instance;
        }
    }
    
?>