<?php
/**
 * Plugin Name: VA CPT
 * Description: Create a custom post type
 * Version: 1.0.0
 * Author: VA
 * License: MIT
 */
 
require_once 'vendor/autoload.php';

new VA\CPTer\Provider('book', 'Book', 'Books');

new VA\CPTer\Provider('song', 'Song', 'Songs', ['menu_icon' => 'dashicons-format-audio']);
