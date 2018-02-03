<?php
namespace ChocolatineWp;

use Chocolatine\Core;
use Chocolatine\Helper;

class App extends Core
{
    public function __construct(){
        $this->setPathApplication( \get_template_directory() );
        parent::__construct();
        $this->init();
    }
    public function afterLoadManagers(){
        Helper::add_configuration(
            'modules',
            [MiddleWareWp\Module::class]
        );
    }
}
