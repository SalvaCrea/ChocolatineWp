<?php
namespace ChocolatineWp\Component;

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
    public function __construct()
    {
        add_action( 'init', [$this , 'create'] );
        add_filter( 'rwmb_meta_boxes', [$this , 'getModel'] );
    }
    public function create()
    {
        $labels = array(
            'name'               => _x( $this->pluralName, 'post type general name' ),
            'singular_name'      => _x( $this->singularName, 'post type singular name' ),
            'menu_name'          => _x( $this->pluralName, 'admin menu' ),
            'name_admin_bar'     => _x( $this->singularName, 'add new on admin bar' ),
            'add_new'            => _x( 'Add New ' . $this->singularName, 'Add New' ),
            'add_new_item'       => __( 'Add New ' . $this->singularName, 'Add New' ),
            'new_item'           => __( 'New '. $this->singularName, 'New' ),
            'edit_item'          => __( 'Edit '. $this->singularName, 'Edit' ),
            'view_item'          => __( 'View '. $this->singularName, 'View' ),
            'all_items'          => __( 'All '. $this->pluralName, 'All' ),
            'search_items'       => __( 'Search '. $this->pluralName, 'Search' ),
            'parent_item_colon'  => __( 'Parent ' . $this->pluralName  .':', 'Parent' ),
            'not_found'          => __( 'No ' . $this->pluralName  . ' found.', 'No' ),
            'not_found_in_trash' => __( 'No ' . $this->pluralName  . ' found in Trash.', 'No' )
        );

        $args = array(
            'labels'                  => $labels,
            'description'             => __( $this->description, 'description' ),
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
    public function model()
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
     public function getModel($meta_boxes){
         $model = $this->model();
         if (empty($model['post_types'])) {
             $model['post_types'] = $this->idName;
         }
         if (empty($model['context'])) {
             $model['context'] = 'advanced';
         }
         if (empty($model['priority'])) {
             $model['priority'] = 'default';
         }
         if (empty($model['autosave'])) {
             $model['autosave'] = false;
         }
         $meta_boxes []= $model;

         return $meta_boxes;
     }
    /**
    * Used than the post type is read
    * @param  object
    * @return object return the postType
    */
     public function viewController($postType)
     {
         return $postType;
     }
     /**
     * Used than the post type is edited
     * @param  object
     * @return object return the postType
     */
     public function editController($postType)
     {
         return $postType;
     }
     /**
     * Used than the post type is deleted
     * @param  object
     * @return object return the postType
     */
     public function removeController($postType)
     {
         return $postType;
     }
}
