<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */



$image_class = 'col-lg-6 col-md-6 col-sm-12'; 
$infor_class = 'col-lg-6 col-md-6 col-sm-12'; 

if($layout == 'small') {
    $image_class = 'col-lg-4 col-md-5 col-sm-12'; 
    $infor_class = 'col-lg-8 col-md-7 col-sm-12'; 
}

if($layout == 'large') {
    $image_class = 'col-sm-12'; 
    $infor_class = 'col-lg-6 col-md-6 col-sm-12'; 
}


if($layout == 'fixed') {
    $image_class = 'col-sm-6'; 
    $infor_class = 'col-lg-3 col-md-3 col-sm-12'; 
}

?>


<!--Alter the -->
		

<!--Begin Single Product Content-->
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class($class); ?>>
    <!--Custom Single Product Info Section-->
    <div id="single_product_info" class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="single_product_heading"><strong class="single_prod_step">STEP 1. </strong> SELECT COLOR <span class="fslash">/</span> <strong class="single_prod_step">STEP 2. </strong> SELECT LENGTH <span class="fslash">/</span> <strong class="single_prod_step">STEP 3. </strong> ORDER</div>
            	<?php
        			/**
        			 * woocommerce_single_product_summary hook
        			 *
        			 * @hooked woocommerce_template_single_title - 5 
        			 * @hooked woocommerce_template_single_rating - 10
        			 * @hooked woocommerce_template_single_price - 10
        			 * @hooked woocommerce_template_single_excerpt - 20
        			 * @hooked woocommerce_template_single_add_to_cart - 30
        			 * @hooked woocommerce_template_single_meta - 40
        			 * @hooked woocommerce_template_single_sharing - 50
        			 */
        			do_action( 'woocommerce_single_product_summary' );
        		?>
            </div>
        </div>
    </div>
    <!--End Custom Single Product Section-->
    
    <!--Custom Single Product Image Section-->
    
    <div class="padding-top-20 row">
        <div class="container">
            <div class="col-md-6">
                <div class="<?php esc_attr_e( $image_class ); ?> product-images">
                	<?php
                		/**
                		 * woocommerce_before_single_product_summary hook
                		 *
                		 * @hooked woocommerce_show_product_sale_flash - 10
                		 * @hooked woocommerce_show_product_images - 20
                		 */
                		do_action( 'woocommerce_before_single_product_summary' );
                	?>
                </div><!-- Product images/ END -->
            </div>
            <div class="col-md-6">
                <div class="row product_review">
                    <div class="col-md-12">
                        <img src="https://trutec-development-alexgutech.c9users.io/wp-content/uploads/2016/10/TruTec_4.5-STARS-ICN-1-e1480225669391.png"></img>
                        <button class="btn btn-primary">View Reviews</button>
                    </div>
                </div>
                <div class="row product_single_details">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="border-right-1">NEW 2016 DESIGN</td>
                                    <td>Double Layer Latex Core</td>
                                </tr>
                                 <tr>
                                    <td class="border-right-1">HOSE HOLDER stainless steel (Pat. Pend.)</td>
                                    <td>SOLID BRASS FITTING</td>
                                </tr>
                                 <tr class="border-bottom-1">
                                    <td class="border-right-1">30 Day Money Back GUARANTEE</td>
                                    <td>12 Month Replacement Warranty</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="product_single_price">
                    <div class="col-md-12">
                        <button class="btn btn-primary"><a href="https://trutec-development-alexgutech.c9users.io/checkout">Proceed to Checkout</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!--End Custom Single Product Image Section-->

    <?php if(etheme_get_option('upsell_location') == 'after_content') woocommerce_upsell_display(); ?>
   

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<!--End Single Product Content-->

<?php do_action( 'woocommerce_after_single_product' ); ?>
