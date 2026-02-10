<?php

/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.7.0
 */

use Automattic\WooCommerce\Enums\ProductType;

if (! defined('ABSPATH')) {
	exit;
}

global $product;
$pro_cat = get_the_terms(get_the_ID(), 'product_cat');
$post_tags = get_the_terms(get_the_ID(), 'product_tag');
?>


<div class="tp-product-details-query">
	<div class="tp-product-details-query-item d-flex align-items-center">
		<span>SKU: </span>
		<p><?php echo esc_html($product->get_sku()); ?></p>
	</div>
	<div class="tp-product-details-query-item d-flex align-items-center">
		<span>Category: </span>
		<p>
			<?php
			$html = '';
			foreach ($pro_cat as $key => $cat) {

				$html .= '<span><a href="' . get_category_link($cat->term_id) . '">' . $cat->name . '</a></span>,';
			}
			echo rtrim($html, ',');

			?>
		</p>
	</div>
	<?php if ($post_tags) : ?>
	<div class="tp-product-details-query-item d-flex align-items-center">
		<span>Tag: </span>
		<p>
			<?php
			$html = '';
			foreach ($post_tags as $key => $tag) {

				$html .= '<span><a href="' . get_term_link($tag->term_id) . '">' . $tag->name . '</a></span>,';
			}
			echo rtrim($html, ',');

			?>
		</p>
	</div>
	<?php endif; ?>
</div>


