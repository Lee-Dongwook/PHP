<?php
/**
 * WordPress Compatibility Fixes
 *
 * @package PHP_Practice
 * @since 0.0.1
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Fix potential conflicts with other plugins
 */
function php_practice_compatibility_fixes(): void {
    // Remove conflicting scripts if needed
    if (is_admin()) {
        // Add any admin-specific fixes here
    }
}
add_action('init', 'php_practice_compatibility_fixes');

/**
 * Ensure proper plugin loading order
 */
function php_practice_plugins_loaded(): void {
    // Check if required plugins are active
    if (!is_plugin_active('gravityforms/gravityforms.php')) {
        add_action('admin_notices', 'php_practice_gravity_forms_notice');
    }
}
add_action('plugins_loaded', 'php_practice_plugins_loaded');

/**
 * Admin notice for missing Gravity Forms
 */
function php_practice_gravity_forms_notice(): void {
    ?>
    <div class="notice notice-warning is-dismissible">
        <p>
            <?php 
            printf(
                /* translators: %s: plugin name */
                esc_html__('%s requires Gravity Forms to be installed and activated.', 'php-practice'),
                '<strong>' . esc_html__('PHP Practice Plugin', 'php-practice') . '</strong>'
            );
            ?>
        </p>
    </div>
    <?php
}

/**
 * Fix potential theme conflicts
 */
function php_practice_theme_compatibility(): void {
    // Add theme-specific fixes here if needed
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'php_practice_theme_compatibility');

/**
 * Handle plugin deactivation cleanup
 */
function php_practice_cleanup(): void {
    // Clean up any plugin-specific data if needed
    // This runs when the plugin is deactivated
}
register_deactivation_hook(__FILE__, 'php_practice_cleanup');
