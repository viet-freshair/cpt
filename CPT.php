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

namespace VA;

class CPT
{
    /**
     * Custom post type name/slug
     * 
     * @var string
     */
    protected $type;
    
    /**
     * @var string
     */
    protected $single;
    
    /**
     * @var string
     */
    protected $plural;
    
    /**
     * @var array
     */
    protected $args;

    /**
     * @var array
     */
    protected $meta;
    
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
     * register CPT with merge arguments
     * 
     * @since 1.0.0
     */
    public function registerPostType()
    {
        $result = register_post_type($this->type, $this->getArgs());
        
        if (is_wp_error($result)) wp_die($result->get_error_message());
    }
    
    /**
     * handle and parse default arguments
     * 
     * @since 1.0.0
     */
    public function getArgs()
    {
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
			'parent_item_colon'  => isset($this->args['hierarchical']) && $this->args['hierarchical'] ? sprintf(__('Parent %s:'), $this->single ) : null,
			'menu_name'          => $this->plural,
			'insert_into_item'      => sprintf(__('Insert into %s'), strtolower($this->single)),
			'uploaded_to_this_item' => sprintf(__( 'Uploaded to this %s'), strtolower($this->single)),
			'items_list'            => sprintf(__('%s list'), $this->plural),
			'items_list_navigation' => sprintf(__('%s list navigation'), $this->plural),
			'filter_items_list'     => sprintf(__('Filter %s list'), strtolower($this->plural))
		);

		$defaults = array(
			'labels'             => [],
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'has_archive'        => true,
			'supports'           => ['title', 'editor', 'excerpt', 'thumbnail'],
		);
		
		$this->args = wp_parse_args($this->args, $defaults);
		$this->args['labels'] = wp_parse_args($this->args['labels'], $labels);
		
		return $this->args;
    }

    /**
     * set meta fields
     * 
     * @since  1.1.0
     * @param  array $meta
     * @return void
     */
    public function registerMetafields($meta)
    {
        if (!is_array($meta)) {
            wp_die(__('It must be an array.'));
        }

        if (empty($meta)) {
            wp_die(__('It is not empty.'));
        }

        $this->meta = $meta;

        add_action('cmb2_admin_init', [$this, 'registerCMB2']);
    }

    /**
     * initialize the cmb2 metabox
     * 
     * @see Usage       https://github.com/WebDevStudios/CMB2/wiki/Basic-Usage
     * @see Field types https://github.com/WebDevStudios/CMB2/wiki/Field-Types#types
     * 
     * @since 1.1.0
     * 
     */
    public function registerCMB2()
    {
        if (!file_exists(dirname(dirname(__DIR__)) . '/webdevstudios/cmb2/init.php')) {
            wp_die(__('Not found CMB2 package. Run <code><b>composer require webdevstudios/cmb2 --dev</b></code> to install it.'));
        }

        require_once dirname(dirname(__DIR__)) . '/webdevstudios/cmb2/init.php';

        $prefix = '_vameta_';

        foreach ($this->meta as $section) {

            $fields = [];

            if (isset($section['fields'])) {
                $fields = $section['fields'];
            }

            unset($section['fields']);

            if (!empty($section)) {

                $section['object_types'] = [$this->type];

                $cmb = new_cmb2_box($section);

                if (!empty($fields)) {

                    foreach ($fields as $field) {

                        $field['id'] = $prefix . $field['id'];

                        $cmb->add_field($field);
                    }
                }
            }

        }
    }
    
}
