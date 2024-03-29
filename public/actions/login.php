<?php
require_once __DIR__.'/../../boot/boot.php';

use Hotel\User;

//Return to login page if not a post request
if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    header('Location: /hotel/public/login.php');
    return;
}

//Create new user
$user = new User;


//Verify user info
$verify= $user->verify($_REQUEST['email'], $_POST['password']);
if($verify){
    session_start();

    // Check if the prev_page session variable is set
    if (isset($_SESSION['prev_page'])) {
      $prevPage = $_SESSION['prev_page'];
      header("Location: $prevPage");
    } else {
      header("Location: /hotel/public/index.php");

    }

}

//Retrieve user
$userInfo = $user->getByEmail($_REQUEST['email']);

//Generate token
$token =$user->generateToken($userInfo['user_id']);

//Set cookie
setcookie('user_id', $token, time()+(60*60), '/');


?>