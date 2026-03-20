<div class="container container__max-width margin-block-l">
    <div class="grid grid-3-col">
        <?php 
            // Determine if the current page is a category archive page
            $is_category_page = is_category();
            $current_category_id = $is_category_page ? get_queried_object_id() : null;

            // Prepare WP_Query arguments
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type'      => 'post', // Use 'testimonial' for testimonial post types or taxonomies, otherwise default to 'post'
                'posts_per_page' => 12, 
                'paged'          => $paged,
                'tax_query'      => array_filter(array(
                    $is_category_page ? array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => $current_category_id,
                    ) : null,
                ))
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) : 
                while ($query->have_posts()) : $query->the_post(); 
        ?>

            <?php get_template_part('template-parts/post-types/blog/article-card'); ?>

        <?php endwhile; 
        wp_reset_postdata(); 
        ?>
            <div class="pagination post-pagination">
                    <?php 
                        // Pagination function
                        $big = 999999999; // need an unlikely integer
                        echo paginate_links(array(
                            'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format'  => 'page/%#%/',
                            'current' => max(1, get_query_var('paged')),
                            'total'   => $query->max_num_pages,
                            'mid_size'        => 1,
                            'prev_text'       => __('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" class="nc-icon-wrapper"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" fill="currentColor"></path></g></svg>'),
                            'next_text'       => __('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" class="nc-icon-wrapper"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8-8-8z" fill="currentColor"></path></g></svg>'),
                        ));
                    ?>
            </div>     
        <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>
</div>