<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Essential Elementor Card Widget.
 *
 * Elementor widget that inserts a card with title and description.
 *
 * @since 1.0.0
 */
class Nossos_Clientes_Elementor_Card_Widget extends \Elementor\Widget_Base { 
  

  	/**
	 * Get widget name.
	 *
	 * Retrieve Card widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Clientes Card';
	}


	/**
	 * Get widget title.
	 *
	 * Retrieve Card widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Nossos Clientes Cards', 'essential-elementor-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Card widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image-box';
	}


	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://essentialwebapps.com/category/elementor-tutorial/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Card widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the Card widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'card', 'clientes' ];
	}



	/**
	 * Register Card widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() { 
		// our control function code goes here.

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'essential-elementor-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

	

		$this->end_controls_section();

	}

	/**
	 * Render Card widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() { 

		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();

		// get the individual values of the input

    $args = array(
      'post_type' => 'clientes', // defina o slug do seu CPT aqui
      'posts_per_page' => 4                                                                                               , // exibe todos os posts do CPT
    );
  
    $nossos_clientes = new WP_Query($args);


		?>
      <div class="container">
        <div class="row cliente-slider">
          <?php
          foreach ($nossos_clientes->posts as $post) {
            setup_postdata($post);
            // use $post aqui
            ?>
              <div class="card-container">
              	<div class="card-content">
									<div class="img-container">
                  	<img src="<?php echo get_field('cliente_imagem', $post->ID); ?>" alt="" class="card-img">
									</div>
                  <h3 class="card_title txt-branca"><?php echo get_field('nome', $post->ID); ?></h3>
                  <p class= "card_description"><?php echo get_field('depoimento', $post->ID); ?></p>
              </div>
              </div>
            <?php
          }
            wp_reset_postdata();
          ?>
          
        </div>
        <!-- Start rendering the output -->
        <!-- End rendering the output -->

        <?php
		

	}						


}