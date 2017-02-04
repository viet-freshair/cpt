# CPTER
CPT Module

This module helps register a custom post type simpler.

# Installation
```
composer require vietartisans/cpter
```

# Usage

##1 Use alias function `registerCpter()`
```
registerCpter('book', 'Book', 'Books');
```
##2 Create a CPT child class
```
$post_type = new VA\CPT($name, $single, $plural, $args)
```

* `$name` (string): name/slug of custom post type. It must be unique.
* `$single` (string): Single lable of custom post type.
* `$plural` (string): Plural label of custom post type.
* `$args` (array): an option array for custom post type. 

**Label**
(array) (optional) labels - An array of labels for this post type. By default, post labels are used for non-hierarchical post types and page labels for hierarchical ones.
Default: if empty, 'name' is set to value of 'label', and 'singular_name' is set to value of 'name'.
* 'name' - general name for the post type, usually plural. The same and overridden by $post_type_object->label. Default is Posts/Pages
* 'singular_name' - name for one object of this post type. Default is Post/Page
* 'add_new' - the add new text. The default is "Add New" for both hierarchical and non-hierarchical post types. When internationalizing this string, please use a gettext context matching your post type. Example: `_x('Add New', 'product');`
* 'add_new_item' - Default is Add New Post/Add New Page.
* 'edit_item' - Default is Edit Post/Edit Page.
* 'new_item' - Default is New Post/New Page.
* 'view_item' - Default is View Post/View Page.
* 'view_items' - Label for viewing post type archives. Default is 'View Posts' / 'View Pages'.
* 'search_items' - Default is Search Posts/Search Pages.
* 'not_found' - Default is No posts found/No pages found.
* 'not_found_in_trash' - Default is No posts found in Trash/No pages found in Trash.
* 'parent_item_colon' - This string isn't used on non-hierarchical types. In hierarchical ones the default is 'Parent Page:'.
* 'all_items' - String for the submenu. Default is All Posts/All Pages.
* 'archives' - String for use with archives in nav menus. Default is Post Archives/Page Archives.
* 'attributes' - Label for the attributes meta box. Default is 'Post Attributes' / 'Page Attributes'.
* 'insert_into_item' - String for the media frame button. Default is Insert into post/Insert into page.
* 'uploaded_to_this_item' - String for the media frame filter. Default is Uploaded to this post/Uploaded to this page.
* 'featured_image' - Default is Featured Image.
* 'set_featured_image' - Default is Set featured image.
* 'remove_featured_image' - Default is Remove featured image.
* 'use_featured_image' - Default is Use as featured image.
* 'menu_name' - Default is the same as `name`.
* 'filter_items_list' - String for the table views hidden heading.
* 'items_list_navigation' - String for the table pagination hidden heading.
* 'items_list' - String for the table hidden heading.
* 'name_admin_bar' - String for use in New in Admin menu bar. Default is the same as `singular_name`.

[See detail here](https://codex.wordpress.org/Function_Reference/register_post_type)

**Example 1: Register a custom post type with default arguments**
### Register a custom post type with default arguments
```php
$book = new VA\CPT('book', 'Book', 'Books');
```
### Register a custom post type with specific arguments
```php
$song = new VA\CPT(
    'song', 
    'Song', 
    'Songs', 
    ['menu_icon' => 'dashicons-format-audio']
);
```

### Register a custom post type with meta fields
**NOTE:** We are using CMB2 to create meta fields for custom post type. 
See [here](https://github.com/WebDevStudios/CMB2/wiki/Basic-Usage) to find out how to use CMB2.
You can see a list of available field types [here](https://github.com/WebDevStudios/CMB2/wiki/Field-Types#types).
```php
$book->registerMetafields(
	[
		[
	        'id'            => 'test_metabox',
	        'title'         => __( 'Test Metabox', 'cmb2' ),
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // Keep the metabox closed by default
	        'fields'        => [
	        	[
			        'name' => __( 'Website URL', 'cmb2' ),
			        'desc' => __( 'field description (optional)', 'cmb2' ),
			        'id'   => 'url',
			        'type' => 'text_url',
			    ],
			    [
			        'name' => __( 'Test Text Email', 'cmb2' ),
			        'desc' => __( 'field description (optional)', 'cmb2' ),
			        'id'   => 'email',
			        'type' => 'text_email',
			        // 'repeatable' => true,
			    ]
	        ]
		],
		[
	        'id'            => 'test_metabox_2',
	        'title'         => __( 'Test Metabox', 'cmb2' ),
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // Keep the metabox closed by default
	        'fields'        => [
	        	[
			        'name' => __( 'Website URL', 'cmb2' ),
			        'desc' => __( 'field description (optional)', 'cmb2' ),
			        'id'   => 'url',
			        'type' => 'text_url',
			    ],
			    [
			        'name' => __( 'Test Text Email', 'cmb2' ),
			        'desc' => __( 'field description (optional)', 'cmb2' ),
			        'id'   => 'email',
			        'type' => 'text_email',
			        // 'repeatable' => true,
			    ]
	        ]
		]
	]
);
```

# Changelog
[1.2.2]()
* Required cmb2 package

[1.2.1]()
* Fixed CMB2 issue #12

[1.2.0]()
* Add alias function for creating custom post type object
* Change namespace

[1.1.0]()
* Change structure

[1.0.0]()
* First init




