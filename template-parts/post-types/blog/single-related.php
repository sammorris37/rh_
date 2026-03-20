<div class="container container__max-width margin-block-l">
    <h2 class="h3">Related Posts</h2>
    <div class="related-posts grid grid-3-col">
        <?php
            $current_post_id = get_the_ID();
            $current_categories = get_the_category();
            $category_ids = [];

            if (!empty($current_categories)) {
                foreach ($current_categories as $category) {
                    $category_ids[] = $category->term_id;
                }
            }

            $args = array(
                'posts_per_page' => 3,
                'category__in' => $category_ids,
                'post__not_in' => array($current_post_id),
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>

                <?php get_template_part('template-parts/blog/article-card'); ?>

            <?php endwhile; wp_reset_postdata(); else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>
</div>