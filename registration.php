<?php

use AddRegData\AddRegData;
use RegistrationData\RegistrationData;

require_once('./classes/AddRegData.php');
require_once('./classes/RegistrationData.php');
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return header('Location: vehicleRegistration.php?error=' . urlencode('Something went wrong try again'));
}

$data = new AddRegData($_POST);
$dataDatabase = new RegistrationData();

foreach ($dataDatabase->regData as $registration) {
    if (($data->regFormData['reg_num'] == $registration['reg_num']) || ($data->regFormData['chassis_number'] == $registration['chassis_number'])) {
        return header("Location: vehicleRegistration.php?error=" . urlencode('Chassis number or Registration number already exists'));
    }
}

$data->addToDatabase();

return header("Location: vehicleRegistration.php");
