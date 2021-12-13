<?php

class YandexStrategy implements IPayStrategy {
    public function pay(int $price, string $phone) {
        echo "Производится оплата суммы {$price} с помощью Яндекс.Деньги...\n";
        return "Оплата {$price} выполнена. Уведомление выслано на номер {$phone}.\n";
    }
}