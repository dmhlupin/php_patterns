<?php

class CopyCommand extends Command {
    public function execute()
    {
        $this->app->clipboard = $this->editor->getSelection();
        return false;
    }
}