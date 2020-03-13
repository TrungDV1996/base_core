<?php
namespace Config;

class Config
{
    private $config;
    private $dir = "config/";
    private static $instance = null;
    private function __construct()
    {
        $this->config = [];
        $this->loadConfig();
    }

    public static function newInstance()
    {
        if (self::$instance != null) {
            return self::$instance;
        } else {
            self::$instance = new Config();
            return self::$instance;
        }
    }

    public function loadConfig() {
        foreach (glob($this->dir . '*.json') as $file){
            $name = explode('.', str_replace($this->dir, '', $file));
            $fileContent = file_get_contents($file);
            $data = json_decode($fileContent, true);
            $this->config[$name[0]] = $data;
        }
    }

    public function getConfig($name)
    {
        return $this->config[$name];
    }
}