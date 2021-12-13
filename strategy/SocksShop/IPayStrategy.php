<?php

interface IPayStrategy {
    public function pay(int $price, string $phone);
}