<footer class="bg-gray-100 border-t mt-16">
  <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 text-sm text-gray-700">

    <!-- About -->
    <div>
      <h2 class="font-semibold text-lg mb-3 text-black">About CricketKart</h2>
      <p class="text-gray-600 leading-relaxed">
        CricketKart is your go-to destination for all cricket gear. From beginners to pros, shop bats, pads, gloves, helmets, and more.
      </p>
    </div>

    <!-- Quick Links -->
    <div>
      <h2 class="font-semibold text-lg mb-3 text-black">Quick Links</h2>
      <ul class="space-y-2">
        <li><a href="<?php echo home_url(); ?>" class="hover:text-red-600 transition">Home</a></li>
        <li><a href="<?php echo wc_get_cart_url(); ?>" class="hover:text-red-600 transition">Cart</a></li>
        <li><a href="#" class="hover:text-red-600 transition">Contact Us</a></li>
      </ul>
    </div>

    <!-- Contact Info -->
    <div>
      <h2 class="font-semibold text-lg mb-3 text-black">Contact</h2>
      <ul class="space-y-1">
        <li>Email: <a href="mailto:support@cricketkart.in" class="text-gray-600 hover:text-red-600 transition">support@cricketkart.in</a></li>
        <li>Phone: <a href="tel:+919876543210" class="text-gray-600 hover:text-red-600 transition">+91 98765 43210</a></li>
        <li>Location: <span class="text-gray-600">New Delhi, India</span></li>
      </ul>
    </div>
  </div>

  <div class="border-t border-gray-300 text-center text-xs text-gray-500 py-4">
    &copy; <?php echo date('Y'); ?> <span class="font-semibold text-black">CricketKart</span>. All rights reserved.
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
