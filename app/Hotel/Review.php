<?php
namespace Hotel;
use PDO;

class Review{
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=hotel;charset=UTF8', 'thanosch', '123456789!', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]);
        
    }
    private function getPdo() {
        return $this->pdo;
    }
    public function newReview($stars, $newReview){
        $statement = $this->getPdo()->prepare('INSERT INTO review(room_id, user_id, rate, comment) VALUES (:room_id, :user_id, :rate, :comment)');
        $room_id = $_POST['roomid'];
        $user_id = $_POST['user'];
        $statement ->bindParam(':room_id', $room_id, PDO::PARAM_INT);
        $statement ->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement ->bindParam(':rate', $stars, PDO::PARAM_INT);
        $statement ->bindParam(':comment', $newReview, PDO::PARAM_STR);

        $statement->execute();


    }
    public function getReviews($roomId){
        $statement = $this->getPdo()->prepare('SELECT * FROM review WHERE room_id = ? ORDER BY created_time DESC');
        $statement->execute([$roomId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getReviewsbyUser($userId){
        $statement = $this->getPdo()->prepare('SELECT * FROM review WHERE user_id = ? ORDER BY created_time DESC');
        $statement->execute([$userId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}