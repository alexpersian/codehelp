<?php

class MyPDO extends PDO
{
    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;

    public function __construct($file = '../config.ini') {
        if (!$settings = parse_ini_file($file, TRUE)) {
            throw new exception('Unable to open ' . $file . '.');
        }

        $this->engine = $settings['database']['driver'];
        $this->host = $settings['database']['host'];
        $this->database = $settings['database']['schema'];
        $this->user = $settings['database']['username'];
        $this->pass = $settings['database']['password'];

        $dsn = $this->engine . ':host=' . $this->host . ';dbname=' . $this->database;

        parent::__construct($dsn, $this->user, $this->pass);
    }
}

?>