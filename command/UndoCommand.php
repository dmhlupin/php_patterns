<?php

class UndoCommand extends Command {

    public function execute()
    {
        $this->app->undo();
        return false;
    }
}