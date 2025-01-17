<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Case extends Widget_Base {

    public function get_name() {
        return 'witr_section_case';
    }
  
    public function get_title() {
        return esc_html__( 'Case Study', 'poket' );
    }

    public function get_icon() {
        return 'poket_icon eicon-featured-image';
    }
    public function get_style_depends() {
        return [ 'wcase' ];
    }	
    public function get_categories() {
        return [ 'witr_tname' ];
    }

    protected function register_controls() {

			/* === w_case start === */
			$this->start_controls_section(
				'witr_field_display_case',
				[
					'label' => esc_html__( ' Case Study Options', 'poket' ),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);	

				/* style check  witr_style_feature */
				$this->add_control(
					'witr_style_case',
					[
						'label' => esc_html__( 'Case style', 'poket' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'1' => esc_html__( 'style 1', 'poket' ),
							'2' => esc_html__( 'style 2', 'poket' ),
						],
						'default' => '1',
					]
				);		
			
					/* Box Position */				
					$this->add_control(
						'witr_text_ltc',
						[
							'label' => esc_html__( 'Box Position', 'poket' ),
							'type' => Controls_Manager::CHOOSE,
							'options' => [
								'left' => [
									'title' => esc_html__( 'Left', 'poket' ),
									'icon' => 'eicon-h-align-left',
								],
								'center' => [
									'title' => esc_html__( 'Center', 'poket' ),
									'icon' => 'eicon-v-align-top',
								],
								'right' => [
									'title' => esc_html__( 'Right', 'poket' ),
									'icon' => 'eicon-h-align-right',
								],
							],
							'separator'=>'before',
							'selectors' => [
								'{{WRAPPER}} .witr_content_casem' => 'text-align: {{VALUE}}',
							],							
						]
					);
					/* witr_image */
					$this->add_control(
						'witr_case_image',
						[
							'label' => esc_html__( 'Choose Image', 'poket' ),
							'type' => Controls_Manager::MEDIA,
							'default' => [
								'url' => Utils::get_placeholder_image_src(),
							],							
						]
					);					
					/* witr_case_title */	
					$this->add_control(
						'witr_case_title',
						[
							'label' => esc_html__( 'Bottom Title', 'poket' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use title, remove the text from field', 'poket' ),
							'default' => esc_html__( 'Creative Idea Buildup', 'poket' ),
							'separator'=>'before',
							'placeholder' => esc_attr__( 'Type your case title here', 'poket' ),						
						]
					);
					/* witr_service_title_link */	
					$this->add_control(
						'witr_case_title_link',
						[
							'label' => esc_html__( 'Title Link', 'poket' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert Title link here.','poket'),
							'placeholder' => esc_attr__( 'https://your-link.com', 'poket' ),
							'show_external' => true,
							
						]
					);					
					/* witr_case_content	*/
					$this->add_control(
						'witr_case_content',
						[
							'label' => esc_html__( ' Top Title', 'poket' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Not use content text, remove the text from field', 'poket' ),
							'default' => esc_html__( 'DEVELOPMENT', 'poket' ),
							'separator'=>'before',
							'placeholder' => esc_attr__( 'Type your content here', 'poket' ),
						]
					);										

					/* witr_show_button */
					$this->add_control(
						'witr_show_button',
						[
							'label' => esc_html__( 'Show Button', 'poket' ),
							'type' => Controls_Manager::SWITCHER,
							'label_on' => esc_html__( 'Show', 'poket' ),
							'label_off' => esc_html__( 'Hide', 'poket' ),
							'return_value' => 'yes',
							'default' => 'yes',
							'separator'=>'before',							
						]
					);
					
				/* witr_case_button	*/
					$this->add_control(
						'witr_case_button',
						[
							'label' => esc_html__( 'Button text', 'poket' ),
							'label_block' =>true,
							'type' => Controls_Manager::TEXT,
							'description' =>esc_html__('Insert button text. It hidden when field blank.','poket'),							
							'default' => esc_html__( 'Read More', 'poket' ),
							'placeholder' => esc_attr__( 'Type your button text here', 'poket' ),
							'condition' => [						
								'witr_show_button' => 'yes',
							],							
						]
					);
				/*  witr_button_link */	
					$this->add_control(
						'witr_button_link',
						[
							'label' => esc_html__( 'Button Link', 'poket' ),
							'type' => Controls_Manager::URL,
							'description' =>esc_html__('Insert button link here.','poket'),
							'placeholder' => esc_attr__( 'https://your_site.com', 'poket' ),
							'show_external' => true,
							'default' => [
								'url' => '#',
							],	
							'condition' => [
								'witr_show_button' => 'yes',
							],							
						]
					);
				/* witr_show_icon witr_icon_item */
					$this->add_control(
						'witr_show_icon',
						[
							'label' => esc_html__( 'Show Icon', 'poket' ),
							'type' => Controls_Manager::SWITCHER,								
							'label_on' => esc_html__( 'Show', 'poket' ),
							'label_off' => esc_html__( 'Hide', 'poket' ),
							'separator'=>'before',
							'return_value' => 'yes',
							'default' => 'yes',							
						]
					);				
					/* witr_icon_item */					
					$this->add_control(
						'witr_icon_item',
						[
							'label' => esc_html__( 'Icon', 'poket' ),
							'type' => Controls_Manager::ICONS,
							'description' => esc_html__( 'Change icon here, For this, click on the library field And Not use Icon,Click On The Hide Option', 'poket' ),
							'fa4compatibility' => 'icon',
							'default' => [
								'value' => 'fas fa-arrow-circle-right',
								'library' => 'fa-solid',
							],
							'condition' => [
								'witr_show_icon' => 'yes',
							],							
						]
					);		
		
					
			$this->end_controls_section();
			/* === end w_case ===  */

			
	   /*===========================================================================================
										START TO STYLE
		=============================================================================================*/			
		/*=== start Single Box style ====*/
		$this->start_controls_section(
			'section_single_caseo',
			[
				'label' => esc_html__( 'Box Option', 'poket' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);
			/* heading2 */
			$this->add_control(
				'witr_bvalheadeingf2_color',
				[
					'label' => esc_html__( 'Image Overlay color', 'poket' ),
					'type' => Controls_Manager::HEADING,
					'default' =>'heading',
					'separator'=>'before',					
				]
			);				
			/* box background */
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'witr_bvbgfh2_background',
					'label' => esc_html__( 'Background', 'poket' ),
					'types' => ['classic','gradient'],
					'selector' => '{{WRAPPER}} .witr_case_image::before',					
				]
			);		
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadowsbox',
						'label' => esc_html__( 'Box Shadow', 'poket' ),
						'selector' => '{{WRAPPER}} .all_case_color',
					]
				);						
				/* box padding */
				$this->add_responsive_control(
					'witr_box_padding',
					[
						'label' => esc_html__( ' Margin', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_case_color' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);	
				/* box padding */
				$this->add_responsive_control(
					'witr_box_paddingei',
					[
						'label' => esc_html__( ' Padding', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .all_case_color' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],						
					]
				);				
			
		

		$this->end_controls_section();
		/*=== start Single Box style ====*/		

		/*=== start witr content style ====*/
		$this->start_controls_section(
			'witr_style_option_content',
			[
				'label' => esc_html__( 'Top Title Color Option', 'poket' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_content_color',
				[
					'label' => esc_html__( 'Color', 'poket' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_SECONDARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_case_color p' => 'color: {{VALUE}}',
					],
				]
			);

			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_content_typography',
					'label' => esc_html__( 'Typography', 'poket' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
					],
					'selector' => '{{WRAPPER}} .all_case_color p',
				]
			);		

			/* content margin */
			$this->add_responsive_control(
				'witr_content_margin',
				[
					'label' => esc_html__( 'Margin', 'poket' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_case_color p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* content padding */
			$this->add_responsive_control(
				'witr_content_padding',
				[
					'label' => esc_html__( 'Padding', 'poket' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_case_color p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr content style ====*/
		
		

		/*=== start witr_title style ====*/
		$this->start_controls_section(
			'witr_style_option_title',
			[
				'label' => esc_html__( 'Bottom Title Color Option', 'poket' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_title_color',
				[
					'label' => esc_html__( 'Color', 'poket' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .all_case_color h3,{{WRAPPER}} .all_case_color h3 a' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_title_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'poket' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .all_case_color h3:hover,{{WRAPPER}} .all_case_color h3 a:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_ttpy_color',
					'label' => esc_html__( 'Typography', 'poket' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
					'selector' => '{{WRAPPER}} .all_case_color h3,{{WRAPPER}} .all_case_color h3 a',
				]
			);		
			
			/* title margin */
			$this->add_responsive_control(
				'witr_title_margin',
				[
					'label' => esc_html__( 'Margin', 'poket' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_case_color h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			/* title padding */
			$this->add_responsive_control(
				'witr_title_padding',
				[
					'label' => esc_html__( 'Padding', 'poket' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .all_case_color h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/

		/*=== start witr button style ====*/
		$this->start_controls_section(
			'witr_style_option_button',
			[
				'label' => esc_html__( 'Button Color Option', 'poket' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_button' => 'yes',
				],				
			]
		);		 

			/*=== start button_tabs style ====*/
			$this->start_controls_tabs( 'button_colors' );
				/*=== start button_normal style ====*/
				$this->start_controls_tab(
					'witr_button_colors_normal',
					[
						'label' => esc_html__( 'Normal', 'poket' ),
					]
				);
					/* color */
					$this->add_control(
						'witr_button_color',
						[
							'label' => esc_html__( 'Text Color', 'poket' ),
							'type' => Controls_Manager::COLOR,
							'global' => [
								'default' => Global_Colors::COLOR_ACCENT,
							],							
							'separator'=>'before',
							'selectors' => [
								'{{WRAPPER}} .witr_case_btnb a' => 'color: {{VALUE}}',
							],
						]
					);				
					/* Button background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_button_background',
							'label' => esc_html__( 'button Background', 'poket' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .witr_case_btnb a',
						]
					);
					/* typograohy color */			
					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'witr_button_typography',
							'label' => esc_html__( 'Typography', 'poket' ),
							'global' => [
								'default' => Global_Typography::TYPOGRAPHY_ACCENT,
							],
							'selector' => '{{WRAPPER}} .witr_case_btnb a',
						]
					);	
	
					/* witr_border_style */
					$this->add_control(
						'witr_border_btn_style',
						[
							'label' => esc_html__( 'Border Style', 'poket' ),
							'type' => Controls_Manager::SELECT,
							'options' => [
								'none' => esc_html__( 'none', 'poket' ),
								'solid' => esc_html__( 'Solid', 'poket' ),
								'double' => esc_html__( 'Double', 'poket' ),
								'dotted' => esc_html__( 'Dotted', 'poket' ),
								'dashed' => esc_html__( 'Dashed', 'poket' ),
								'default' => esc_html__( 'Default', 'poket' ),
							],
							'default' => 'default',
							'selectors' => [
								'{{WRAPPER}} .witr_case_btnb a' => 'border-style: {{VALUE}}',
							],
						]
					);		
					/* witr border */
					$this->add_control(
						'witr_borde_btn',
						[
							'label' => esc_html__( 'Border', 'poket' ),
							'type' => Controls_Manager::DIMENSIONS,
							'selectors' => [
								'{{WRAPPER}} .witr_case_btnb a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'condition' => [
								'witr_border_btn_style' => ['solid','double','dotted','dashed','default'],
							],
						]							
						
					);
					/* border_color */
					$this->add_control(
						'witr_border_btn_color',
						[
							'label' => esc_html__( 'Border Color', 'poket' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .witr_case_btnb a' => 'border-color: {{VALUE}}',
							],
							'condition' => [
								'witr_border_btn_style' => ['solid','double','dotted','dashed','default'],
							],
						]
					);
					/* border_radius */
					$this->add_control(
						'witr_border_btn_radius',
						[
							'label' => esc_html__( 'Border Radius', 'poket' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors' => [
								'{{WRAPPER}} .witr_case_btnb a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'condition' => [
								'witr_border_btn_style' => ['solid','double','dotted','dashed','default'],
							],							
						]
					);
						
					/* button margin */
					$this->add_responsive_control(
						'witr_button_margin',
						[
							'label' => esc_html__( 'Margin', 'poket' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .witr_case_btnb a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					/* button padding */
					$this->add_responsive_control(
						'witr_button_padding',
						[
							'label' => esc_html__( 'Padding', 'poket' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .witr_case_btnb a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);					
				

				$this->end_controls_tab();
				/*=== end button normal style ====*/
			
				/*=== start button hover style ====*/
				$this->start_controls_tab(
					'witr_button_colors_hover',
					[
						'label' => esc_html__( 'Button Hover', 'poket' ),
					]
				);

					/* hover_color */
					$this->add_control(
						'witr_button_hover_color',
						[
							'label' => esc_html__( 'Text Hover Color', 'poket' ),
							'type' => Controls_Manager::COLOR,
							'separator'=>'before',
							
							'selectors' => [
								'{{WRAPPER}} .witr_case_btnb a:hover' => 'color: {{VALUE}}',
							],
						]
					);					
						
					/* Button Hover background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_button_hover_background',
							'label' => esc_html__( 'button Hover Background', 'poket' ),
							'types' => ['classic','gradient'],
							'selector' => '{{WRAPPER}} .witr_case_btnb a:hover',
						]
					);
					/* witr_hoverborder_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_hoverborder_style',
							'label' => esc_html__( 'Button Hover Border', 'poket' ),
							'selector' => '{{WRAPPER}} .witr_case_btnb a:hover',
						]
					);
					
					
					
					$this->end_controls_tab();
					/*=== end button hover style ====*/
			$this->end_controls_tabs();
			/*=== end button_tabs style ====*/			
		 $this->end_controls_section();
		/*=== end  witr button style ====*/		


		/*=== start Text Box style ====*/
		$this->start_controls_section(
			'witr_style_ss_option',
			[
				'label' => esc_html__( 'Text Box Color Optiton', 'poket' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);		
		
				/* box background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_box_background',
						'label' => esc_html__( 'box Background', 'poket' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_content_casem',
					]
				);
				/* Box background heading 2 */
				$this->add_responsive_control(
					'witr_box2_hover',
					[
						'label' => esc_html__( 'Background Hover', 'poket' ),
						'type' => Controls_Manager::HEADING,
					]
				);				
				/* box background hover */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_box2_hover_background',
						'label' => esc_html__( 'box2 Hover Background', 'poket' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .witr_content_casem:hover',
					]
				);				
				/* border_radius */
				$this->add_control(
					'witr_borderc_radius',
					[
						'label' => esc_html__( 'Border Radius', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .witr_content_casem' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_cdshadowsbox',
						'label' => esc_html__( 'Box Shadow', 'poket' ),
						'selector' => '{{WRAPPER}} .witr_content_casem',
					]
				);							
				/* Box margin */
				$this->add_responsive_control(
					'witr_boxc_margin',
					[
						'label' => esc_html__( ' Margin', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .witr_content_casem' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* Box padding */
				$this->add_responsive_control(
					'witr_boxc_padding',
					[
						'label' => esc_html__( ' Padding', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .witr_content_casem' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
					
				
			$this->end_controls_section();
			/* === end single Feature ===  */			

    } /* function end */

	
	
	
    protected function render( $instance = [] ) {

        $witrshowdata   = $this->get_settings_for_display();
		$target = ! empty($witrshowdata['witr_case_title_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow = ! empty($witrshowdata['witr_case_title_link']['nofollow']) ? ' rel="nofollow"' : '';		
		$target_btn = ! empty($witrshowdata['witr_button_link']['is_external']) ? ' target="_blank"' : '';
		$nofollow_btn = ! empty($witrshowdata['witr_button_link']['nofollow']) ? ' rel="nofollow"' : '';		

	switch ( $witrshowdata['witr_style_case'] ) {
		case '2':
		?>

		<div class="witr_case all_case_color witr_case2">
			<div class="witr_case_image">
				<?php if(isset($witrshowdata['witr_case_image']['url']) && ! empty($witrshowdata['witr_case_image']['url'])){?>
					<img src="<?php echo $witrshowdata['witr_case_image']['url'];?>" alt="" />
				<?php } ?>
			</div>			
			<div class="witr_content_casem">
				<div class="witr_content_casei">
					<!-- content -->
					<?php if(isset($witrshowdata['witr_case_content']) && ! empty($witrshowdata['witr_case_content'])){?>
						<p><?php echo $witrshowdata['witr_case_content']; ?> </p>		
					<?php } ?>
					<!-- title -->
					<?php if(isset($witrshowdata['witr_case_title']) && ! empty($witrshowdata['witr_case_title'])){?>
					<?php if($witrshowdata['witr_case_title_link'] ['url']){?> 
						<h3><a href="<?php echo $witrshowdata['witr_case_title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_case_title']; ?></a></h3>
					<?php }else{ ?>
					<h3><?php echo $witrshowdata['witr_case_title']; ?> </h3>
					<?php }	?>
					<?php } ?>
				</div>
				<!-- button -->
				<?php if(isset($witrshowdata['witr_case_button']) && ! empty($witrshowdata['witr_case_button'])){?>
					<div class="witr_case_btnb">
						<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_case_button']; ?>
							<!-- icon -->
							<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
								<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
							<?php } ?>													
						</a>
					</div>
				<?php } ?>
			</div>	
			
		</div> 
					
		
		
		<?php 	
			
		break;
		default:
		?>
		<div class="witr_case all_case_color ">
			<div class="witr_case_image">
				<?php if(isset($witrshowdata['witr_case_image']['url']) && ! empty($witrshowdata['witr_case_image']['url'])){?>
					<img src="<?php echo $witrshowdata['witr_case_image']['url'];?>" alt="" />
				<?php } ?>
			</div>			
			<div class="witr_content_casem">
				<div class="witr_content_casei">
					<!-- content -->
					<?php if(isset($witrshowdata['witr_case_content']) && ! empty($witrshowdata['witr_case_content'])){?>
						<p><?php echo $witrshowdata['witr_case_content']; ?> </p>		
					<?php } ?>
					<!-- title -->
					<?php if(isset($witrshowdata['witr_case_title']) && ! empty($witrshowdata['witr_case_title'])){?>
					<?php if($witrshowdata['witr_case_title_link'] ['url']){?> 
						<h3><a href="<?php echo $witrshowdata['witr_case_title_link'] ['url'];?>"<?php echo $target,$nofollow?>><?php echo $witrshowdata['witr_case_title']; ?></a></h3>
					<?php }else{ ?>
					<h3><?php echo $witrshowdata['witr_case_title']; ?> </h3>
					<?php }	?>
					<?php } ?>					
				</div>
				<!-- button -->
				<?php if(isset($witrshowdata['witr_case_button']) && ! empty($witrshowdata['witr_case_button'])){?>
					<div class="witr_case_btnb">
						<a href="<?php echo $witrshowdata['witr_button_link'] ['url'];?>"<?php echo $target_btn,$nofollow_btn?>><?php echo $witrshowdata['witr_case_button']; ?>
							<!-- icon -->
							<?php if( ! empty($witrshowdata['witr_icon_item'])){?>
								<i class="<?php echo esc_attr( $witrshowdata['witr_icon_item']['value']);?>"></i>
							<?php } ?>						
						</a>
					</div>
				<?php } ?>
			</div>	
			
		</div> 
		<?php 		
		break;
		
	} 
		

    } /* function end */
	


}