<?php
namespace Config;

use Config\Config;

class DB
{
    private $conn = null;
    private static $db = null;

    private function __construct()
    {
        $config_db = Config::newInstance()->getConfig('DB');
        try {
            $this->conn = new \PDO("mysql:host=" . $config_db['server'] . ";port=" . $config_db['port']
                . ";dbname=" . $config_db['database'] . ";charset=" . $config_db['charset'],$config_db['user']
                , $config_db['password']);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function connect(){
        if (self::$db == null){
            self::$db =  new DB();

            return self::$db;
        }else{

            return self::$db;
        }
    }

    public function getConnect(){
        return $this->conn;
    }

    public function test()
    {
        echo 'test';
    }

    public function executeQuery($sql,$array = array()){
        $stt = $this->conn->prepare($sql);
        $stt->execute($array);

        return $stt->fetchAll();
    }

    public function executeNonQuery($sql,$array = array()){
        $stt = $this->conn->prepare($sql);
        $result = $stt->execute($array);

        return $result;
    }

}