<?php
require_once __DIR__.'\..\..\boot\boot.php';

use Hotel\User;
use Hotel\Roomlist;
use Hotel\Reservation;

//Return to home page if not a post request
if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    header('Location: /hotel/public/index.php');
    return;
}
$user =new User;
$currentUser =$user ->getCurrentUserId();
$roomid = $_POST['roomid'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$total= $_POST['total'];

$reservation = new Reservation;
$reservation ->reservations($currentUser,$roomid,$checkin,$checkout,$total); 

$list = new Roomlist;
$room = $list ->getRoom($roomid);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/022912981f.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
        <nav class="d-flex justify-content-around pt-4 bg-light shadow">
            <a class="text-decoration-none text-body" href="../list.php"><p>Hotels</p></a>
     
            <div>
                <a href="../index.php" class="text-decoration-none text-body"><i class="fa-solid fa-house"></i>
                <p class="d-inline pe-3">Home</p></a>
                <a href="../profile.php" class="text-decoration-none text-body"><i class="fa-solid fa-user"></i>
                <p class="d-inline">Profile</p></a>
            </div>
            
        </nav>
    </header>
<section class="h-100 h-custom gradient-custom-2 py-5">
        <div class="container col-8 justify-content-center py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card card-registration" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <h2 class="my-5 text-center ">Thank you for your reservation!</h2>
                        
                        <div class="row">
                            <div class="col-3 mb-5">
                                <img style="border-right:3px solid black; padding:10px" src="../images/rooms/<?php echo $room['photo_url'] ?>" width="220px" alt="room-1">
                            </div>
                            <div class="col-9">
                                <h4><?php echo $room['name'];?><h4>
                                <h5 class="text-secondary"><?php echo $room['city'].', '.$room['address'];?></h5>
                                <p><?php echo $room['description_short']?></p>
                            </div>
                        </div>
                        <div class="col-12 row justify-content-center p-1">          
                            <div class="row col-10 justify-content-center text-center bg-light text-secondary pt-2">
                                <p class="col-2 border-end"><i class="fa-solid fa-user"></i> <?php echo $room['count_of_guests']?></p>
                                <p class="col-2 border-end"><i class="fa fa-bed" aria-hidden="true"></i> <?php echo $room['type_id']?></p>
                                <p class="col-4 border-end"><i class="fas fa-parking"></i> <?php echo ($room['parking']==1) ? 'YES' : 'NO';?></p>
                                <p class="col-2 border-end"><i class="fa fa-wifi" aria-hidden="true"></i> <?php echo ($room['wifi']==1) ? 'YES' : 'NO';?></p>
                                <p class="col-2"><i class="fa fa-cat" aria-hidden="true"></i> <?php echo ($room['pet_friendly']==1) ? 'YES' : 'NO';?></p>
                            </div>                
                            <div class="row col-10 justify-content-center text-center bg-light text-secondary  pb-2">
                                <p class="col-2 border-end">Guests</p>
                                <p class="col-2 border-end">Room Type</p>
                                <p class="col-4 border-end">Parking</p>
                                <p class="col-2 border-end">Wi-fi</p>
                                <p class="col-2">Pet Friendly</p>
                            </div>               
                        </div>
                        <div class="container mt-4">
                            <div class="row text-center">
                                <h4 class="col-4">Check-in Date</h4>
                                <h4 class="col-4">Check-out Date</h4>
                                <h4 class="col-4">Total</h4>
                            </div>
                        </div>
                        <div class="container mt-2">
                            <div class="row text-center">
                                <h6 class="col-4"><?=$checkin?></h6>
                                <h6 class="col-4"><?=$checkout?></h6>
                                <h6 class="col-4"><?=$total?>€</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p class="text-center m-0 p-4 bg-light">© Copyright 2023 Hotels. All rights reserved.</p>
    </footer>
</body>
</html>