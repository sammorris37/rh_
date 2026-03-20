<?php
/* =========================================
Template for the header
========================================= */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header class="site-header container container__full-width padding-block-s">
	<div class="container container__max-width">
		<button class="openDrawer drawerBtn" id="openDrawer">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
				<g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" class="nc-icon-wrapper">
					<path d="M3 12h18"></path>
					<path d="M3 6h18"></path>
					<path d="M3 18h18"></path>
				</g>
			</svg>
		</button>
	
		<div class="MobileDrawerNav no-scrollbars" id="MobileDrawerNav">
			<div class="container container__max-width">
				<button class="closeDrawer drawerBtn" id="closeDrawer">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
						<g fill="none" class="nc-icon-wrapper">
							<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" fill="currentColor"></path>
						</g>
					</svg>
				</button>
				<nav>
					<?php
						wp_nav_menu(array(
							'theme_location' => 'primary', // replace with your menu location
							'menu_class' => 'menu-items',
							'walker' => new Custom_Nav_Walker()
						));
					?>
				</nav>
			</div>
		</div>
	</div>
</header>


<main id="content" class="site-content">
	
