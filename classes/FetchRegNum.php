<?php

namespace FetchRegNumber;

use Connection\Connection;

require_once(__DIR__ . "/Connection.php");

class FetchRegNumber
{
    const QUERY = 'SELECT * FROM registrations WHERE reg_number = :reg_number';
    public array $carInfo;

    public function __construct($regNumber)
    {
        $db = new Connection();
        $connection = $db->getConnection();

        $carInfo = $connection->prepare(self::QUERY);
        $carInfo->bindParam(':reg_number', $regNumber, \PDO::PARAM_STR);
        $carInfo->execute();
        $this->carInfo = $carInfo->fetch(\PDO::FETCH_ASSOC);
    }
}
