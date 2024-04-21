<?php

namespace DeleteRow;

use Connection\Connection;

require_once(__DIR__ . '/Connection.php');

class DeleteRow
{
    const QUERY = 'DELETE FROM registrations WHERE id = :id';
    public string $row;

    public function __construct($row)
    {
        $this->row = $row;
    }

    public function del()
    {
        $db = new Connection();
        $connection = $db->getConnection();
        $delQuery = $connection->prepare(self::QUERY);
        $delQuery->bindParam(':id', $this->row, \PDO::PARAM_STR);
        $delQuery->execute();
    }
}
