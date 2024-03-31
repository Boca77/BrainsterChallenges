<?php

class MarketStall
{
    public array $products;

    public function __construct(array $products)
    {
        foreach ($products as $product) {
            $this->products[$product->getName()] = $product;
        }
    }

    public function addProductToMarket($product)
    {
        $this->products[$product->getName()] = $product;
    }

    public function getItem($item, $amount)
    {
        if (array_key_exists($item, $this->products)) {
            return [
                'amount' => $amount,
                'item' => $this->products[$item]
            ];
        }
        return;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}
