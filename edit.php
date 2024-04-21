<?php
session_start();
require_once('./classes/VehicleInfo.php');
require_once('./classes/GetRow.php');

use RowData\RowData;
use VehicleInfo\VehicleInfo;

$vehicleInfo = new VehicleInfo();
$registrationData = new RowData($_GET['id']);
$registrationData->getRowData();
$row = $registrationData->rowData;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form action="./editInfo.php" method="POST">
        <div class="container mt-5">
            <div class="row my-3">
                <div class="col-6">
                    <div class="form-group ">
                        <label for="vehicle_model">Vehicle Model</label>
                        <select required class="form-select f-basis" name="vehicle_model" id="vehicle_model">
                            <option value="<?= $row['vehicle_model'] ?>" selectedhidden><?= $row['vehicle_model'] ?></option>
                            <?php
                            foreach ($vehicleInfo->vehicleModels as $model) {
                                echo "<option value='{$model['vehicle_model']}'>{$model['vehicle_model']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="vehicle_type">Vehicle Type</label>
                        <select required class="form-select" name="vehicle_type" id="vehicle_type">
                            <option value="<?= $row['vehicle_type'] ?>" selectedhidden><?= $row['vehicle_type'] ?></option>
                            <?php
                            foreach ($vehicleInfo->vehicleTypes as $type) {
                                echo "<option value='{$type['vehicle_type']}'>{$type['vehicle_type']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-6">
                    <div class="form-group">
                        <label for="chassis">Vehicle Chassis Number</label>
                        <input required type="text" class="form-control" name="chassis_number" id="chassis" placeholder="Enter Chassis Number" value="<?= $row['chassis_number'] ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="prod_year">Vehicle Production Year</label>
                        <input required type="text" class="form-control" id="production_year" name="prod_year" placeholder="Enter Production Year" value="<?= $row['production_year'] ?>">
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-6">
                    <div class="form-group">
                        <label for="reg_num">Vehicle Registration Number</label>
                        <input required type="text" class="form-control" id="reg_num" name="reg_num" placeholder="Enter Registration Number" value="<?= $row['reg_number'] ?>">
                        <small id="reg_num" class="form-text text-muted">Please use - instead of spaces :)</small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="fuel_type">Fuel Type</label>
                        <select required class="form-select" name="fuel_type" id="fuel_type">
                            <option value="<?= $row['fuel_type'] ?>" selectedhidden><?= $row['fuel_type'] ?></option>
                            <?php
                            foreach ($vehicleInfo->fuelTypes as $fuel) {
                                echo "<option value='{$fuel['fuel_type']}'>{$fuel['fuel_type']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-6">
                    <div class="form-group">
                        <label for="reg_to">Registration to</label>
                        <input required type="date" class="form-control" id="reg_to" name="reg_to" value="<?= $row['reg_to'] ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label></label>
                        <input required type="submit" class="form-control bg-primary text-white">
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <?php
            $errorMsg = $_GET['error'] ?? '';
            if (!empty($errorMsg)) {
                echo "<div class='alert alert-danger' role='alert'>
                         {$errorMsg}</div>";
            }
            ?>
        </div>
    </form>
</body>

</html>