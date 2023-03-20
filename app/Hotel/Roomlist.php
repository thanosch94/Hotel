<?php
namespace Hotel;
use PDO;

class Roomlist{
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=hotel;charset=UTF8', 'thanosch', '123456789!', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]);
        
    }
    private function getPdo() {
        return $this->pdo;
    }
    public function getList(){
        $statement = $this->getPdo()->prepare('SELECT * FROM room');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
