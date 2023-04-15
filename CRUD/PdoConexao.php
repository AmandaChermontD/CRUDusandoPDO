<?php
class PdoConexao {
    private static $instancia;
   
    private function __construct() { }
    private function __clone() { }

    public function __wakeup() { }
   
    
    public static function getInstancia() {
        if(!isset(self::$instancia)) {
             try {
                 $dsn = "mysql:host=localhost;dbname=exemplocrud";
                 $usuario = “root”;
                 $senha = “”; 
                 
                 
                 self::$instancia = new PDO( $dsn, $usuario, $senha );
                 
                 
                 self::$instancia->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
             
             } catch ( PDOException $excecao ){
                 echo $excecao->getMessage();
                 
                 exit();
             }
         }
         return self::$instancia;
        }
   }
   ?>