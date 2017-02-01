<?php
use VA\CPT;

if (!function_exists('registerCpter')) {
    /**
     * function alias for Cpter object
     * 
     * @since 1.2.0
     * @param string $type
     * @param string $single
     * @param string $plural
     * @param array  $args
     * 
     * @return CPT
     */
    function registerCpter($type, $single = '', $plural = '', $args = [])
    {
        return new CPT($type, $single, $plural, $args);
    }
}