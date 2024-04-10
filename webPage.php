<?php
require_once('./connection.php');

$database = new Connection();
$connection = $database->getConnection();

$id = $_GET['id'];
$getInfoQuery = $connection->prepare('SELECT * FROM web_builder WHERE id = :id');

$getInfoQuery->bindParam(':id', $id, PDO::PARAM_STR);
$getInfoQuery->execute();

$info = $getInfoQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <style>
        .cover {
            background-color: gray;
            background-image: url(<?= $info[0]['cover_img_url'] ?>);
            background-position: center;
            height: 65%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #about-us {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        p {
            margin-bottom: 0;
        }

        a {
            text-decoration: none;
        }

        nav {
            position: sticky !important;
            top: -15px;
            z-index: 2;
        }

        nav .container-fluid .nav .navbar-nav a:hover {
            color: black !important;
            font-weight: 500 !important;
            scale: 1.1 !important;
        }

        .title,
        .subtitle {
            color: white !important;
            text-shadow: 0px 1px 5px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Webster</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-body-tertiary" aria-current="page" href="#banner">Home</a>
                    <a class="nav-link text-body-tertiary" href="#about-us">About Us</a>
                    <a class="nav-link text-body-tertiary" href="#services/products">
                        <?php if ($info[0]['service_products'] == 'Service') {
                            echo 'Service';
                        } else if ($info[0]['service_products'] == 'Product') {
                            echo 'Product';
                        } ?></a>
                    <a class="nav-link text-body-tertiary" href="#contact">Contact</a>
                </div>
            </div>
        </div>
    </nav>
    <div id="banner" style="height: 100vh;">
        <div class="cover">
            <h1 class="title h2" style="margin-top: 50px;"><?= $info[0]['main_title'] ?></h1>
            <h2 class="subtitle h1" style="margin-top: 250px;"><?= $info[0]['subtitle'] ?> </h2>
        </div>
        <div id="about-us">
            <h2 style="margin-top: 30px;">About Us</h2>
            <p style="width: 500px; margin-top: 15px;"><?= $info[0]['user_info'] ?></p>
            <hr style="width: 550px;">
            <p>Tel: <?= $info[0]['tel'] ?></p>
            <p>Location: <?= $info[0]['location_'] ?></p>
        </div>
    </div>
    <div class="container">
        <div id='services/products' class=" d-flex flex-column align-items-center">
            <div class="box">
                <h2 style="margin-left: 25px;">
                    <?php if ($info[0]['service_products'] == 'Service') {
                        echo 'Service';
                    } else if ($info[0]['service_products'] == 'Product') {
                        echo 'Product';
                    } ?></h2>
                <div class="services-content d-flex justify-align-content-between align-items-start mb-5">
                    <div class="card mx-4 text-white" style="width: 23rem; background-color: #343A40">
                        <img class="card-img-top" style="height: 300px; object-fit: scale-down; " src=" <?= $info[0]['img_url_1'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"><?= $info[0]['description_1'] ?></p>
                        </div>
                    </div>
                    <div class="card mx-4 text-white" style="width: 23rem; background-color: #343A40">
                        <img class="card-img-top" style="height: 300px; object-fit: scale-down;" src="<?= $info[0]['img_url_2'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"><?= $info[0]['description_2'] ?></p>
                        </div>
                    </div>
                    <div class="card mx-4 text-white" style="width: 23rem; background-color: #343A40">
                        <img class="card-img-top" style="height: 300px; object-fit: scale-down;" src="<?= $info[0]['img_url_3'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"><?= $info[0]['description_3'] ?></p>
                        </div>
                    </div>
                </div>
                <hr>
            </div>

        </div>

        <div id='contact' class=" d-flex justify-content-between mb-3">
            <div class="content" style="padding-left: 25px; flex-basis: 45%;">
                <h2>Contact</h2>
                <p><?= $info[0]['company_description'] ?></p>
            </div>
            <div class="form" style="flex-basis: 45%; padding-right: 25px;">
                <form>
                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group mb-2">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" rows="10" placeholder="Enter message"></textarea>
                    </div>
                    <button type="submit" class="mt-3 btn btn-primary" style="display:block; margin-left: auto; margin-right: auto; width: 150px;">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="d-flex flex-column align-items-center bg-dark">
        <p class="mb-3 text-white">Copyright by Boris @ Brainster</p>
        <ul style="list-style-type: none;" class="d-flex p-0 mb-0">
            <li><a href="<?= $info[0]['linkedIn'] ?>" target="_blank" class="m-1 ml-0">LinkedIn</a></li>
            <li><a href="<?= $info[0]['facebook'] ?>" target="_blank" class="m-1">Facebook</a></li>
            <li><a href="<?= $info[0]['twitter'] ?>" target="_blank" class="m-1">Twitter</a></li>
            <li><a href="<?= $info[0]['google_plus'] ?>" target="_blank" class="m-1">Google+</a></li>
        </ul>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>