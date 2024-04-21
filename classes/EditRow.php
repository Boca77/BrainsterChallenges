<?php

namespace EditRow;

use Connection\Connection;

require_once(__DIR__ . '/Connection.php');

class EditRow
{
    const QUERY = "UPDATE `registrations`
    SET vehicle_model = :vehicle_model,
    vehicle_type = :vehicle_type,
    chassis_number = :chassis_number,
    production_year = :prod_year,
    reg_number = :reg_num,
    fuel_type = :fuel_type,
    reg_to = :reg_to
    WHERE id = :id";
    public string $row;


    public function __construct($row)
    {
        $this->row = $row;
    }

    public function edit($newData)
    {
        $db = new Connection();
        $connection = $db->getConnection();

        $extendQuery = $connection->prepare(self::QUERY);
        $extendQuery->bindParam(':id', $this->row, \PDO::PARAM_INT);
        $extendQuery->bindParam(':vehicle_model', $newData['vehicle_model'], \PDO::PARAM_STR);
        $extendQuery->bindParam(':vehicle_type', $newData['vehicle_type'], \PDO::PARAM_STR);
        $extendQuery->bindParam(':chassis_number', $newData['chassis_number'], \PDO::PARAM_STR);
        $extendQuery->bindParam(':prod_year', $newData['prod_year'], \PDO::PARAM_STR);
        $extendQuery->bindParam(':reg_num', $newData['reg_num'], \PDO::PARAM_STR);
        $extendQuery->bindParam(':fuel_type', $newData['fuel_type'], \PDO::PARAM_STR);
        $extendQuery->bindParam(':reg_to', $newData['reg_to'], \PDO::PARAM_STR);

        $extendQuery->execute();
    }
}
