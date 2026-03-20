<?php 
/* ======================================================
 * Block Register
====================================================== */

add_action('init', function () {
    $blocks = glob(get_template_directory() . '/template-parts/blocks/*/block.json');

    foreach ($blocks as $block) {
        register_block_type(dirname($block));
    }
});

/* ======================================================
 * Block Section Title 
====================================================== */

add_filter('block_categories_all', function ($categories, $editor_context) {

    $custom = [
        'slug'  => 'customblocks',
        'title' => __('Custom Blocks', 'customblocks'),
        // 'icon' => 'star-filled', // optional (WP version dependent)
    ];

    // Remove any existing customblocks entry to avoid duplicates
    $categories = array_values(array_filter($categories, function ($cat) {
        return isset($cat['slug']) && $cat['slug'] !== 'customblocks';
    }));

    // Put your category at the top
    array_unshift($categories, $custom);

    return $categories;
}, 9, 2);

/* ======================================================
 * Build standard wrapper attributes for ACF blocks.
====================================================== */
function theme_block_wrapper_attrs(array $block, array $extra_classes = []): string {
    // ID: use anchor or replace block_ with section_
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    } else {
        $id = str_replace('block_', 'section_', $block['id'] ?? '');
    }

    // Block name as class: namespace/block-example → block-example
    $name = '';
    if (!empty($block['name'])) {
        $parts = explode('/', $block['name']);
        $slug  = end($parts);
        $name  = sanitize_html_class($slug);
    }

    $classes = array_filter(array_merge(
        ['block', $name],
        $extra_classes,
        !empty($block['className']) ? preg_split('/\s+/', $block['className']) : []
    ));

    $attrs  = $id ? ' id="' . esc_attr($id) . '"' : '';
    $attrs .= ' class="' . esc_attr(implode(' ', $classes)) . '"';

    return $attrs;
}

/* ======================================================
 * Disable default Gutenberg blocks
 * Allow only blocks registered from /template-parts/blocks/
====================================================== */

add_filter('allowed_block_types_all', function ($allowed_block_types, $editor_context) {
    $allowed = [];

    $blocks = glob(get_template_directory() . '/template-parts/blocks/*/block.json');

    foreach ($blocks as $block) {
        $data = json_decode(file_get_contents($block), true);

        if (!empty($data['name'])) {
            $allowed[] = $data['name'];
        }
    }

    return $allowed;
}, 10, 2);