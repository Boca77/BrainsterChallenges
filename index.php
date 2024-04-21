<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .gray {
            background-color: #ECECEC;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Vehicle registration</span>
            <a href="./loginForm.php" class="link-info text-decoration-none">Login</a>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-6 gray mt-5 gray rounded p-5">
                <h1>Vehicle Registration</h1>
                <form action="./searchRegNumber.php" method="POST">
                    <div class="form-group">
                        <label for="input" class="mb-3">Enter your registration number to check its validity</label>
                        <input required type="text" class="form-control" id="input" name="reg_num" placeholder="Enter registration number">
                    </div>
                    <button type="submit" class="btn mt-3 btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    $carInfo = $_SESSION['carInfo'] ?? '';
    $error = $_GET['error'] ?? '';
    if (!empty($carInfo)) {
        echo "<div class='container px-5 my-5'>
        <table class='table border table-bordered'>
            <thead>
                <tr>
                    <th scope='col'>Vehicle Model</th>
                    <th scope='col'>Vehicle Type</th>
                    <th scope='col'>Vehicle Chassis Number</th>
                    <th scope='col'>Vehicle Production Year</th>
                    <th scope='col'>Registration Number</th>
                    <th scope='col'>Fuel Type</th>
                    <th scope='col'>Registration To</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                        <td>{$carInfo['vehicle_model']}</td>
                        <td>{$carInfo['vehicle_type']}</td>
                        <td>{$carInfo['chassis_number']}</td>
                        <td>{$carInfo['production_year']}</td>
                        <td>{$carInfo['reg_number']}</td>
                        <td>{$carInfo['fuel_type']}</td>
                        <td>{$carInfo['reg_to']}</td>                  
                    </tr>
         
            </tbody>
        </table>
    </div>";
    }
    if ($error) {
        echo "<div class='container'>
        <div class='row justify-content-center my-5 '>
            <div class='col-6'><div class='alert alert-danger' role='alert'>
                No such record in database
            </div>
        </div> 
    </div>";
    }

    session_destroy();
    ?>
</body>

</html>