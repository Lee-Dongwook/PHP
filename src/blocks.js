/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';

/**
 * Register the hello world block
 */
registerBlockType('php-practice/hello-world', {
    apiVersion: 3,
    title: __('Hello World', 'php-practice'),
    description: __('A simple hello world block for PHP practice.', 'php-practice'),
    category: 'php-practice',
    icon: 'smiley',
    supports: {
        html: false,
        align: ['wide', 'full'],
    },
    attributes: {
        message: {
            type: 'string',
            default: __('Hello from PHP Practice!', 'php-practice'),
        },
    },
    edit: function Edit({ attributes, setAttributes }) {
        const blockProps = useBlockProps();
        const { message } = attributes;

        return (
            <div {...blockProps}>
                <RichText
                    tagName="p"
                    value={message}
                    onChange={(newMessage) => setAttributes({ message: newMessage })}
                    placeholder={__('Enter your message...', 'php-practice')}
                />
            </div>
        );
    },
    save: function Save({ attributes }) {
        const blockProps = useBlockProps.save();
        const { message } = attributes;

        return (
            <div {...blockProps}>
                <RichText.Content tagName="p" value={message} />
            </div>
        );
    },
});
