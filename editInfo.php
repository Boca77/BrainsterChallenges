<?php
require_once('./classes/EditRow.php');

use EditRow\EditRow;

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return header('Location: vehicleRegistration.php?error=' . urlencode('Something went wrong try again'));
}

$edit = new EditRow($_POST['id']);
$edit->edit($_POST);

return header('Location: vehicleRegistration.php');
