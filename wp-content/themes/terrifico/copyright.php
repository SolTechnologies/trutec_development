<?php
/**
 * @package Terrifico
 */  
$terrifico_theme_options = terrifico_get_options( 'terrifico_theme_options' );
?>
<div id="copyright">
	<div class="copyright-wrap">
		<span class="left"><i class="fa fa-copyright"></i><a href="<?php echo esc_url( home_url( '/' ) ) ?>"> <?php echo esc_attr($terrifico_theme_options['footer_copyright_text']);?></a></span>
		<span class="right"><a title="<?php esc_attr_e('Terrifico Theme','terrifico'); ?>" target="_blank" href="<?php echo esc_url( __('http://vpthemes.com/terrifico/','terrifico'));?>"><?php esc_attr_e('Terrifico Theme','terrifico'); ?></a><?php esc_attr_e(' powered by ','terrifico'); ?><a title="<?php esc_attr_e('WordPress','terrifico'); ?>" href="<?php echo esc_url( __('http://wordpress.org/','terrifico'));?>"><?php esc_attr_e('WordPress','terrifico'); ?></a></span>
	</div>
</div><!--copyright-->