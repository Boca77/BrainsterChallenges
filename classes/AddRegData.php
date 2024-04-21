<?php

namespace AddRegData;

use Connection\Connection;

require_once(__DIR__ . '/Connection.php');

class AddRegData
{
    public array $regFormData;

    public function __construct($regFormData)
    {
        $this->regFormData = $regFormData;
    }

    public function addToDatabase()
    {
        $db = new Connection();
        $connection = $db->getConnection();

        $data = $connection->prepare('INSERT INTO `registrations`
        (vehicle_model, vehicle_type, chassis_number, production_year, reg_number, fuel_type, reg_to)
        VALUES (:vehicle_model, :vehicle_type, :chassis_number, :prod_year, :reg_num, :fuel_type, :reg_to)');
        $data->execute($this->regFormData);
    }
}
