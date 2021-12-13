<?php

class Subject implements \SplSubject
{
    public $state;
    private $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(\SplObserver $observer): void
    {
        echo "Subject: Attached an observer: {$observer->name}.\n";
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
        echo "Subject: Detached an observer: {$observer->name}.\n";
    }

    public function notify(): void
    {
        echo "Notifying observers...\n";
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function someBussinessLogic(): void 
    {
        echo "\nSubject: I'm doing something important.\n";
        $this->state = rand(0, 10);

        echo "Subject: My state has just changed to: {$this->state}\n";
        $this->notify();
    }
}

class ConcreteObserverA implements \SplObserver
{
    public $name = "ObserverA";
    public function update(\SplSubject $subject): void 
    {
        if($subject->state < 3) {
            echo "ConcreteObserverA: Reacted to the event.\n";
        }
    }
}

class ConcreteObserverB implements \SplObserver
{
    public $name = "ObserverB";
    public function update(\SplSubject $subject): void 
    {
        if($subject->state == 0 || $subject->state >= 2) {
            echo "ConcreteObserverB: Reacted to the event.\n";
        }
    }
}

$subject = new Subject();

$o1 = new ConcreteObserverA();
$o2 = new ConcreteObserverB();
$subject->attach($o1);
$subject->attach($o2);

$subject->someBussinessLogic();
$subject->someBussinessLogic();

$subject->detach($o2);

$subject->someBussinessLogic();
$subject->someBussinessLogic();

