<?php 
/**
 * @package Terrifico
 *
 */
global $post; 
if (!is_front_page()) {
	echo '<ul>';
    echo '<li><a href="';
    echo esc_url(home_url());
    echo '">';
    esc_attr_e('Home','terrifico');
    echo '</a></li><li class="separator"> / </li>';
    if (is_category() || is_single()) {
        echo '<li>';
        the_category(' </li><li class="separator"> / </li><li> ');
        if (is_single()) {
            echo '</li><li class="separator"> / </li><li>';
            the_title();
            echo '</li>';
        }
    } elseif (is_page()) {
        if($post->post_parent){
            $anc = get_post_ancestors( $post->ID );
                 
            foreach ( $anc as $ancestor ) {
                $output = '<li><a href="'.esc_url(get_permalink($ancestor)).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
            }
			echo $output;
            echo '<li title="'.esc_attr(get_the_title()).'"> '.esc_attr(get_the_title()).'</li>';
        } else {
            echo '<li> ';
            echo the_title();
            echo '</li>';
        }
    }  
elseif (is_tag()) {
	esc_attr_e('Tag: ','terrifico');esc_attr(single_tag_title());
}
elseif (is_day()) {echo"<li> " . esc_attr__('Archive for ','terrifico'); the_archive_title(); echo'</li>';}
elseif (is_month()) {echo"<li> " . esc_attr__('Archive for ','terrifico'); the_archive_title(); echo'</li>';}
elseif (is_year()) {echo"<li> " . esc_attr__('Archive for ','terrifico'); the_archive_title(); echo'</li>';}
elseif (is_author()) {echo"<li> " . esc_attr__('Author: ','terrifico'); esc_url(the_author_posts_link()); echo'</li>';}
elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li> " . esc_attr__('Blog Archives ','terrifico'); echo'</li>';}
elseif (is_search()) {echo"<li> " . esc_attr__('Search Results ','terrifico'); echo'</li>';}
echo '</ul>';
}