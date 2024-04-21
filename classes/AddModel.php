<?php

namespace AddModel;

use Connection\Connection;

require_once(__DIR__ . '/Connection.php');

class AddModel
{
    const QUERY = 'INSERT INTO `vehicle-models` (vehicle_model) VALUE (:vehicle_model)';

    public function addModel($newModel)
    {
        $db = new Connection();
        $connection = $db->getConnection();

        $addModel = $connection->prepare(self::QUERY);
        $addModel->bindParam(':vehicle_model', $newModel, \PDO::PARAM_STR);
        $addModel->execute();
    }
}
