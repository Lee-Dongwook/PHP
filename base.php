<?php
/**
 * Plugin Name: PHP Practice plugin
 * Description: PHP Practice plugin
 * Version: 0.0.1
 * Author: Lee-Dongwook
 * License: NON GPL
 * Text Domain: PHP Practice
 * Domain Path: /languages
 * Requires Plugins: gravityforms
 */

if (! defined('ABSPATH')) {
    exit;
}

function php_plugin_active() {
    // NOOP
}
register_activation_hook(__FILE__, 'php_plugin_active');

function php_plugin_deactivate() {
    // NOOP
}

register_deactivation_hook(__FILE__,'php_plugin_deactivate');

require_once(__DIR__ . '/includes/blocks.php' );
require_once( __DIR__ . '/includes/fixes.php' );
require_once( __DIR__ . '/includes/hooks.php' );

