<?php
/**
 * This class is foundation of registration a custom post type
 * 
 * @use        register_post_type()
 * @link       https://codex.wordpress.org/Function_Reference/register_post_type
 * @since      1.0.0
 * @package    va
 * @subpackage cpter
 */

namespace VA\CPTer;

class Provider
{
    /**
     * Custom post type name/slug
     * 
     * @var string $type
     */
    protected $type;
    
    /**
     * @var string $single
     */
    protected $single;
    
    /**
     * @var string $plural
     */
    protected $plural;
    
    /**
     * @var array $args
     */
    protected $args = [];
    
    /**
     * Constructor
     * 
     * @param string
     * @param string
     * @param string
     * @param array
     */
    public function __construct($type, $single = '', $plural = '', $args = [])
    {
        if (!is_string($type) || !is_string($single) || !is_string($plural)) {
            wp_die(__('It is required to pass a string.'));
        }
        
        if ($type == '') {
            wp_die(__('The name of custom post type is not empty.'));
        }
        
        $this->type = $type;
        $this->single = $single;
        $this->plural = $plural;
        $this->args = $args;
        
        add_action('init', [$this, 'registerPostType']);
    }
    
    /**
     * 
     * @since 1.0.0
     */
    public function registerPostType()
    {
        $result = register_post_type($this->type, $this->getArgs());
        
        // check result return
        if (is_wp_error($result)) wp_die($result->get_error_message());
        
        
    }
    
    /**
     * 
     */
    public function getArgs()
    {
        // generate cpt label
		$labels = array(
			'name'               => $this->plural,
			'singular_name'      => $this->single,
			'add_new'            => sprintf(__('Add New %s'), $this->single),
			'add_new_item'       => sprintf(__('Add New %s'), $this->single),
			'edit_item'          => sprintf(__('Edit %s'), $this->single),
			'new_item'           => sprintf(__('New %s'), $this->single),
			'all_items'          => sprintf(__('All %s'), $this->plural),
			'view_item'          => sprintf(__('View %s'), $this->single),
			'search_items'       => sprintf(__('Search %s'), $this->plural),
			'not_found'          => sprintf(__('No %s'), $this->plural),
			'not_found_in_trash' => sprintf(__('No %s found in Trash'), $this->plural),
			'parent_item_colon'  => isset( $this->arg_overrides['hierarchical'] ) && $this->arg_overrides['hierarchical'] ? sprintf( __( 'Parent %s:', 'cpt-core' ), $this->single ) : null,
			'menu_name'          => $this->plural,
			'insert_into_item'      => sprintf( __( 'Insert into %s', 'cpt-core' ), strtolower($this->single) ),
			'uploaded_to_this_item' => sprintf( __( 'Uploaded to this %s', 'cpt-core' ), strtolower($this->single) ),
			'items_list'            => sprintf( __( '%s list', 'cpt-core' ), $this->plural ),
			'items_list_navigation' => sprintf( __( '%s list navigation', 'cpt-core' ), $this->plural ),
			'filter_items_list'     => sprintf( __( 'Filter %s list', 'credit-helper-elite' ), strtolower($this->plural) )
		);
		
		// Set default cpt parameters
		$defaults = array(
			'labels'             => [],
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'has_archive'        => true,
			'supports'           => ['title', 'editor', 'excerpt'],
		);
		
		return;
    }
    
}
