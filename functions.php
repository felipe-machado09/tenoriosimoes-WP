<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}

function add_slick_scripts() {
	wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
	wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
}
add_action( 'wp_enqueue_scripts', 'add_slick_scripts' );

function add_empreendimento_script() {
  if (is_singular('empreendimento')) {
		wp_enqueue_script( 'empreendimento', get_template_directory_uri() . '/js/empreendimento.js', array('jquery'), '1.0.0', true );
		
	}
	wp_enqueue_style( 'empreendimento', get_template_directory_uri() . '/css/empreendimento.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'add_empreendimento_script' );

function add_clientes_script() {
	wp_enqueue_script( 'clientes', get_template_directory_uri() . '/js/clientes.js', array('jquery'), '1.0.0', true );
	wp_enqueue_style( 'clientes', get_template_directory_uri() . '/css/clientes.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'add_clientes_script' );

function add_empreendimento_home_slider_script() {
	wp_enqueue_script( 'empreendimento-home-slider', get_template_directory_uri() . '/js/empreendimento-home-slider.js', array('jquery'), '1.0.0', true );
	wp_enqueue_style( 'empreendimento-home-slider', get_template_directory_uri() . '/css/empreendimento-home-slider.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'add_empreendimento_home_slider_script' );

function add_timeline_script() {
	wp_enqueue_script( 'timeline', get_template_directory_uri() . '/js/timeline.js', array('jquery'), '1.0.0', true );
	wp_enqueue_style( 'timeline', get_template_directory_uri() . '/css/timeline.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'add_timeline_script' );

function add_site_script() {
	wp_enqueue_script( 'site', get_template_directory_uri() . '/js/site.js', array('jquery'), '1.0.0', true );
	wp_enqueue_style( 'site', get_template_directory_uri() . '/css/site.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'add_site_script' );


// Register Custom Post Type inside path plugins\empreendimentos-cpt.php
$empreendimento = get_theme_file_path( 'plugins/empreendimentos-cpt.php' );

if ( file_exists( $empreendimento ) ) {
	require_once $empreendimento;
}

// Register Custom Post Type inside path plugins\empreendimentos-cpt.php
$nossos_clientes = get_theme_file_path( 'plugins/nossos-clientes-cpt.php' );

if ( file_exists( $nossos_clientes ) ) {
	require_once $nossos_clientes;
}


// Register Custom Post Type inside path plugins\empreendimentos-cpt.php
$elementorWidget = get_theme_file_path( 'elementor/elementor.php' );

if ( file_exists( $elementorWidget ) ) {
	require_once $elementorWidget;
}



function is_mobile() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	
	$mobile_keywords = [
			'Android',
			'webOS',
			'iPhone',
			'iPad',
			'iPod',
			'BlackBerry',
			'Windows Phone'
	];
	
	foreach ($mobile_keywords as $keyword) {
			if (stripos($user_agent, $keyword) !== false) {
					return true; // É um dispositivo móvel
			}
	}
	
	return false; // Não é um dispositivo móvel
}


function enqueue_galleria_scripts() {
	if (is_singular('empreendimento')) {

		// Registrar e enfileirar o arquivo de estilo do Galleria.js
		wp_enqueue_style('galleria-style', 'https://cdnjs.cloudflare.com/ajax/libs/galleria/1.6.1/themes/classic/galleria.classic.min.css');

		// Registrar e enfileirar o arquivo JavaScript do Galleria.js
		wp_enqueue_script('galleria-script', 'https://cdnjs.cloudflare.com/ajax/libs/galleria/1.6.1/galleria.min.js', array('jquery'), '1.6.1', true);

		// Adicionar a inicialização da Galleria.js ao final do arquivo JavaScript personalizado
		wp_add_inline_script('galleria-script', '
			jQuery(document).ready(function($) {
			
			});
		');
	}
}
add_action('wp_enqueue_scripts', 'enqueue_galleria_scripts');

function exibir_resumo($texto) {
  if (strlen($texto) > 100) {
    $texto = substr($texto, 0, 100) . '...';
  }
  echo $texto;
}

function exibir_resumo_qtd($texto, $qtd) {
  if (strlen($texto) > $qtd) {
    $texto = substr($texto, 0, $qtd) . '...';
  }
  echo $texto;
}

function gutemberg_block_social_links(){

	wp_register_script('custom-social-links', get_template_directory_uri() . '/js/gutemberg-block-social-links.js', array('wp-blocks'));
	register_block_type( 'understrap-blocks/social-links', array(
		'editor_script' => 'custom-social-links',
	) );
}


// Creating enclosing shortcode with parameters
function custom_social_links($attr, $content){
 
	$args = shortcode_atts( array(
	 
					'instagram' => '#',
					'facebook' => '#',
					'youtube' => '#'

			), $attr );

	$output = '<div class="social-links">';
	$output .= '<a href="'.$args['instagram'].'" target="_blank"><i class="fab fa-instagram"></i></a>';
	$output .= '<a href="'.$args['facebook'].'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
	$output .= '<a href="'.$args['youtube'].'" target="_blank"><i class="fab fa-youtube"></i></a>';
	$output .= '</div>';

	return $output;

}

add_shortcode( 'custom_social_links', 'custom_social_links' );


function exibir_ultimos_posts($atts) {
	$args = array(
			'post_type'      => 'post',
			'posts_per_page' => 4,
	);
	
	$query = new WP_Query($args);
	
	if ($query->have_posts()) {
			$output = '<div class="row">';
			
			while ($query->have_posts()) {
					$query->the_post();
					
					$output .= '<div class="col-md-3">';
					$output .= '<div class="last-posts">';
					$output .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), 'full') . '</a>';
					$output .= '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
					// $output .= '<p>' .  exibir_resumo_qtd(get_the_content(), 30) . '</p>';
					$output .= '</div>';
					$output .= '</div>';
			}
			
			$output .= '</div>';
			
			wp_reset_postdata();
			
			return $output;
	}
	
	return 'Nenhum post encontrado.';
}
add_shortcode('ultimos_posts', 'exibir_ultimos_posts');

