<?php
namespace ChocolatineWp;

use Chocolatine\Core;
use Chocolatine\Helper;

class App extends Core
{
    public function __construct()
    {
        \add_theme_support('post-formats');
        \add_theme_support('post-thumbnails');
        \add_theme_support('menus');
        \add_theme_support('widget');
        \add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
        \add_filter('timber_context', array($this, 'add_to_context'));
        \add_filter('get_twig', array($this, 'add_to_twig'));
        \add_action('wp', array($this, 'useRouter'));

        parent::__construct(\get_template_directory() . '/app' );
        $this->init();
    }
    public function afterLoadManagers()
    {
        Helper::add_configuration(
            'modules',
            [MiddleWareWp\MiddleWareWp::class]
      );
    }
    public function useRouter()
    {
        $router = new Router();
    }
}
