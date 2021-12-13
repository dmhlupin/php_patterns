<?php

spl_autoload_register(function ($class) 
{
    include $class.'.php';
});

$handHunter = new HandHunter();

$userA = new Candidate("Дмитрий", "dmitry@mail.ru", 3);
$userB = new Candidate("Алексей", "alex@gmail.com", 1);
$userC = new Candidate("Макс", "max@max.max", 7);

$handHunter->attach($userA);
$handHunter->attach($userB);
$handHunter->attach($userC);

$handHunter->addVacancy(2);
$handHunter->addVacancy(6);
$handHunter->addVacancy(1);

$handHunter->detach($userB);

$handHunter->addVacancy(3);
