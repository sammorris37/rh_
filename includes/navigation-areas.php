<?php
    function retroharbor_nav_init() {
        register_nav_menus( array(
            'menu-1' => 'Primary Menu',
            'primary' => 'Mobile Menu'
        ) );
    }
    add_action( 'init', 'retroharbor_nav_init' );