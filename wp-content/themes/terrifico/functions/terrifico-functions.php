<?php
/**
 * Terrifico functions and definitions
 *
 * @package Terrifico
 *
 *
 */
	
/**
 * Loads theme setup functions.
 */
function terrifico_setup() {

	/**
 	* Sets up the content width.
 	*/
	global $content_width;
	if ( ! isset( $content_width ) ) { $content_width = 1200; }
	
	/** 
	 * Makes theme available for translation
	 * 
	 */
	load_theme_textdomain( 'terrifico', get_template_directory() . '/languages' );

	/** 
 	* This theme styles the visual editor with editor-style.css to match the theme style.
 	*/
	add_editor_style();

	/** 
 	 * Default RSS feed links
	 */
	add_theme_support('automatic-feed-links');
	
	/**
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/**
 	* Register Navigation
 	*/
	register_nav_menu('main_navigation', __('Primary Menu', 'terrifico') );

	/** 
 	* Support a variety of post formats.
 	*/
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'gallery' ) );

	/** 
 	* Custom image size for featured images, displayed on "standard" posts.
 	*/
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 2500, 9999 ); // Unlimited height, soft crop.
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	
	/**
 	* Sets up theme custom background.
 	*/
	add_theme_support( 'custom-background', apply_filters( 'terrifico_custom_background_args', array(
		'default-color' => 'fcfcfc',
		'default-image' => '',
	) ) );
	
	/**
	* Sets up theme custom header image.
	*/
	add_theme_support( 'custom-header', apply_filters( 'terrifico_custom_header_args', array(
		'width'                  => 1920,
		'height'                 => 200,
		'flex-height'            => true,
		'header-text'            => false,
	) ) );
	
	/*
	* Enable support for custom logo.
	*/
	add_image_size( 'terrifico-logo', 300, 80 );
	add_theme_support( 'custom-logo', array( 'size' => 'terrifico-logo' ) );
}

add_action( 'after_setup_theme', 'terrifico_setup' );

/** 
 * Add scripts function
 */
function terrifico_add_script_function() {
	/** 
	* Enqueue css
	*/
	$terrifico_theme_options = terrifico_get_options( 'terrifico_theme_options' );
	wp_enqueue_style ('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('terrifico',  get_stylesheet_uri());
	if ($terrifico_theme_options['animation'] == '1'):
		wp_enqueue_style ('animate', get_template_directory_uri() . '/css/animate.css');
	endif;
	if ($terrifico_theme_options['responsive_design'] == '1'):
		wp_enqueue_style ('terrifico-responsive', get_template_directory_uri() . '/css/responsive.css');
	endif;
	wp_enqueue_style ('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	if( $terrifico_theme_options['google_font_body'] !=""):
		wp_enqueue_style ('terrifico-body-font', '//fonts.googleapis.com/css?family='. urlencode($terrifico_theme_options['google_font_body']) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
	endif;
	if( $terrifico_theme_options['google_font_menu'] != ""):
		wp_enqueue_style ('terrifico-menu-font', '//fonts.googleapis.com/css?family='. urlencode($terrifico_theme_options['google_font_menu']) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
	endif;
	if( $terrifico_theme_options['google_font_logo'] != ""):
		wp_enqueue_style ('terrifico-logo-font', '//fonts.googleapis.com/css?family='. urlencode($terrifico_theme_options['google_font_logo']) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
	endif;

	/** 
	 * Enqueue javascripts
	 */
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ),'', false);
	wp_enqueue_script('jquery-smartmenus', get_template_directory_uri() . '/js/jquery.smartmenus.js', array( 'jquery' ),'', false);
	wp_enqueue_script('jquery-smartmenus-bootstrap', get_template_directory_uri() . '/js/jquery.smartmenus.bootstrap.js', array( 'jquery' ),'', false);	
	wp_enqueue_script('terrifico-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ),'', true);	
	wp_enqueue_script('imgLiquid', get_template_directory_uri() . '/js/imgLiquid.js', array( 'jquery' ),'', false);
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery' ),'', false);
	wp_enqueue_script( 'unslider', get_template_directory_uri() . '/js/unslider.js', array( 'jquery' ),'', true);
	wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ),'', true);
	wp_enqueue_script( 'ideal-image-slider', get_template_directory_uri() . '/js/ideal-image-slider.js', array(), '20160115', true );
	if ($terrifico_theme_options['captions_on'] == '1') {	
		if (is_home() && ! is_paged()) {
			wp_enqueue_script( 'iis-captions', get_template_directory_uri() . '/js/iis-captions.js', array(), '20160116', true );
		}
	}
	if ( $terrifico_theme_options['menu_sticky'] == 1) {
		wp_enqueue_script('stickUp', get_template_directory_uri() . '/js/stickUp.js', array( 'jquery' ),'', false);
		wp_enqueue_script('terrifico-sticky', get_template_directory_uri() . '/js/sticky.js', array( 'jquery' ),'', false);
	}
	if ( $terrifico_theme_options['scrollup'] == 1) { 
		wp_enqueue_script('terrifico-scrollup', get_template_directory_uri() . '/js/scrollup.js', array( 'jquery' ),'', true); 
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( $terrifico_theme_options['animation'] == '1') { 
		wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.js', array(),'', false);
		wp_enqueue_script('animation', get_template_directory_uri() . '/js/animation.js', array(),'', true); 
	}
	wp_enqueue_script( 'terrifico-html5', get_template_directory_uri() . '/js/html5.js', array(), '' );
	wp_script_add_data( 'terrifico-html5', 'conditional', 'lt IE 9' );
}

add_action('wp_enqueue_scripts','terrifico_add_script_function');

/** 
 * Register widgetized locations
 */
function terrifico_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Main Sidebar', 'terrifico' ),
		'id' => 'main-sidebar',
		'before_widget' => '<div id="%1$s" class="widget wow fadeIn %2$s" data-wow-delay="0.5s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title clearfix"><h4><span>',
		'after_title' => '</span></h4></div>',
	));

	register_sidebar(array(
		'name' =>  __( 'Footer Widget 1', 'terrifico' ),
		'id' => 'footer-widget-1',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widget 2', 'terrifico' ),
		'id' => 'footer-widget-2',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widget 3', 'terrifico' ),
		'id' => 'footer-widget-3',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widget 4', 'terrifico' ),
		'id' => 'footer-widget-4',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
}

add_action( 'widgets_init', 'terrifico_widgets_init' );

/** 
 * Displays navigation to next/previous pages
 */
function terrifico_paging_nav(){
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'terrifico' ),
		'next_text' => __( 'Next &rarr;', 'terrifico' ),
	) );

	if ( $links ) :

	?>
	<div class="pagination">
		<?php echo $links; ?>
	</div><!--pagination-->
	<?php
	endif;
}

/** 
 * Function to display image slider in gallery post formats.
*/
function terrifico_gallery_post() { 
	global $post;
	?>
	<div class="flexslider">
		<ul class="slides">	
		<?php
			//Pull gallery images from custom meta
			$gallery_image = get_post_gallery_images( $post );
			if($gallery_image !=  ''){
				foreach ($gallery_image as $arr){
					echo '<li><img src="'.esc_url($arr).'" alt="'.esc_attr($arr).'" /></li>';
				}
			}
		?>		
		</ul>
	</div>	
	<?php wp_enqueue_script('gallery-slides', get_template_directory_uri() . '/js/gallery-slides.js', array( 'jquery' ),'', true);
}

/** 
 * Function to add ScrollUp to the footer.
*/
function terrifico_add_scrollup() { 
	$terrifico_theme_options = terrifico_get_options( 'terrifico_theme_options' );
	if ( $terrifico_theme_options['scrollup'] == 1) { 
		echo '<a href="#" class="back-to-top"><i class="fa fa-arrow-circle-up"></i></a>'."\n";
	}
}

add_action('wp_footer', 'terrifico_add_scrollup');

/** 
 * Load function to change excerpt length
 * 
 */
function terrifico_excerpt_length( $length ) {
	$terrifico_theme_options = terrifico_get_options( 'terrifico_theme_options' );	
	if($terrifico_theme_options['blog_excerpt'] !="") {
		$excrpt = $terrifico_theme_options['blog_excerpt'];
		return $excrpt;
	} else {
		$excrpt = '50';
		return $excrpt;
	}
}
add_filter('excerpt_length', 'terrifico_excerpt_length', 999);


/** 
 * Function for displaying image attachments.
 * 
 */
function terrifico_the_attached_image() {
	$post = get_post();
	$attachment_size = apply_filters( 'terrifico_attachment_size', array( 1024, 1024 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}

/** 
 * Function for displaying custom logo.
 * 
 */
if ( ! function_exists( 'terrifico_the_custom_logo' ) ) :
function terrifico_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;