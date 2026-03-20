<div class="container container__full-width">
    <div class="container__max-content margin-block-l center-t">
    <h1>
    <?php if ( is_category() ) : ?>
        <?php echo single_cat_title( '', false ); ?>
    <?php else : ?>
        <?php echo get_the_title( get_option('page_for_posts') ); ?>
    <?php endif; ?>
    </h1>
    </div>
</div>