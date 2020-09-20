<?php  //conexao.php
    class Conexao{
        //endereço do servidor, nome do banco, login e senha
        private static $dbNome = 'lpads2020';
        private static $dbHost = 'localhost';
        private static $dbUsuario = 'root'; 
        private static $dbSenha = '';  

        private static $cont = null; 

       
        public function __construct(){
             die ("A Função init não é permitida"); 
        }

        public  static function conectar(){
            if (null==self::$cont ){
                try{
                    // self::$cont = new PDO("mysql: host=localhost; dbname=lpads2020", 'root', ''); 
                         
                    self::$cont = new PDO("mysql:host=".self::$dbHost. 
                                          "; dbname=".self::$dbNome,  
                                          self::$dbUsuario, self::$dbSenha
                                          );
                }
                catch(PDOException $exception) {
                        die ("Erro conexao " . $exception->getMessage());
                }
            }
            return self::$cont; 
        }

        public static function desconectar (){
            self::$cont = null; 
        }


    }
?>