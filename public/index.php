<?php
require_once __DIR__.'/../boot/boot.php';

use Hotel\Roomlist;
use Hotel\User;
$currentUser =$user->getCurrentUserId();
$list = new Roomlist();
$roomtypes = $list -> getroomTypes();
$cities = $list -> getCities();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    
    <link rel="stylesheet" href="assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/022912981f.js" crossorigin="anonymous"></script>
</head>
<body  style="background-image: url('images/main.jpg');  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;">
    <?php include('header.php'); ?>
    <main class=" position40 position-relative start-50 translate-middle"> 

        <section class="container rounded-3 col-5 bg-light pt-5 pb-4 ">
            <form action="list.php" method="get">
                <div class="container justify-content-center row mb-5">
                    <div class="text-center col-6">
                        <select class="required col-12 rounded py-2 text-center" name="city" id="city" required>
                                <option value="" disabled selected>City</option>
                                <?php foreach($cities as $city){
                                echo'<option value='. $city['city'] . '>'. $city['city'] . '</option>';}
                                ?>
                        </select>
                        <p class="requiredMsg col-12 text-center" style='color:red'>This field is required</p>  
                    </div>
                    <div class="text-center col-6">
                        <select class="col-12 rounded py-2 text-center" name="roomtype" id="room_type">
                            <option value="" disabled selected>Room Type</option>
                            <?php foreach($roomtypes as $roomtype){
                            echo'<option value='. $roomtype['type_id'] . '>'. $roomtype['title'] . '</option>';}
                            ?>
                        </select>
                        <p class="col-12 requiredMsg text-center"></p>  
                    </div>
                </div>
                <div class="container justify-content-center row">
                    <div class="text-center col-6">
                        <input 
                            class="required checkInDate col-12 rounded py-2 text-center";
                            name="checkin"
                            type="date" min="<?= date('Y-m-d'); ?>"
                            required/>
                            <p class="requiredMsg col-12 text-center" style='color:red'>This field is required</p> 
                    </div>
                    
                    <div class="text-center col-6">
                        <input 
                            class="required checkOutDate col-12 rounded py-2 text-center";
                            name="checkout";
                            type="date" min="<?= date('Y-m-d'); ?>"
                            required/>
                    <p class="requiredMsg requiredDate col-12 text-center" style='color:red'>This field is required</p> 
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="submitBtn d-inline mt-5 mb-2 ps-4 pe-4 btn btn-secondary"><i class="fa fa-search me-2" aria-hidden="true"></i>Search</button>
                </div>

            </form>
        </section>
    </main>
    <footer class="position-fixed w-100 bottom-0">
        <p class="text-center m-0 p-4 bg-light">© Copyright 2023 Hotels. All rights reserved.</p>
    </footer>

    <script src="assets/formErrors.js"></script>
    <script src="assets/dates.js"></script>
</body>
</html>