<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="banner-container" style="background-image: url('/wp-content/uploads/2023/03/Grupo-de-mascara-1.png') ">
	<div class="banner-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="texto-header">
						<h1>ENTREGANDO SONHOS</h1>
						<p>Viva uma experiência de morar com qualidade. Conheça o empreendimento Atlantic Life.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<?php
			// Do the left sidebar check and open div#primary.
			get_template_part( 'global-templates/left-sidebar-check' );
			?>

			<main class="site-main" id="main">

				<?php

				if ( have_posts() ) {
					?>
				<header class="page-header empreendimentos-page">

					<img src="/wp-content/uploads/2023/03/Grupo-de-mascara-1.png" alt="">

					<h1>Lançamentos</h1>
					<p>Viva uma experiência de morar com qualidade. Conheça o empreendimento Atlantic Life.</p>

					<?php

						?>
				</header><!-- .page-header -->
				<div class="row">
					<?php
					// Start the loop.
					while ( have_posts() ) {
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						?>
					<div class="col-md-4">
						<?php
							get_template_part( 'loop-templates/content', 'block-empreendimento' );
							?>
					</div>
					<?php

					}
				} else {
				
				}
				?>
				</div>
			</main>

			<?php
			// Display the pagination component.
			understrap_pagination();

			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();