<article id="post-<?php the_ID(); ?>" class="article__card">
    <div class="img-holder">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full', ['class' => 'img-responsive']);
                } else {
                    echo '<img src="' . get_template_directory_uri() . '/assets/images/placeholder.png" alt="Placeholder" loading="lazy">';
                }
            ?>
        </a>
    </div>
    <div class="entry-content">
        <div class="meta-details small">
            <?php 
                $categories = get_the_category();
                if (!empty($categories)) {
                    echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                }
            ?>
        </div>
        <h6 class="entry-title">
            <a href="<?php the_permalink(); ?>" class="post-link"><?php the_title(); ?></a>
        </h6>
        <?php truncate_post(15); ?>
    </div>
</article>