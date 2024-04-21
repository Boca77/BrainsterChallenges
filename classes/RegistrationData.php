<?php

namespace RegistrationData;

use Connection\Connection;

require_once(__DIR__ . '/Connection.php');

class RegistrationData
{
    const QUERY = 'SELECT * FROM `registrations`';
    public array $regData;

    public function __construct()
    {
        $db = new Connection();
        $connection = $db->getConnection();

        $data = $connection->prepare(self::QUERY);
        $data->execute();
        $this->regData = $data->fetchAll(\PDO::FETCH_ASSOC);
    }
}
