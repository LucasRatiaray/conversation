<?php 

namespace App\Model;

use Symfony\Component\Dotenv\Dotenv;

class Model
{
    private $db_user;
    private $db_pass;
    private $db_name;
    private $options = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
    ];
    protected $connection;
    static $instance = null;

    public function __construct()
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__.'/../../.env');
        $this->db_user = $_ENV['DB_USER'];
        $this->db_pass = $_ENV['DB_PASS'];
        $this->db_name = $_ENV['DB_NAME'];
        
        if(self::$instance == null){
            try{
                $this->connection = new \PDO('mysql:host=localhost;dbname='.$this->db_name, $this->db_user, $this->db_pass, $this->options);
                self::$instance = $this->connection;
                return self::$instance;
            }catch(\PDOException $e){
                die($e->getMessage());
            }
        } else {
            return self::$instance;
        }
    }
}