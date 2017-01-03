# CPTer
CPT Module

This module helps register a custom post type simpler.

# Installation
```
composer require vietartisans/cpter
```

# Usage
$post_type = new VA\CPTer\Provider($name, $single, $plural, $args);
* $name (string): name/slug of custom post type. It must be unique.
* $single (string): Single lable of custom post type.
* $plural (string): Plural label of custom post type.
* $args (array): an option array for custom post type. [See detail here](https://codex.wordpress.org/Function_Reference/register_post_type)

**Example 1: Register a custom post type with default arguments**
```php
$book = new VA\CPTer\Provider('book', 'Book', 'Books');
```
**Example 2: Register a custom post type with specific arguments**
```php
$song = new VA\CPTer\Provider(
            'song', 
            'Song', 
            'Songs', 
            ['menu_icon' => 'dashicons-format-audio']
        );
```
