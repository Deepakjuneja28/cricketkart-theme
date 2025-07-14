<?php get_header(); ?>

<div class="bg-white min-h-screen py-12">
  <div class="max-w-7xl mx-auto px-4">

    <!-- Hero Section -->
    <div class="text-center mb-12">
      <h1 class="text-4xl sm:text-5xl font-bold text-black mb-4">🏏 Welcome to <span class="text-red-600">CricketKart</span></h1>
      <p class="text-gray-600 text-lg">Buy premium cricket essentials — bats, gloves, pads, helmets & more.</p>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      <?php
      $args = [
          'post_type' => 'product',
          'posts_per_page' => 8
      ];
      $loop = new WP_Query($args);

      if ($loop->have_posts()):
          while ($loop->have_posts()): $loop->the_post();
              global $product;
              $material = get_field('material');
              $warranty = get_field('warranty_period');
      ?>
       <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow transition hover:shadow-lg hover:border-red-400 group">
            <a href="<?php the_permalink(); ?>" class="block">
    <?php if (has_post_thumbnail()) {
      the_post_thumbnail('medium', ['class' => 'w-full h-auto max-h-64 mx-auto object-contain transform group-hover:scale-105 transition duration-300']);
    } ?>
    <div class="p-4">
      <h2 class="text-lg font-semibold text-gray-800 mb-1 group-hover:text-red-600 transition">
        <?php the_title(); ?>
      </h2>

      <p class="text-red-600 font-bold mb-2"><?php echo $product->get_price_html(); ?></p>

      <?php if ($material): ?>
        <p class="text-sm text-gray-600">
          <span class="font-semibold">Material:</span> <?= esc_html($material); ?>
        </p>
      <?php endif; ?>
      <?php if ($warranty): ?>
        <p class="text-sm text-gray-600">
          <span class="font-semibold">Warranty:</span> <?= esc_html($warranty); ?>
        </p>
      <?php endif; ?>

      <a href="<?= esc_url($product->add_to_cart_url()); ?>" class="mt-3 inline-block bg-red-600 text-white text-sm px-4 py-2 rounded hover:bg-red-500 hover:scale-105 transition duration-200">
        Add to Cart
      </a>
    </div>
  </a>
</div>

      <?php endwhile;
          wp_reset_postdata();
      else:
          echo '<p class="text-center col-span-4 text-gray-500">No products found.</p>';
      endif;
      ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
