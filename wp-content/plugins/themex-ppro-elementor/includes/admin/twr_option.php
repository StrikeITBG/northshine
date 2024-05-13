<?php

/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
if ( !class_exists('Twr_Settings_API_Class' ) ):
class Twr_Settings_API_Class {

    private $twr_settings_api;

    function __construct() {
        $this->twr_settings_api = new Twr_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
		add_action( 'admin_menu', array( $this, 'twr_admin_menu' ),20 );	
		add_action( 'wsa_form_top_twr_basics', array( $this, 'twr_show_button' ) );
		add_action( 'wsa_form_top_twr_advanced', array( $this, 'twr_text_tutorial' ) );
    }

    function admin_init() {

        /* set the settings */
        $this->twr_settings_api->set_sections( $this->twr_get_settings_sections() );
        $this->twr_settings_api->set_fields( $this->twr_get_settings_fields() );

        /* initialize settings */
        $this->twr_settings_api->admin_init();
    }


function twr_admin_menu(){
	add_submenu_page(
		'themes.php',
		esc_html__('poket Control','poket'),
		esc_html__('poket Element Control','poket'),
		'manage_options',
		'twr_page_slug',
		array($this,'trw_plugin_page'),
		7
	);	
	
}	
	


    function twr_get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'twr_basics',
                'title' => __( 'Elementor Element', 'poket' )
            ),
            array(
                'id'    => 'twr_advanced',
                'title' => __( 'Video Tutorial', 'poket' )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function twr_get_settings_fields() {
        $settings_fields = array(
            'twr_basics' => array(
				array(
                    'name'  => 'witr_about',
                    'label' => __( ' About Us', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),			
                array(
                    'name'  => 'witr_accordion',
                    'label' => __( ' Accordion', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
				array(
                    'name'  => 'witr_animate_text',
                    'label' => __( ' Animate Heading ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
				array(
                    'name'  => 'witr_apps_button',
                    'label' => __( ' Apps Button ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
				array(
                    'name'  => 'witr_animate_slider',
                    'label' => __( ' Animate Slider ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
				array(
                    'name'  => 'witr_banner_slider',
                    'label' => __( ' Banner Slider ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_banner_slider2',
                    'label' => __( ' Banner Slider 2 ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_blog',
                    'label' => __( ' Post Blog ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_button',
                    'label' => __( ' Buttons ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_button_classic',
                    'label' => __( ' Classic Button ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_counter',
                    'label' => __( ' Counter ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
				array(
                    'name'  => 'witr_contact',
                    'label' => __( ' Contact Form 7', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_conudowntime',
                    'label' => __( ' Countdown Time ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_carousel_image',
                    'label' => __( 'Image Carousel & Grid ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_carousel_imagetext',
                    'label' => __( ' Text & Image Carousel ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_call_to_action',
                    'label' => __( ' Call To Action ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_circle_progress',
                    'label' => __( ' Circle Progress ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_creative_tab',
                    'label' => __( ' Creative Tab ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_case',
                    'label' => __( ' Case Study ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_causes',
                    'label' => __( ' Causes Charity ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_custom_icons',
                    'label' => __( ' Custom Icons ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_event',
                    'label' => __( ' Post Event ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_feature',
                    'label' => __( ' Feature ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_feature2',
                    'label' => __( ' Feature2 ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_feature_carousel',
                    'label' => __( ' Feature Carousel ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_footer_widgets',
                    'label' => __( ' Footer Widget ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_image_comparison',
                    'label' => __( ' Image Comparison ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_list',
                    'label' => __( ' List ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_modal',
                    'label' => __( ' Modal ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
                array(
                    'name'  => 'witr_marquee_notice',
                    'label' => __( ' Notice ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
                array(
                    'name'  => 'witr_nivo_slider',
                    'label' => __( ' Nivo Custom Slider ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_portfolio',
                    'label' => __( ' Post Portfolio ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_port_slide',
                    'label' => __( 'Gallery Carousel ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_pricing',
                    'label' => __( ' Pricing Table ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_process',
                    'label' => __( ' Working Process ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_post_tab',
                    'label' => __( ' Post Tab ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_progress',
                    'label' => __( ' Progress Bar ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_post_team',
                    'label' => __( ' Post Team ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_post_testimonial',
                    'label' => __( ' Post Testimonial ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),											
                array(
                    'name'  => 'witr_section_title',
                    'label' => __( ' Title ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_social_icons',
                    'label' => __( ' Soical Icons ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_slick_slider2',
                    'label' => __( ' Slick Slider2 ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_static_tab',
                    'label' => __( ' Static Tab ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_slick_slider',
                    'label' => __( ' Slick Slider ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_swiper_slider',
                    'label' => __( ' Swiper Slider ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_social_feed',
                    'label' => __( ' Social Feed ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_service',
                    'label' => __( ' Service ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_service2',
                    'label' => __( ' Service 2 ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_post_service',
                    'label' => __( ' Post Service ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_single_image',
                    'label' => __( ' Image ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),	
				array(
                    'name'  => 'witr_image_gallery',
                    'label' => __( ' Image Gallery ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),	
				
                array(
                    'name'  => 'witr_screenshorts',
                    'label' => __( ' Carousel Screenshorts ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_shape',
                    'label' => __( ' Shape Box ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_show_detail',
                    'label' => __( ' Show Detail ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),								
                array(
                    'name'  => 'witr_text_widgets',
                    'label' => __( ' Text Widget ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_team',
                    'label' => __( ' Team ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_timeline',
                    'label' => __( ' Timeline ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),				
                array(
                    'name'  => 'witr_testimonial',
                    'label' => __( ' Testimonial ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),								
                array(
                    'name'  => 'witr_video',
                    'label' => __( ' Video', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
                array(
                    'name'  => 'witr_product',
                    'label' => __( ' Woo Products[Active Woo] ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),
				array(
                    'name'  => 'witr_flaticons',
                    'label' => __( ' flaticons icons', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'off',
					'class'=>'trw_table_tr',
                ),array(
                    'name'  => 'witr_icofont',
                    'label' => __( ' icofont icons', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'on',
					'class'=>'trw_table_tr',
                ),array(
                    'name'  => 'witr_themify',
                    'label' => __( ' themify icons', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'off',
					'class'=>'trw_table_tr',
                ),array(
                    'name'  => 'witr_aprova',
                    'label' => __( ' aprova icons ', 'poket' ),
                    'type'  => 'checkbox',
					'default'=>'off',
					'class'=>'trw_table_tr',
                ),
								
            ),
            'twr_advanced' => array(),
        );

        return $settings_fields;
    }

    function trw_plugin_page() {
        echo '<div class="wrap"> <div class="twr_plugin_pagr_inner">';
		 echo '<h2>'.esc_html__( 'poket helper widget settings','poket' ).'</h2>';
		$this->save_message();
        $this->twr_settings_api->show_navigation();
        $this->twr_settings_api->show_forms();

        echo '</div></div>';
    }

    /**
     * Get all the pages value
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }
    function save_message() {
        if( isset($_GET['settings-updated']) ) { ?>
            <div class="updated notice is-dismissible"> 
                <p><strong><?php esc_html_e('Successfully Saved Widget.', 'poket') ?></strong></p>
            </div>
            
            <?php
        }
    }	

    function twr_show_button(){
        ob_start();
        ?>
            <span class="trw_select_widgeta"><?php esc_html_e( 'Show/Hide All Widget', 'poket' );?></span>
        <?php
        echo ob_get_clean();
    }	
	
	 function twr_text_tutorial(){
        ob_start();
        ?>		
			<div class="twr_video_tutorial">
			
				<ul>
					<li><a  target="_blank" href="<?php echo esc_url('https://themexbd.com/themex/documentation/dw.html');?>"><?php esc_html_e( 'Documenation', 'poket' );?></a></li>
					<li><a  target="_blank" href="<?php echo esc_url('https://www.youtube.com/channel/UCSLm_h-xmahiNZuZYoOwA9A/playlists');?>"><?php esc_html_e( 'Video Tutorialt', 'poket' );?></a></li>
					<li><a  target="_blank" href="<?php echo esc_url('https://www.templatemonster.com/authors/themex/');?>"><?php esc_html_e( 'Theme Profile', 'poket' );?></a></li>		
				</ul>
			
			</div>
        <?php
        echo ob_get_clean();
    }	
	

}
endif;
new Twr_Settings_API_Class();