<?php

class Application {
    
    public $clipboard;
    public $activeEditor;
    public $history;


    public function __construct($text)
    {
        $this->activeEditor = new Editor();
        $this->activeEditor->text = $text;
        $this->history = [];
    }
 
    
    public function executeCommand(Command $command) {
        if($command->execute()) {
            array_push($this->history, $command);
        }
    }

    public function undo() 
    {
        $command = array_pop($this->history);
        if ($command != null){
            $command->undo();
        }
    }
}