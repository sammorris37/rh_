<?php
    function truncate_post($amount, $echo = true, $post = '') {
        $post = empty($post) ? get_the_ID() : $post;
        $post = get_post($post);
        if (empty($post)) return;

        $text = strip_tags($post->post_content); // Strip HTML tags
        $text = wp_trim_words($text, $amount); // Truncate text

        if ($echo)
            echo $text;
        else
            return $text;
    }