<?php 
/* ==========================================
 * Mobile Nav Walker 
========================================== */
class Custom_Nav_Walker extends Walker_Nav_Menu {
    private $nav_counter = 0;

    // Start Level
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $level = $depth + 2;
        $output .= "\n$indent<div class=\"navPage\" data-nav-page=\"level-$level-{$this->nav_counter}\">\n";
        $output .= "$indent<a href=\"javascript:void(0)\" class=\"backBtn\" data-target=\"level-$depth\">\n";
        $output .= "Back to Level $depth\n";
        $output .= "</a>\n";
        $output .= "$indent<ul class=\"menu-items\">\n";

        // If there is a parent menu item, add it as the first item in this submenu
        if (is_object($args) && isset($args->parent_item) && $args->parent_item !== null) {
            $parent_item = $args->parent_item;
            $output .= $indent . '<li class="menu-item parent-link">';
            $output .= '<a href="' . esc_attr($parent_item->url) . '" class="menu-link">' . $parent_item->title . '</a>';
            $output .= '</li>';
        }
    }

    // End Level
    function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
        $output .= "$indent</div>\n";
    }

    // Start Element
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat("\t", $depth) : '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item';

        // If the item has children, store it for use in the submenu
        if (in_array('menu-item-has-children', $classes)) {
            $this->nav_counter++;
            $classes[] = 'has-children';
            $output .= $indent . '<li class="' . implode(' ', $classes) . '" data-target="level-' . ($depth + 2) . '-' . $this->nav_counter . '">';
            $output .= '<a href="javascript:void(0)" class="menu-link">' . $item->title . '</a>';

            // Ensure $args is an object and assign the current item as the parent
            if (is_object($args)) {
                $args->parent_item = $item;
            }
        } else {
            $output .= $indent . '<li class="' . implode(' ', $classes) . '">';
            $output .= '<a href="' . esc_attr($item->url) . '" class="menu-link has-link">' . $item->title . '</a>';
        }
    }

    // End Element
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";

        // Reset parent item when ending the element
        if (is_object($args) && $depth === 0) {
            $args->parent_item = null;
        }
    }
}