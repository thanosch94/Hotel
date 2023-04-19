
<?php 
//Unset cookie by setting expiration time in the past
setcookie("user_id", "", -time()+(60*60), "/");

//Once logout head to Login page
header('Location: /hotel/public/login.php');
?>