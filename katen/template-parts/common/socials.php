   <?php
   $katen_social_default_facebook  = 'https://facebook.com/';
   $katen_social_default_twitter   = 'https://twitter.com/';
   $katen_social_default_instagram = 'https://instagram.com/';
   $katen_social_default_pinterest = 'https://pinterest.com/';
   $katen_social_default_medium    = 'https://medium.com/';
   $katen_social_default_youtube   = 'https://youtube.com/';

   $katen_facebook_link  = get_theme_mod('katen_social_facebook_url_setting', $katen_social_default_facebook);
   $katen_twitter_link   = get_theme_mod('katen_social_twitter_url_setting', $katen_social_default_twitter);
   $katen_instagram_link = get_theme_mod('katen_social_instagram_url_setting', $katen_social_default_instagram);
   $katen_pinterest_link = get_theme_mod('katen_social_pinterest_url_setting', $katen_social_default_pinterest);
   $katen_medium_link    = get_theme_mod('katen_social_medium_url_setting', $katen_social_default_medium);
   $katen_youtube_link   = get_theme_mod('katen_social_youtube_url_setting', $katen_social_default_youtube);


   if ($katen_facebook_link) {
   ?>
      <li class="list-inline-item">
         <a href="<?php echo esc_url($katen_facebook_link); ?>"><i class="fab fa-facebook-f"></i></a>
      </li>
   <?php
   }

   if ($katen_twitter_link) {
   ?>
      <li class="list-inline-item">
         <a href="<?php echo esc_url($katen_twitter_link); ?>"><i class="fab fa-twitter"></i></a>
      </li>
   <?php
   }

   if ($katen_instagram_link) {
   ?>
      <li class="list-inline-item">
         <a href="<?php echo esc_url($katen_instagram_link); ?>"><i class="fab fa-instagram"></i></a>
      </li>
   <?php
   }

   if ($katen_pinterest_link) {
   ?>
      <li class="list-inline-item">
         <a href="<?php echo esc_url($katen_pinterest_link); ?>"><i class="fab fa-pinterest"></i></a>
      </li>
   <?php
   }

   if ($katen_medium_link) {
   ?>
      <li class="list-inline-item">
         <a href="<?php echo esc_url($katen_medium_link); ?>"><i class="fab fa-medium"></i></a>
      </li>
   <?php
   }

   if ($katen_youtube_link) {
   ?>
      <li class="list-inline-item">
         <a href="<?php echo esc_url($katen_youtube_link); ?>"><i class="fab fa-youtube"></i></a>
      </li>
   <?php
   }
   ?>