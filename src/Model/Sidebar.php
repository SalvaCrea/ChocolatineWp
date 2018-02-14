<?php

namespace ChocolatineWp\Model;

class Sidebar {
    public $id           = 'default';
    public $name         = 'default_name';
    public $description  = "descprtion";
    public $beforeWidget = '<li id="%1$s" class="widget %2$s">';
    public $afterWidget  = '</li>';
    public $beforeTitle  = '<h2 class="widgettitle">';
    public $afterTitle   = '</h2>';
    public function __construct()
    {
        $this->registerSidebar();
    }
    public function registerSidebar()
    {
        \add_action( 'widgets_init', [$this, 'getSidebar'] );
    }
    public function getSidebar() {
        \register_sidebar([
            'name' => __( $this->getName(), 'theme-slug' ),
            'id' => $this->getName(),
            'description' => __( $this->getDescription(), 'theme-slug' ),
            'before_widget' => $this->getBeforeWidget(),
            'after_widget'  => $this->getAfterWidget(),
            'before_title'  => $this->getBeforeTitle(),
            'after_title'   => $this->getAfterTitle(),
        ]);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getBeforeWidget()
    {
        return $this->beforeWidget;
    }
    public function getAfterWidget()
    {
        return $this->afterWidget;
    }
    public function getBeforeTitle()
    {
        return $this->beforeTitle;
    }
    public function getAfterTitle()
    {
        return $this->afterTitle;
    }
}
