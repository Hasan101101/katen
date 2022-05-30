<?php
the_post();
get_header();
?>

<!-- section main content -->
<section class="main-content">
   <div class="container-xl">

      <div class="row gy-4">

         <div class="col-lg-8">
            <!-- post single -->
            <div class="post post-single">
               <!-- post header -->
               <div class="post-header">
                  <h1 class="title mt-0 mb-3">
                     <?php the_title(); ?>
                  </h1>
                  <ul class="meta list-inline mb-0">
                     <li class="list-inline-item">
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                           <?php
                           echo get_avatar(get_the_author_meta('ID'), 30, null, null,  ['class' => 'author author_new_style']);
                           the_author();
                           ?>
                        </a>
                     </li>
                     <li class="list-inline-item">
                        <?php
                        // finding cat name and cat link
                        $categories = get_the_category();
                        $cat_name = $categories[0]->name;
                        $cat_link = get_category_link($categories[0]->cat_ID);
                        ?>
                        <a href="<?php echo esc_url($cat_link); ?>">
                           <?php echo esc_html($cat_name); ?>
                        </a>
                     </li>
                     <li class="list-inline-item">
                        <?php the_date('j M Y'); ?>
                     </li>
                  </ul>
               </div>
               <!-- featured image -->
               <div class="featured-image">
                  <?php the_post_thumbnail('katen_single_post_thumb'); ?>
               </div>
               <!-- post content -->
               <div class="post-content clearfix">
                  <?php
                  the_content();
                  wp_link_pages();
                  ?>
               </div>
               <!-- post bottom section -->
               <div class="post-bottom">
                  <div class="row d-flex align-items-center">
                     <div class="col-md-6 col-12 text-center text-md-start">
                        <!-- tags -->
                        <?php
                        the_tags(' ', ' ', ' ');
                        ?>
                     </div>
                     <div class="col-md-6 col-12">
                        <!-- social icons -->
                        <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
                           <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                           <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                           <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                           <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                           <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                           <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>

            </div>

            <div class="spacer" data-height="50"></div>

            <div class="about-author padding-30 rounded">
               <div class="thumb">
                  <?php
                  echo get_avatar(get_the_author_meta('ID'), 100);
                  ?>
               </div>
               <div class="details">
                  <h4 class="name">
                     <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <?php the_author(); ?>
                     </a>
                  </h4>
                  <p>
                     <?php the_author_meta('description'); ?>
                  </p>
                  <!-- social icons -->
                  <ul class="social-icons list-unstyled list-inline mb-0">
                     <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                     <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                     <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                     <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                     <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                  </ul>
               </div>
            </div>

            <div class="spacer" data-height="50"></div>

            <!-- section header -->
            <?php
            if (!post_password_required() && get_comments_number()) {
            ?>
               <div class="section-header">
                  <h3 class="section-title">
                     <?php
                     $katen_comments_count = get_comments_number();
                     if ($katen_comments_count <= 1) {
                        echo esc_html__('Comment ' . '( ' . $katen_comments_count . ' )', 'katen');
                     } else {
                        echo esc_html__('Comments ' . '( ' . $katen_comments_count . ' )', 'katen');
                     }
                     ?>
                  </h3>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wave.svg" class="wave" alt="wave" />
               </div>
            <?php
            }
            ?>
            <!-- post comments -->
            <?php
            if (!post_password_required()) {
            ?>
               <div class="comments bordered padding-30 rounded">
                  <?php
                  comments_template();
                  ?>
               </div>
               
               <div class="spacer" data-height="50"></div>
            <?php } ?>

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