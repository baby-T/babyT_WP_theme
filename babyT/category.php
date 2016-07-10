<?php get_header(); ?>
    <div class="container">
      <div class="inner">
        <div class="media">
          <div class="media__list">
<?php
            if(have_posts()): while(have_posts()): the_post();
            $category = get_the_category();
            $cat_name = $category[0]->cat_name;
            $first_name = get_the_author_meta('first_name');
            $last_name = get_the_author_meta('last_name');
?>
            <article class="media__item hiranai">
                <a href="<?php the_permalink(); ?>" class="media__item__link">
                    <div class="media-block">
                      <time datetime="2016-02-15" class="media-time"><?php echo get_the_date('Y.n.j'); ?></time>
                      <h3 class="media-title"><?php the_title(); ?></h3>
                    </div>
                    <div class="media__label">
                      <div class="media__label__item name"><?php echo $first_name.  $last_name; ?></div>
                      <div class="media__label__item category"><?php echo esc_html($cat_name); ?></div>
                    </div>
                </a>
            </article>
<?php
			endwhile; endif;
?>
          </div>
<?php
    		if(function_exists('wp_pagenavi')) {wp_pagenavi();}
    		wp_reset_postdata();
?>
        </div>
      </div>
    </div>
<?php get_footer(); ?>
