<?php
require_once('./classes/FormData.php');
require_once("./classes/QueryPrepare.php");


use FormData\FormData as FormData;
use QueryPrepare\QueryPrepare as QueryPrepare;

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    return header('location: form.php?method_error=Please%20resubmit%20the%20form');
}

$query = new FormData();
$query->setPostData($_POST);
$query->generateQuery();

$getIdQuery = new QueryPrepare();
$getIdQuery->setQuery('SELECT id FROM web_builder ORDER BY id DESC LIMIT 1');
$id = $getIdQuery->prepareQueryFetch();


header("location: webPage.php?id={$id['id']}");
