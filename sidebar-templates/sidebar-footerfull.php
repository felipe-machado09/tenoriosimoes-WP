<?php
/**
 * Sidebar setup for footer full
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>
	<!-- ******************* The Footer Full-width Widget Area ******************* -->
<div class="wrapper" id="wrapper-footer-full" role="complementary">
	<div class="container">
	<div class="row">
		<?php if ( is_active_sidebar( 'rodape_1' ) ) : ?>
				<div class="col-md-3">
					<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

						<div class="row">

							<?php dynamic_sidebar( 'rodape_1' ); ?>

						</div>

					</div>
				</div>
			<?php
		endif;
		?>
		<?php if ( is_active_sidebar( 'rodape_2' ) ) : ?>
				<div class="col-md-3">
					<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

						<div class="row">

							<?php dynamic_sidebar( 'rodape_2' ); ?>

						</div>

					</div>
				</div>
			<?php
		endif;
		?>
		<?php if ( is_active_sidebar( 'rodape_3' ) ) : ?>
				<div class="col-md-3">
					<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

						<div class="row">

							<?php dynamic_sidebar( 'rodape_3' ); ?>

						</div>

					</div>
				</div>
			<?php
		endif;
		?>
		<?php if ( is_active_sidebar( 'rodape_4' ) ) : ?>
				<div class="col-md-3">
					<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

						<div class="row">

							<?php dynamic_sidebar( 'rodape_4' ); ?>

						</div>

					</div>
				</div>
			<?php
		endif;
		?>
			</div><!-- row -->	
	</div><!-- #container -->	
</div><!-- #wrapper-footer-full -->
