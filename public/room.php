<?php
require_once __DIR__.'\..\boot\boot.php';

use Hotel\Roomlist;
$list = new Roomlist();
$roomId=$_POST['GoToRoomPage'];
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
        <section class="container mt-4">
            <h4 class="bg-secondary p-2 text-light rounded"><?php echo $room['name']." - ".$room['city'].', '.$room['address'] ;?> | Reviews: <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> | <i class="fa fa-heart-o"></i></h4>
            <img class="rounded mx-auto d-block" src="images/rooms/<?php echo $room['photo_url'] ?>" width="50%" alt="<?php echo $room['name']?>">
            <div class="col-12 row">          
                <p class="col-2 ms-4 btn bg-secondary text-light">Per night: <?php echo $room['price'] ?>€</p>
                <div class="row col-9 ms-4 text-center">
                    <p class="col-5 bg-light text-secondary p-2">Count of guests: <?php echo $room['count_of_guests']?></p>
                    <p class="col-1 bg-light text-secondary p-2">|</p>
                    <p class="col-6 bg-light text-secondary p-2">Type of room: <?php echo $room['type_id']?></p>
                </div>
            </div>
            <h4>Room Description</h4>
            <p style="border-left:3px solid black;"><?php echo $room['description_short']?>
        </section>
        <section class="container">
            <div id="map" style="height: 400px; width: 100%;"></div>
        </section>
    </main>
    <footer>
        <p class="text-center m-0 p-4 bg-light">© Copyright 2023 Hotels. All rights reserved.</p>
    </footer>
</body>
</html>