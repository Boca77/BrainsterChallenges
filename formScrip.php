<?php
require_once('./connection.php');


if ($_SERVER["REQUEST_METHOD"] != "POST") {
    return header('location: form.php?method_error=Pleas resubmit the form');
}

$database = new Connection();
$connection = $database->getConnection();
// var_dump($connection);

$pageInfo = [
    'main_title' => $_POST['main_title'],
    'cover_img_url' => $_POST['cover_img_url'],
    'subtitle' => $_POST['subtitle'],
    'user_info' => $_POST['user_info'],
    'tel' => $_POST['tel'],
    'location_' => $_POST['location_'],
    'service_products' => $_POST['service_products'],
    'img_url_1' => $_POST['img_url1'],
    'description_1' => $_POST['description_1'],
    'img_url_2' => $_POST['img_url2'],
    'description_2' => $_POST['description_2'],
    'img_url_3' => $_POST['img_url3'],
    'description_3' => $_POST['description_3'],
    'company_description' => $_POST['company_description'],
    'linkedin' => $_POST['linkedin'],
    'facebook' => $_POST['facebook'],
    'twitter' => $_POST['twitter'],
    'google_plus' => $_POST['google_plus']
];

// var_dump($pageInfo);
// die;

$query = "INSERT INTO `web_builder` 
    (main_title, cover_img_url, subtitle, user_info, tel, location_, service_products,
     img_url_1, description_1, img_url_2, description_2, img_url_3, description_3, company_description,
     linkedIn, facebook, twitter, google_plus)
    VALUES 
    (:main_title,:cover_img_url, :subtitle, :user_info, :tel, :location_, :service_products, 
    :img_url_1, :description_1, :img_url_2, :description_2, :img_url_3, :description_3, :company_description, 
    :linkedin, :facebook, :twitter, :google_plus)";

$insertQuery = $connection->prepare($query);
$insertQuery->execute($pageInfo);
$id = 1;
$id++;
header("location: webPage.php?id=$id");
