<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:login.php?methodError=Please%20re-submit%20the%20form");
}

$rawData = explode(PHP_EOL, file_get_contents('users.txt'));
$username = $_POST['username'];
$password = $_POST['password'];

foreach ($rawData as $rawData) {
    $data = explode('=', $rawData);
    $user = explode(", ", $data[0]);
    if ($user[1] === $username && password_verify($password, $data[1])) {
        return header("location: welcomePage.php?user=" . $username);
    }
}

return header("location: login.php?userError=Wrong%20username%2Fpassword%20combination");
