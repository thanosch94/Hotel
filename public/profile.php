<?php
require_once __DIR__.'\..\boot\boot.php';
use Hotel\User;
use Hotel\Reservation;
use Hotel\Roomlist;
use Hotel\Review;
use Hotel\Favorite;

$currentUser =$user->getCurrentUserId();

if(empty($currentUser)){

    header('Location: /hotel/public/login.php');
}



$reservations = new Reservation;
$reservation = $reservations->getReservations($currentUser);


$list = new Roomlist;
$reviews =new Review;
$AllReviews =$reviews ->getReviewsbyUser($currentUser);


$favorites = new Favorite;
$AllFavorites = $favorites ->getFavoritesbyUser($currentUser);

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
            <aside class="col-xl-3 col-md-4 col-sm-12 col-12 mt-4 ms-xl-5 ms-sm-0 ms-2 rounded-3">
                <div class="text-center container shadow p-4">
                    <h3>Favorites</h3>
                    <div class="favorites mb-4">
                    <?php foreach($AllFavorites as $favorite){
                                    $room = $list->getRoom( $favorite['room_id']);
                                    $j++;
                            ?>
                        <div class="col-12 mt-3">
                                <a class="text-decoration-none"style="color:black" href="room.php?GoToRoomPage=<?=$favorite['room_id']?>"><h5><?php echo $j.". ". $room['name'];?></h5></a>
                        </div> <?php } ?>
                    </div>
                    <h3>Reviews</h3>
                    <div class="reviews">
                        <?php foreach($AllReviews as $review){
                            $room = $list->getRoom($review['room_id']);
                            ?>
                        <div>
                            <div class="col-12 mt-3">
                                <a class="text-decoration-none"style="color:black" href="room.php?GoToRoomPage=<?=$review['room_id']?>"><h5><?php echo (array_search($review, $AllReviews)+1) . ". " . $room['name'];?></h5></a>
                            </div>
                                <div class="col-12">
                                <?php for($i=1; $i<=$review['rate']; $i++){
                                    echo '<i class="fa fa-star" style="color:orange"></i>';
                                }
                                for($i=1; $i<=(5-$review['rate']); $i++){
                                    
                                    echo '<i class="fa fa-star-o"></i>';
                                }
                                ?>
                            </div>
                        </div> <?php } ?>
                    </div>
                </div>
            </aside>
            <section class="col-xl-7 col-md-7 col-sm-12 col-12  mt-4 ms-xl-5 ms-sm-0 ms-2 mb-5">
                <h4 class="bg-secondary p-2 text-light rounded">My bookings</h4>
                <?php if(!$reservation){
                            echo "<h4 class='m-3'> There are no reservations</h4>";}
                    foreach($reservation as $reserv){ 
                        $room = $list-> getRoom($reserv['room_id']);
                            ?>
                    <div class="row">
                        <div class="col-12 col-xl-4 col-lg-5 col-md-12 col-sm-4 mb-4 text-xl-start text-lg-start text-md-center text-sm-start text-center mb-5">
                            <img style="border-right:3px solid black; padding:10px" src="images/rooms/<?php echo $room['photo_url'] ?>" width="220px" alt="room-1">
                        </div>
                        <div class="col-12 col-xl-7 col-lg-6 col-md-12 col-sm-6 ms-xl-0 ms-lg-4 ms-md-0 ms-sm-5 text-xl-start text-lg-start text-md-center text-sm-start text-center">
                            <h4><?php echo $room['name'];?><h4>
                            <h5 class="text-secondary"><?php echo $room['city'].', '.$room['address'];?></h5>
                            <p><?php echo $room['description_short']?></p>
                            <div class="row col-12 ms-2">
                                <span class="col-xl-7 col-lg-1 col-md-5"></span>
                                <form class="col-xl-5 col-lg-11 col-md-7 col-sm-12 text-xl-end text-lg-end text-md-end text-sm-center text-center px-2 mt-3 mb-2" method="get" action="room.php">
                                       <button type="submit" name="GoToRoomPage" class=" btn btn-secondary" value="<?php echo $room['room_id'];?>">Go to Room Page</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class=" row mb-3 align-items-center">
                        <p class="col-xl-2 col-sm-12 col-12 ms-2 btn bg-secondary text-light ">Total: <?=$reserv['total_price']?>€</p>
                        <div class="row col-xl-9 ms-2 text-center">
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