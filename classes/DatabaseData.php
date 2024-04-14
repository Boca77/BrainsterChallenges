<?php

namespace DatabaseData;

class DatabaseData
{
    private array $userInfo;
    public string $cover_img_url;
    public string $main_title;
    public string $subtitle;
    public string $user_info;
    public string $tel;
    public string $location_;
    public string $service_products;
    public string $img_url_1;
    public string $description_1;
    public string $img_url_2;
    public string $description_2;
    public string $img_url_3;
    public string $description_3;
    public string $company_description;
    public string $linkedIn;
    public string $facebook;
    public string $twitter;
    public string $google_plus;

    public function setInfo(array $userInfo)
    {
        foreach ($userInfo as $key => $user) {
            $this->userInfo[$key] =  $user;
        }

        $this->cover_img_url = $this->userInfo['cover_img_url'];
        $this->main_title = $this->userInfo['main_title'];
        $this->subtitle = $this->userInfo['subtitle'];
        $this->user_info = $this->userInfo['user_info'];
        $this->tel = $this->userInfo['tel'];
        $this->location_ = $this->userInfo['location_'];
        $this->service_products = $this->userInfo['service_products'];
        $this->img_url_1 = $this->userInfo['img_url_1'];
        $this->description_1 = $this->userInfo['description_1'];
        $this->img_url_2 = $this->userInfo['img_url_2'];
        $this->description_2 = $this->userInfo['description_2'];
        $this->img_url_3 = $this->userInfo['img_url_3'];
        $this->description_3 = $this->userInfo['description_3'];
        $this->company_description = $this->userInfo['company_description'];
        $this->linkedIn = $this->userInfo['linkedIn'];
        $this->facebook = $this->userInfo['facebook'];
        $this->twitter = $this->userInfo['twitter'];
        $this->google_plus = $this->userInfo['google_plus'];
    }
}
