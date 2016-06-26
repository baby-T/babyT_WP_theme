<?php

// アイキャッチ画像
add_theme_support('post-thumbnails');
add_image_size('single_image', 900, 660, true);


/***********************************************************
* 年度別アーカイブリスト
***********************************************************/
function my_archives_link($html){
if(preg_match('/[0-9]+?<\/a>/', $html))
$html = preg_replace('/([0-9]+?)<\/a>/', '$1年</a>', $html);
if(preg_match('/title=[\'\"][0-9]+?[\'\"]/', $html))
$html = preg_replace('/(title=[\'\"][0-9]+?)([\'\"])/', '$1年$2', $html);
return $html;
}
add_filter('get_archives_link', 'my_archives_link', 10);

/***********************************************************
* wp_head()のいらないタグを削除
***********************************************************/
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);


/***********************************************************
* 絶対パスを相対パスへ変換
***********************************************************/
function delete_host_from_attachment_url($url) {
  $regex = '/^http(s)?:\/\/[^\/\s]+(.*)$/';
  if (preg_match($regex, $url, $m)) {
    $url = $m[2];
  }
  return $url;
}
add_filter('wp_get_attachment_url', 'delete_host_from_attachment_url');
add_filter('attachment_link', 'delete_host_from_attachment_url');

/***********************************************************
* WordPressでのパス指定を絶対パスから相対パスに変更
***********************************************************/
function make_href_root_relative($input) {
  return preg_replace('!http(s)?://' . $_SERVER['SERVER_NAME'] . '/!', '/', $input);
}
function root_relative_permalinks($input) {
  return make_href_root_relative($input);
}
add_filter( 'the_permalink', 'root_relative_permalinks' );

function isFirst(){
  global $wp_query;
  return ($wp_query->current_post === 0);
}
