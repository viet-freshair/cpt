# CPTer
CPT Module

This module helps register a custom post type simpler.

# Installation
```
composer require vietartisans/cpter
```

# Usage
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


