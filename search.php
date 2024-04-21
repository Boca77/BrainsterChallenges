<?php
session_start();

use Search\Search;

require_once('./classes/Search.php');

$search = new Search($_POST['search']);
$search->search();
$_SESSION['search_data'] = $search->searchResult;

return header('Location: vehicleRegistration.php?search=true');
