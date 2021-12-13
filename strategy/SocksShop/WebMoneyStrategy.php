<?php

class WebMoneyStrategy implements IPayStrategy {
    public function pay(int $price, string $phone) {
        echo "Производится оплата суммы {$price} с помощью WebMoney...\n";
        return "Оплата {$price} выполнена. Уведомление выслано на номер {$phone}.\n";
    }
}