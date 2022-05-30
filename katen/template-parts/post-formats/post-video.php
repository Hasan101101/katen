<div <?php post_class('col-sm-6'); ?>>
   <!-- post -->
   <div class="post post-grid rounded bordered">
      <div class="thumb top-rounded">
         <span class="post-format">
            <i class="icon-camrecorder"></i>
         </span>
         <?php
         // finding cat name and cat link
         $categories = get_the_category();
         foreach($categories as $category){
            $cat_name = $category->name;
            $cat_link = get_category_link($category->cat_ID);
         }
         ?>
         <a href="<?php echo esc_url($cat_link); ?>" class="category-badge position-absolute">
            <?php echo esc_html($cat_name); ?>
         </a>
         <a href="<?php the_permalink(); ?>">
            <div class="inner">
               <?php
               the_post_thumbnail('katen_post_thumb');
               ?>
            </div>
         </a>
      </div>
      <div class="details">
         <ul class="meta list-inline mb-0">
            <li class="list-inline-item">
               <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                  <img src="<?php echo get_avatar_url(get_the_author_meta('ID'), array('size' => '30')); ?>" class="author author_new_style" alt="author" />
                  <?php echo get_the_author_meta('display_name'); ?>
               </a>
            </li>
            <li class="list-inline-item">
               <?php echo get_the_date('j M Y') ?>
            </li>
         </ul>
         <h5 class="post-title mb-3 mt-3">
            <a href="<?php the_permalink(); ?>">
               <?php the_title(); ?>
            </a>
         </h5>
         <p class="excerpt mb-0">
            <?php echo get_the_excerpt(); ?>
         </p>
      </div>
      <div class="post-bottom clearfix d-flex align-items-center">
         <div class="social-share me-auto">
            <button class="toggle-button icon-share"></button>
            <ul class="icons list-unstyled list-inline mb-0">
               <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
               <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
               <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
               <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
               <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
               <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
            </ul>
         </div>
         <div class="more-button float-end">
            <a href="blog-single.html"><span class="icon-options"></span></a>
         </div>
      </div>
   </div>
</div>