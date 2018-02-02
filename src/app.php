<?php
namespace ChocolatineWp;

class App{
    /**
     * The patch Folder
     * @var string
     */
    public $pathFolder;

    public function __contruct(){
        $this->pathFolder = get_template_directory();
    }
}
