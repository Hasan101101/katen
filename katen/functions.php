<?php

/*:::::::::::::::::::: Including file & library ::::::::::::::::::::*/
require_once get_theme_file_path('/inc/tgm.php');
require_once get_theme_file_path('/inc/kirki.php');


/*:::::::::::::::::::: Cache Busting ::::::::::::::::::::*/
if (site_url() == "http://katen.local") {
   define("VERSION", time());
} else {
   define("VERSION", wp_get_theme()->get("Version"));
}


/*:::::::::::::::::::: Adding Theme Features ::::::::::::::::::::*/
function katen_setup()
{
   load_theme_textdomain('katen', get_theme_file_path('/languages'));
   add_theme_support('automatic-feed-links');
   add_theme_support('title-tag');

   // Custom Logo
   $defaults = array(
      'height'               => 80,
      'width'                => 80,
      'flex-width'           => true,
   );
   add_theme_support('custom-logo', $defaults);

   add_theme_support('html5', array(
      'comment-list',
      'comment-form',
      'search-form',
      'gallery',
      'caption',
   ));
   add_theme_support('post-thumbnails');
   add_theme_support('post-formats', array('image', 'video', 'audio'));

   add_theme_support('customize-selective-refresh-widgets');

   // Primary Menu Register
   register_nav_menus(array(
      'primary'            => __('Primary Menu', 'katen'),
      'primary-vertical'   => __('Primary Vertical Menu', 'katen'),
   ));

   // Declaring New Image Size
   add_image_size('katen_post_thumb', 356, 238, true);
   add_image_size('katen_single_post_thumb', 736, 530, true);
}
add_action('after_setup_theme', 'katen_setup');


/*:::::::::::::::::::: Registering Widgets ::::::::::::::::::::*/
function katen_widgets_setup()
{
   // Footer Copyright Widget
   register_sidebar(array(
      'name'          => __('Footer Copyright Text', 'katen'),
      'id'            => 'footer-copyright',
      'description'   => __('Widgets in this area will be shown on footer section.', 'katen'),
      'before_widget' => '<span class="copyright">',
      'after_widget'  => '</span>',
      'before_title'  => '<h2 class="widgettitle">',
      'after_title'   => '</h2>',
   ));
   // Author Description Widget
   register_sidebar(array(
      'name'          => __('Author Description', 'katen'),
      'id'            => 'author-desc',
      'description'   => __('Widgets in this area will be shown on sidebar section.', 'katen'),
      'before_widget' => '<span class="mb-4">',
      'after_widget'  => '</span>',
   ));
}
add_action('widgets_init', 'katen_widgets_setup');


/*:::::::::::::::::::: Assets Loading ::::::::::::::::::::*/
function katen_assets()
{
   // Loading CSS
   wp_enqueue_style('bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'), array(), false);
   wp_enqueue_style('all', get_theme_file_uri('/assets/css/all.min.css'), array(), false);
   wp_enqueue_style('slick', get_theme_file_uri('/assets/css/slick.css'), array(), false);
   wp_enqueue_style('simple-line-icons', get_theme_file_uri('/assets/css/simple-line-icons.css'), array(), false);
   wp_enqueue_style('template-style', get_theme_file_uri('/assets/css/style.css'), array(), false);
   wp_enqueue_style('main-style', get_stylesheet_uri(), array(), VERSION);

   // Loading JS
   wp_enqueue_script('popper', get_theme_file_uri('/assets/js/popper.min.js'), array(), false, true);
   wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js'), array(), false, true);
   wp_enqueue_script('slick', get_theme_file_uri('/assets/js/slick.min.js'), array('jquery'), false, true);
   wp_enqueue_script('sticky-sidebar', get_theme_file_uri('/assets/js/jquery.sticky-sidebar.min.js'), array('jquery'), false, true);
   wp_enqueue_script('template-script', get_theme_file_uri('/assets/js/custom.js'), array('jquery', 'slick', 'sticky-sidebar'), false, true);
}
add_action('wp_enqueue_scripts', 'katen_assets');


/*:::::::::::::::::::: Main menu walker class ::::::::::::::::::::*/
class katen_Walker_Nav_Menu extends Walker_Nav_Menu
{
   function start_lvl(&$output, $depth = 0, $args = array())
   {
      // Depth-dependent classes.
      $indent = ($depth > 0  ? str_repeat("\t", $depth) : ''); // code indent
      $display_depth = ($depth + 1); // because it counts the first submenu as 0
      $classes = array(
         'dropdown-menu',
         ($display_depth % 2  ? '' : 'menu-even'),
         ($display_depth >= 2 ? 'sub-sub-menu' : ''),
         'menu-depth-' . $display_depth
      );
      $class_names = implode(' ', $classes);

      // Build HTML for output.
      $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
   }

   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
   {
      global $wp_query;
      $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent

      // Depth-dependent classes.
      $depth_classes = array(
         ($depth == 0 ? 'nav-item' : ''),
         ($depth >= 2 ? 'sub-sub-menu-item' : ''),
         ($depth % 2 ? 'menu-item-odd' : 'menu-item-even'),
         'menu-item-depth-' . $depth
      );
      $depth_class_names = esc_attr(implode(' ', $depth_classes));

      // Passed classes.
      $classes = empty($item->classes) ? array() : (array) $item->classes;
      $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

      // Build HTML.
      $output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

      // Link attributes.
      $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
      $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
      $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
      $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
      $attributes .= ' class="' . ($depth > 0 ? 'dropdown-item' : 'nav-link') . '"';

      // Build HTML output and pass through the proper filter.
      $item_output = sprintf(
         '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
         $args->before,
         $attributes,
         $args->link_before,
         apply_filters('the_title', $item->title, $item->ID),
         $args->link_after,
         $args->after
      );
      $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
   }
}

// adding class to current-menu-item
function special_nav_class($classes, $item)
{
   if (in_array('current-menu-item', $classes)) {
      $classes[] = 'active ';
   }
   return $classes;
}
add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);


/*:::::::::::::::::::: Vertical menu walker class ::::::::::::::::::::*/
class katen_vertical_Walker_Nav_Menu extends Walker_Nav_Menu
{
   function start_lvl(&$output, $depth = 0, $args = array())
   {
      // Depth-dependent classes.
      $indent = ($depth > 0  ? str_repeat("\t", $depth) : ''); // code indent
      $display_depth = ($depth + 1); // because it counts the first submenu as 0
      $classes = array(
         'submenu',
         ($display_depth % 2  ? '' : 'menu-even'),
         ($display_depth >= 2 ? 'sub-sub-menu' : ''),
         'menu-depth-' . $display_depth
      );
      $class_names = implode(' ', $classes);

      // Build HTML for output.
      $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
   }

   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
   {
      global $wp_query;
      $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent

      // Depth-dependent classes.
      $depth_classes = array(
         ($depth == 0 ? '' : ''),
         ($depth >= 2 ? 'sub-sub-menu-item' : ''),
         ($depth % 2 ? 'menu-item-odd' : 'menu-item-even'),
         'menu-item-depth-' . $depth
      );
      $depth_class_names = esc_attr(implode(' ', $depth_classes));

      // Passed classes.
      $classes = empty($item->classes) ? array() : (array) $item->classes;
      $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

      // Build HTML.
      $output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

      // Link attributes.
      $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
      $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
      $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
      $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
      $attributes .=  ($depth > 0 ? '' : '');

      // Build HTML output and pass through the proper filter.
      $item_output = sprintf(
         '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
         $args->before,
         $attributes,
         $args->link_before,
         apply_filters('the_title', $item->title, $item->ID),
         $args->link_after,
         $args->after
      );
      $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
   }
}



/*:::::::::::::::::::: Pagination Function ::::::::::::::::::::*/
if (!function_exists("katen_pagination")) {
   function katen_pagination()
   {
      global $wp_query;
      $links = paginate_links(array(
         'current'  => max(1, get_query_var('paged')),
         'total'    => $wp_query->max_num_pages,
         'type'     => 'list',
         'mid_size' => apply_filters("katen_pagination_mid_size", 2),
         'prev_next' => false,
      ));
      $links = str_replace("<ul class='page-numbers'>", "<ul class='pagination justify-content-center'>", $links);
      $links = str_replace("page-numbers current", "active page-link", $links);
      $links = str_replace("<li>", "<li class='page-item'>", $links);
      $links = str_replace("page-numbers", "page-link", $links);
      echo $links;
   }
}


/*:::::::::::::::::::: Adding custom class to the tags in single.php ::::::::::::::::::::*/
function katen_tags($html)
{
   $postid = get_the_ID();
   $html = str_replace('<a', '<a class="tag"', $html);
   return $html;
}
add_filter('the_tags', 'katen_tags');


/*:::::::::::::::::::: wp_list_comments's callback function ::::::::::::::::::::*/
function katen_comment($comment, $args, $depth)
{
   if (have_comments()) {
?>
      <ul class="comments">
         <!-- comment item -->
         <li class="comment rounded">
            <div class="thumb">
               <?php echo get_avatar(50, 50, true); ?>
            </div>
            <div class="details">
               <h4 class="name">
                  <a href="#">
                     <?php echo get_comment_author(); ?>
                  </a>
               </h4>
               <span class="date">
                  <?php
                  echo get_comment_date('M j, Y');
                  echo ' ';
                  echo get_comment_time();
                  ?>
               </span>
               <?php
               comment_text();
               comment_reply_link(array_merge($args, array(
                  'depth'        => $depth,
                  'max_depth'    => $args['max_depth']
               )));
               ?>
            </div>
         </li>
      </ul>
<?php
   }
}


/*:::::::::::::::::::: Adding class to comment reply link function ::::::::::::::::::::*/
function katen_comment_reply_link_class($class)
{
   $class = str_replace("class='comment-reply-link", "class='comment-reply-link btn btn-default btn-sm", $class);
   return $class;
}
add_filter('comment_reply_link', 'katen_comment_reply_link_class');


// Custom textarea, form-title & submit button label
function katen_custom_comment_form_defaults($defaults)
{
   $defaults['title_reply'] = __('Leave Comment');

   // Putting img after comment title
   $kate_comment_title_img = '<img src="' . get_template_directory_uri() . '/assets/images/wave.svg" class="wave" alt="wave">';
   $defaults['title_reply_after'] = '</h3>' . $kate_comment_title_img;

   $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . _x('Comment', 'noun') . '</label><textarea id="comment" name="comment" cols="45" rows="8" placeholder="Your comment here..." aria-required="true"></textarea></p>';

   $defaults['label_submit'] = __('Submit', 'katen');

   return $defaults;
}
add_filter('comment_form_defaults', 'katen_custom_comment_form_defaults');



// Custom Comment Fields
function katen_custom_comment_fields($fields)
{
   $commenter = wp_get_current_commenter();

   $req      = get_option('require_name_email');
   $aria_req = ($req ? " aria-required='true'" : '');
   $html_req = ($req ? " required='required'" : '');
   $html5    = current_theme_supports('html5', 'comment-form');

   $fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __('Name') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" placeholder="Your name" maxlength="245"' . $aria_req .  $html_req . ' /></p>';

   $fields['email']  = '<p class="comment-form-email"><label for="email">' . __('Email') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' . '<input id="email" name="email" ' . ($html5 ? 'type="email"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="30" placeholder="Email address" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>';

   $fields['url'] = '<p class="comment-form-url"><label for="url">' . __('Website') . '</label> ' . '<input id="url" name="url" ' . ($html5 ? 'type="url"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_url']) . '" size="30" placeholder="Website" maxlength="200" /></p>';

   return $fields;
}
add_filter('comment_form_default_fields', 'katen_custom_comment_fields');



/*:::::::::::::::::::: Search form styling ::::::::::::::::::::*/
function katen_search_form($form)
{
   $home_dir = home_url('/');
   $newform = <<<FORM
      <form role="search" class="d-flex search-form" method="get" action="{$home_dir}">
         <input class="form-control me-2" type="search" name="s" placeholder="Search and press enter ..." aria-label="Search">
         <input type="hidden" value="post" name="post_type" id="post_type" />
         <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
      </form>
   FORM;

   return $newform;
}
add_filter('get_search_form', 'katen_search_form');



/*:::::::::::::::::::: Adding class to custom logo ::::::::::::::::::::*/
function katen_change_logo_class($class)
{
   $class = str_replace('custom-logo-link', 'navbar-brand', $class);
   return $class;
}
add_filter('get_custom_logo', 'katen_change_logo_class');

// Removing class from body tag in tag.php
add_filter('body_class', 'remove_body_class');
function remove_body_class($classes)
{
   $remove_class = ['tag'];
   $classes = array_diff($classes, $remove_class);
   return $classes;
}
