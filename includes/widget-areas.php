<?php
    function retroharbor_widgets_init() {
        register_sidebar( array(
            'name'          => 'Sidebar',
            'id'            => 'sidebar-1',
            'description'   => 'Add widgets',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    }
    add_action( 'widgets_init', 'retroharbor_widgets_init' );