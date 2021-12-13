<?php

class PasteCommand extends Command {
    public function execute()
    {
        $this->saveBackup();
        
        $this->editor->replaceSelection($this->app->clipboard);
        return true;
    }
}