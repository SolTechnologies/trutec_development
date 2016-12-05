<?php 
/**
 * @package Terrifico
 *
 *
 * Check for featured images 
 */ 
$terrifico_theme_options = terrifico_get_options( 'terrifico_theme_options' );
if ( $terrifico_theme_options['blog_content'] == 'excerpt') {
	if (has_post_format( 'gallery' )) {
	
		terrifico_gallery_post();
	
	} else {
		if ( has_post_thumbnail() ) { ?>
			<div class="image-holder">
				<div class="thumb-wrapper imgLiquidFill imgLiquid">
					<?php the_post_thumbnail('full'); ?>
				</div>
			</div>
		<?php 
		}else{ ?>
			<div class="image-holder">
				<div class="thumb-wrapper imgLiquidFill imgLiquid">
					<img class="attachment-full wp-post-image rs-slide-image" width="1024" height="500" alt="<?php esc_attr_e('Slide','terrifico');?>" src="<?php echo esc_url(get_template_directory_uri().'/images/assets/slide.jpg'); ?>">
				</div>
			</div>
		<?php 
		}
	} 
}

if ( $terrifico_theme_options['blog_content'] == 'excerpt') { ?>
	<div class = "text-holder">
		<a class="post-title" href="<?php esc_url(the_permalink()); ?>"><h3 <?php post_class('entry-title'); ?>><?php the_title(); ?></h3></a>
			<?php 
			get_template_part( 'post', 'meta');
			the_excerpt(esc_attr__( 'Continue Reading...', 'terrifico' ) ); 
			the_tags('<p class="post-tags"><span>'.__('Tags:','terrifico').'</span> ','','</p>'); ?>
	</div>
<?php } else { ?>
	<div class = "text-holder-full">
		<a class="post-title" href="<?php esc_url(the_permalink()); ?>"><h3 <?php post_class('entry-title'); ?>><?php the_title(); ?></h3></a>
		
		<?php if ($terrifico_theme_options['post_info'] == 'above') { get_template_part('post','info');}
			
			if (has_post_format( 'gallery' )) {
				terrifico_gallery_post();
			} else { 
				if (has_post_format( 'video' )) {
				} else {
					if ( has_post_thumbnail() ) { ?>
						<div class="thumb-wrapper">
							<?php the_post_thumbnail('full'); ?>
						</div><!--thumb-wrapper-->
					<?php 
					} 		
				}	
			}
			
			the_content( esc_attr__( 'Continue Reading...', 'terrifico' ) ); ?> 
	</div>	
<?php } ?>
