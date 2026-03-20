<?php
/* =========================================
Template for the single post
========================================= */

get_header();
?>

<style>
.entry-header {
    background-size:cover;
    background-position:center;
    height:450px;
}

.post-meta {
    display:flex;
    align-items:center;
    justify-content:space-between;
    flex-wrap:wrap;
    gap:var(--gutter-xxs) var(--gutter-xs);
}

.entry-content img {
    width:100%;
    height:auto;
}
</style>

<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('margin-block-l'); ?>>
    <div class="entry-header container container__max-width margin-block-s img-holder overflow-hidden">
    <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full', ['class' => 'img-responsive']);
                } else {
                    echo '<img src="' . get_template_directory_uri() . '/assets/images/placeholder.png" alt="Placeholder" loading="lazy">';
                }
            ?>
    </div>

    <div class="entry-content container container__extrathin">
    <h1 class="h2"><?php the_title(); ?></h1>

        <?php the_content(); ?>

    <div class="post-meta margin-block-m small">
        <div class="post-author-date"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a> - <?php echo get_the_date('jS M Y'); ?></div>
        <div class="post-categories">
            <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    $category_links = array();
                    $counter = 0;
                    foreach ( $categories as $category ) {
                        if ( $counter < 3 ) {
                            $category_links[] = '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
                        }
                        $counter++;
                    }
                    echo implode( ', ', $category_links );
                }
            ?>
        </div> 
    </div>

        <?php get_template_part('template-parts/global/social-share'); ?>
    </div>
</article>
<?php
    endwhile;
endif;
?>

<?php get_template_part('template-parts/blog/single-related'); ?>


<?php
get_footer();
?>
