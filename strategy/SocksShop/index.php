<?php

spl_autoload_register(function ($class) 
{
    include $class.'.php';
});

// В функцию buy передаются стоимость покупки, номер телефона и объект магазина
// В зависимости от стоимости при покупке выбирается стратегия оплаты
// и реализуется метод pay() магазина

function buy(int $price, string $phone, Shop $shop) {
    if ($price > 2000 && $price <= 5000) {
        $shop->setStrategy(new WebMoneyStrategy());
    } else if ($price > 5000) {
        $shop->setStrategy(new YandexStrategy());
    } else {
        $shop->setStrategy(new QiwiStrategy());
    }
    $shop->pay($price, $phone);
}

$socksShop = new Shop(new QiwiStrategy);
buy(500,"911-4005555", $socksShop);
buy(2500,"911-4654658", $socksShop);
buy(7000,"911-4567569", $socksShop);
buy(200,"911-4567569", $socksShop);

