<?php
// Enqueue styles
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', ['parent-style']);
});
add_action('wp_footer', function() {
    echo "<style>#scrollToTop, .scrollToTopBtn { display: none !important; }</style>";
});


// Show ACF fields on product page
add_action('woocommerce_single_product_summary', 'ck_display_acf_fields_single', 25);
function ck_display_acf_fields_single() {
    global $product;
    $id = $product->get_id();
    $material = get_field('material', $id);
    $warranty = get_field('warranty_period', $id);

    if ($material || $warranty) {
        echo '<div class="acf-box">';
        if ($material) echo '<p><strong>Material:</strong> ' . esc_html($material) . '</p>';
        if ($warranty) echo '<p><strong>Warranty:</strong> ' . esc_html($warranty) . '</p>';
        echo '</div>';
    }
}
// Save ACF fields to Order Item Meta (for order view & thank you page)
add_action('woocommerce_checkout_create_order_line_item', function($item, $cart_item_key, $values, $order) {
    if (!empty($values['custom_material'])) {
        $item->add_meta_data('Material', $values['custom_material'], true);
    }

    if (!empty($values['custom_warranty'])) {
        $item->add_meta_data('Warranty', $values['custom_warranty'], true);
    }
}, 10, 4);


// Cart item data
add_filter('woocommerce_add_cart_item_data', function($cart_item_data, $product_id) {
    $cart_item_data['material'] = get_field('material', $product_id);
    $cart_item_data['warranty_period'] = get_field('warranty_period', $product_id);
    return $cart_item_data;
}, 10, 2);

// Show in cart/checkout
add_filter('woocommerce_get_item_data', function($item_data, $cart_item) {
    if (!empty($cart_item['material'])) {
        $item_data[] = ['name' => 'Material', 'value' => $cart_item['material']];
    }
    if (!empty($cart_item['warranty_period'])) {
        $item_data[] = ['name' => 'Warranty Period', 'value' => $cart_item['warranty_period']];
    }
    return $item_data;
}, 10, 2);

// Save in order
add_action('woocommerce_add_order_item_meta', function($item_id, $values) {
    if (!empty($values['material'])) {
        wc_add_order_item_meta($item_id, 'Material', $values['material']);
    }
    if (!empty($values['warranty_period'])) {
        wc_add_order_item_meta($item_id, 'Warranty Period', $values['warranty_period']);
    }
}, 10, 2);

// Custom Shipping Charges
add_filter('woocommerce_package_rates', function($rates, $package) {
    // Count total quantity of all products in cart
    $total_quantity = 0;

    foreach (WC()->cart->get_cart() as $cart_item) {
        $total_quantity += $cart_item['quantity'];
    }

    // Set new shipping cost based on quantity
    foreach ($rates as $rate_key => $rate) {
        if ($rate->method_id === 'flat_rate') {
            if ($total_quantity <= 4) {
                $rates[$rate_key]->cost = 50;
            } else {
                $rates[$rate_key]->cost = 30;
            }

            // Update taxes if needed
            if (!empty($rates[$rate_key]->taxes)) {
                foreach ($rates[$rate_key]->taxes as $tax_id => $tax) {
                    $rates[$rate_key]->taxes[$tax_id] = WC_Tax::calc_tax($rates[$rate_key]->cost, WC_Tax::get_rates($rate->tax_class), false)[$tax_id];
                }
            }
        }
    }

    return $rates;
}, 10, 2);

