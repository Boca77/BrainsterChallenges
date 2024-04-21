<?php
require_once('./classes/ExtendReg.php');

$extend = new ExtendReg($_GET['id']);
$extend->extend();

return header('Location: vehicleRegistration.php');
