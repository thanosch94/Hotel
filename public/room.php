<?php
require_once __DIR__.'\..\boot\boot.php';

use Hotel\Roomlist;
use Hotel\Reservation;
use Hotel\User;
use Hotel\Review;
use Hotel\Favorite;
$user = new User;
$currentUser =$user->getCurrentUserId();


$list = new Roomlist();
$roomId=$_GET['GoToRoomPage'];
$room = $list->getRoom($roomId);

$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
$reservation = new Reservation();
$reserv =  $reservation ->getReservationsbyDate($checkin, $checkout);

//Find average to display room rate
$reviews = new Review;
$AllReviews =$reviews ->getReviews($roomId);

    $values=array();
    foreach($AllReviews as $review){
        array_push($values,$review['rate']);
    }
    if(count($values)){
    $average = round(array_sum($values) / count($values));
    }

    
$favorite = new Favorite;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link rel="stylesheet" href="assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">  
    <script src="assets/map.js"></script>
    <script>
        let price = <?=$room['price'];?>;
        let checkin = "<?=$checkin?>"; //Assign check in date from Get to a js variable
        let checkout = "<?=$checkout ?>";//Assign check out date from Get to a js variable
        let $lat =<?=$room['location_lat']?>;
        let $lon =<?=$room['location_long']?>;
    </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBa-kw7ys-lWtcLK6O-ZwJZL3RvXXqOUys&callback=initMap" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/022912981f.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('header.php'); ?>
    <main class="row mt-4 container-fluid">
        <section class="container my-4">
            <h4 class="bg-secondary p-2 text-light rounded">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <?php echo $room['name']." - ".$room['city'].', '.$room['address'] ;?> 
                            Reviews: 
                            <div class="col-2 d-inline">
                                <?php for($i=1; $i<=$average; $i++){
                                    echo '<i class="fa fa-star" style="color:orange"></i>';
                                }
                                for($i=1; $i<=(5-$average); $i++){
                                    
                                    echo '<i class="fa fa-star-o"></i>';
                                }
                            
                        ?>
                            </div> | 
                            <?php if(!$favorite->getFavorites($currentUser, $roomId)){
                            echo '<a class="text-decoration-none" style="color:white" href="actions/favorite.php?user_id='.$currentUser.'&room_id='.$room['room_id'].'"><i class="favorite fa fa-heart"></i></a>';
                            }else{
                                echo '<a class="text-decoration-none" style="color:red" href="actions/favorite.php?user_id='.$currentUser.'&room_id='.$room['room_id'].'"><i class="favorite fa fa-heart"></i></a>';
                                }?>
                    </div>
                <div class="text-end">
            <span>Per night: <?php echo $room['price'] ?>€</span>
            </h4>
                
            <img class="rounded mx-auto d-block" src="images/rooms/<?php echo $room['photo_url'] ?>" width="50%" alt="<?php echo $room['name']?>">
            <div class="col-12 row my-4 justify-content-center p-1">          
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
        </section>

        <section class="mb-5">
            <form action="actions/reservation.php" method="post">
            <div class="container-fluid row justify-content-around mb-3">
                    <label for="checkin" class="col-2"><h4>Check-in Date</h4></label>
                    <label for="checkout" class="col-2"><h4>Check-out Date</h4></label>
                    <div class="col-2 changeDates"></div>
                </div>
                <div class="container-fluid row justify-content-around mb-4">
                    <input class="col-2 checkInDate" min="<?= date('Y-m-d'); //Sets min date to today?>" name="checkin" type="date"> 
                    <input class="col-2 checkOutDate" min="<?= $checkin;//Min date can't be before checkin date ?>" name="checkout" type="date">
                    <input type="hidden" id="roomid" name="roomid" value="<?=$room['room_id'] ?>">
                    <input class="total" type="hidden" id="total" name="total" value="">
                    <?php 
                    if(empty($currentUser)){
                        echo '<a class="col-2 " href="login.php"><button class="btn btn-warning px-5" type="button" >Login</button></a>';
                      
                    }else{
                        //Show reserved button if room is reserved for the dates somebody checks
                        $bookings = array();
                        foreach($reserv as $booked){
                            $bookings[$booked['room_id']] = 1;
                        }
                        if($bookings[$room['room_id']]>0){
                            echo '<button class="Btnajax col-2 btn btn-warning" type="button" >Reserved</button>';
                        } else{
                            echo '<button class="Btnajax btnSubmit col-2 btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Reserve</button>';
                        }
                    }
                    ?>
                           </div>

                <!-- Modal for reservation confirmation -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Reservation Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to confirm your reservation?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Confirm</button>
                    </div>
                    </div>
                </div>
                </div>


            </form>
            <div class="calculateTotal container bg-light rounded mt-5">
            </div>

        </section>
        
        <section class="mb-4">
            <h3 class="mb-3">Room Description</h3>
            <p style="border-left:3px solid black;"><?php echo $room['description_long']?>
        </section>
        <section class="container mb-5">
            <div id="map" style="height: 400px; width: 100%;"></div>
        </section>
        <hr>
        <section>
            <h3 class="mb-3">Reviews</h3>
            <div>
                <?php foreach($AllReviews as $review){
                    $userbyId = $user ->getById($review['user_id']);
                   
                ?>
                <div class="row">
                    <div class="col-2">
                        <h5><?=$userbyId['name'];?></h5>
                        <p class="text-secondary">Add date: <?=$review['created_time'];?></p>
                    </div>
                    <div class="col-2">
                        <?php for($i=1; $i<=$review['rate']; $i++){
                            echo '<i class="fa fa-star" style="color:orange"></i>';
                        }
                        for($i=1; $i<=(5-$review['rate']); $i++){
                            
                            echo '<i class="fa fa-star-o"></i>';
                        }
                        ?>
                    </div>
                </div>
                <p class="w-50"><?=$review['comment']?></p>
                <hr class="w-50 text-start">
                <?php } ?>
            </div>
        </section>
        <section class="my-4">
            <h3>Add Review</h3>

            <form action="actions/review.php" method="post">
 
                    <div class="col-2">
                        <i class="star1 fa fa-star-o"></i><i class="star2 fa fa-star-o"></i><i class="star3 fa fa-star-o"></i><i class="star4 fa fa-star-o"></i><i class="star5 fa fa-star-o"></i>
                    </div>
                    <div class="reviewMsg text-start" style="color:red; display:none">
                        <p>*Please select</p>
                    </div>
                <input type="hidden" id="stars" name="stars" value="" required>
                <input type="hidden" id="roomid" name="roomid" value="<?=$roomId?>" required>
                <input type="hidden" id="user" name="user" value="<?=$currentUser?>" required>
                <textarea name="newReview" class="w-100 my-3" placeholder="Review" rows="4" required></textarea>
                <div class="text-center">
                    <button class="reviewBtn btn btn-secondary">Submit</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
        <p class="text-center m-0 p-4 bg-light">© Copyright 2023 Hotels. All rights reserved.</p>
    </footer>
    <script src="assets/room.js"></script>
    <script src="assets/reserved.js"></script>
</body>
</html>