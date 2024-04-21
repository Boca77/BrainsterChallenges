<?php

namespace RowData;

use Connection\Connection;

require_once(__DIR__ . '/Connection.php');

class RowData
{
    const QUERY = 'SELECT * FROM `registrations` WHERE id = :id';
    public array $rowData;
    public string $row;

    public function __construct($row)
    {
        $this->row = $row;
    }
    public function getRowData()
    {
        $db = new Connection();
        $connection = $db->getConnection();

        $data = $connection->prepare(self::QUERY);
        $data->bindParam(':id', $this->row, \PDO::PARAM_STR);
        $data->execute();
        $this->rowData = $data->fetch(\PDO::FETCH_ASSOC);
    }
}
