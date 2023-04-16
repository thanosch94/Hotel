<?php
require_once __DIR__.'\..\..\boot\boot.php';

use Hotel\Review;

$user = $_POST['user'];
$roomId = $_POST['roomid'];
$stars = $_POST['stars'];
$newReview =$_POST['newReview'];
$review = new Review;
$addNewReview =$review ->newReview($stars, $newReview);
header('Location: /hotel/public/room.php?GoToRoomPage='.$roomId);