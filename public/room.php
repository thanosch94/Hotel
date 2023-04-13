<?php
require_once __DIR__.'\..\boot\boot.php';

use Hotel\Roomlist;
$list = new Roomlist();
$roomId=$_GET['GoToRoomPage'];
$room = $list->getRoom($roomId);

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
        let $lat =<?php echo $room['location_lat']?>;
        let $lon =<?php echo $room['location_long']?>;
    </script>
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
                    <?php echo $room['name']." - ".$room['city'].', '.$room['address'] ;?> Reviews: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> | <i class="fa fa-heart-o"></i>
                    </div>
                    <div class="text-end">
                    <span>Per night: <?php echo $room['price'] ?>€</span>
                    </div>
                </div>
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
            <form>
            <div class="container-fluid row justify-content-around mb-3">
                    <label for="checkin" class="col-2"><h4>Check-in Date</h4></label>
                    <label for="checkout" class="col-2"><h4>Check-out Date</h4></label>
                    <div class="col-2"></div>
                </div>
                <div class="container-fluid row justify-content-around mb-4">
                    <input class="col-2" min="<?= date('Y-m-d'); //Sets min date to today?>" type="date"> 
                    <input class="col-2" min="<?= date('Y-m-d'); ?>"type="date">
                    <button class="col-2 btn btn-secondary" type="submit">Reserve</button>
                </div>
            </form>
            <div>

            </div>

        </section>
        
        <section class="mb-4">
            <h4 class="mb-3">Room Description</h4>
            <p style="border-left:3px solid black;"><?php echo $room['description_long']?>
        </section>
        <section class="container mb-5">
            <div id="map" style="height: 400px; width: 100%;"></div>
        </section>
    </main>
    <footer>
        <p class="text-center m-0 p-4 bg-light">© Copyright 2023 Hotels. All rights reserved.</p>
    </footer>
</body>
</html>