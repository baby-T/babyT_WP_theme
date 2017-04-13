<?php get_header();?>
<div class="container">
    <div class="inner">
        <div class="l-contents">
            <div class="l-contents__left">
<?php
if(have_posts()):while(have_posts()):the_post();

    $author = get_userdata($post->post_author);
    $author_id = $author->ID;
?>
                <div class="block entry">
                    <h2 class="entry-title"><?php the_title(); ?></h2>
                    <div class="entry-meta">
                        <div class="entry-date"><?php the_time('Y/m/d'); ?></div>
                        <div class="entry-categories">
                            <ul>
<?php
foreach ((get_the_category()) as $cat):
    echo '<li class="entry-category">' . $cat->cat_name . '</li>';
endforeach;
?>
                            </ul>
                        </div>
                        <div class="entry-author"><?php echo $author->display_name; ?></div>
                    </div>
<?php
if ( has_post_thumbnail() ):
?>
                    <div class="entry-eyecatch"><?php the_post_thumbnail(); ?></div>
<?php
endif;
?>
                    <div class="entry-body">
                        <?php the_content(); ?>
                    </div>
                    <div class="share">
                        <div class="share-title">share</div>
                        <ul class="share-items">
                            <li class="share-item"><a class="fb btn" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><img src="<?php echo get_template_directory_uri(); ?>/images/entry/share_facebook.png" alt="facebook"></a></li>
                            <li class="share-item"><a class="twitter btn" href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title();?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/entry/share_twitter.png" alt="twitter"></a></li>
                        </ul>
                    </div>
                    <div class="author-info">
                        <div class="author-info-thumb hiranai"></div>
                        <div class="author-info-desc">
                            <div class="writer">Writer | <?php echo $author->display_name; ?></div>
                            <div class="writer-exp"><?php the_author_meta('description', $author_id ); ?></div>
                        </div>
                    </div>
                </div>
<?php
endwhile;endif;
?>
                <div class="navigations">
                    <div class="top"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></div>
                    <div class="pagenation">
<?php
    if (get_previous_post()):
?>
                        <div class="prev"><?php previous_post_link('%link','<span>BACK</span>'); ?></div>
<?php
    endif;
    if (get_next_post()):
?>
                        <div class="next"><?php next_post_link('%link','<span>NEXT</span>'); ?></div>
<?php
    endif;
?>
                    </div>
                </div>

<?php
$categories = get_the_category();
foreach($categories as $category):
    $related_posts = get_posts(array('category__in' => array($category->cat_ID), 'exclude' => $post->ID, 'numberposts' => 4));
    if($related_posts):
?>
                <div class="block relative">
                    <div class="relative-title">関連する記事</div>
                    <div class="media__list">
<?php
        foreach($related_posts as $related_post):
            $title = $related_post->post_title;
?>
                        <article class="media__item hiranai">
                            <a href="<?php echo get_permalink($related_post->ID); ?>">
                                <?php echo $title ?>
                            </a>
                        </article>
<?php
        endforeach;
?>
                    </div>
                </div>
<?php endif; endforeach; ?>
            </div>
<?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>