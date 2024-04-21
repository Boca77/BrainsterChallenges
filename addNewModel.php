<?php

use AddModel\AddModel;
use VehicleInfo\VehicleInfo;

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return header('Location: newModel.php?error=' . urlencode('Something went wrong try again'));
}

require_once('./classes/AddModel.php');
require_once('./classes/VehicleInfo.php');

$newModel = new AddModel();
$vehicleInfo = new VehicleInfo();
foreach ($vehicleInfo->vehicleModels as $model) {

    if ($model['vehicle_model'] == $_POST['new_model']) {
        return header("Location: newModel.php?error=" . urlencode('Model already exists'));
    }
}

$newModel->addModel($_POST['new_model']);

return header("Location: newModel.php?message=" . urlencode('Successfully added a new model'));
