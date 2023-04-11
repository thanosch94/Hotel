<?php
require_once __DIR__.'\..\boot\boot.php';
use Hotel\User;

if(empty(User::getCurrentUserId())){

    header('Location: /hotel/public/login.php');
}

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
            <section class="col-7 mt-4 ms-5">
                <h4 class="bg-secondary p-2 text-light rounded">My bookings</h4>

            </section>
        </div>
    </main>
    <footer class="position-absolute w-100 bottom-0">
        <p class="text-center m-0 p-4 bg-light">© Copyright 2023 Hotels. All rights reserved.</p>
    </footer>
</body>
</html>