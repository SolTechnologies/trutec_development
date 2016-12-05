<?php 
/**
 * @package Terrifico
 */
?>
<?php if (!is_single()) { ?>
	<div class="clear"></div>
	<div class="meta">
		<span><i class="fa fa-calendar"></i><a class="p-date" title="<?php esc_attr(the_time()); ?>" href="<?php esc_url(the_permalink()); ?>"><span class="post_date date updated"><?php esc_attr(the_time('F j, Y')); ?></span></a></span>
		<span class="separator"> / </span>
		<span><i class="fa fa-comments-o"></i><a href="<?php esc_url(comments_link()); ?>"><?php esc_attr(comments_number( esc_attr__('No Comments','terrifico'), esc_attr__('1 Comment','terrifico'), esc_attr__('% Comments','terrifico'))); ?></a></span>
		<span class="separator"> / </span>
		<span><i class="fa fa-arrow-circle-o-right"></i><a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr_e('More','terrifico'); ?></a></span>
	</div>
<?php } ?>