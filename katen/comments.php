<?php

wp_list_comments(array(
   'callback'  => 'katen_comment',
));


comment_form();