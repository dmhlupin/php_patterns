<?php

class Candidate implements \SplObserver
{
    public $name;
    public $email;
    public $experience;

    public function __construct(string $name, string $email, int $exp)
    {
        $this->name = $name;
        $this->email = $email;
        $this->experience = $exp;
    }

    public function update(SplSubject $subject): void
    {
        if ($subject->experience <= $this->experience) {
            echo "Кандидат {$this->name}, подходит для данной вакансии.\n";
            echo "Ему направлено уведомление на почту {$this->email}.\n";
        }
    }
}