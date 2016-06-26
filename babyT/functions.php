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


/***********************************************************
* description
***********************************************************/
// get meta description from the content
function get_meta_description() {
  global $post;
  $description = "";
  if ( is_home() ) {
    // ホームでは、ブログの説明文を取得
    $description = get_bloginfo( 'description' );
  }
  elseif ( is_category() ) {
    // カテゴリーページでは、カテゴリーの説明文を取得
    $description = category_description();
  }
  elseif ( is_single() ) {
    if ($post->post_excerpt) {
      // 記事ページでは、記事本文から抜粋を取得
      $description = $post->post_excerpt;
    } else {
      // post_excerpt で取れない時は、自力で記事の冒頭100文字を抜粋して取得
      $description = strip_tags($post->post_content);
      $description = str_replace("\n", "", $description);
      $description = str_replace("\r", "", $description);
      $description = mb_substr($description, 0, 100) . "...";
    }
  } else {
    ;
  }
  return $description;
}
// echo meta description tag
function echo_meta_description_tag() {
  if ( is_home() || is_category() || is_single() ) {
    echo '<meta name="description" content="' . get_meta_description() . '" />' . "\n";
  }
}




//カスタム投稿タイプ：動作デモ
function custom_post_type_demo() {
  $labels = array(
    'name' => _x('動作デモ', 'post type general name'),
    'singular_name' => _x('動作デモ', 'post type singular name'),
    'add_new' => _x('新規追加', 'book'),
    'add_new_item' => __('新規項目追加'),
    'edit_item' => __('編集'),
    'new_item' => __('項目編集'),
    'view_item' => __('項目をプレビュー'),
    'search_items' => __('項目を検索'),
    'not_found' =>  __('項目はありません'),
    'not_found_in_trash' => __('ゴミ箱に項目はありません'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 4,
    'supports' => array('title','editor'),
    'has_archive' => true
  );
  register_post_type('demo',$args);
}
add_action('init', 'custom_post_type_demo');
