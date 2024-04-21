<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $_SESSION['error'] = 'Something went wrong try again';
    return header('Location: loginForm.php');
}

use AdminValidation\AdminValidation;

require_once('./classes/AdminValidation.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$validation = new AdminValidation();
$isValid = $validation->validate($username, $email, $password);

if (!$isValid) {
    $_SESSION['error'] = 'Invalid credentials try again';
    return header('Location: loginForm.php');
}
return header('Location: vehicleRegistration.php');
