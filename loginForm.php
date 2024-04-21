<?php
session_start();
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 mt-5">
                <p class="h1 text-primary">Login</p>
                <form action="./login.php" method="POST">
                    <div class="form-group my-3">
                        <label for="username">Username</label>
                        <input required type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                    </div>
                    <div class="form-group my-3">
                        <label for="email">Email address</label>
                        <input required type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input required type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Login</button>
                    <?php
                    $errorMsg = $_SESSION['error'] ?? '';
                    if (!empty($errorMsg)) {
                        echo "<div class='alert alert-danger' role='alert'>
                         {$errorMsg}</div>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>