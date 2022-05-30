<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<!-- Mirrored from themeger.shop/html/katen/html/category.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 15:42:55 GMT -->

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
   <?php wp_body_open(); ?>

   <!-- preloader -->
   <div id="preloader">
      <div class="book">
         <div class="inner">
            <div class="left"></div>
            <div class="middle"></div>
            <div class="right"></div>
         </div>
         <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
         </ul>
      </div>
   </div>

   <!-- site wrapper -->
   <div class="site-wrapper">

      <div class="main-overlay"></div>

      <!-- header -->
      <header class="header-personal">
         <div class="container-xl header-top">
            <div class="row align-items-center">

               <div class="col-4 d-none d-md-block d-lg-block">
                  <!-- social icons -->
                  <ul class="social-icons list-unstyled list-inline mb-0">
                     <?php get_template_part('template-parts/common/socials'); ?>
                  </ul>
               </div>

               <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                  <!-- site logo -->
                  <?php
                  if (has_custom_logo()) {
                     the_custom_logo();
                  } else {
                     echo '<a class="d-block text-logo">' . get_bloginfo('name') . '</a>';
                  }
                  ?>

                  <a href="<?php echo esc_url(home_url()); ?>" class="d-block text-logo"><?php bloginfo('name'); ?>
                     <span class="dot">.</span>
                  </a>
                  <span class="slogan d-block"><?php bloginfo('description'); ?></span>
               </div>

               <div class="col-md-4 col-sm-12 col-xs-12">
                  <!-- header buttons -->
                  <div class="header-buttons float-md-end mt-4 mt-md-0">
                     <button class="search icon-button">
                        <i class="icon-magnifier"></i>
                     </button>
                     <button class="burger-menu icon-button ms-2 float-end float-md-none">
                        <span class="burger-icon"></span>
                     </button>
                  </div>
               </div>

            </div>
         </div>

         <nav class="navbar navbar-expand-lg">
            <div class="container-xl">
               <?php
               $katen_primary_menu = wp_nav_menu(array(
                  'theme_location' => 'primary',
                  'container_class' => 'collapse navbar-collapse justify-content-center centered-nav',
                  'menu_class'      => 'navbar-nav',
                  'menu'   => 'Something custom walker',
                  'walker' => new katen_Walker_Nav_Menu(),
                  'echo'   => false,
               ));
               $katen_primary_menu = str_replace('menu-item-has-children', 'menu-item-has-children dropdown', $katen_primary_menu);
               echo $katen_primary_menu;
               ?>
            </div>
         </nav>
      </header>