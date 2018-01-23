<?php
namespace WpFramework\Model;

class PostType{
    /**
     * Post type general name
     * @var string
     */
    public $idName = 'none';
    /**
     * The singular Name
     * @var string
     */
    public $singularName = 'Post Type';
    /**
     * The plural Name
     * @var string
     */
    public $pluralName = 'Posts Types';
    /**
     * The plural Name
     * @var string
     */
    public $description = '';
    /**
     * Init Function
     */
    public function init()
    {
        add_action( 'init', [$this => 'create'] );
        add_filter( 'rwmb_meta_boxes', [$this => 'getModel'] );
    }
    public function create()
    {
        $labels = array(
            'name'               => _x( $this->pluralName, 'post type general name' ),
            'singular_name'      => _x( $this->singularName, 'post type singular name' ),
            'menu_name'          => _x( $this->pluralName, 'admin menu' ),
            'name_admin_bar'     => _x( $this->singularName, 'add new on admin bar' ),
            'add_new'            => _x( 'Add New ' . $this->singularName ),
            'add_new_item'       => __( 'Add New ' . $this->singularName ),
            'new_item'           => __( 'New '. $this->singularName ),
            'edit_item'          => __( 'Edit '. $this->singularName ),
            'view_item'          => __( 'View '. $this->singularName ),
            'all_items'          => __( 'All '. $this->pluralName ),
            'search_items'       => __( 'Search '. $this->pluralName ),
            'parent_item_colon'  => __( 'Parent ' . $this->pluralName  .':' ),
            'not_found'          => __( 'No ' . $this->pluralName  . ' found.' ),
            'not_found_in_trash' => __( 'No ' . $this->pluralName  . ' found in Trash.' )
        );

        $args = array(
            'labels'                  => $labels,
            'description'             => __( $this->description ),
            'public'                  => true,
            'publicly_queryable'      => true,
            'show_ui'                 => true,
            'show_in_menu'            => true,
            'query_var'               => true,
            'rewrite'                 => array( 'slug' => $this->idName ),
            'capability_type'         => 'post',
            'has_archive'             => true,
            'hierarchical'            => false,
            'menu_position'           => null,
            'supports'                => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        );

        register_post_type( $this->idName, $args );
    }
    /**
     * Return an array that generate metabox in the wp-admin
     * @return array model of data
     */
    private function model()
    {
        return [
            // EXAMPLE
            // 'title'  => 'Test Meta Box',
            // 'fields' => array(
            //     array(
            //         'id'   => 'name',
            //         'name' => 'Name',
            //         'type' => 'text',
            //     )
            // )
        ];
    }
    /**
     * Getter Model
     * @return array return model
     */
    public function getModel(){
        return $this->model();
    }
}
