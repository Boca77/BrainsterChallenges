<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return header("location:register.php?methodError=Please%20re-submit%20the%20form");
}

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$queryMessages = [];
$error = false;

include_once "validations.php";

if (emptyUsernameCheck($username)) {
    $queryMessages['emptyUsernameErrorMessage'] = "Username is required";
    $error = true;
} else {
    $queryMessages['username'] = $username;
}
if (emptyPasswordCheck($password)) {
    $queryMessages['emptyPasswordErrorMessage'] = "Password is required";
    $error = true;
}
if (empty($queryMessages['emptyPasswordErrorMessage'])) {
    if (validatePasswordCharacters($password)) {
        $queryMessages['errorInvalidPassword'] = " Password must have at least one number, one special sign and one uppercase letter";
        $error = true;
    }
}
if (emptyEmailCheck($email)) {
    $queryMessages['emptyEmailErrorMessage'] = "Email is required";
    $error = true;
} else {
    $queryMessages['email'] = $email;
}
$validEmail = explode('@', $email);
$validEmailCheck = $validEmail[0];
echo $validEmailCheck;
if (empty($queryMessages['emptyEmailErrorMessage'])) {
    if (strlen($validEmailCheck) < 5) {
        $queryMessages['errorEmailCharacters'] = " Email must have at least 5 characters before @";
        $error = true;
    }
}

$dataFromFile = explode(PHP_EOL, file_get_contents('users.txt'));
foreach ($dataFromFile as $dataFromFile) {
    $data = explode('=', $dataFromFile);
    $user = explode(', ', $data[0]);

    if (empty($queryMessages['emptyEmailErrorMessage'])) {
        if ($user[0] === $email) {
            $queryMessages['errorEmailExists'] = "Email is already registered";
            $error = true;
        }
    }

    if (empty($queryMessages['emptyUsernameErrorMessage'])) {
        if ($user[1] === $username) {
            $queryMessages['errorUsernameExists'] = "Username is already taken";
            $error = true;
        }
        if (validateUsernameCharacters($username)) {
            $queryMessages['errorInvalidUsername'] = "Username cannot contain empty spaces or special signs";
            $error = true;
        }
    }
}
if ($error) {
    $queryString = http_build_query($queryMessages);
    return header("location:register.php?" . $queryString);
}

$data = "$email, $username=" . password_hash($password, PASSWORD_DEFAULT);
file_put_contents("users.txt", $data . PHP_EOL, FILE_APPEND);
header("location:welcomePage.php?user=" . $username);
