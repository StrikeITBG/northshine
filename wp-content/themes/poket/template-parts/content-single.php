<?php 
/*
single details page

*/
 global $poket_opt;
?>							
		<div class="poket-single-blog-details">
			<?php if(has_post_thumbnail()){?>
				<div class="poket-single-blog--thumb">
					<?php the_post_thumbnail('poket-blog-single', array( 'class' => 'img-fluid')); ?>
				</div>									
			<?php } ?>
			<div class="poket-single-blog-details-inner">	
				<div class="poket-single-blog-title">
					<h2><?php the_title(); ?></h2>	
				</div>
				<!-- BLOG POST META  -->		
				<?php poket_blog_singlepost_meta();?>

				

				<div class="poket-single-blog-content">
					<div class="single-blog-content">
					<?php the_content();
					if ( '' != get_the_content() ) { ?>					
						<div class="page-list-single">						
							<?php 
							/**
							* Display In-Post Pagination
							*/
							wp_link_pages( array(
								'link_before'   => '<span>',
								'link_after'    => '</span>',
								'before'        => '<p class="inner-post-pagination"><span>' . esc_html__('Pages:', 'poket'),
								'after'     => '</p>'
							)); ?>					
												
						</div>
					<?php } ?>
					</div>
				</div>
			

				<?php if( 'post' == get_post_type() ) { ?>	
				
				
					<?php if (!empty($poket_opt['poket_blog_socialsharesh_hide']) && $poket_opt['poket_blog_socialsharesh_hide']==true){?>
						
						<div class="poket-blog-social">
							<div class="poket-single-icon">
								<?php
								if( function_exists('twr_sitepage_sharing') ){						
									twr_sitepage_sharing();
								}
								?>
							</div>
						</div>					
						
					<?php }else{
						
					}} ?> 	
			</div>
		</div>

	<?php comments_template();