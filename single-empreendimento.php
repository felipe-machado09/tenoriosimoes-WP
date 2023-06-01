<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper custom-wrapper" id="single-wrapper">
	<div class="" id="content" tabindex="-1">



			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single-empreendimento' );

				}
				?>

			</main>

		

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
