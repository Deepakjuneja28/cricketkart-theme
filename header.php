<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CricketKart - Your Online Cricket Store</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="bg-white text-black shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
    
    <!-- Logo -->
    <a href="<?php echo home_url(); ?>" class="text-2xl font-bold tracking-wide hover:text-red-500 transition">
      🏏 CricketKart
    </a>

    <!-- Navigation Links -->
    <nav class="space-x-6 text-sm font-medium hidden md:flex">
      <a href="<?php echo home_url(); ?>" class="hover:text-red-400 transition">Home</a>
      <a href="<?php echo wc_get_cart_url(); ?>" class="hover:text-red-400 transition relative group">
        Cart
        <span class="absolute -top-2 -right-4 bg-red-600 text-white text-xs px-2 py-0.5 rounded-full group-hover:bg-red-500 transition">
          <?php echo WC()->cart->get_cart_contents_count(); ?>
        </span>
      </a>
    </nav>

    <!-- Mobile Menu Icon (optional if you want later) -->
  </div>
</header>
