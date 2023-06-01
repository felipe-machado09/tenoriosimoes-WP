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
class Time_Line_Widget extends \Elementor\Widget_Base { 
  

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
		return 'Time Line Card';
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
		return esc_html__( 'Time Line Card', 'essential-elementor-widget' );
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
		return [ 'card', 'timeline' ];
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
          'timeline_section',
          [
              'label' => __( 'Timeline', 'elementor' ),
              'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
          ]
      );
  
      $this->add_control(
          'timeline_items',
          [
              'label' => __( 'Timeline Items', 'elementor' ),
              'type' => \Elementor\Controls_Manager::REPEATER,
              'default' => [
                  [
                      'year' => '2020',
                      'title' => 'Event Title',
                      'description' => 'Event Description',
                  ],
              ],
              'fields' => [
                  [
                      'name' => 'year',
                      'label' => __( 'Year', 'elementor' ),
                      'type' => \Elementor\Controls_Manager::TEXT,
                      'default' => '2020',
                  ],
                  [
                      'name' => 'title',
                      'label' => __( 'Title', 'elementor' ),
                      'type' => \Elementor\Controls_Manager::TEXT,
                      'default' => 'Event Title',
                  ],
                  [
                      'name' => 'description',
                      'label' => __( 'Description', 'elementor' ),
                      'type' => \Elementor\Controls_Manager::TEXTAREA,
                      'default' => 'Event Description',
                  ],
              ],
              'title_field' => '{{{ year }}} - {{{ title }}}',
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
    $settings = $this->get_settings_for_display();
    $timeline_items = $settings['timeline_items'];
    
    if ( ! empty( $timeline_items ) ) {

        ?>
        <section class="section-timeline">


          <ul class="timeline">
              <?php 
              $left = true;

              foreach ( $timeline_items as $timeline_item ) { 


                ?>
                  <li class="<?php $left == true ? print 'left' : print 'right'; ?>">

											<?php if($left == true){ ?>
												<div class="container">
												<div class="row">
													<div class="col-md-3">
														<div class="timeline-year"><?php echo esc_html( $timeline_item['year'] ); ?></div>
													</div>
													<div class="col-md-9">
														<div class="timeline-content">

															<h4><?php echo esc_html( $timeline_item['title'] ); ?></h4>
															<p><?php echo esc_html( $timeline_item['description'] ); ?></p>
														</div>
													</div>
												</div>
												</div>
											<?php }else{ ?>
												<div class="container">
													<div class="row">
														<?php if(is_mobile()){ ?>

															<div class="col-md-3">
																<div class="timeline-year"><?php echo esc_html( $timeline_item['year'] ); ?></div>
															</div>
															<div class="col-md-9">
																<div class="timeline-content">

																	<h4><?php echo esc_html( $timeline_item['title'] ); ?></h4>
																	<p><?php echo esc_html( $timeline_item['description'] ); ?></p>
																</div>
															</div>
														<?php }	else {
															?>
															<div class="col-md-9">
															<div class="timeline-content">

																<h4><?php echo esc_html( $timeline_item['title'] ); ?></h4>
																<p><?php echo esc_html( $timeline_item['description'] ); ?></p>
															</div>
														</div>
														<div class="col-md-3">
															<div class="timeline-year"><?php echo esc_html( $timeline_item['year'] ); ?></div>
														</div>
														<?php }	?>  	
												
												
														</div>
												</div>
											<?php } ?>
											


                  </li>
              <?php 

                if($left == true){
                  $left = false;
                }else{
                  $left = true;
                }
            } 
            ?>
          </ul>
        </section>
        <?php
    }

    ?>


<?php
  }


}