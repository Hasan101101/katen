<footer>
   <div class="container-xl">
      <div class="footer-inner">
         <div class="row d-flex align-items-center gy-4">
            <!-- copyright text -->
            <div id="copyright" class="col-md-4">
               <?php
               if (is_active_sidebar('footer-copyright')) {
                  dynamic_sidebar('footer-copyright');
               }
               ?>
            </div>

            <!-- social icons -->
            <div class="col-md-4 text-center">
               <ul class="social-icons list-unstyled list-inline mb-0">
                  <?php get_template_part('template-parts/common/socials'); ?>
               </ul>
            </div>

            <!-- go to top button -->
            <div class="col-md-4">
               <a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to Top</a>
            </div>
         </div>
      </div>
   </div>
</footer>

</div><!-- end site wrapper -->

<!-- search popup area -->
<div class="search-popup">
   <!-- close button -->
   <button type="button" class="btn-close" aria-label="Close"></button>
   <!-- content -->
   <div class="search-content">
      <div class="text-center">
         <h3 class="mb-4 mt-0">Press ESC to close</h3>
      </div>
      <!-- form -->
      <?php
      get_search_form();
      ?>
   </div>
</div>

<!-- canvas menu -->
<div class="canvas-menu d-flex align-items-end flex-column">
   <!-- close button -->
   <button type="button" class="btn-close" aria-label="Close"></button>

   <!-- logo -->
   <div class="logo">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Katen" />
   </div>

   <!-- menu -->
   <nav>
      <?php
      wp_nav_menu(array(
         'theme_location' => 'primary-vertical',
         'container'       => false,
         'menu_id'         => 'primary-vertical-menu',
         'menu_class'      => 'vertical-menu',
         'menu'   => 'Something for vertical custom walker',
         'walker' => new katen_vertical_Walker_Nav_Menu(),
      ));
      ?>
   </nav>

   <!-- social icons -->
   <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
      <?php get_template_part('template-parts/common/socials'); ?>
   </ul>
</div>

<?php wp_footer(); ?>

</body>

</html>