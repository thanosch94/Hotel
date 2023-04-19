<?php
require_once __DIR__.'/../../boot/boot.php';

use Hotel\User;

//Return to home page if not a post request
if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    header('Location: /hotel/public/index.php');
    return;
}

//Create new user
$user = new User;
$user->insert($_POST['name'], $_POST['email'], $_POST['password']);

//Retrieve user
$userInfo = $user->getByEmail($_REQUEST['email']);

//Generate token
$token =$user->generateToken($userInfo['user_id']);

//Set cookie
setcookie('user_id', $token, time()+(30*24*60*60), '/');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
                <a href="../login.php" class="text-decoration-none text-body"><i class="fa-solid fa-user"></i>
                <p class="d-inline">Profile</p></a>
            </div>
            
        </nav>
    </header>
<section class="h-100 h-custom gradient-custom-2 py-5">
        <div class="container col-6 justify-content-center py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card card-registration" style="border-radius: 15px;">
                    <div class="card-body text-center p-0">
                        <h2 class="my-3">Thank you for registering!</h2>
                        <h4 class="p-4">Login to your account <a href="../login.php">here</a></h4>
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