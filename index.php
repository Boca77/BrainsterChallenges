<?php

interface Printable
{
    public function print();
    public function sneakPeek();
    public function fullInfo();
}

class Furniture
{
    private int $width;
    private int $length;
    private int $height;
    private bool $is_for_seating = false;
    private bool $is_for_sleeping = false;
    public string $seatingSleeping = '';

    public function __construct($width, $length, $height)
    {
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
    }

    public function setIs_for_seating($is_for_seating)
    {
        $this->is_for_seating = $is_for_seating;
    }

    public function setIs_for_sleeping($is_for_sleeping)
    {
        $this->is_for_sleeping = $is_for_sleeping;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getIs_for_seating()
    {
        return $this->is_for_seating;
    }

    public function getIs_for_sleeping()
    {
        return $this->is_for_sleeping;
    }

    public function area()
    {
        return $this->width * $this->length;
    }

    public function volume()
    {
        return $this->area() * $this->height;
    }
}

$product = new Furniture("15", "25", "10");
echo $product->area() . "<br>";
echo $product->volume() . "<br>";

class Sofa extends Furniture implements Printable
{
    public int $seats;
    public int $armrests;
    public int $length_opened;


    public function __construct($width, $length, $height)
    {

        parent::__construct($width, $length, $height);
    }

    public function setSeats($seats)
    {
        $this->seats = $seats;
    }

    public function setArmrests($armrests)
    {
        $this->armrests = $armrests;
    }

    public function setLengthOpen($length_opened)
    {
        $this->length_opened = $length_opened;
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function getArmrests()
    {
        return $this->armrests;
    }

    public function getLengthOpen()
    {
        return $this->length_opened;
    }

    public function area_opened()
    {
        if ($this->getIs_for_sleeping() == true) {
            return $this->getWidth() * $this->length_opened;
        }
        if ($this->getIs_for_seating() == true) {
            return "This sofa is for sitting only 
            it has {$this->armrests} armrests and {$this->seats} seats";
        }
    }

    public function print()
    {
        if ($this->getIs_for_seating()) {
            $this->seatingSleeping = " seating only, ";
        }

        echo get_class($this) . ", " . $this->seatingSleeping . $this->area() . "cm2" . "<br>";
    }

    public function sneakPeek()
    {
        echo get_class($this) . "<br>";
    }

    public function fullInfo()
    {
        echo get_class($this) . ", " . $this->seatingSleeping . $this->area() . "cm2, "
            . "width: " . $this->getWidth() . "cm2"
            . ", length: " . $this->getLength() . "cm2"
            . ", height: " . $this->getHeight() . "cm2" . "<br>";
    }
}

$sofa = new Sofa("15", "10", "5");
$sofa->setIs_for_seating(true);
$sofa->setArmrests(5);
$sofa->setSeats(10);
$sofa->setLengthOpen(10);
echo $sofa->area() . "<br>";
echo $sofa->volume() . "<br>";
echo $sofa->area_opened() . "<br>";
$sofa->setIs_for_sleeping(true);
echo $sofa->area_opened() . "<br>";

class Bench extends Sofa implements Printable
{
    public function __construct($width, $length, $height)
    {

        parent::__construct($width, $length, $height);
    }
    public function print()
    {
        if ($this->getIs_for_seating()) {
            $this->seatingSleeping = " seating only, ";
        }

        echo get_class($this) . ", " . $this->seatingSleeping . $this->area() . "cm2" . "<br>";
    }

    public function sneakPeek()
    {
        echo get_class($this) . "<br>";
    }

    public function fullInfo()
    {
        echo get_class($this) . ", " . $this->seatingSleeping . $this->area() . "cm2, "
            . "width: " . $this->getWidth() . "cm2"
            . ", length: " . $this->getLength() . "cm2"
            . ", height: " . $this->getHeight() . "cm2" . "<br>";
    }
}

class Chair extends Furniture implements Printable
{
    public function __construct($width, $length, $height)
    {
        parent::__construct($width, $length, $height);
    }

    public function print()
    {
        if ($this->getIs_for_seating()) {
            $this->seatingSleeping = " seating only, ";
        }

        echo get_class($this) . ", " . $this->seatingSleeping . $this->area() . "cm2" . "<br>";
    }

    public function sneakPeek()
    {
        echo get_class($this) . "<br>";
    }

    public function fullInfo()
    {
        echo get_class($this) . ", " . $this->seatingSleeping . $this->area() . "cm2, "
            . "width: " . $this->getWidth() . "cm2"
            . ", length: " . $this->getLength() . "cm2"
            . ", height: " . $this->getHeight() . "cm2" . "<br>";
    }
}

echo "<hr>";

$furniture1 = new Sofa("340", "255", "520");
$furniture1->setIs_for_seating(false);
$furniture1->print() . '<br>';
$furniture1->sneakPeek() . '<br>';
$furniture1->fullInfo() . '<br>';

echo "<hr>";

$furniture2 = new Chair("400", "100", "250");
$furniture2->setIs_for_seating(true);
$furniture2->print() . '<br>';
$furniture2->sneakPeek() . '<br>';
$furniture2->fullInfo() . '<br>';

echo "<hr>";

$furniture3 = new Bench("150", "250", "300");
$furniture3->setIs_for_seating(false);
$furniture3->print() . '<br>';
$furniture3->sneakPeek() . '<br>';
$furniture3->fullInfo() . '<br>';
