<?php

class Product
{
    protected string $name;
    protected float $price;
    protected bool $sellingByKg;

    public function __construct(
        string $name,
        float $price,
        bool $sellingByKg
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->sellingByKg = $sellingByKg;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSellingBy(): string
    {

        if ($this->sellingByKg) {
            return 'kgs';
        } else {
            return 'gunny sacks';
        }
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}
