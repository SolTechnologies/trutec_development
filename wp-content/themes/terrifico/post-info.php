<?php 
/**
 * @package Terrifico
 */
?>
<div class="post-info">
	<?php if(has_post_format('image')) {?>
		<span><i class="fa fa-camera"></i><a href="<?php printf(esc_url( get_post_format_link( 'image' ))); ?>"><?php printf( esc_attr__('Image','terrifico')); ?></a></span>
	<?php } elseif(has_post_format('gallery')) {?>
		<span><i class="fa fa-picture-o"></i><a href="<?php printf(esc_url( get_post_format_link( 'gallery' ))); ?>"><?php printf( esc_attr__('Gallery','terrifico')); ?></a></span>
	<?php } elseif(has_post_format('video')) {?>
		<span><i class="fa fa-video-camera"></i><a href="<?php printf(esc_url( get_post_format_link( 'video' ))); ?>"><?php printf( esc_attr__('Video','terrifico')); ?></a></span>
	<?php } elseif(has_post_format('aside')) {?>
		<span><i class="fa fa-file-text"></i><a href="<?php printf(esc_url( get_post_format_link( 'aside' ))); ?>"><?php printf( esc_attr__('Aside','terrifico')); ?></a></span>
	<?php } elseif(has_post_format('audio')) {?>
		<span><i class="fa fa-music"></i><a href="<?php printf(esc_url( get_post_format_link( 'audio' ))); ?>"><?php printf( esc_attr__('Audio','terrifico')); ?></a></span>
	<?php } else {?>
		<span><i class="fa fa-thumb-tack"></i><?php printf( esc_attr__('Standard','terrifico')); ?></span>
	<?php } ?>
	<span class="separator"> / </span>
	<span><i class="fa fa-user"></i><?php esc_attr_e('by ','terrifico'); printf(esc_url(the_author_posts_link())); ?> </span>
	<span class="separator"> / </span>
	<span><i class="fa fa-calendar"></i><?php printf(esc_attr( get_the_date())); ?> </span>
	<span class="separator"> / </span>
	<span><i class="fa fa-comment-o"></i><a href="<?php esc_url(comments_link()); ?>"><?php comments_number( esc_attr__('No Comments','terrifico'), esc_attr__('1 Comment','terrifico'), esc_attr__('% Comments','terrifico')); ?></a></span>
</div>