<?php
namespace ChocolatineWp\Component;

class Widget extends \WP_Widget {
    /**
     * Class of widget
     * @var string
     */
    public $className = 'widget-class';
    /**
     * Description of widget
     * @var string
     */
    public $description = 'description empty...';
    /**
     * The unique name
     * @var string
     */
    public $idName = 'uniqName';
    /**
     * Description of widget
     * @var string
     */
    public $name = 'Widget Name';
    /**
  	 * Sets up the widgets name etc
  	 */
  	public function __construct()
    {
    		$widget_ops = array(
    			'classname' => $this->className,
    			'description' => $this->description,
    		);
    		parent::__construct( $this->idName, $this->name, $widget_ops );

        $this->registerWidget();
  	}
    public function registerWidget()
    {
        \add_action( 'widgets_init', function(){
            register_widget( __CLASS__ );
        });
    }
  	/**
  	 * Outputs the content of the widget
  	 *
  	 * @param array $args
  	 * @param array $instance
  	 */
  	public function widget( $args, $instance )
    {
  		  echo 'widget newsletter';
  	}

  	/**
  	 * Outputs the options form on admin
  	 *
  	 * @param array $instance The widget options
  	 */
  	public function form( $instance )
    {
  		// outputs the options form on admin
  	}

  	/**
  	 * Processing widget options on save
  	 *
  	 * @param array $new_instance The new options
  	 * @param array $old_instance The previous options
  	 *
  	 * @return array
  	 */
  	public function update( $new_instance, $old_instance )
    {
  		// processes widget options to be saved
  	}
}
