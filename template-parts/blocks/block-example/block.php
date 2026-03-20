<?php
/* Block Fields */
$heading = get_field('heading');
$content = get_field('content');
$image = get_field('image');
?>

<section <?= theme_block_wrapper_attrs($block, [
    'container',
    'container__max-width',
    'grid',
    'grid-regular',
    'grid-2-col',
    'mb-900',
]); ?>>
    <div class="col">
        <h1><?= esc_html( $heading ); ?></h1>
        <?= $content ?>
    </div>
    <div class="col">
       <div class="img-holder img-holder-square">
            <?php if (!empty($image)) : ?>
                <img
                    src="<?= esc_url($image['url']) ?>"
                    alt="<?= esc_attr($image['alt'] ?? '') ?>"
                    loading="lazy"
                >
            <?php endif; ?>
       </div>
    </div>
</section>