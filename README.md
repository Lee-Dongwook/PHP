# PHP Practice WordPress Plugin

A WordPress plugin for learning PHP and WordPress plugin development.

## Features

- Custom Gutenberg block (Hello World)
- WordPress admin interface
- Modern development environment with Webpack
- SCSS support
- WordPress coding standards compliance

## Requirements

- PHP 7.4+
- WordPress 6.0+
- Node.js and npm
- Gravity Forms (optional dependency)

## Installation

1. Clone this repository to your WordPress plugins directory:
   ```bash
   cd wp-content/plugins/
   git clone [repository-url] php-practice
   ```

2. Install dependencies:
   ```bash
   cd php-practice
   npm install
   ```

3. Build the plugin:
   ```bash
   npm run build
   ```

4. Activate the plugin in WordPress admin.

## Development

### Available Scripts

- `npm run build` - Build the plugin for production
- `npm run start` - Start development mode with hot reloading
- `npm run format` - Format code using WordPress standards
- `npm run lint:css` - Lint CSS files
- `npm run lint:js` - Lint JavaScript files
- `npm run lint:php` - Lint PHP files using WordPress standards

### Project Structure

```
php-practice/
├── base.php              # Main plugin file
├── includes/
│   ├── blocks.php        # Gutenberg block registration
│   ├── hooks.php         # WordPress hooks and filters
│   └── fixes.php         # Compatibility fixes
├── src/
│   ├── blocks.js         # Gutenberg block JavaScript
│   └── blocks.scss       # Block styles
├── build/                # Built files (generated)
├── webpack.config.js     # Webpack configuration
└── package.json          # Dependencies and scripts
```

## Usage

### Gutenberg Block

The plugin includes a "Hello World" Gutenberg block that you can add to your posts and pages:

1. Edit a post or page
2. Click the "+" button to add a block
3. Search for "Hello World" in the PHP Practice category
4. Add the block and customize the message

### Admin Interface

Access the plugin settings via WordPress admin menu: **PHP Practice**

## Contributing

1. Follow WordPress coding standards
2. Use proper PHPDoc blocks
3. Test your changes thoroughly
4. Submit pull requests for review

## License

GPL-2.0-or-later

## Author

Lee-Dongwook
