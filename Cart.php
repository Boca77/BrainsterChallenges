<?php

class Cart
{
    private array $cartItems = [];

    public function addToCart($item): array
    {
        return $this->cartItems[] = $item;
    }

    public function printReceipt()
    {
        if (empty($this->cartItems)) {
            echo "Your cart is empty";
            return;
        }

        $totalPrice = 0;
        foreach ($this->cartItems as $item) {

            echo $item['item']->getName() . ' | ' .
                $item['amount'] . ' ' . $item['item']->getSellingBy() . ' | ' .
                'total = ' . $item['item']->getPrice() * $item['amount'] . ' denars' . '<br>';

            $totalPrice += $item['item']->getPrice() * $item['amount'];
        }
        echo "<hr> Final price amount: $totalPrice denars";
    }
}
