<?php

class Shop {
    private $strategy;

    public function __construct(IPayStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(IPayStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function pay(int $price, string $phone): void
    {
        $result = $this->strategy->pay($price, $phone);
        echo $result;        
    }

}