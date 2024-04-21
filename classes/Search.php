<?php

namespace Search;

use Connection\Connection;

require_once(__DIR__ . '/Connection.php');

class Search
{
    public string $search;
    public array $searchResult;


    public function __construct($search)
    {
        $this->search = $search;
    }

    public function search()
    {
        $db = new Connection();
        $connection = $db->getConnection();

        $searchQuery = $connection->prepare("SELECT * FROM `registrations`
        WHERE `vehicle_model` LIKE '%" . $this->search . "%'
        OR `chassis_number` LIKE '%" . $this->search . "%' 
        OR `reg_number` LIKE '%" . $this->search . "%'");
        $searchQuery->execute();
        $this->searchResult = $searchQuery->fetchAll(\PDO::FETCH_ASSOC);
    }
}
