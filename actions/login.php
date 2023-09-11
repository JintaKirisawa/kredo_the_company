<?php
include "../classes/User.php";

//Create an object of User class
$user = new User;

//call login method
$user->login($_POST);


?>