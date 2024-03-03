<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
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
            height: 55%;
        }

        label::after {
            content: '*';
            color: red;
        }

        p {
            margin-top: 0;
        }

        .error {
            color: orange;
        }
    </style>
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
        <div class="row border w-75 p-5 rounded">
            <h3 class="mb-3">Sign-up form</h3>
            <?php
            if (!empty($_GET['methodError'])) {
                $methodError = $_GET['methodError'] ?? '';
                echo "<p class = 'alert alert-danger'>$methodError</p>";
            } else
            ?>
            <form action="registerUser.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= $_GET['email'] ?? ''; ?>">
                    <?php
                    $emptyEmailError = $_GET['emptyEmailErrorMessage'] ?? '';
                    echo "<span class = 'text-danger'>$emptyEmailError</span>";
                    $existsEmailError = $_GET['errorEmailExists'] ?? '';
                    echo "<span class = 'error'>$existsEmailError</span>";
                    $errorEmailCharacters = $_GET['errorEmailCharacters'] ?? '';
                    echo "<span class = 'error'>$errorEmailCharacters</span>";
                    ?>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?= $_GET['username'] ?? ''; ?>">
                    <?php
                    $emptyUsernameError = $_GET['emptyUsernameErrorMessage'] ?? '';
                    echo "<span class = 'text-danger'>$emptyUsernameError</span>";
                    $existsUsernameError = $_GET['errorUsernameExists'] ?? '';
                    echo "<span class = 'error'>$existsUsernameError</span>";
                    $invalidUsernameError = $_GET['errorInvalidUsername'] ?? '';
                    echo "<span class = 'error'>$invalidUsernameError</span>";
                    ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <?php
                    $emptyPasswordError = $_GET['emptyPasswordErrorMessage'] ?? '';
                    echo "<span class = 'text-danger'>$emptyPasswordError</span>";
                    $errorInvalidPassword = $_GET['errorInvalidPassword'] ?? '';
                    echo "<span class = 'error'>$errorInvalidPassword</span>";
                    ?>
                </div>
                <button type="submit" class="btn btn-primary">Sign-up</button>
            </form>
        </div>
    </div>
</body>

</html>