<?php
/* =========================================
Template for the single page
========================================= */

get_header();
?>


<?php if (have_rows('page_builder')) : ?>
    <?php get_template_part('template-parts/page-builder'); ?>
<?php else : ?>
   <div class="container container__extrathin margin-block-xl">
   <h1 class="h2 semistrong"><?php echo get_the_title(); ?></h1>
    <?php the_content(); ?>
   </div>
<?php endif; ?>

<?php
get_footer();