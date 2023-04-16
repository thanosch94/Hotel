<?php 

require_once __DIR__.'\..\..\boot\boot.php';

use Hotel\Roomlist;
use Hotel\Reservation;
$list = new Roomlist();
$roomId=$_GET['GoToRoomPage'];
$room = $list->getRoom($roomId);
$checkin =$_POST['checkin'];
$checkout =$_POST['checkout'];

$reservation = new Reservation();
$reserv =  $reservation ->getReservationsbyDate($checkin, $checkout);
$bookings = array();
foreach($reserv as $booked){
    $bookings[$booked[$roomId]] = 1;

}

    if($bookings[$room['room_id']]>0){
        echo '<button class="Btnajax col-2 btn btn-warning" type="button" >Reserved</button>';
    } else{
        echo '<button class="Btnajax btnSubmit col-2 btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Reserve</button>';
}
