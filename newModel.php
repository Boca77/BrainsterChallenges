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
        <div class="row justify-content-center my-5">
            <div class="col-6">
                <h1>Add new Vehicle Model</h1>
                <form action="./addNewModel.php" method="POST">
                    <div class="form-control">
                        <label for="new_model">Add a new model</label>
                        <input required type="text" class="form-control" name="new_model" id="new_model" placeholder="Enter Model">
                        <button class="btn btn-primary mt-2">Add</button>
                    </div>
                </form>
                <?php
                $msg = $_GET['message'] ?? '';
                if (!empty($msg)) {
                    echo "<div class='alert alert-success mt-3' role='alert'>
                         {$msg}</div>";
                }
                $errorMsg = $_GET['error'] ?? '';
                if (!empty($errorMsg)) {
                    echo "<div class='alert alert-danger mt-3' role='alert'>
                         {$errorMsg}</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>