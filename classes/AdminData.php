<?php

namespace AdminData;

require_once(__DIR__ . '/Connection.php');

use Connection\Connection;

class AdminData
{
    const QUERY = 'SELECT * FROM `admin`';
    public array $adminInfo;

    public function getData()
    {
        $db = new Connection();
        $connection = $db->getConnection();

        $data = $connection->prepare(self::QUERY);
        $data->execute();
        return $this->adminInfo = $data->fetchAll(\PDO::FETCH_ASSOC);
    }
}
