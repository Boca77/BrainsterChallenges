<?php
session_start();

use FetchRegNumber\FetchRegNumber;
use RegistrationData\RegistrationData;

require_once('./classes/FetchRegNum.php');
require_once('./classes/RegistrationData.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return header('Location: index.php.php?error=' . urlencode('Something went wrong try again'));
}

$reg_num = $_POST['reg_num'];
$dataDatabase = new RegistrationData();

foreach ($dataDatabase->regData as $registration) {
    if (($reg_num == $registration['reg_number'])) {
        $getCarInfo = new FetchRegNumber($_POST['reg_num']);
        $_SESSION['carInfo'] = $getCarInfo->carInfo;
        return header("Location: index.php");
    }
}
return header("Location: index.php?error=true");
