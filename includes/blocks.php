<?php
/**
 * Gutenberg Blocks Registration
 *
 * @package PHP_Practice
 * @since 0.0.1
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Gutenberg blocks
 */
function php_practice_register_blocks(): void {
    // Register block script
    wp_register_script(
        'php-practice-blocks',
        plugin_dir_url(__FILE__) . '../build/blocks.js',
        ['wp-blocks', 'wp-element', 'wp-editor', 'wp-components'],
        '0.0.1',
        true
    );
    
    // Register block style
    wp_register_style(
        'php-practice-blocks',
        plugin_dir_url(__FILE__) . '../build/blocks.css',
        ['wp-edit-blocks'],
        '0.0.1'
    );
    
    // Register a simple custom block
    register_block_type('php-practice/hello-world', [
        'editor_script' => 'php-practice-blocks',
        'editor_style'  => 'php-practice-blocks',
        'style'         => 'php-practice-blocks',
        'render_callback' => 'php_practice_hello_world_render',
        'attributes'    => [
            'message' => [
                'type' => 'string',
                'default' => __('Hello from PHP Practice!', 'php-practice'),
            ],
        ],
    ]);
}
add_action('init', 'php_practice_register_blocks');

/**
 * Render callback for hello world block
 */
function php_practice_hello_world_render(array $attributes): string {
    $message = isset($attributes['message']) ? sanitize_text_field($attributes['message']) : '';
    
    return sprintf(
        '<div class="wp-block-php-practice-hello-world">
            <p>%s</p>
        </div>',
        esc_html($message)
    );
}

/**
 * Add custom block category
 */
function php_practice_block_categories(array $categories): array {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'php-practice',
                'title' => __('PHP Practice', 'php-practice'),
                'icon'  => 'admin-generic',
            ],
        ]
    );
}
add_filter('block_categories_all', 'php_practice_block_categories');
