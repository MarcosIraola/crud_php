<?php
class PDOConfig extends PDO {
   
    private $engine;
    private $host;
    private $database;
    private $user;
    private $password;
   
    public function __construct(){
        $this->engine = 'mysql';
        $this->host = '127.0.0.1';
        $this->database = '';
        $this->user = 'root';
        $this->password = '';
        $dsn = $this->engine.':dbname='.$this->database.';host='.$this->host;
        parent::__construct($dsn, $this->user, $this->password);
    }
}
