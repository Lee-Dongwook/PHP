<?php
/**
 * WordPress Hooks and Filters
 *
 * @package PHP_Practice
 * @since 0.0.1
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Initialize the plugin
 */
function php_practice_init(): void {
    // Load text domain for translations
    load_plugin_textdomain('php-practice', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('init', 'php_practice_init');

/**
 * Enqueue admin scripts and styles
 */
function php_practice_admin_enqueue_scripts(): void {
    $screen = get_current_screen();
    
    // Only load on specific admin pages if needed
    if (isset($screen->id) && strpos($screen->id, 'php-practice') !== false) {
        wp_enqueue_script(
            'php-practice-admin',
            plugin_dir_url(__FILE__) . '../build/admin.js',
            ['jquery'],
            '0.0.1',
            true
        );
        
        wp_enqueue_style(
            'php-practice-admin',
            plugin_dir_url(__FILE__) . '../build/admin.css',
            [],
            '0.0.1'
        );
    }
}
add_action('admin_enqueue_scripts', 'php_practice_admin_enqueue_scripts');

/**
 * Enqueue frontend scripts and styles
 */
function php_practice_enqueue_scripts(): void {
    wp_enqueue_script(
        'php-practice-frontend',
        plugin_dir_url(__FILE__) . '../build/frontend.js',
        ['jquery'],
        '0.0.1',
        true
    );
    
    wp_enqueue_style(
        'php-practice-frontend',
        plugin_dir_url(__FILE__) . '../build/frontend.css',
        [],
        '0.0.1'
    );
}
add_action('wp_enqueue_scripts', 'php_practice_enqueue_scripts');

/**
 * Add admin menu
 */
function php_practice_admin_menu(): void {
    add_menu_page(
        __('PHP Practice', 'php-practice'),
        __('PHP Practice', 'php-practice'),
        'manage_options',
        'php-practice',
        'php_practice_admin_page',
        'dashicons-admin-generic',
        30
    );
}
add_action('admin_menu', 'php_practice_admin_menu');

/**
 * Admin page callback
 */
function php_practice_admin_page(): void {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html__('PHP Practice Plugin', 'php-practice'); ?></h1>
        <p><?php echo esc_html__('Welcome to your first WordPress plugin!', 'php-practice'); ?></p>
    </div>
    <?php
}
