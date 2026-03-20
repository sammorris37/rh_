<style>
    .filter__tabs {
        display:flex;
        flex-wrap:wrap;
        justify-content:center;
        gap:var(--gutter-xs);
    }

    .filter__tab {
        display:block;
        border:1px solid var(--grey-800);
        padding:var(--gutter-xxs) var(--gutter-xs);
        text-align:center;
    }

    .filter__tab.active {
        background-color:var(--grey-800);
    }

    @media only screen and (max-width: 1041px) {
    .filter__tabs li {
        min-width:fit-content;
        flex:1;
    }
    }
</style>

<div class="container container__max-width filter">
    <?php
    $current_post_type = get_post_type(get_queried_object_id());

        // default posts
        $taxonomies = get_categories(array(
            'orderby' => 'name',
            'order' => 'ASC'
        ));

    if ($taxonomies && !is_wp_error($taxonomies)) {
        echo '<ul class="filter__tabs">';
        $current_taxonomy_id = get_queried_object_id(); // ID of the current category or taxonomy term

        foreach ($taxonomies as $taxonomy) {
            $link = get_term_link($taxonomy); // Gets the link for the category or taxonomy term

            if ($current_taxonomy_id == $taxonomy->term_id) {
                echo '<li><span class="filter__tab active">' . esc_html($taxonomy->name) . '</span></li>';
            } else {
                echo '<li><a href="' . esc_url($link) . '" class="filter__tab category-link">' . esc_html($taxonomy->name) . '</a></li>';
            }
        }

        if (is_archive() && (is_post_type_archive('post') || is_category())) {
            echo '<li class="all-posts"><a href="/wp-retroharbor/blog/" class="filter__tab see-all-posts strong">See All</a></li>';
        }

        echo '</ul>';
    } else {
        echo 'No taxonomies found.';
    }
    ?>
</div>