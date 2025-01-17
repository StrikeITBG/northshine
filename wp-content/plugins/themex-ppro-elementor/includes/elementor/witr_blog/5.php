			<!-- Blog Section -->
			<section class="witr_blog_area5">
				<div class="container">
					<div class="row">
						<?php while ($posts->have_posts()) : $posts->the_post(); ?>					
							<div class=" col-lg-<?php if( !empty( $witrshowdata['witr_column_grid'] ) ){echo $witrshowdata['witr_column_grid'];}?>  col-md-6 col-sm-12 <?php echo $witr_gutter_column; ?>">
								<div class="busi_singleBlog">
									<!-- image -->
									<?php if(has_post_thumbnail()){?>
									<div class="witr_sb_thumb">
										<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('poket-blog-default'); ?> </a>
										
										<?php if( $witrshowdata['witr_pagination_meta'] == 'yes' ){?>
										<div class="witr_post_Author stb5">
												<!-- image -->
												<?php
													echo get_avatar( get_the_author_meta('ID'), 60); 
												 ?>																
											<a class="nameAuthor" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php esc_html_e('Posted by','poket')?> <?php the_author(); ?></a>
										</div>
										<?php } ?>
										
									</div>	
									<?php } ?>
									<div class="all_blog_color">	
										<div class="witr_blog_con bs5">
											<!--  post meta -->
											<?php
												foreach ( $witrshowdata['witr_post_meta'] as $element ) {						
													if( $element=="aa"){?>
														<span><i class="icofont-tags"></i> <?php the_category(', ');?></span>
													<?php }?>
													<?php if( $element=="a"){?>
														<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class="icofont-user-alt-3"></i> <?php the_author(); ?> </a></span>
													<?php }?>
													<?php if( $element=="d"){?>
														<span><a href="#"><i class="icofont-ui-clock"></i></a> <?php the_time(esc_html__('d M Y','poket')); ?></span>
													<?php }?>
													<?php if( $element=="c"){?>
														<span>
														<?php if ( comments_open() || get_comments_number() ) {?>
															<a href="<?php comments_link(); ?>"><i class="icofont-speech-comments"></i>
																<?php comments_number( esc_html__('0','poket'), esc_html__('1 ','poket'), esc_html__('% ','poket') );?>
															</a>						
														<?php }else{?>
															<span><i class="icofont-speech-comments"></i> <?php echo esc_html__('Comments Off','poket'); ?></span>
															<span><i class="icofont-speech-comments"></i> <?php echo esc_html__('Comments Off','poket'); ?></span>
														<?php } ?>														
														
														
														</span>
													<?php }?>
														
												<?php }	?>									
											<!-- title -->
											<h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $witr_title_length, '' );?></a></h2>
											<!-- content -->
											<?php if(! empty( $witrshowdata['witr_show_content'] )){?>
												<?php echo '<p>'.wp_trim_words( get_the_content(), $witr_content_length, '' ).'</p>';?>
											<?php } ?>											
										</div>

											
											<?php if(! empty( $witrshowdata['witr_blog_button'] )){?>
											<div class="em-blog-content-area_adn ">
												<div class="learn_more_adn">
												  <a class="learn_btn adnbtn2" href="<?php the_permalink(); ?>"><?php echo $witrshowdata['witr_blog_button']; ?> </a>
												</div>
											</div>	
											<?php } ?>											

									</div>
									
								</div>
							</div>
						<?php endwhile; ?>	
						<?php wp_reset_query(); ?>						
					</div>
				</div>
			</section>
			<!-- Blog Section -->												
				