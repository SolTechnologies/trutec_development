<?php
/**
 *
 * @package Terrifico
 */
if ( is_single() ): ?>
	<ul class="link-pages">
		<li class="next-link"><?php esc_url(next_post_link('%link', '<i class="fa fa-chevron-right"></i><strong>'.esc_attr__('Next', 'terrifico').'</strong> <span>%title</span>')); ?></li>
		<li class="previous-link"><?php esc_url(previous_post_link('%link', '<i class="fa fa-chevron-left"></i><strong>'.esc_attr__('Previous', 'terrifico').'</strong> <span>%title</span>')); ?></li>
	</ul>
<?php 
endif;