<?php

namespace FormData;

require_once('./classes/Connection.php');

use Connection\Connection as Connection;

class FormData
{
    private array $postData;

    public function setPostData(array $postData)
    {
        $this->postData = $postData;
    }

    public function getPostData()
    {
        return $this->postData;
    }

    private function startConnection()
    {
        $database = new Connection();
        $connection = $database->getConnection();
        return $connection;
    }

    public function generateQuery()
    {
        $query = "INSERT INTO `web_builder` 
    (main_title, cover_img_url, subtitle, user_info, tel, location_, service_products,
     img_url_1, description_1, img_url_2, description_2, img_url_3, description_3, company_description,
     linkedIn, facebook, twitter, google_plus)
    VALUES 
    (:main_title, :cover_img_url, :subtitle, :user_info, :tel, :location_, :service_products, 
    :img_url1, :description_1, :img_url2, :description_2, :img_url3, :description_3, :company_description, 
    :linkedin, :facebook, :twitter, :google_plus)";

        $insertQuery = $this->startConnection()->prepare($query);
        $insertQuery->execute($this->postData);
    }
}
