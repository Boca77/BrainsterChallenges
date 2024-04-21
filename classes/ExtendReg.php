<?php

use Connection\Connection;

require_once(__DIR__ . '/Connection.php');

class ExtendReg
{
    const QUERY = "UPDATE `registrations` SET reg_to = :newDate WHERE id = :id";

    public string $row;

    public function __construct($row)
    {
        $this->row = $row;
    }

    public function extend()
    {

        $db = new Connection();
        $connection = $db->getConnection();

        $newDate = date('Y-m-d', strtotime('+1 year'));

        $extendQuery = $connection->prepare(self::QUERY);

        $extendQuery->bindParam(':newDate', $newDate, \PDO::PARAM_STR);
        $extendQuery->bindParam(':id', $this->row, \PDO::PARAM_INT);

        $extendQuery->execute();
    }
}
