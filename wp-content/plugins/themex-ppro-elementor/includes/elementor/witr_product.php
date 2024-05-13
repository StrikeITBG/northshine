<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; 

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class Mls_Woo_Product extends Widget_Base {

    public function get_name() {
        return 'witr_product_section';
    }
    
    public function get_title() {
        return esc_html__( ' Woo Products', 'poket' );
    }
    public function get_style_depends() {
        return [  ];
    }	
	public function get_script_depends() {
        return [  ];
    }	
    public function get_icon() {
        return 'poket_icon eicon-image';
    }
	
    public function get_categories() {
        return [ 'witr_tname' ];
    }

			protected function register_controls() {


			$this->start_controls_section(
				'witr_style_product_op', [
					'label' => __( 'Product Style', 'poket' ),
				]
			);
			$this->add_control(
				'witr_style_product', [
					'label' => __( 'Woo Product Style', 'poket' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1' => __( 'Product Grid', 'poket' ),
						'2' => __( 'Product Carousel', 'poket' ),
						'3' => __( 'Product Category Filter', 'poket' ),
						'4' => __( 'Product Category Block', 'poket' ),
						'5' => __( 'Product Carousel Two', 'poket' ),
					],
					'default' => '1',
					'label_block' => true
				]
			);
			$this->add_control(
				'witr_show_icon',
				[
					'label' => esc_html__( 'Show Product Icon', 'poket' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'poket' ),
					'label_off' => esc_html__( 'Hide', 'poket' ),
					'return_value' => 'yes',
					'separator'=>'before',
					'default' => 'yes',
					'condition' => [
						'witr_style_product' => ['1','2','3','5']
					]
				]
			);
			$this->add_control(
				'witr_show_rating',
				[
					'label' => esc_html__( 'Show Product Rating', 'poket' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'poket' ),
					'label_off' => esc_html__( 'Hide', 'poket' ),
					'return_value' => 'yes',
					'separator'=>'before',
					'default' => 'yes',
					'condition' => [
						'witr_style_product' => ['1','2','3','5']
					]
				]
			);


$this->end_controls_section();


$this->start_controls_section(
	'witr_product_filter',
	[
		'label' => esc_html__( 'Products Filter', 'poket' ),
		'condition' => [
			'witr_style_product' => ['1','2','3']
		]			
	]
);


$this->add_control(
	'witr_product_query', [
		'label' => __( 'Product Query', 'poket' ),
		'type' => Controls_Manager::SELECT,
		'options' => [
			'1' => __( 'All Products', 'poket' ),
			'2' => __( 'New Products', 'poket' ),				
			'3' => __( 'Bestseller Products', 'poket' ),
			'4' => __( 'Featured Products', 'poket' ),
			'5' => __( 'Sale Products', 'poket' ),
			'6' => __( 'Top Rated Products', 'poket' ),				
			'7' => __( 'Product By Category', 'poket' ),				
		],
		'default' => '1',
		'label_block' => true,	
	]
);
$this->add_control(
	'witr_product_pp', [
		'label' => __( 'Product Orderby', 'poket' ),
		'type' => Controls_Manager::SELECT,
		'options' => [
			'popularity' => __( 'popularity', 'poket' ),
			'date' => __( 'date', 'poket' ),				
			'id' => __( 'id', 'poket' ),
			'rand' => __( 'rand', 'poket' ),
			'rating' => __( 'rating', 'poket' ),
			'title' => __( 'title', 'poket' ),
			'menu_order' => __( 'menu_order', 'poket' ),				
			'price' => __( 'price', 'poket' ),				
		],
		'default' => 'popularity',
		'label_block' => true,
		'condition' => [
			'witr_product_query' => ['1']
		]			
	]
);


$this->add_control(
	'witr_filtertext_button',
	[
		'label' => esc_html__( 'Filter Text', 'poket' ),
		'type' => Controls_Manager::TEXT,
		'separator' => 'before',					
		'description' => esc_html__( 'change all product text', 'poket' ),
		'placeholder' => esc_attr__( 'ex - All Product', 'poket' ),
		'default' => esc_html__( 'All Product', 'poket' ),
		'condition' => [
			'witr_style_product' => ['3']
		]		
	]
);	



$this->add_control(
	'witr_product_slug', [
		'label' => __( 'Category Name', 'poket' ),
		'description' => __( 'Choose a category name to display.', 'poket' ),
		'separator' => 'before',
		'type' => Controls_Manager::SELECT,
		'options' => txw_cat_array('product_cat'),
		'default' => 'uncategorized',
		'condition' => [
			'witr_product_query' => ['7']
		]			
	]
);
$this->add_control(
	'witr_product_featured', [
		'label' => __( 'Featured Product', 'poket' ),
		'description' => __( 'Choose Products name to display.', 'poket' ),
		'separator' => 'before',
		'label_block'   => true,
		'type' => Controls_Manager::SELECT2,
		'options' => twr_products_title(),
		'multiple' => true,
		'condition' => [
			'witr_product_query' => ['4']
		]			
	]
);
			
$this->add_control(
	'witr_product_show', [
		'label' => esc_html__( 'Show product Item', 'poket' ),
		'type' => Controls_Manager::NUMBER,
		'default' => 6,
	]
);

$this->add_control(
	'witr_product_order', [
		'label' => esc_html__( 'Order', 'poket' ),
		'type' => Controls_Manager::SELECT,
		'options' => [
			'ASC' => 'ASC',
			'DESC' => 'DESC'
		],
		'default' => 'DESC'
	]
);

$this->add_control(
	'witr_product_exclude', [
		'label' => esc_html__( 'Exclude Products', 'poket' ),
		'description' => esc_html__( 'Enter the product post ID to hide. Input the multiple ID with comma separated', 'poket' ),
		'type' => Controls_Manager::TEXT,
	]
);
	

		

$this->end_controls_section();
/*=== end_controls_section ===*/
	

	
$this->start_controls_section(
	'witr_cat_blocopt',
	[
		'label' => esc_html__( 'Category Block', 'poket' ),
		'condition' => [
			'witr_style_product' => ['4']
		]		
	]
);
	 $repeater = new Repeater();
			 
$repeater->add_control(
    '_witr_cat_name', [
        'label' => __( 'Category Name', 'poket' ),
        'description' => __( 'Choose a category name to display.', 'poket' ),
        'separator' => 'before',
        'type' => Controls_Manager::SELECT,
        'options' => txw_cat_array('product_cat'),
        'default' => 'uncategorized'
    ]
);
$repeater->add_control(
    '_witr_cat_column', [
        'label' => __( 'Column', 'poket' ),
        'description' => __( 'Choose a column size you want to place in the category.', 'poket' ),
        'separator' => 'before',
        'type' => Controls_Manager::SELECT,
        'options' => [
            '12' => '12/12 (full width)',
            '6' => '12/6 (half of the full width)',
            '4' => '12/4 (33% of the full width)',
            '3' => '12/3 (25% of the full width)',
        ],
        'default' => '6'
    ]
);
$repeater->add_control(
    '_witr_cat_img', [
        'label' => __( 'Featured Image', 'poket' ),
        'separator' => 'before',
        'type' => Controls_Manager::MEDIA,		
    ]
);
$repeater->add_control(
    '_witr_cat_btn', [
        'label' => __( 'Cat Button Text', 'poket' ),
        'separator' => 'before',
        'type' => Controls_Manager::TEXT,
		'default' => esc_html__( 'Shop Now', 'poket' ),
		'placeholder' => esc_attr__( 'Type your button text here', 'poket' ),		
    ]
);
/* Accordion One Repeater */
$this->add_control(
	'witr_cat_setting',
	[
		'label' => esc_html__( ' Featured Items', 'poket' ),
		'type' => Controls_Manager::REPEATER,
		'fields'  => $repeater->get_controls(),
		'title_field' => '{{{ _witr_cat_name }}}',
	]
);

$this->end_controls_section();

				
		
		
		
			/* witr_bslick_option */ 
			$this->start_controls_section(
				'witr_bslick_option',
				[
					'label' => esc_html__( 'Product Slick options', 'poket' ),
					'condition' => [
						'witr_style_product' =>['2','5']
					],
				]
			);

						
				/* witr_slides_to_show */ 		
				$this->add_control(
					'witr_slides_to_show',
					[
						'label' => esc_html__( 'Slides to Show', 'poket' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 100,
						'step' => 1,
						'default' => 3,						
					]
				);	
				/*  witr_c_slidestoScroll */			
				$this->add_control(
					'witr_c_slidestoScroll',
					[
						'label' => esc_html__( 'slidestoScroll', 'poket' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 100,
						'step' => 1,
						'default' => 1,						
					]
				);
				/* image_infinite */
				$this->add_control(
					'witr_c_infinite',
					[
						'label' => esc_html__( 'Set Loop', 'poket' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'true',
						'options' => [
							'true' => esc_html__( 'True', 'poket' ),
							'false' => esc_html__( 'False', 'poket' ),
						],						
					]
				);
				/* witr_c_autoplay */
				$this->add_control(
					'witr_c_autoplay',
					[
						'label' => esc_html__( 'Autoplay', 'poket' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'true' => esc_html__( 'True', 'poket' ),
							'false' => esc_html__( 'False', 'poket' ),
						],						
					]
				);					
				/*  witr_c_autoplaySpeed */			
				$this->add_control(
					'witr_c_autoplaySpeed',
					[
						'label' => esc_html__( 'autoplaySpeed', 'poket' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1000,
						'max' => 50000,
						'step' => 1000,
						'default' => 5000,						
					]
				);
				/*  witr_c_speed */			
				$this->add_control(
					'witr_c_speed',
					[
						'label' => esc_html__( 'speed', 'poket' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 100,
						'max' => 2000,
						'step' => 100,
						'default' => 1000,						
					]
				);

				/* witr_c_arrows */
				$this->add_control(
					'witr_c_arrows',
					[
						'label' => esc_html__( 'arrows', 'poket' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'true',
						'options' => [
							'true' => esc_html__( 'True', 'poket' ),
							'false' => esc_html__( 'False', 'poket' ),
						],						
					]
				);	
				/* witr_c_dots */
				$this->add_control(
					'witr_c_dots',
					[
						'label' => esc_html__( 'dots', 'poket' ),
						'type' => Controls_Manager::SELECT,
						'separator'=>'before',
						'default' => 'false',
						'options' => [
							'true' => esc_html__( 'True', 'poket' ),
							'false' => esc_html__( 'False', 'poket' ),
						],						
					]
				);	
				/*  witr_c_res1 */			
				$this->add_control(
					'witr_c_res1',
					[
						'label' => esc_html__( 'Desktop', 'poket' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 10,
						'step' => 1,
						'default' => 3,						
					]
				);					
				/*  witr_c_res2 */			
				$this->add_control(
					'witr_c_res2',
					[
						'label' => esc_html__( 'Tablet', 'poket' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 8,
						'step' => 1,
						'default' => 2,						
					]
				);				
				/*  witr_c_res3 */			
				$this->add_control(
					'witr_c_res3',
					[
						'label' => esc_html__( 'Mobile', 'poket' ),
						'type' => Controls_Manager::NUMBER,
						'separator' => 'before',					
						'min' => 1,
						'max' => 5,
						'step' => 1,
						'default' => 1,						
					]
				);								
				/* feature title witr_feature_title */	
					$this->add_control(
						'witr_unicid_c',
						[
							'label' => esc_html__( 'Use Unique ID', 'poket' ),
							'type' => Controls_Manager::TEXTAREA,
							'description' => esc_html__( 'Please use a unic ID here, ex- any text.', 'poket' ),
							'default' => 'idpro',
							'placeholder' => esc_attr__( 'Type your ID here', 'poket' ),							
						]
					);				
				
	

        $this->end_controls_section();

		/*=== end_controls_section ===*/


	   /*========================================================================================================================================================================
										START TO STYLE
		==========================================================================================================================================================================*/

		
		/*=== start witr_box style ====*/
		$this->start_controls_section(
			'witr_style_box_option',
			[
				'label' => esc_html__( 'Box Option', 'poket' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);
		
			/*=== start box_tabs style ====*/
			$this->start_controls_tabs( 'box_colors' );
				/*=== start box_normal style ====*/
				$this->start_controls_tab(
					'witr_box_colors_normal',
					[
						'label' => esc_html__( 'Normal', 'poket' ),
					]
				);

					/* witr_align */					
					$this->add_responsive_control(
						'witr_box_align',
						[
							'label' => __( ' Text Align', 'poket' ),
							'type' => Controls_Manager::CHOOSE,
							'default' => 'center',
							'options' => [
								'left' => [
									'title' => __( 'Left', 'poket' ),
									'icon' => 'eicon-text-align-left',
								],
								'center' => [
									'title' => __( 'Center', 'poket' ),
									'icon' => 'eicon-text-align-center',
								],
								'right' => [
									'title' => __( 'Right', 'poket' ),
									'icon' => 'eicon-text-align-right',
								],
								'justify' => [
									'title' => __( 'Justified', 'poket' ),
									'icon' => 'eicon-text-align-justify',
								],
							],
							'prefix_class' => 'wittr_pfilter_menu%s--align-',
							'selectors' => [
								'{{WRAPPER}} .tbd_product' => 'text-align: {{VALUE}}',
							],
						]
					);				
				/*  background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_boxs_background',
						'label' => esc_html__( ' Background', 'poket' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .tbd_product',
					]
				);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_boxs_shadow',
						'label' => esc_html__( 'Box Shadow', 'poket' ),
						'selector' => '{{WRAPPER}} .tbd_product',
					]
				);

				/* blend mode style color */				
				$this->add_control(
					'witr_boxs_blend_mode',
					[
						'label' => esc_html__( 'Blend Mode', 'poket' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'' => esc_html__( 'Normal', 'poket' ),
							'multiply' => 'Multiply',
							'screen' => 'Screen',
							'overlay' => 'Overlay',
							'darken' => 'Darken',
							'lighten' => 'Lighten',
							'color-dodge' => 'Color Dodge',
							'saturation' => 'Saturation',
							'color' => 'Color',
							'difference' => 'Difference',
							'exclusion' => 'Exclusion',
							'hue' => 'Hue',
							'luminosity' => 'Luminosity',
						],
						'selectors' => [
							'{{WRAPPER}} .tbd_product' => 'mix-blend-mode: {{VALUE}}',
						],
					]
				);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_border_box',
						'label' => esc_html__( 'Border', 'poket' ),
						'selector' => '{{WRAPPER}} .tbd_product',
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_border_box_radius',
					[
						'label' => esc_html__( 'Border Radius', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .tbd_product' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);					
												
				/* box margin */
				$this->add_responsive_control(
					'witr_box_margin',
					[
						'label' => esc_html__( ' Margin', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .tbd_product' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* box padding */
				$this->add_responsive_control(
					'witr_box_padding',
					[
						'label' => esc_html__( ' Padding', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .tbd_product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
				

				$this->end_controls_tab();
				/*=== end box normal style ====*/
			
					/*=== start box hover style ====*/
					$this->start_controls_tab(
						'witr_box_colors_hover',
						[
							'label' => esc_html__( 'Box Hover', 'poket' ),
						]
					);

					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hover_box',
							'label' => esc_html__( ' Hover Background', 'poket' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .tbd_product:hover',
						]
					);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_boxsh_shadow',
						'label' => esc_html__( 'Box Shadow', 'poket' ),
						'selector' => '{{WRAPPER}} .tbd_product_content:hover',
					]
				);					
					/* border_hover_color */
					$this->add_control(
						'witr_border_box_hover_color',
						[
							'label' => esc_html__( 'Border Hover Color', 'poket' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .tbd_product:hover' => 'border-color: {{VALUE}}',
							],
						]
					);
					

					$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*=== end witr_box style ====*/		
		
		/*=== Start Witr filter style ====*/
		$this->start_controls_section(
			'witr_style_filter_option',
			[
				'label' => esc_html__( ' Filter Color Option', 'poket' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_product' => ['3']
				]				
			]
		);		 
				/*=== start button_tabs style ====*/
				$this->start_controls_tabs( 'filter_colors' );
				
					/*=== start button_normal style ====*/
					$this->start_controls_tab(
						'witr_filter_colors_tab',
						[
							'label' => esc_html__( 'Filter', 'poket' ),
						]
					);		
		
					/* witr_align */					
					$this->add_responsive_control(
						'witr_align',
						[
							'label' => __( ' Alignment Filter', 'poket' ),
							'type' => Controls_Manager::CHOOSE,
							'separator'=>'before',
							'default' => 'center',
							'options' => [
								'left' => [
									'title' => __( 'Left', 'poket' ),
									'icon' => 'eicon-text-align-left',
								],
								'center' => [
									'title' => __( 'Center', 'poket' ),
									'icon' => 'eicon-text-align-center',
								],
								'right' => [
									'title' => __( 'Right', 'poket' ),
									'icon' => 'eicon-text-align-right',
								],
								'justify' => [
									'title' => __( 'Justified', 'poket' ),
									'icon' => 'eicon-text-align-justify',
								],
							],
							'prefix_class' => 'wittr_pfilter_menu%s--align-',
							'selectors' => [
								'{{WRAPPER}} .product_tl_nav' => 'text-align: {{VALUE}}',
							],
						]
					);		
						/* filter Color */
						$this->add_control(
							'witr_filter_color',
							[
								'label' => esc_html__( 'Filter Color', 'poket' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .product_tl_nav ul li' => 'color: {{VALUE}}',
								],
								
							]
						);
						/* Filter background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_filth_background',
								'label' => esc_html__( 'Filter Background', 'poket' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .product_tl_nav ul li',
							]
						);				
						/* typograohy color */			
						$this->add_group_control(
							Group_Control_Typography::get_type(),
							[
								'name' => 'witr_filter_ttpy_color',
								'label' => esc_html__( 'Typography', 'poket' ),
								'selector' => '{{WRAPPER}} .product_tl_nav ul li',
							]
						);
					
						/* witr_border_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_filter_border',
								'label' => esc_html__( 'Border', 'poket' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .product_tl_nav ul li',
							]
						);				
						/* border_radius */
						$this->add_control(
							'witr_border_radius1',
							[
								'label' => esc_html__( 'Filter Border Radius', 'poket' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .product_tl_nav ul li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* filter margin */
						$this->add_responsive_control(
							'witr_filter_margin',
							[
								'label' => esc_html__( 'Filter Margin', 'poket' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .product_tl_nav ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* Filter padding */
						$this->add_responsive_control(
							'witr_filter_padding',
							[
								'label' => esc_html__( 'Filter Padding', 'poket' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'selectors' => [
									'{{WRAPPER}} .product_tl_nav ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);				
				
					$this->end_controls_tab();
					/*=== end filter normal style ====*/
				
					/*=== start filter hover style ====*/
					$this->start_controls_tab(
						'witr_filter_tab_hover',
						[
							'label' => esc_html__( ' Hover', 'poket' ),
						]
					);				
			
						/* filter hover color */
						$this->add_control(
							'witr_filter_hover_color',
							[
								'label' => esc_html__( 'Filter Hover Color', 'poket' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'selectors' => [
									'{{WRAPPER}} .product_tl_nav ul li:hover' => 'color: {{VALUE}}',
								],
							]
						);			
						/* Filter background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_filter_background',
								'label' => esc_html__( 'Filter Background Hover', 'poket' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .product_tl_nav ul li:hover',
							]
						);
						
					$this->end_controls_tab();
					/*=== end filter hover style ====*/
						
					/*=== start active style ====*/
					$this->start_controls_tab(
						'witr_filter_colors_active',
						[
							'label' => esc_html__( 'Active', 'poket' ),							
						]
					);				
						/* filter active color */
						$this->add_control(
							'witr_filter_active_color',
							[
								'label' => esc_html__( 'Filter Active Color', 'poket' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								'selectors' => [
									'{{WRAPPER}} .product_tl_nav ul li.ema_product_item' => 'color: {{VALUE}}',
								],
							]
						);			
						
						/* Active border_color */
						$this->add_control(
							'witr_active_border_color',
							[
								'label' => esc_html__( 'Active Border Color', 'poket' ),
								'type' => Controls_Manager::COLOR,						
								'selectors' => [
									'{{WRAPPER}} .product_tl_nav ul li.ema_product_item' => 'border-color: {{VALUE}}',
								],
							]
						);				
						/* border_radius */
						$this->add_control(
							'witr_borders_radius',
							[
								'label' => esc_html__( 'Active Border Radius', 'poket' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .product_tl_nav ul li.ema_product_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* Active Filter background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_active_filter_background',
								'label' => esc_html__( 'Active Background', 'poket' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .product_tl_nav ul li.current_menu_item',
							]
						);				

				
				
					$this->end_controls_tab();
				$this->end_controls_tabs();					
		 $this->end_controls_section();
		/*=== end  witr Filter Text style ====*/
		
		
		/*=== start witr_title style ====*/
		$this->start_controls_section(
			'witr_style_option_title',
			[
				'label' => esc_html__( 'Title Color Option', 'poket' ),
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
						'{{WRAPPER}} .tbd_product_title h2' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .tbd_product_title h2:hover' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .tbd_product_title h2',
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
						'{{WRAPPER}} .tbd_product_title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tbd_product_title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		 
		 $this->end_controls_section();
		/*=== end  witr_title style ====*/

		/*=== start witr_cbox style ====*/
		$this->start_controls_section(
			'witr_style_cbox_option',
			[
				'label' => esc_html__( 'Content Box Option', 'poket' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);
		
			/*=== start cbox_tabs style ====*/
			$this->start_controls_tabs( 'cbox_colors' );
				/*=== start cbox_normal style ====*/
				$this->start_controls_tab(
					'witr_cbox_colors_normal',
					[
						'label' => esc_html__( 'Normal', 'poket' ),
					]
				);				
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_cboxs_background',
						'label' => esc_html__( 'Icon Background', 'poket' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .tbd_product_content',
					]
				);
				/* cbox shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_cboxs_shadow',
						'label' => esc_html__( 'Box Shadow', 'poket' ),
						'selector' => '{{WRAPPER}} .tbd_product_content',
					]
				);
				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_border_cbox',
						'label' => esc_html__( 'Border', 'poket' ),
						'selector' => '{{WRAPPER}} .tbd_product_content',
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_border_cbox_radius',
					[
						'label' => esc_html__( 'Border Radius', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .tbd_product_content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
								
				/* cbox margin */
				$this->add_responsive_control(
					'witr_cbox_margin',
					[
						'label' => esc_html__( ' Margin', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .tbd_product_content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* cbox padding */
				$this->add_responsive_control(
					'witr_cbox_padding',
					[
						'label' => esc_html__( ' Padding', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .tbd_product_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
				

				$this->end_controls_tab();
				/*=== end cbox normal style ====*/
			
					/*=== start cbox hover style ====*/
					$this->start_controls_tab(
						'witr_cbox_colors_hover',
						[
							'label' => esc_html__( ' Hover', 'poket' ),
						]
					);

					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hover_cbox',
							'label' => esc_html__( ' Hover Background', 'poket' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .tbd_product_content:hover',
						]
					);
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_cboxh_shadow',
						'label' => esc_html__( 'Box Shadow', 'poket' ),
						'selector' => '{{WRAPPER}} .tbd_product:hover',
					]
				);					
					/* border_hover_color */
					$this->add_control(
						'witr_border_cbox_hover_color',
						[
							'label' => esc_html__( 'Border Hover Color', 'poket' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .tbd_product_content:hover' => 'border-color: {{VALUE}}',
							],
						]
					);
					

					$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*=== end witr_cbox style ====*/		

		/*=== start witr_price style ====*/
		$this->start_controls_section(
			'witr_style_option_price',
			[
				'label' => esc_html__( 'Price Color Option', 'poket' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		 
			/* color */
			$this->add_control(
				'witr_price_color',
				[
					'label' => esc_html__( 'Color', 'poket' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .woocommerce div.product span.price ins,{{WRAPPER}} .woocommerce div.product span.price' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_price_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'poket' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .woocommerce div.product span.price ins:hover,{{WRAPPER}} .woocommerce div.product span.price:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/* typograohy color */			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'witr_price_typography',
					'label' => esc_html__( 'Typography', 'poket' ),
					'global' => [
						'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
					],
					'selector' => '{{WRAPPER}} .woocommerce div.product span.price ins,{{WRAPPER}} .woocommerce div.product span.price',
				]
			);					
		 
		 $this->end_controls_section();
		/*=== end  witr_price style ====*/

		
		/*=== start witr_icon style ====*/
		$this->start_controls_section(
			'witr_style_icon_option',
			[
				'label' => esc_html__( 'Icon Color Option', 'poket' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_icon' => ['yes']
				]				
			]
		);
		
			/*=== start icon_tabs style ====*/
			$this->start_controls_tabs( 'icon_colors' );
				/*=== start icon_normal style ====*/
				$this->start_controls_tab(
					'witr_icon_colors_normal',
					[
						'label' => esc_html__( 'Normal', 'poket' ),
					]
				);
				/* Icon Color */
				$this->add_control(
					'witr_primary_color',
					[
						'label' => esc_html__( ' Color', 'poket' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .tbd_product .thb_product_car a' => 'color: {{VALUE}}',
						],					
					]
				);				
				/* Icon background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_icons_background',
						'label' => esc_html__( 'Icon Background', 'poket' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} .tbd_product .thb_product_car a',
					]
				);
				
				/*  icon font size */
				$this->add_responsive_control(
					'icon_size',
					[
						'label' => esc_html__( ' Size', 'poket' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .tbd_product .thb_product_car a' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);				
				/*  icon width */
				$this->add_responsive_control(
					'witr_icon_width',
					[
						'label' => esc_html__( 'width', 'poket' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .tbd_product .thb_product_car a' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon height */
				$this->add_responsive_control(
					'witr_icon_height',
					[
						'label' => esc_html__( 'Height', 'poket' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .tbd_product .thb_product_car a' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/*  icon line height */
				$this->add_responsive_control(
					'witr_icon_line_height',
					[
						'label' => esc_html__( 'Line Height', 'poket' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 6,
								'max' => 500,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .tbd_product .thb_product_car a' => 'line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				/* witr_text_align */					
				$this->add_responsive_control(
					'witr_text_align',
					[
						'label' => esc_html__( 'Text Align', 'poket' ),
						'type' => Controls_Manager::CHOOSE,
						'default' => 'center',
						'options' => [
							'left' => [
								'title' => esc_html__( 'Left', 'poket' ),
								'icon' => 'eicon-text-align-left',
							],
							'center' => [
								'title' => esc_html__( 'Center', 'poket' ),
								'icon' => 'eicon-text-align-center',
							],
							'right' => [
								'title' => esc_html__( 'Right', 'poket' ),
								'icon' => 'eicon-text-align-right',
							],
							'justify' => [
								'title' => esc_html__( 'Justified', 'poket' ),
								'icon' => 'eicon-text-align-justify',
							],
						],
						'prefix_class' => 'poket-star-rating%s--align-',
						'selectors' => [
							'{{WRAPPER}} .tbd_product .thb_product_car a' => 'text-align: {{VALUE}}',
						],
					]
				);				
				/* witr_border_style */
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'witr_borderf',
						'label' => esc_html__( 'Border', 'poket' ),
						'selector' => '{{WRAPPER}} .tbd_product .thb_product_car a',
					]
				);
				/* border_radius */
				$this->add_control(
					'witr_border_radius',
					[
						'label' => esc_html__( 'Border Radius', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .tbd_product .thb_product_car a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
					
				
				/* box shadow color */	
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'witr_box_shadow',
						'label' => esc_html__( 'Box Shadow', 'poket' ),
						'selector' => '{{WRAPPER}} .tbd_product .thb_product_car a',
					]
				);

				/* blend mode style color */				
				$this->add_control(
					'witr_icon_blend_mode',
					[
						'label' => esc_html__( 'Blend Mode', 'poket' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'' => esc_html__( 'Normal', 'poket' ),
							'multiply' => 'Multiply',
							'screen' => 'Screen',
							'overlay' => 'Overlay',
							'darken' => 'Darken',
							'lighten' => 'Lighten',
							'color-dodge' => 'Color Dodge',
							'saturation' => 'Saturation',
							'color' => 'Color',
							'difference' => 'Difference',
							'exclusion' => 'Exclusion',
							'hue' => 'Hue',
							'luminosity' => 'Luminosity',
						],
						'selectors' => [
							'{{WRAPPER}} .tbd_product .thb_product_car a' => 'mix-blend-mode: {{VALUE}}',
						],
					]
				);					
				/*  Rotate */
				$this->add_responsive_control(
					'witr_rotate',
					[
						'label' => esc_html__( 'Rotate', 'poket' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'deg' ],
						'default' => [
							'size' => '',
							'unit' => 'deg',
						],
						'tablet_default' => [
							'unit' => 'deg',
						],
						'mobile_default' => [
							'unit' => 'deg',
						],
						'selectors' => [
							'{{WRAPPER}} .tbd_product .thb_product_car a' => 'transform: rotate({{SIZE}}{{UNIT}});',
						],
					]
				);												
				/* icon margin */
				$this->add_responsive_control(
					'witr_icon_margin',
					[
						'label' => esc_html__( ' Margin', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .tbd_product .thb_product_car a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				/* icon padding */
				$this->add_responsive_control(
					'witr_icon_padding',
					[
						'label' => esc_html__( ' Padding', 'poket' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .tbd_product .thb_product_car a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);		
				

				$this->end_controls_tab();
				/*=== end icon normal style ====*/
			
					/*=== start icon hover style ====*/
					$this->start_controls_tab(
						'witr_icon_colors_hover',
						[
							'label' => esc_html__( 'Icon Hover', 'poket' ),
						]
					);
					/*  primary hover color */
					$this->add_control(
						'witr_hover_primary_color',
						[
							'label' => esc_html__( ' Hover Color', 'poket' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tbd_product .thb_product_car a:hover' => 'color: {{VALUE}}',
							],
						]
					);
					/* hover Icon background */
					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'witr_hover_icon',
							'label' => esc_html__( ' Hover Background', 'poket' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .tbd_product .thb_product_car a:hover',
						]
					);
					/* border_hover_color */
					$this->add_control(
						'witr_border_hover_color',
						[
							'label' => esc_html__( 'Border Hover Color', 'poket' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .tbd_product .thb_product_car a:hover' => 'border-color: {{VALUE}}',
							],
						]
					);
					

					$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();
		/*=== end witr_icon style ====*/

		/*=== start Rating style ====*/
		$this->start_controls_section(
			'witr_style_option_rating',
			[
				'label' => esc_html__( 'Rating Color Option', 'poket' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_show_rating' => ['yes']
				]				
			]
		);		 
			/* color */
			$this->add_control(
				'witr_rating_color',
				[
					'label' => esc_html__( 'Color', 'poket' ),
					'type' => Controls_Manager::COLOR,
					'global' => [
						'default' => Global_Colors::COLOR_PRIMARY,
					],					
					'separator'=>'before',
					'selectors' => [
						'{{WRAPPER}} .woocommerce .star-rating,{{WRAPPER}} .woocommerce .products .star-rating' => 'color: {{VALUE}}',
					],
				]
			);
			/* hover color */
			$this->add_control(
				'witr_rating_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'poket' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .woocommerce .star-rating:hover,{{WRAPPER}} .woocommerce .products .star-rating:hover' => 'color: {{VALUE}}',
					],
				]
			);
			/*  filter font size */
			$this->add_responsive_control(
				'witr_rating_size',
				[
					'label' => esc_html__( ' Size', 'poket' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .woocommerce .star-rating' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);			
			

		$this->end_controls_section();
		
		/*=== witr_imgov_option  ====*/
		$this->start_controls_section(
			'witr_imgov_option',
			[
				'label' => esc_html__( 'Image Overly Option', 'poket' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
				/* single  background */
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'witr_img_background',
						'label' => esc_html__( ' Background', 'poket' ),
						'types' => ['classic','gradient'],
						'selector' => '{{WRAPPER}} a.thumbnail_link::before',
					]
				);				
						
        $this->end_controls_section();
		/*=== witr_imgov_option ====*/		

		/*=== start witr button style ====*/
		$this->start_controls_section(
			'witr_style_option_button',
			[
				'label' => esc_html__( 'Button Color Option', 'poket' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'witr_style_product' =>['5']
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
								'{{WRAPPER}} .show_cart_cbtn' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .show_cart_cbtn',
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
							'selector' => '{{WRAPPER}} .show_cart_cbtn',
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
								'{{WRAPPER}} .show_cart_cbtn' => 'border-style: {{VALUE}}',
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
								'{{WRAPPER}} .show_cart_cbtn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .show_cart_cbtn' => 'border-color: {{VALUE}}',
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
								'{{WRAPPER}} .show_cart_cbtn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .show_cart_cbtn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .show_cart_cbtn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .show_cart_cbtn:hover' => 'color: {{VALUE}}',
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
							'selector' => '{{WRAPPER}} .show_cart_cbtn:hover',
						]
					);
					/* witr_hoverborder_style */
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'witr_hoverborder_style',
							'label' => esc_html__( 'Button Hover Border', 'poket' ),
							'selector' => '{{WRAPPER}} .show_cart_cbtn:hover',
						]
					);
					
					
					
					$this->end_controls_tab();
					/*=== end button hover style ====*/
			$this->end_controls_tabs();
			/*=== end button_tabs style ====*/			
		 $this->end_controls_section();
		/*=== end  witr button style ====*/			
		
			/*=== start witr Arrow style ====*/
			$this->start_controls_section(
				'witr_style_option_arrow',
				[
					'label' => esc_html__( ' Arrow Options', 'poket' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_c_arrows' => 'true',
						'witr_style_product' =>['2','5']
					],					
				]
			);		 		
				/*=== start Navigation_tabs style ====*/
				$this->start_controls_tabs( 'arrow_colors' );
				
					/*=== start Navigation_normal style ====*/
					$this->start_controls_tab(
						'witr_arrow_colors_normal',
						[
							'label' => esc_html__( 'Arrow', 'poket' ),
						]
					);
						/*  arrow width */
						$this->add_responsive_control(
							'witr_arrow_width',
							[
								'label' => esc_html__( 'width', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 500,
									],
									'%' => [
										'min' => 0,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'width: {{SIZE}}{{UNIT}};',
								],
							]
						);
						/*  arrow height */
						$this->add_responsive_control(
							'witr_arrow_height',
							[
								'label' => esc_html__( 'Height', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 500,
									],
									'%' => [
										'min' => 0,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'height: {{SIZE}}{{UNIT}};',
								],
							]
						);						
						/*  arrow Line height */
						$this->add_responsive_control(
							'witr_arrow_line_height',
							[
								'label' => esc_html__( 'Line Height', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 500,
									],
									'%' => [
										'min' => 0,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'line-height: {{SIZE}}{{UNIT}};',
								],
							]
						);						
						/*  arrow Opacity */
						$this->add_responsive_control(
							'witr_arrow_opacity',
							[
								'label' => esc_html__( 'Arrow Opacity', 'poket' ),
								'type' => Controls_Manager::TEXT,
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'opacity: {{SIZE}}{{UNIT}};',
								],
							]
						);					
						/*  Arrow font size */
						$this->add_responsive_control(
							'witr_arrow_size',
							[
								'label' => esc_html__( 'Arrow Size', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', 'em' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 500,
									],
									'em' => [
										'min' => 0,
										'max' => 500,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev:before,{{WRAPPER}} .slick-next:before' => 'font-size: {{SIZE}}{{UNIT}};',
								],
							]
						);					
						/* Arrow color */
						$this->add_control(
							'witr_arrow_color',
							[
								'label' => esc_html__( 'Arrow Color', 'poket' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .slick-prev:before,{{WRAPPER}} .slick-next:before ' => 'color: {{VALUE}}',
								],
							]
						);				
	
						/* Arrow background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_arrow_background',
								'label' => esc_html__( 'Arrow Background', 'poket' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next',
							]
						);
						/* Arrow Active color */
						$this->add_control(
							'witr__actv_arrow_color',
							[
								'label' => esc_html__( 'Arrow Active Color', 'poket' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .slick-disabled.slick-prev:before,{{WRAPPER}} .slick-disabled.slick-next:before ' => 'color: {{VALUE}}',
								],
							]
						);	
						/*  witr_actv */
						$this->add_responsive_control(
							'witr_actv',
							[
								'label' => esc_html__( 'Active Background, Set Color And Click Arrow Button Than Show Active Color.', 'poket' ),
								'type' => Controls_Manager::HEADING,
							]
						);
						/* Arrow active background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_act_arrow_background',
								'label' => esc_html__( 'Arrow Background', 'poket' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-prev.slick-disabled,{{WRAPPER}} .slick-next.slick-disabled,{{WRAPPER}} .slick-prev:focus,{{WRAPPER}} .slick-next:focus',
							]
						);						
						/* witr_arrowborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_arrowborder_style',
								'label' => esc_html__( 'Arrow Border', 'poket' ),
								'selector' => '{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next',
							]
						);
						/* border_radius */
						$this->add_control(
							'witr_border_arrow_radius',
							[
								'label' => esc_html__( 'Border Radius', 'poket' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						/* witr_top */
						$this->add_responsive_control(
							'witr_top',
							[
								'label' => esc_html__( 'Top', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 1000,
									],
									'%' => [
										'min' => 0,
										'max' => 1000,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev,{{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);
						
						/* witr_left */
						$this->add_responsive_control(
							'witr_left',
							[
								'label' => esc_html__( 'Left', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 1000,
									],
									'%' => [
										'min' => -500,
										'max' => 1000,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
								],
							]
						);
		
						/* witr_right */
						$this->add_responsive_control(
							'witr_right',
							[
								'label' => esc_html__( 'Right', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 1000,
									],
									'%' => [
										'min' => -500,
										'max' => 1000,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-next' => 'right: {{SIZE}}{{UNIT}};',
								],
							]
						);					
					

					$this->end_controls_tab();
					/*=== end Arrow normal style ====*/
				
						/*=== start Arrow hover style ====*/
						$this->start_controls_tab(
							'witr_arrow_colors_hover',
							[
								'label' => esc_html__( 'Arrow Hover', 'poket' ),
							]
						);
						/* Arrow_hover_color */
						$this->add_control(
							'witr_arrow_hover_color',
							[
								'label' => esc_html__( 'Arrow Hover Color', 'poket' ),
								'type' => Controls_Manager::COLOR,
								'separator'=>'before',
								
								'selectors' => [
									'{{WRAPPER}} .slick-prev:hover:before,{{WRAPPER}} .slick-next:hover:before' => 'color: {{VALUE}}',
								],
							]
						);					
							
						/* Arrow Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_arrow_hover_background',
								'label' => esc_html__( 'Arrow Hover Background', 'poket' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-prev:hover,{{WRAPPER}} .slick-next:hover',
							]
						);
						/* witr_hoverborder_style1 */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_style1',
								'label' => esc_html__( 'Arrow Hover Border', 'poket' ),
								'selector' => '{{WRAPPER}} .slick-prev:hover,{{WRAPPER}} .slick-next:hover',
							]
						);					
						
						
						$this->end_controls_tab();
						/*=== end Arrow hover style ====*/
				$this->end_controls_tabs();
				/*=== end Arrow tabs style ====*/
			 $this->end_controls_section();
			/*=== end  witr Arrow style ====*/			


			/*=== start witr Dots style ====*/

			$this->start_controls_section(
				'witr_style_option_dots',
				[
					'label' => esc_html__( 'Witr Dots Options', 'poket' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'witr_c_dots' => 'true',
						'witr_style_product' =>['2','5']
					],					
				]
			);
				/*=== start Dots_tabs style ====*/
				$this->start_controls_tabs( 'dots_colors' );

					/*=== start Navigation_normal style ====*/
					$this->start_controls_tab(
						'witr_dots_colors_normal',
						[
							'label' => esc_html__( 'Dots', 'poket' ),
						]
					);

						/*  Dots width */
						$this->add_responsive_control(
							'witr_dots_width',
							[
								'label' => esc_html__( 'width', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'separator'=>'before',
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 200,
									],
									'%' => [
										'min' => 0,
										'max' => 200,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots li button' => 'width: {{SIZE}}{{UNIT}};',
								],
							]
						);
						/*  Dots height */
						$this->add_responsive_control(
							'witr_dots_height',
							[
								'label' => esc_html__( 'Height', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 200,
									],
									'%' => [
										'min' => 0,
										'max' => 200,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots li button' => 'height: {{SIZE}}{{UNIT}};',
								],
							]
						);											
						/* Dots background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_dots_background',
								'label' => esc_html__( 'Dots Background', 'poket' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-dots li button',
							]
						);		
						/* witr_dotsborder_style */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_dotsborder_style',
								'label' => esc_html__( 'Dots Border', 'poket' ),
								'selector' => '{{WRAPPER}} .slick-dots li button',
							]
						);
						/* border_radius */
						$this->add_control(
							'witr_border_dots_radius',
							[
								'label' => esc_html__( 'Border Radius', 'poket' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors' => [
									'{{WRAPPER}} .slick-dots li button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
							]
						);
						
						/* Active Dots Background heading */
						$this->add_control(
							'witr_acdots_bg_had',
							[
								'label' => esc_html__( 'Active Dots Background', 'poket' ),
								'type' => Controls_Manager::HEADING,
							]
						);
							
						
						/* Active Dots background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_acdots_background',
								'label' => esc_html__( 'Active Dots Background', 'poket' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-dots li.slick-active button ',
							]
						);
						/* border_color */
						$this->add_control(
							'witr_border_adot_color',
							[
								'label' => esc_html__( 'Active Border Color', 'poket' ),
								'type' => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .slick-dots li.slick-active button' => 'border-color: {{VALUE}}',
								],
							]
						);						
						/* Active Dots width */
						$this->add_responsive_control(
							'witr_dotsac_width',
							[
								'label' => esc_html__( 'Active Width', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 200,
									],
									'%' => [
										'min' => 0,
										'max' => 200,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots li.slick-active button' => 'width: {{SIZE}}{{UNIT}};',
								],
							]
						);						
						/* Active Dots height */
						$this->add_responsive_control(
							'witr_dotsac_height',
							[
								'label' => esc_html__( 'Active Height', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 200,
									],
									'%' => [
										'min' => 0,
										'max' => 200,
									],
									
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots li.slick-active button' => 'height: {{SIZE}}{{UNIT}};',
								],
							]
						);						

						/* witr_top */
						$this->add_responsive_control(
							'witr_topt_dots',
							[
								'label' => esc_html__( 'Top', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%', 'em' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 2000,
									],
									'%' => [
										'min' => -500,
										'max' => 2000,
									],
									'em' => [
										'min' => -500,
										'max' => 2000,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots' => 'top: {{SIZE}}{{UNIT}};',
								],
							]
						);
						
						/* witr_left */
						$this->add_responsive_control(
							'witr_leftl_dots',
							[
								'label' => esc_html__( 'Left', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%', 'em' ],
									'range' => [
									'px' => [
										'min' => -500,
										'max' => 2000,
									],
									'%' => [
										'min' => -500,
										'max' => 2000,
									],
									'em' => [
										'min' => -500,
										'max' => 2000,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots' => 'left: {{SIZE}}{{UNIT}};',
								],

							]
						);

						/* witr_right */
						$this->add_responsive_control(
							'witr_rightr_dots',
							[
								'label' => esc_html__( 'Right', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%', 'em' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 2000,
									],
									'%' => [
										'min' => -500,
										'max' => 2000,
									],
									'em' => [
										'min' => -500,
										'max' => 2000,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots' => 'right: {{SIZE}}{{UNIT}};',
								],
							]
						);					
						/* witr_bottom */
						$this->add_responsive_control(
							'witr_bottomb_dots',
							[
								'label' => esc_html__( 'Bottom', 'poket' ),
								'type' => Controls_Manager::SLIDER,
								'size_units' => [ 'px', '%', 'em' ],
								'range' => [
									'px' => [
										'min' => -500,
										'max' => 2000,
									],
									'%' => [
										'min' => -500,
										'max' => 2000,
									],
									'em' => [
										'min' => -500,
										'max' => 2000,
									],
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
								],					
							]
						);				
				
						
						
						/* dots margin */
						$this->add_responsive_control(
							'witr_dots_margin',
							[
								'label' => esc_html__( 'Margin', 'poket' ),
								'type' => Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ],
								'allowed_dimensions' => 'horizontal',
								'placeholder' => [
									'top' => 'auto',
									'right' => '',
									'bottom' => 'auto',
									'left' => '',
								],
								'selectors' => [
									'{{WRAPPER}} .slick-dots li button' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
								],
							]
						);					
					

					$this->end_controls_tab();
					/*=== end Dots normal style ====*/
				
						/*=== start Dots hover style ====*/
						$this->start_controls_tab(
							'witr_dots_colors_hover',
							[
								'label' => esc_html__( 'Dots Hover', 'poket' ),
							]
						);
							
						/* Dots Hover background */
						$this->add_group_control(
							Group_Control_Background::get_type(),
							[
								'name' => 'witr_dots_hover_background',
								'label' => esc_html__( 'Dots Hover Background', 'poket' ),
								'types' => ['classic','gradient'],
								'selector' => '{{WRAPPER}} .slick-dots li button:hover',
							]
						);
						/* witr_hoverborder_styled */
						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name' => 'witr_hoverborder_styled',
								'label' => esc_html__( 'Dots Hover Border', 'poket' ),
								'selector' => '{{WRAPPER}} .slick-dots li button:hover',
							]
						);					
						
						
						$this->end_controls_tab();						
				$this->end_controls_tabs();
			 $this->end_controls_section();
			/*=== end  witr Dots style ====*/		
		
		
		
		
		
		
		
		
		

    } /* function end */

    protected function render( $instance = [] ) {

        $witrshowdata = $this->get_settings_for_display();

		
switch( $witrshowdata['witr_product_query']){
	/* by category */
	case '7':


	if($witrshowdata['witr_product_slug'] =="all"){	
	$args = array(
		'post_type'           => 'product',
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page'      => !empty($witrshowdata['witr_product_show']) ? $witrshowdata['witr_product_show'] : -1,
		'order'               => !empty($witrshowdata['witr_product_order']) ? $witrshowdata['witr_product_order'] : 'DESC',
		'post__not_in'        => !empty($witrshowdata['witr_product_exclude']) ? explode(',', $witrshowdata['witr_product_exclude']) : '',	
	);	
	}else{
	$args = array(
		'post_type'           => 'product',
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page'      => !empty($witrshowdata['witr_product_show']) ? $witrshowdata['witr_product_show'] : -1,
		'order'               => !empty($witrshowdata['witr_product_order']) ? $witrshowdata['witr_product_order'] : 'DESC',
		'post__not_in'        => !empty($witrshowdata['witr_product_exclude']) ? explode(',', $witrshowdata['witr_product_exclude']) : '',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'slug',
				'terms'    => !empty($witrshowdata['witr_product_slug']) ? $witrshowdata['witr_product_slug'] : '',
			)
		),		
	);	
	
	}
	
	break;
	/* by top rated */
	case '6':	
		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'meta_key'			  => '_wc_average_rating',
			'orderby' 			  => 'rating',		
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => !empty($witrshowdata['witr_product_show']) ? $witrshowdata['witr_product_show'] : -1,
			'order'               => !empty($witrshowdata['witr_product_order']) ? $witrshowdata['witr_product_order'] : 'DESC',
			'post__not_in'        => !empty($witrshowdata['witr_product_exclude']) ? explode(',', $witrshowdata['witr_product_exclude']) : '',
		);		
	break;

	/* by sale */
	case '5':	
		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',			
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => !empty($witrshowdata['witr_product_show']) ? $witrshowdata['witr_product_show'] : -1,
			'order'               => !empty($witrshowdata['witr_product_order']) ? $witrshowdata['witr_product_order'] : 'DESC',
			'post__not_in'        => !empty($witrshowdata['witr_product_exclude']) ? explode(',', $witrshowdata['witr_product_exclude']) : '',
			'meta_query'     => array(
				'relation' => 'OR',
				array( 
					'key'           => '_sale_price',
					'value'         => 0,
					'compare'       => '>',
					'type'          => 'numeric'
				),
				array( 
					'key'           => '_min_variation_sale_price',
					'value'         => 0,
					'compare'       => '>',
					'type'          => 'numeric'
				)
			)			
			
		);		
	break;	
	/* by featured */
	case '4':	
	$wtxpro_ids = is_array( $witrshowdata['witr_product_featured'] ) ? array_values( $witrshowdata['witr_product_featured'] ) : '';
	$args = array(
		'post_type'           => 'product',
		'post_status'         => 'publish',
		'posts_per_page'      => -1,
		'ignore_sticky_posts' => 1,
		'post__in' => $wtxpro_ids
	);			
	break;
	/* by bestsellar */	
	case '3':
		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',		
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => !empty($witrshowdata['witr_product_show']) ? $witrshowdata['witr_product_show'] : -1,
			'order'               => !empty($witrshowdata['witr_product_order']) ? $witrshowdata['witr_product_order'] : 'DESC',
			'post__not_in'        => !empty($witrshowdata['witr_product_exclude']) ? explode(',', $witrshowdata['witr_product_exclude']) : '',
			'meta_query'     => array(
						array( 
							'key'           => 'total_sales',
							'value'         => 0,
							'compare'       => '>',
							'type'          => 'numeric'
						)	
					)
			);
			break;
	/* by new */
	case '2':
		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => !empty($witrshowdata['witr_product_show']) ? $witrshowdata['witr_product_show'] : -1,
			'order'               => !empty($witrshowdata['witr_product_order']) ? $witrshowdata['witr_product_order'] : 'DESC',
			'post__not_in'        => !empty($witrshowdata['witr_product_exclude']) ? explode(',', $witrshowdata['witr_product_exclude']) : '',
		);			
	break;			
	/* by all */
	default:
		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => !empty($witrshowdata['witr_product_show']) ? $witrshowdata['witr_product_show'] : -1,
			'order'               => !empty($witrshowdata['witr_product_order']) ? $witrshowdata['witr_product_order'] : 'DESC',
			'orderby'             => !empty($witrshowdata['witr_product_pp']) ? $witrshowdata['witr_product_pp'] : '',
			'post__not_in'        => !empty($witrshowdata['witr_product_exclude']) ? explode(',', $witrshowdata['witr_product_exclude']) : '',
		);
	break;				
}	
		
		
		$wtxpro = new \WP_Query($args);
		
					
		switch( $witrshowdata['witr_style_product']){		
			case '5':
				  include 'witr_product/witr_product_carousel_two.php';				 
			break;
			case '4':
				  include 'witr_product/witr_category_block.php';				 
			break;			
			case '3':
				  include 'witr_product/witr_product_catfilter.php';				
			break;			
			case '2':
				  include 'witr_product/witr_product_carousel.php';
			break;						
			default:
				  include 'witr_product/witr_product_grid.php';
			break;
			
		} 			

			
       
	} 




}
