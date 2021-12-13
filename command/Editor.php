<?php

class Editor {
    public $text;

    public function getSelection() {
        
        return $this->text;
    }

    public function deleteSelection() {
        
        $this->text = $this->text . "|-----|";
        return "Удаленный текст";
    }

    public function replaceSelection($text) {
        
        $this->text = $this->text . $text;
        return "Вставленный текст";
    }
}