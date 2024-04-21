<?php
session_start();

use Search\Search;

require_once('./classes/Search.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return header('Location: vehicleRegistration.php?error=' . urlencode('Something went wrong try again'));
}

$search = new Search($_POST['search']);
$search->search();
$_SESSION['search_data'] = $search->searchResult;

return header('Location: vehicleRegistration.php?search=true');
