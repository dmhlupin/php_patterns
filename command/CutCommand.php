<?php

class CutCommand extends Command {
    public function execute()
    {
        $this->saveBackup();
        $this->app->clipboard = $this->editor->getSelection();
        $this->editor->deleteSelection();
        return true;
    }
}