<?php
namespace Hotel;
use PDO;

class Reservation{
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=hotel;charset=UTF8', 'thanosch', '123456789!', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]);
        
    }
    protected function getPdo() {
        return $this->pdo;
    }
    public function reservations($userid, $roomid, $checkin, $checkout, $total){
        $statement = $this->getPdo()->prepare('INSERT INTO booking(user_id, room_id, check_in_date, check_out_date, total_price) VALUES (:user_id, :room_id, :check_in_date, :check_out_date, :total_price)');
        
        $statement ->bindParam(':user_id', $userid, PDO::PARAM_STR);
        $statement ->bindParam(':room_id', $roomid, PDO::PARAM_STR);
        $statement ->bindParam(':check_in_date', $checkin, PDO::PARAM_STR);
        $statement ->bindParam(':check_out_date', $checkout, PDO::PARAM_STR);
        $statement ->bindParam(':total_price', $total, PDO::PARAM_INT);

        $statement->execute();
    }

    public function getReservations($userid){
        $statement = $this->getPdo()->prepare('SELECT * FROM booking WHERE user_id = ? ORDER BY check_in_date ASC');
        $statement->execute([$userid]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReservationsbyDate($checkin, $checkout){
        $statement = $this->getPdo()->prepare('SELECT * FROM booking WHERE ((check_in_date<=:check_in_date OR check_in_date<=:check_out_date) AND (check_out_date>=:check_out_date OR check_out_date>=:check_in_date))');
        $statement ->bindParam(':check_in_date', $checkin, PDO::PARAM_STR);
        $statement ->bindParam(':check_out_date', $checkout, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}