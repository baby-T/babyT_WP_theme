<?php
        $display_name = get_the_author_meta('display_name');
?>
                <article class="media__item hiranai">
                    <a href="<?php the_permalink(); ?>" class="media__item__link">
                        <div class="media__label">
                            <div class="media__label__item name"><?php echo $display_name; ?></div>
<?php
        foreach ((get_the_category()) as $cat):
            echo '<div class="media__label__item category">' . $cat->cat_name . '</div>';
        endforeach;
?>
                        </div>
                        <div class="media-block">
                            <h3 class="media-title"><?php the_title(); ?></h3>
                            <time datetime="<?php the_time('Y-m-d'); ?>" class="media-time"><?php the_time('Y.m.d'); ?></time>
                        </div>
                    </a>
                </article>