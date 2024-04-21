<?php
require_once('./classes/EditRow.php');

use EditRow\EditRow;

$edit = new EditRow($_POST['id']);
$edit->edit($_POST);

return header('Location: vehicleRegistration.php');
