<?php
session_start();
require_once('./classes/VehicleInfo.php');
require_once('./classes/RegistrationData.php');

use RegistrationData\RegistrationData;
use VehicleInfo\VehicleInfo;

$vehicleInfo = new VehicleInfo();
$registrationData = new RegistrationData;
$index = 0;
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
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Vehicle registration</span>
            <a href="./index.php" class="link-info text-decoration-none">Log Out</a>
        </div>
    </nav>
    <form action="./registration.php" method="POST">
        <div class="container mt-5">
            <div class="row my-3">
                <div class="col-6">
                    <div class="form-group ">
                        <label for="vehicle_model">Vehicle Model</label>
                        <div class=" container ">
                            <div class="row d-flex">
                                <div class="col-9 p-0">
                                    <select required class="form-select f-basis" name="vehicle_model" id="vehicle_model">
                                        <option value="" disabled selected hidden>Select vehicle model</option>
                                        <?php
                                        foreach ($vehicleInfo->vehicleModels as $model) {
                                            echo "<option value='{$model['vehicle_model']}'>{$model['vehicle_model']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-3 pl-1">
                                    <a href="./newModel.php" class="btn btn-primary">Add a model</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="vehicle_type">Vehicle Type</label>
                        <select required class="form-select" name="vehicle_type" id="vehicle_type">
                            <option value="" disabled selected hidden>Select vehicle type</option>
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
                        <input required type="text" class="form-control" name="chassis_number" id="chassis" placeholder="Enter Chassis Number">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="prod_year">Vehicle Production Year</label>
                        <input required type="text" class="form-control" id="production_year" name="prod_year" placeholder="Enter Production Year">
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-6">
                    <div class="form-group">
                        <label for="reg_num">Vehicle Registration Number</label>
                        <input required type="text" class="form-control" id="reg_num" name="reg_num" placeholder="Enter Registration Number">
                        <small id="reg_num" class="form-text text-muted">Please use - instead of spaces :)</small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="fuel_type">Fuel Type</label>
                        <select required class="form-select" name="fuel_type" id="fuel_type">
                            <option value="" disabled selected hidden>Select fuel type</option>
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
                        <input required type="date" class="form-control" id="reg_to" name="reg_to">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label></label>
                        <input required type="submit" class="form-control bg-primary text-white">
                    </div>
                </div>
            </div>
            <?php
            $errorMsg = $_GET['error'] ?? '';
            if (!empty($errorMsg)) {
                echo "<div class='alert alert-danger' role='alert'>
                         {$errorMsg}</div>";
            }
            ?>
        </div>
    </form>

    <div class="box px-5 my-5">
        <div class="bg-dark p-2">
            <form action="./search.php" method="POST">
                <div class="row justify-content-end">
                    <div class="col-2 d-flex ">
                        <input type="text" class="form-control mx-2" name="search" placeholder="search">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <table class="table border table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vehicle Model</th>
                    <th scope="col">Vehicle Type</th>
                    <th scope="col">Vehicle Chassis Number</th>
                    <th scope="col">Vehicle Production Year</th>
                    <th scope="col">Registration Number</th>
                    <th scope="col">Fuel Type</th>
                    <th scope="col">Registration To</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $search = $_GET['search'] ?? '';
                $searchData = $_SESSION['search_data'] ?? '';
                $today = new DateTime();
                $color = '';
                $extendBtn = '';

                if ($search && !empty($searchData)) {
                    foreach ($searchData as $search) {
                        $id = $search['id'];
                        $registrationToDate = new DateTime($search['reg_to']);
                        $interval = $today->diff($registrationToDate);
                        $daysUntilExpiration = $interval->format('%r%a');
                        if ($daysUntilExpiration < 0) {
                            $color = 'red';
                            $extendBtn = "<a href = 'extend.php?id=" . $id . "' class='mx-1 btn btn-success'>Extend </a>";
                        } elseif ($daysUntilExpiration <= 30) {
                            $color = 'orange';
                            $extendBtn = "<a href = 'extend.php?id=" . $id . "' class='mx-1 btn btn-success'>Extend </a>";
                        } else {
                            $color = 'none';
                            $extendBtn = '';
                        }
                        $index++;
                        echo "<tr>
                    <th scope='row'>{$index}</th>
                    <td style = 'color: $color'>{$search['vehicle_model']}</td>
                    <td style = 'color: $color'>{$search['vehicle_type']}</td>
                    <td style = 'color: $color'>{$search['chassis_number']}</td>
                    <td style = 'color: $color'>{$search['production_year']}</td>
                    <td style = 'color: $color'>{$search['reg_number']}</td>
                    <td style = 'color: $color'>{$search['fuel_type']}</td>
                    <td style = 'color: $color'>{$search['reg_to']}</td>                  
                    <td > <div class='d-flex'> <a href = 'delete.php?id='" . $search['id'] . " class='mx-1 btn btn-danger'>Delete</a>
                    <a href = '' class='mx-1 btn btn-warning'>Edit</a>" . $extendBtn . "               
                    </div></td>           
                    </tr>";
                        session_abort();
                    }
                } else {
                    foreach ($registrationData as $temp) {
                        foreach ($temp as $registration) {
                            $registrationToDate = new DateTime($registration['reg_to']);
                            $interval = $today->diff($registrationToDate);
                            $daysUntilExpiration = $interval->format('%r%a');
                            $id = $registration['id'];

                            if ($daysUntilExpiration < 0) {
                                $color = 'red';
                                $extendBtn = "<a href = 'extend.php?id=" . $id . "'class='mx-1 btn btn-success'>Extend </a>";
                            } elseif ($daysUntilExpiration <= 30) {
                                $color = 'orange';
                                $extendBtn = "<a href = 'extend.php?id=" . $id . "'class='mx-1 btn btn-success'>Extend </a>";
                            } else {
                                $color = 'none';
                                $extendBtn = '';
                            }
                            $index++;
                            echo "<tr>
                    <th scope='row'>{$index}</th>
                    <td style = 'color: $color'>{$registration['vehicle_model']}</td>
                    <td style = 'color: $color'>{$registration['vehicle_type']}</td>
                    <td style = 'color: $color'>{$registration['chassis_number']}</td>
                    <td style = 'color: $color'>{$registration['production_year']}</td>
                    <td style = 'color: $color'>{$registration['reg_number']}</td>
                    <td style = 'color: $color'>{$registration['fuel_type']}</td>
                    <td style = 'color: $color'>{$registration['reg_to']}</td>                  
                    <td > <div class='d-flex'> <a href = 'delete.php?id=" . $id . "' class='mx-1 btn btn-danger'>Delete</a>
                    <a href = 'edit.php?id=" . $id . "' class='mx-1 btn btn-warning'>Edit</a>" . $extendBtn . "               
                    </div></td>                  
                    </tr>";
                        }
                    }
                }

                ?>
            </tbody>


        </table>
    </div>
</body>

</html>