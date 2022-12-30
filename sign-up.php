<?php

if (! filter_var($_POST["email"],FILTER_VALIDATE_EMAIL) ){
    die("Valid Email is required");
}
if ( ! preg_match("/[a-z]/i",$_POST["password"])){
    die("Password must contain at least one letter ");
}
if ( ! preg_match("/[0-9]/",$_POST["password"])){
    die("Password must contain at least one number");
}
if ( $_POST["password"] !== $_POST["password_confirmation"]){
    die("Passwords must match");
}


print_r($_POST);
echo "changes";








