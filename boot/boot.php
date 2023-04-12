<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
spl_autoload_register(function ($class) {
	$class = str_replace("\\", "/", $class);
    require_once sprintf(__DIR__.'/../app/%s.php', $class);
});

use Hotel\User;

$user= new User();

$userToken = $_COOKIE['user_id'];


if($userToken){
    //Verify user
    if($user->verifyToken($userToken)){
        $userInfo = $user-> getTokenPayload($userToken);
        User::setCurrentUserId($userInfo['user_id']);
    }
}