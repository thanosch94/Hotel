<?php
require_once __DIR__.'\..\boot\boot.php';
use Hotel\User;
use Hotel\Reservation;
use Hotel\Roomlist;

$currentUser =$user->getCurrentUserId();

if(empty($currentUser)){

    header('Location: /hotel/public/login.php');
}



$reservations = new Reservation;
$reservation = $reservations->getReservations($currentUser);


$list = new Roomlist();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="assets/styles.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/022912981f.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('header.php'); ?>
    <main class=" mt-4">
        <div class="row container-fluid" >
            <aside class="col-3 mt-4 ms-5 rounded-3">
                <div class="text-center container shadow p-4">
                    <h4>Favorites</h4>
                    <div class="favorites"></div>
                    <h4>Reviews</h4>
                    <div class="reviews"></div>
                </div>
            </aside>
            <section class="col-7 mt-4 ms-5 mb-5">
                <h4 class="bg-secondary p-2 text-light rounded">My bookings</h4>
                <?php if(!$reservation){
                            echo "<h4 class='m-3'> There are no reservations</h4>";}
                    foreach($reservation as $reserv){ 
                        $room = $list-> getRoom($reserv['room_id']);
                            ?>
                    <div class="row">
                        <div class="col-3 mb-5">
                            <img style="border-right:3px solid black; padding:10px" src="images/rooms/<?php echo $room['photo_url'] ?>" width="220px" alt="room-1">
                        </div>
                        <div class="col-9">
                            <h4><?php echo $room['name'];?><h4>
                            <h5 class="text-secondary"><?php echo $room['city'].', '.$room['address'];?></h5>
                            <p><?php echo $room['description_short']?></p>
                            <div class="row">
                                <span class="col-8"></span>
                                <form class="col-4 align-items-end" method="get" action="room.php">
                                    <button type="submit" name="GoToRoomPage" class=" btn btn-secondary" value="<?php echo $room['room_id'];?>">Go to Room Page</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 row mb-3">
                        <p class="col-2 ms-4 btn bg-secondary text-light">Total: <?=$reserv['total_price']?>€</p>
                        <div class="row col-9 ms-4 text-center">
                            <p class="col-5 bg-light text-secondary p-2">Check-in Date: <?=$reserv['check_in_date']?></p>
                            <p class="col-1 bg-light text-secondary p-2">|</p>
                            <p class="col-6 bg-light text-secondary p-2">Check-out Date: <?=$reserv['check_out_date']?></p>
                        </div>
                    </div>
                <?php } ?>
            </section>
        </div>
    </main>
    <footer  class="position-fixed w-100 bottom-0">
        <p class="text-center m-0 p-4 bg-light">© Copyright 2023 Hotels. All rights reserved.</p>
    </footer>
</body>
</html>