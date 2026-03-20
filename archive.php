<?php
/* =================================================================
The template for displaying all archive
================================================================= */
get_header();
?>

<?php get_template_part('template-parts/blog/archive-header'); ?>

<?php get_template_part('template-parts/blog/archive-tabs'); ?>

<?php get_template_part('template-parts/blog/archive-loop'); ?>

<?php
get_footer();