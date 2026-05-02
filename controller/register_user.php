<?php
session_start();
include "../database/env.php";

$name = trim($_REQUEST['name']);
$email = trim($_REQUEST['email']);
$password = $_REQUEST['password'];
$terms = $_REQUEST['terms'] ?? false;

$errors = [];

/* ==========================
   NAME VALIDATION
========================== */
if (empty($name)) {
    $errors['name_error'] = "Name is required.";
} elseif (strlen($name) < 3) {
    $errors['name_error'] = "Name must be at least 3 characters.";
} elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
    $errors['name_error'] = "Only letters allowed in name.";
}

/* ==========================
   EMAIL VALIDATION
========================== */
if (empty($email)) {
    $errors['email_error'] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email_error'] = "Invalid email format.";
} else {
    $query = "SELECT * FROM users WHERE email = '$email'";
    $user = mysqli_query($db, $query);

    if (mysqli_num_rows($user) > 0) {
        $errors['email_error'] = "Email already exists.";
    }
}

/* ==========================
   PASSWORD VALIDATION
========================== */
if (empty($password)) {
    $errors['password_error'] = "Password is required.";
} elseif (strlen($password) < 8) {
    $errors['password_error'] = "Password must be at least 8 characters.";
} elseif (!preg_match('/[A-Z]/', $password)) {
    $errors['password_error'] = "Password must contain 1 uppercase letter.";
} elseif (!preg_match('/[a-z]/', $password)) {
    $errors['password_error'] = "Password must contain 1 lowercase letter.";
} elseif (!preg_match('/[0-9]/', $password)) {
    $errors['password_error'] = "Password must contain 1 number.";
} elseif (!preg_match('/[\W]/', $password)) {
    $errors['password_error'] = "Password must contain 1 special character.";
}

/* ==========================
   TERMS VALIDATION
========================== */
if (!$terms) {
    $errors['terms_error'] = "Please accept terms and conditions.";
}

/* ==========================
   ERROR CHECK
========================== */
if (count($errors) > 0) {

    $_SESSION['form_errors'] = $errors;
    header("Location: ../register.php");
    exit();

} else {

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users(name, email, password)
              VALUES('$name','$email','$hashedPassword')";

   $res = mysqli_query($db, $query);

    header("Location: ../login.php");
    exit();
}
?>