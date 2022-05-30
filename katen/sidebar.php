<!-- sidebar -->
<div class="sidebar">
   <!-- widget about -->
   <div class="widget rounded">
      <div class="widget-about data-bg-image text-center" data-bg-image="<?php echo get_template_directory_uri(); ?>/assets/images/map-bg.png">
         <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="logo" class="mb-4" />
         <?php
         if (is_active_sidebar('author-desc')) {
            dynamic_sidebar('author-desc');
         }
         ?>
         <ul class="social-icons list-unstyled list-inline mb-0">
            <?php get_template_part('template-parts/common/socials'); ?>
         </ul>
      </div>
   </div>

   <!-- widget popular posts -->
   <div class="widget rounded">
      <div class="widget-header text-center">
         <h3 class="widget-title">
            <?php _e('Popular Posts', 'katen'); ?>
         </h3>
         <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wave.svg" class="wave" alt="wave" />
      </div>
      <div class="widget-content">
         <!-- post -->
         <?php
         $katen_popular_posts = new WP_Query(array(
            'posts_per_page'  => 3,
            'orderby'         => 'comment_count',
         ));
         while ($katen_popular_posts->have_posts()) {
            $katen_popular_posts->the_post();
         ?>
            <div class="post post-list-sm circle">
               <div class="thumb circle">
                  <span class="number">
                     <?php echo esc_html(get_comments_number()); ?>
                  </span>
                  <a href="<?php the_permalink(); ?>">
                     <div class="inner">
                        <?php the_post_thumbnail('thumbnail'); ?>
                     </div>
                  </a>
               </div>
               <div class="details clearfix">
                  <h6 class="post-title my-0">
                     <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h6>
                  <ul class="meta list-inline mt-1 mb-0">
                     <li class="list-inline-item">
                        <?php echo esc_html(get_the_date('j M Y')); ?>
                     </li>
                  </ul>
               </div>
            </div>
         <?php
         }
         wp_reset_postdata();
         ?>
      </div>
   </div>

   <!-- widget categories -->
   <div class="widget rounded">
      <div class="widget-header text-center">
         <h3 class="widget-title">Explore Topics</h3>
         <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wave.svg" class="wave" alt="wave" />
      </div>
      <div class="widget-content">
         <ul class="list">
            <?php
            $terms = get_terms(array(
               'taxonomy'   => 'category',
               'number'     => 6,
               'order'      => 'DESC',
            ));
            foreach ($terms as $term) {
               $term_link = get_term_link($term->term_id);
            ?>
               <li>
                  <a href="<?php echo esc_url($term_link); ?>"><?php echo esc_html($term->name); ?></a>
                  <span>(<?php echo esc_html($term->count); ?>)</span>
               </li>
            <?php
            }
            ?>
         </ul>
      </div>

   </div>

   <!-- widget newsletter -->
   <div class="widget rounded">
      <div class="widget-header text-center">
         <h3 class="widget-title">
            <?php _e('Newsletter', 'katen'); ?>
         </h3>
         <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wave.svg" class="wave" alt="wave" />
      </div>
      <div class="widget-content">
         <span class="newsletter-headline text-center mb-3">
            <?php _e('Join 70,000 subscribers!', 'katen'); ?>
         </span>
         <?php
         echo do_shortcode('[contact-form-7 id="168" title="My newsletter"]');
         ?>
         <span class="newsletter-privacy text-center mt-3"><?php _e('By signing up, you agree to our', 'katen'); ?>
            <a href="#"><?php _e('Privacy Policy', 'katen'); ?></a>
         </span>
      </div>
   </div>

   <!-- widget post carousel -->
   <div class="widget rounded">
      <div class="widget-header text-center">
         <h3 class="widget-title">
            <?php _e('Celebration', 'katen'); ?>
         </h3>
         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/wave.svg" class="wave" alt="wave" />
      </div>
      <div class="widget-content">
         <div class="post-carousel-widget">
            <!-- post -->
            <?php
            $katen_fp = new WP_Query(array(
               'meta_key'      => 'featured',
               'meta_value'    => '1',
               'posts_per_page' => 3,
            ));

            while ($katen_fp->have_posts()) {
               $katen_fp->the_post();

               // finding cat name and cat link
               $categories = get_the_category();
               $category   = $categories[0];
               $cat_link   = get_category_link($category);
               $author_url = get_author_posts_url(get_the_author_meta('ID'));
            ?>
               <div class="post post-carousel">
                  <div class="thumb rounded">
                     <a href="<?php echo esc_url($cat_link); ?>" class="category-badge position-absolute">
                        <?php echo esc_html($category->cat_name); ?>
                     </a>
                     <a href="<?php the_permalink(); ?>">
                        <div class="inner">
                           <?php the_post_thumbnail(); ?>
                        </div>
                     </a>
                  </div>
                  <h5 class="post-title mb-0 mt-4">
                     <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                     </a>
                  </h5>
                  <ul class="meta list-inline mt-2 mb-0">
                     <li class="list-inline-item">
                        <a href="<?php echo esc_url($author_url); ?>"><?php the_author(); ?></a>
                     </li>
                     <li class="list-inline-item">
                        <?php echo esc_html(get_the_date('j M Y')); ?>
                     </li>
                  </ul>
               </div>
            <?php
            }
            wp_reset_postdata();
            ?>
         </div>
         <!-- carousel arrows -->
         <div class="slick-arrows-bot">
            <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
            <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
         </div>
      </div>
   </div>

   <!-- widget tags -->
   <div class="widget rounded">
      <div class="widget-header text-center">
         <h3 class="widget-title">
            <?php _e('Tag Clouds', 'katen'); ?>
         </h3>
         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/wave.svg" class="wave" alt="wave" />
      </div>

      <?php
      // getting all tags that has atleast one post
      $tags = get_tags();
      $tag_class = 'tag';
      $html = '<div class="widget-content">';
      foreach ($tags as $tag) {
         $tag_link = get_tag_link($tag->term_id);
         $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag_class}'>";
         $html .= "{$tag->name}</a>";
      }
      $html .= '</div>';
      echo $html;
      ?>
   </div>

</div>