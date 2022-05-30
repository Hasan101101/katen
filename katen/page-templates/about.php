<?php

/**
 * Template Name: About Page
 */

get_header();
?>

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

      <div class="row gy-4">

         <div class="col-lg-8">

            <div class="page-content bordered rounded padding-30">

               <?php
               the_post_thumbnail('large', ['class' => 'rounded mb-4']);
               the_content();
               ?>

               <hr class="my-4" />
               <ul class="social-icons list-unstyled list-inline mb-0">
                  <?php get_template_part('template-parts/common/socials'); ?>
               </ul>

            </div>

         </div>

         <!-- Sidebar -->
         <div class="col-lg-4">
            <?php get_sidebar(); ?>
         </div>

      </div>

   </div>
</section>

<!-- footer -->
<?php get_footer(); ?>