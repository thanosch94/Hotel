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
    public function getRoom($roomId){
        $statement = $this->getPdo()->prepare('SELECT * FROM room WHERE room_id = ?');
        $statement->execute([$roomId]);
        $roomId=[];
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    //Find, sort and keep the first room based on the count_of_guests DESC
    public function getmaxNumberofGuests(){
        $statement = $this->getPdo()->prepare('SELECT * FROM room ORDER BY count_of_guests DESC');
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getroomTypes(){
        $statement = $this->getPdo()->prepare('SELECT * FROM room_type');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCities(){
        $statement = $this->getPdo()->prepare('SELECT DISTINCT city FROM room');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

    public function getMinPrice(){
        $statement = $this->getPdo()->prepare('SELECT * FROM room ORDER BY price ASC');
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getMaxPrice(){
        $statement = $this->getPdo()->prepare('SELECT * FROM room ORDER BY price DESC');
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function getListwithFilters(){
        $guests = $_GET['guests'];
        $city = $_GET['city'];
        $roomtype = $_GET['roomtype'];
        $checkin = $_GET['checkin'];
        $checkout = $_GET['checkout'];
    
        $statement = $this->getPdo()->prepare('SELECT * FROM room WHERE city = COALESCE(:city, city) AND type_id <= COALESCE(:roomtype, type_id) AND count_of_guests >= COALESCE(:count_of_guests, count_of_guests)');
        $statement->bindParam(':count_of_guests', $guests, PDO::PARAM_INT);
        $statement->bindParam(':city', $city, PDO::PARAM_STR);
        $statement->bindParam(':roomtype', $roomtype, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}