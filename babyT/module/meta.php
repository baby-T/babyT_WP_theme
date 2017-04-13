<?php
    if(is_home()):
        $description = bloginfo('description');
        $url = get_bloginfo('url');
    elseif(is_single()):
        if ($post->post_excerpt):
            $description = $post->post_excerpt;
        else:
            // post_excerpt で取れない時は、自力で記事の冒頭100文字を抜粋して取得
            $description = strip_tags($post->post_content);
            $description = str_replace("\n", "", $description);
            $description = str_replace("\r", "", $description);
            $description = mb_substr($description, 0, 100) . "...";
        endif;

        $url = get_permalink();
    endif;

    if (isset($description)):
?>
<meta name="description" content="<?php echo $description; ?>">
<meta property="og:description" content="<?php echo $description; ?>">
<?php
    endif;

    if (isset($url)):
?>
<meta property="og:url" content="<?php echo $url; ?>">
<?php
    endif;
?>
<meta property="og:image" content="">
<meta property="og:type" content="blog">
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">