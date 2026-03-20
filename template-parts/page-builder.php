<?php if (have_rows('page_builder')): ?>
    <?php while (have_rows('page_builder')): the_row(); 
        $layout = get_row_layout();
        switch ($layout) {
            case 'text-image-simple':
                $subHeading = get_sub_field('sub_heading');
                $heading = get_sub_field('heading');
                $text = get_sub_field('text');
                $link = get_sub_field('link');
                $image = get_sub_field('image');
                $width = get_sub_field('container_width');
                $background = get_sub_field('background');
                $textAlign = get_sub_field('text_alignment');
                $margin = get_sub_field('margins');
                break;
        }
        // Include the appropriate template file based on layout
        include "blocks/{$layout}.php";
    endwhile;
endif; ?>