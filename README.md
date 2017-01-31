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
* `$args` (array): an option array for custom post type. [See detail here](https://codex.wordpress.org/Function_Reference/register_post_type)

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
[1.2.0]()
* Add alias function for creating custom post type object
* Change namespace

[1.1.0]()
* Change structure

[1.0.0]()
* First init




