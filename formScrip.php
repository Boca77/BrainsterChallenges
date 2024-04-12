<?php
require_once('./classes/FormData.php');
require_once("./classes/QueryPrepare.php");

use FormData\FormData as FormData;
use QueryPrepare\QueryPrepare as QueryPrepare;


if ($_SERVER["REQUEST_METHOD"] != "POST") {
    return header('location: form.php?method_error=Pleas resubmit the form');
}

$query = new FormData();
$query->setPostData($_POST);
$query->generateQuery();

$getInfoQuery = new QueryPrepare();
$getInfoQuery->setQuery('SELECT * FROM web_builder');
$info = $getInfoQuery->prepareQueryFetchAll();

$id = count($info);
header("location: webPage.php?id=$id");
