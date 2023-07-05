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
class Ultimos_Posts_Widget extends \Elementor\Widget_Base { 
  

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
		return 'Ultimos posts';
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
		return esc_html__( 'Ultimos posts', 'essential-elementor-widget' );
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
      'post_type' => 'post', // defina o slug do seu CPT aqui
      'posts_per_page' => 4,
			'orderby' => 'post_date',
			'order'   => 'ASC'         
		);

    $query = new WP_Query($args);
		
		// var_dump($nossos_empreendimentos);
		?>
      <div class="container">
        <div class="row ultimos-posts">
          <?php
          foreach ($query->posts as $post) {
            setup_postdata($post);
            // use $post aqui	
						$imgPost = get_the_post_thumbnail_url($post->ID);
						$contentExcerpt = get_the_content($post->ID);
            ?>
              <div class="col-md-3 card-container">

									<a href="<?php echo get_permalink($post->ID); ?>" >
										<img src="<?php echo $imgPost?>" alt="" id="card-img">
										<h3 class="card_title"><?php echo get_the_title($post->ID); ?></h3>
										<p class= "card_description"><?php echo exibir_resumo_qtd($contentExcerpt, 70); ?></p>
									</a>
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