<?php
/* =========================================
Template for the search results
========================================= */

get_header();
?>

	<?php 
	if ( have_posts() ) : ?>

		<header class="page-header">
			<h1>Results: <?php echo get_search_query(); ?></h1>
		</header>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'search' );

		endwhile;
	
	else: ?>

		<p>Sorry, but nothing matched your search terms.</p>
	
	<?php
	endif;
	?>


<?php
get_footer();