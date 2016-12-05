<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Terrifico
 */
$terrifico_theme_options = terrifico_get_options( 'terrifico_theme_options' );
if ( $terrifico_theme_options['post_navigation'] == 'sidebar') { get_template_part('post','nav'); } 

if ( ! dynamic_sidebar( 'main-sidebar' ) ) : ?>
	<div id="archives" class="widget wow fadeIn widget_archive" data-wow-delay="0.5s">
		<div class="widget-title clearfix">
			<h4><?php esc_attr_e( 'Archives', 'terrifico' ); ?></h4>
		</div>
		<ul>
			<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
		</ul>
	</div>
	<div id="meta" class="widget wow fadeIn widget_meta" data-wow-delay="0.5s">
		<div class="widget-title clearfix">
			<h4><?php esc_attr_e( 'Meta', 'terrifico' ); ?></h4>
		</div>	
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</div>
<?php endif; ?>
