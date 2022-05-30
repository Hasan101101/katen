<?php

/**
 * Template Name: Contact Page
 */

get_header();
?>

<!-- page header -->
<section class="page-header">
   <div class="container-xl">
      <div class="text-center">
         <h1 class="mt-0 mb-2">
            <?php the_title(); ?>
         </h1>
      </div>
   </div>
</section>

<!-- section main content -->
<section class="main-content">
   <div class="container-xl">

      <div class="row">

     <?php 
         $katen_phone_number = get_theme_mod('katen_contact_phone_number_setting', __('+1-202-555-0135', 'katen'));     
         $katen_email_address = get_theme_mod('katen_contact_email_address_setting', __('hello@example.com', 'katen'));     
         $katen_location = get_theme_mod('katen_contact_location_setting', __('Chechenia, Russia', 'katen'));     
     ?>
         <div class="col-md-4">
            <!-- contact info item -->
            <div class="contact-item bordered rounded d-flex align-items-center">
               <span class="icon icon-phone"></span>
               <div class="details">
                  <h3 class="mb-0 mt-0">
                     <?php _e('Phone', 'katen'); ?>
                  </h3>
                  <p class="mb-0">
                    <?php echo esc_html($katen_phone_number); ?>
                  </p>
               </div>
            </div>
            <div class="spacer d-md-none d-lg-none" data-height="30"></div>
         </div>

         <div class="col-md-4">
            <!-- contact info item -->
            <div class="contact-item bordered rounded d-flex align-items-center">
               <span class="icon icon-envelope-open"></span>
               <div class="details">
                  <h3 class="mb-0 mt-0">
                     <?php _e('E-mail', 'katen'); ?>
                  </h3>
                  <p class="mb-0">
                  <?php echo esc_html($katen_email_address); ?>
                  </p>
               </div>
            </div>
            <div class="spacer d-md-none d-lg-none" data-height="30"></div>
         </div>

         <div class="col-md-4">
            <!-- contact info item -->
            <div class="contact-item bordered rounded d-flex align-items-center">
               <span class="icon icon-map"></span>
               <div class="details">
                  <h3 class="mb-0 mt-0">
                     <?php _e('Location', 'katen'); ?>
                  </h3>
                  <p class="mb-0">
                  <?php echo esc_html($katen_location); ?>
                  </p>
               </div>
            </div>
         </div>

      </div>

      <div class="spacer" data-height="50"></div>

      <!-- section header -->
      <div class="section-header">
         <h3 class="section-title">
            <?php _e('Send Message', 'katen'); ?>
         </h3>
         <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wave.svg" class="wave" alt="wave" />
      </div>

      <!-- Contact Form -->
      <div id="contact-form" class="contact-form">

         <div class="messages"></div>

         <?php
         echo do_shortcode('[contact-form-7 id="141" title="My Contact Form"]');
         ?>

      </div>
      <!-- Contact Form end -->
   </div>
</section>

<?php get_footer(); ?>