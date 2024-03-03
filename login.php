<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://images.unsplash.com/uploads/141103282695035fa1380/95cdfeef?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }

        .row {
            background-color: rgb(245, 245, 245, 0.8);
        }
    </style>
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
        <div class="row border w-75 h-50 p-5 rounded">
            <h3 class="mb-5">Login form</h3>
            <?php
            if (!empty($_GET['methodError'])) {
                $methodError = $_GET['methodError'] ?? '';
                echo "<p class = 'alert alert-danger'>$methodError</p>";
            }
            ?>
            <form action="loginUser.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Sign-up</button>
                <?php

                if (!empty($_GET['userError'])) {
                    $loginError = $_GET['userError'] ?? '';
                    echo "<p class = 'mt-3 alert alert-danger'>$loginError</p>";
                }
                ?>
            </form>
        </div>
    </div>
</body>

</html>