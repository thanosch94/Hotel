<?php
require_once __DIR__.'\..\boot\boot.php';

use Hotel\Roomlist;
$list = new Roomlist();
$roomlist = $list->getList();

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
                <form class="container">
                <select class="w-100 rounded p-2 mb-4 text-center" id="guests">
                        <option value="" disabled selected>Count of guests</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <select class="w-100 rounded p-2 mb-4 text-center" id="room_type">
                        <option value="" disabled selected>Room Type</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <select class="w-100 rounded p-2 mb-4 text-center" id="city">
                        <option value="" disabled selected>City</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <div class="row justify-content-around mb-2">
                        <input type="number" name="min_price" class="w-25 me-5">
                        <input type="number" name="max_price" class="w-25 ms-1">
                        <input type="range" class="mt-2 w-100">

                        <label for="min_price" class="small w-25">Min price</label>
                        <label for="max_price" class="small w-25">Max price</label>
                    </div>
                    <input 
                        class="w-100 rounded p-2 mb-4 text-center text-center";
                        type="date"/>
                    <input 
                        class="w-100 rounded p-2 mb-4 text-center text-center";
                        type="date"/>
                    <button type="submit" class="btn bg-secondary w-100 text-light mb-4">FIND HOTELS</submit>
                </form>
            </section>
        </aside>
        <section class="col-8 mt-4">
            <h3 class="bg-secondary p-2 text-light rounded">Search Results</h3>
                <?php foreach($roomlist as $room){ ?>
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
                                <form class="col-4 align-items-end" method="post" action="room.php">
                                    <button type="submit" name="GoToRoomPage" class=" btn btn-secondary" value="<?php echo $room['room_id'];?>">Go to Room Page</button>
                                </form>
                            </div>
                        </div>
                        

                        <div class="col-12 row">
                            
                            <p class="col-2 ms-4 btn bg-secondary text-light">Per night: <?php echo $room['price'] ?>€</p>
                            <div class="row col-9 ms-4 text-center">
                                <p class="col-5 bg-light text-secondary p-2">Count of guests: <?php echo $room['count_of_guests']?></p>
                                <p class="col-1 bg-light text-secondary p-2">|</p>
                                <p class="col-6 bg-light text-secondary p-2">Type of room: <?php echo $room['type_id']?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
        </section>
    </main>
    <footer>
        <p class="text-center m-0 p-4 bg-light">© Copyright 2023 Hotels. All rights reserved.</p>
    </footer>
</body>
</html>