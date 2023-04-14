<?php
require_once __DIR__.'\..\boot\boot.php';

use Hotel\Roomlist;
use Hotel\Reservation;
$list = new Roomlist();
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
$city = $_GET['city'];

if(isset($_GET['roomtype']) || isset($city) || isset($checkin) || isset($checkout)){
    $roomlist = $list-> getListwithFilters();
}else{
$roomlist = $list-> getList();
}
$maxGuests  = $list-> getmaxNumberofGuests();
$roomtypes = $list -> getroomTypes();
$cities = $list -> getCities();
$maxprice = $list -> getMaxPrice();
$minprice = $list -> getMinPrice();

$reservation = new Reservation();
$reserv =  $reservation ->getReservationsbyDate($checkin, $checkout);


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/022912981f.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('header.php'); ?>
    <main class="row mt-4 col-12">
        <aside class="col-3  mt-4 ms-5">
            <section class="container shadow rounded-3">
                <div class="text-center p-4">
                    <h4>FIND THE PERFECT HOTEL</h4>
                </div>
                <form class="container" method="get">
                <select class="w-100 rounded p-2 mb-4 text-center" name="guests" id="guests">
                        <option value="" disabled selected>Count of guests</option>
                        <?php for($i=1; $i<=$maxGuests['count_of_guests']; $i++){
                        echo '<option value='. $i . '>'. $i . '</option>';};?>
                    </select>
                    <select class="w-100 rounded p-2 mb-4 text-center"  name="roomtype" id="room_type">
                        <option value="" disabled selected>Room Type</option>
                        <?php foreach($roomtypes as $roomtype){
                        echo'<option value='. $roomtype['type_id'] . '>'. $roomtype['title'] . '</option>';}
                        ?>
                    </select>
                    <select class="w-100 rounded p-2 mb-4 text-center"  name="city" id="city">
                        <option value="" disabled selected>City</option>
                        <?php foreach($cities as $city){
                        echo'<option value='. $city['city'] . '>'. $city['city'] . '</option>';}
                        ?>
                    </select>
                    <div class="row justify-content-around mb-2">
                        <input type="number" value=<?php echo $minprice['price'];?> name="min_price" class="w-25 me-5">
                        <input type="number" value=<?php echo $maxprice['price'];?> name="max_price" class="w-25 ms-1">
                        <input type="range" class="mt-2 w-100" min=<?= $minprice['price'];?> max= <?= $maxprice['price'];?>> 

                        <label for="min_price" class="small w-25">Min price</label>
                        <label for="max_price" class="small w-25">Max price</label>
                    </div>
                    <input 
                        class="w-100 rounded p-2 mb-4 text-center text-center";
                        type="date"  min="<?= date('Y-m-d');?>";
                        name = "checkin";
                        />
                        
                    <input 
                        class="w-100 rounded p-2 mb-4 text-center text-center";
                        type="date"  min="<?= date('Y-m-d'); ?>";
                        name = "checkout";/>
                    <button type="submit" class="btn bg-secondary w-100 text-light mb-4">FIND HOTELS</submit>
                </form>
            </section>
        </aside>
        <section class="col-8 mt-4 mb-5">
            <h3 class="bg-secondary p-2 text-light rounded">Search Results</h3>
                <?php if(!$roomlist){
                        echo "<h4 class='m-3'> There are no results</h4>";
                        }
                        
                    
                    foreach($roomlist as $room){ 
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
                                    <div class="col-4 align-items-end mt-3 mb-2">
                                    <?php 
                                    //Show reserved button if room is reserved for the dates somebody checks
                                        $bookings = array();
                                        foreach($reserv as $booked){
                                            $bookings[$booked['room_id']] = 1;
                                        }
                                        if($bookings[$room['room_id']]>0){
                                            echo '<button class="btn btn-warning" >Reserved</button>';
                                        }
                                    ?>
                                    </div>
                                    <input type="hidden" id="checkin" name="checkin" value="<?=$checkin ?>">
                                    <input type="hidden" id="checkout" name="checkout" value="<?=$checkout ?>">
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 row mb-3">
                        <p class="col-2 ms-4 btn bg-secondary text-light">Per night: <?php echo $room['price'] ?>€</p>
                        <div class="row col-9 ms-4 text-center">
                            <p class="col-5 bg-light text-secondary p-2">Count of guests: <?php echo $room['count_of_guests']?></p>
                            <p class="col-1 bg-light text-secondary p-2">|</p>
                            <p class="col-6 bg-light text-secondary p-2">Type of room: <?php echo $room['type_id']?></p>
                        </div>
                    </div>
                <?php } ?>
        </section>
    </main>
    <footer class="position-fixed w-100 bottom-0">
        <p class="text-center m-0 p-4 bg-light">© Copyright 2023 Hotels. All rights reserved.</p>
    </footer>
</body>
</html>