<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );
?>

<div class="bg-white py-12">
  <div class="max-w-7xl mx-auto px-4">
    <?php while ( have_posts() ) : the_post();
      global $product;
      $material = get_field('material');
      $warranty = get_field('warranty_period');
    ?>

    <div id="product-<?php the_ID(); ?>" <?php wc_product_class('grid grid-cols-1 md:grid-cols-2 gap-10 items-start'); ?>>

      <!-- Product Image -->
      <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-md transition relative">
        <?php if ( has_post_thumbnail() ) {
          echo get_the_post_thumbnail( $product->get_id(), 'large', ['class' => 'w-full h-auto object-contain rounded'] );
        } ?>

        <!-- Short Description next to image -->
        <div class="mt-6 text-gray-700 text-sm leading-relaxed border-t pt-4">
          <h2 class="text-lg font-semibold mb-2 text-gray-800">About this item:</h2>
          <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
        </div>
      </div>

      <!-- Product Details -->
      <div>
        <h1 class="text-3xl font-bold text-gray-900 mb-3"><?php the_title(); ?></h1>

        <div class="text-red-600 text-xl font-bold mb-4">
          <?php echo $product->get_price_html(); ?>
        </div>

        <?php if ($material): ?>
          <p class="text-sm text-gray-700 mb-1"><strong>Material:</strong> <?= esc_html($material); ?></p>
        <?php endif; ?>

        <?php if ($warranty): ?>
          <p class="text-sm text-gray-700 mb-4"><strong>Warranty:</strong> <?= esc_html($warranty); ?></p>
        <?php endif; ?>

        <!-- Add to Cart Button -->
        <div class="mb-6">
          <form class="cart" method="post" enctype='multipart/form-data'>
            <?php woocommerce_template_single_add_to_cart(); ?>
          </form>

          <style>
            .single_add_to_cart_button.button {
              background-color: #dc2626 !important; /* red-600 */
              color: white !important;
              padding: 10px 24px;
              border-radius: 6px;
              transition: 0.3s ease;
              font-weight: 500;
            }

            .single_add_to_cart_button.button:hover {
              background-color: #b91c1c !important; /* red-700 */
            }
          </style>
        </div>
      </div>
    </div>

    <!-- Tabs (Description, Reviews etc.) -->
    <div class="mt-12 border-t pt-8">
      <?php woocommerce_output_product_data_tabs(); ?>
    </div>

    <?php endwhile; ?>
  </div>
</div>

<?php get_footer( 'shop' ); ?>
