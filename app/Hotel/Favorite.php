<?php
namespace Hotel;
use PDO;

class Favorite{
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=hotel;charset=UTF8', 'thanosch', '123456789!', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]);
        
    }
    protected function getPdo() {
        return $this->pdo;
    }
    public function getFavoritesbyUser($userid){
        $statement = $this->getPdo()->prepare('SELECT * FROM favorite WHERE user_id = ?');
        $statement->execute([$userid]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getFavorites($userid, $roomid){
        $statement = $this->getPdo()->prepare('SELECT * FROM favorite WHERE user_id = ? AND room_id = ?');
        $statement->execute([$userid, $roomid]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function addFavorite($userid, $roomid){
        $statement = $this->getPdo()->prepare('INSERT INTO favorite(user_id, room_id) VALUES (:user_id, :room_id)');
        $statement ->bindParam(':user_id', $userid, PDO::PARAM_INT);
        $statement ->bindParam(':room_id', $roomid, PDO::PARAM_INT);
        $statement->execute();
    }
    public function deleteFavorite($userid, $roomid){
        $statement = $this->getPdo()->prepare('DELETE FROM favorite WHERE user_id = ? AND room_id = ?');
        $statement -> execute([$userid, $roomid]);
    }
}