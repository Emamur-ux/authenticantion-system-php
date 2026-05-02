<?php
session_start();

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
include_once "../database/env.php";
$errors = [];

// validations rules


$query = "SELECT * FROM users WHERE email = '$email'";
$res = mysqli_query($db, $query);

if (mysqli_num_rows($res) == 0) {

    $errors['email_error'] = "Email or password incorrect!";
    $_SESSION['form_errors'] = $errors;
    header("Location: ../login.php");
    exit();

} else {

    $user = mysqli_fetch_assoc($res);
    $verifiedPassword = password_verify($password, $user['password']);

    if(!$verifiedPassword){
      $errors['email_error'] = "Email or password incorrect!";
      $_SESSION['form_errors'] = $errors;
      header("Location: ../login.php");
    }else{
        $_SESSION['auth'] = $user;
          header("Location: ../admin/index.php");


    }
}