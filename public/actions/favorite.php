<?php
require_once __DIR__.'\..\..\boot\boot.php';

use Hotel\Favorite;

$favorite = new Favorite;

$userId = $_GET['user_id'];
$roomId = $_GET['room_id'];

$isFavorite = $favorite->getFavorites($userId,$roomId);

if ($isFavorite){
    $favorite->deleteFavorite($userId, $roomId);
}else{
    $favorite->addFavorite($userId, $roomId);

}

header('Location: /hotel/public/room.php?GoToRoomPage='.$roomId);