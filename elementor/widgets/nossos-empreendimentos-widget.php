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
class Nossos_Empreendimentos_Elementor_Card_Widget extends \Elementor\Widget_Base { 
  

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
		return 'Empreendimento Card';
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
		return esc_html__( 'Nossos Empreendimentos Cards', 'essential-elementor-widget' );
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
		return 'https://wa.me/5511964585695?text=Ajuda+Com+o+elementor+por+favor+';
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
		return [ 'card', 'empreendimentos' ];
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
      'post_type' => 'empreendimento', // defina o slug do seu CPT aqui
      'posts_per_page' => -1,
			'orderby' => 'post_date',
			'order'   => 'ASC'         
		);

    $nossos_empreendimentos = new WP_Query($args);
		
		// var_dump($nossos_empreendimentos);
		?>
      <div class="container">
        <div class="row empreendimento-slider">
          <?php
          foreach ($nossos_empreendimentos->posts as $post) {
            setup_postdata($post);
            // use $post aqui

						$status = get_field('status_da_obra', $post->ID) == 'lancamento' ? LANCAMENTO : EM_OBRAS;
            ?>
              <div class="card-container">
									<p class="card_status"><?php echo $status ?></p>
                  <img src="<?php echo get_field('banner_imagem_pequena', $post->ID); ?>" alt="" class="card-img">
                  <h3 class="card_title"><?php echo get_the_title($post->ID); ?></h3>
                  <p class= "card_description"><?php echo get_field('conheca_o_empreendimento', $post->ID); ?></p>
									<a href="<?php echo get_permalink($post->ID); ?>" class="btn card_saiba_mais">Saiba mais</a>
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