<?php

abstract class Command {
    protected $app;
    protected $editor;
    protected $backup;

    public function __construct(Application $app, Editor $editor)
    {
        $this->app = $app;
        $this->editor = $editor;
    }

    public function saveBackup() 
    {
        $this->backup = $this->editor->text;
    }

    public function undo() 
    {
        $this->editor->text = $this->backup;
    }

    abstract public function execute();
}