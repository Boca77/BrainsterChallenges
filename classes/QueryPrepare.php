<?php

namespace QueryPrepare;

require_once('./classes/Connection.php');

use Connection\Connection as Connection;

class QueryPrepare
{
    private string $query;

    public function setQuery(string $query)
    {
        $this->query = $query;
    }

    public function startConnection()
    {
        $database = new Connection();
        $connection = $database->getConnection();
        return $connection;
    }

    public function prepareQueryFetchAll(string $param1 = '', string $param2 = '')
    {
        $getQuery = $this->startConnection()->prepare($this->query);
        if (!empty($param1) && !empty($param2))
            $getQuery->bindParam($param1, $param2, \PDO::PARAM_STR);
        $getQuery->execute();
        return $getQuery->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function prepareQueryFetch(string $param1 = '', string $param2 = '')
    {
        $getQuery = $this->startConnection()->prepare($this->query);
        if (!empty($param1) && !empty($param2))
            $getQuery->bindParam($param1, $param2, \PDO::PARAM_STR);
        $getQuery->execute();
        return $getQuery->fetch(\PDO::FETCH_ASSOC);
    }
}
