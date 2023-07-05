<?php 

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * Register Widgets.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_clientes_custom_widgets( $widgets_manager ) {

  require_once( __DIR__ . '/widgets/nossos-clientes-widget.php' );  // include the widget file


  $widgets_manager->register( new \Nossos_Clientes_Elementor_Card_Widget() );  // register the widget
}
add_action( 'elementor/widgets/register', 'register_clientes_custom_widgets' );

function register_empreendimentos_custom_widgets( $widgets_manager ) {

  require_once( __DIR__ . '/widgets/nossos-empreendimentos-widget.php' );  
  $widgets_manager->register( new \Nossos_Empreendimentos_Elementor_Card_Widget() );  // register the widget

}
add_action( 'elementor/widgets/register', 'register_empreendimentos_custom_widgets' );

function register_empreendimentos_slider_custom_widgets( $widgets_manager ) {

  require_once( __DIR__ . '/widgets/nossos-empreendimentos-slider-widget.php' );  
  $widgets_manager->register( new \Nossos_Empreendimentos_Slider_Elementor_Card_Widget() );  // register the widget

}
add_action( 'elementor/widgets/register', 'register_empreendimentos_slider_custom_widgets' );


function time_line_widgets( $widgets_manager ) {

  require_once( __DIR__ . '/widgets/time-line-widget.php' );  
  $widgets_manager->register( new \Time_Line_Widget() );  // register the widget

}
add_action( 'elementor/widgets/register', 'time_line_widgets' );


function ultimos_posts_widget( $widgets_manager ) {

  require_once( __DIR__ . '/widgets/ultimos-posts-widget.php' );  
  $widgets_manager->register( new \Ultimos_Posts_Widget() );  // register the widget

}
add_action( 'elementor/widgets/register', 'ultimos_posts_widget' );