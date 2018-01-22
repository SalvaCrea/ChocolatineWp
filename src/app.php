<?php
namespace WpFramework;

class app{
    /**
     * The patch Folder
     * @var string
     */
    public $pathFolder;

    public function __contruct(){
        $this->pathFolder = get_template_directory();
    }
}
