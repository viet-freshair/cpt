# CPTer
CPT Module

This module helps register a custom post type simpler.

# Installation
```
composer require vietartisans/cpter
```

# Usage
## Register a custom post type with default arguments
```php
$book = new VA\Cpter\CptEngine('book', 'Book', 'Books');
```
## Register a custom post type with specific arguments
```php
$song = new VA\Cpter\CptEngine(
    'song', 
    'Song', 
    'Songs', 
    ['menu_icon' => 'dashicons-format-audio']
);
```

## Register a custom post type with meta fields
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
[1.0.0]()

[1.1.0]()



