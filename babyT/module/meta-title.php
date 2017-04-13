<?php
$title = get_bloginfo('name');

if(is_home()):
    $title = get_bloginfo('name');
elseif(is_page()):
    $title = get_the_title('') . ' | ' . get_bloginfo('name');
elseif(is_single()):
    $title = get_the_title('') . ' | ' . get_bloginfo('name');
elseif(is_category()):
    $title = single_cat_title('', false) . ' | ' . get_bloginfo('name');
elseif(is_author()):
    $title = single_cat_title('', false) . ' | ' . get_bloginfo('name');
elseif(is_404()):
    $title = 'このページは存在しません | ' . get_bloginfo('name');
elseif(is_search()):
    $title = '検索結果 | ' . get_bloginfo('name');
endif;
?>
<meta property="og:title" content="<?php echo $title; ?>">
<title><?php echo $title; ?></title>