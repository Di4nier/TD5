<?php

    require_once File::build_path(['config','conf.php']);

    class Model
    {

        static public $pdo;

        static public function init()
        {
            $hostname=Conf::getHostname();
            $database_name=Conf::getDatabase();
            $login=Conf::getLogin();
            $password=Conf::getPassword();

            try{
                self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            }catch(PDOException $e){
                if(Conf::getDebug()){
                    echo $e->getMessage();
                }else{
                    echo 'Une erreur est survenue 🤖 Retour a l accueil';
                }
                die();
            }
            
        }
    }

    Model::Init();

?>
