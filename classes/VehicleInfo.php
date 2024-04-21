<?php

namespace VehicleInfo;

use Connection\Connection;

require_once(__DIR__ . '/Connection.php');

class VehicleInfo
{
    const QUERY = 'SELECT * FROM';
    public array $vehicleTypes;
    public array $vehicleModels;
    public array $fuelTypes;

    public function __construct()
    {
        $db = new Connection();
        $connection = $db->getConnection();

        $data = $connection->prepare(self::QUERY . ' `vehicle-models`');
        $data->execute();
        $this->vehicleModels = $data->fetchAll(\PDO::FETCH_ASSOC);

        $data = $connection->prepare(self::QUERY . ' `vehicle-types`');
        $data->execute();
        $this->vehicleTypes = $data->fetchAll(\PDO::FETCH_ASSOC);

        $data = $connection->prepare(self::QUERY . '`fuel-types`');
        $data->execute();
        $this->fuelTypes = $data->fetchAll(\PDO::FETCH_ASSOC);
    }
}
