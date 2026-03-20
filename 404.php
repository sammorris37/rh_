<?php
/* =========================================
Template for the 404
========================================= */

get_header();
?>

<div class="container content-404">
    <h1>404</h1>
    <p>This page does not exist. Return <a href="<?php echo get_home_url(); ?>">home</a></p>
</div>

<?php
get_footer();