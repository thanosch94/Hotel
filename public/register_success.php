<?php
require_once __DIR__.'\..\boot\boot.php';

use Hotel\User;
$user = new User;
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
$addNewUser = $user->insert($_POST['name'], $_POST['email'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/022912981f.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include('header.php'); ?>
<section class="h-100 h-custom gradient-custom-2 py-5">
        <div class="container col-6 justify-content-center py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card card-registration" style="border-radius: 15px;">
                    <div class="card-body text-center p-0">
                        <h2 class="my-3">Thank you for registering!</h2>
                        <h4 class="p-4">Login to your account <a href="login.php">here</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="position-absolute w-100 bottom-0 pt-5 pb-5 top-100">
        <p class="text-center p-4 bg-light">© Copyright 2023 Hotels. All rights reserved.</p>
    </footer>
</body>
</html>