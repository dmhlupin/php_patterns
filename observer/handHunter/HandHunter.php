<?php

class HandHunter implements \SplSubject {
    
    public $experience;
    private $candidates;

    public function __construct()
    {
        $this->candidates = new \SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        echo "{$observer->name} подписался на уведомления HandHunter.gb.\n";
        $this->candidates->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->candidates->detach($observer);
        echo "{$observer->name} отписался от уведомлений HandHunter.gb.\n";
    }

    public function notify(): void
    {
        echo "Проводится уведомление подписчиков...\n";
        foreach ($this->candidates as $candidate) {
            $candidate->update($this);
        }
    }

    public function addVacancy(int $exp = 0): void
    {
        echo "На HandHunter.gb появилась вакансия программиста.\n";
        echo "Стаж - не менее {$exp} лет.\n";
        $this->experience = $exp;
        $this->notify();
    }
}