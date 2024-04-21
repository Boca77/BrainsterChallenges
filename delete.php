<?php

use DeleteRow\DeleteRow;

require_once('./classes/DeleteRow.php');

$del = new DeleteRow($_GET['id']);
$del->del();

return header('Location: vehicleRegistration.php');
