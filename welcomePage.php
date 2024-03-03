<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Challenge 13</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <style>
    body {
      background-image: url("https://images.unsplash.com/uploads/141103282695035fa1380/95cdfeef?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      height: 100vh;
      padding-top: 150px;
    }

    .border {
      background-color: rgb(245, 245, 245, 0.8);
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <?php
  $currentUser = $_GET["user"];
  ?>
  <div class="rounded border w-50 p-4">
    <h1 class="text-center">Welcome <?= $currentUser ?></h1>
    <a href="./index.html">Back to login/register page</a>
  </div>
</body>

</html>