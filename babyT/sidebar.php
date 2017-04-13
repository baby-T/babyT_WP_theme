<aside class="l-contents__right">
    <div class="block side">
        <div class="side-block">
            <div class="side-title">Date and time</div>
            <ul>
<?php
$year_prev = null;
$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,
                                    YEAR( post_date ) AS year,
                                    COUNT( id ) as post_count FROM $wpdb->posts
                                    WHERE post_status = 'publish' and post_date <= now( )
                                    and post_type = 'post'
                                    GROUP BY month , year
                                    ORDER BY post_date DESC");
foreach($months as $month) :
    $year_current = $month->year;
        if ($year_current != $year_prev):
            if ($year_prev != null):
?>
            </ul>
        </li>
<?php
            endif;
?>
<li class="side-item">
    <p class="side-item-year"><?php echo $month->year; ?>年</p>
    <ul class="side-item-months">
<?php
        endif;
?>
                        <li class="side-item-month">
                            <a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>">
                                <?php echo date("n", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>月
                                (<?php echo $month->post_count; ?>)
                            </a>
                        </li>
<?php
$year_prev = $year_current;
endforeach;
?>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="side-block">
            <div class="side-title">Category</div>
            <ul>
<?php
    $cat_all = get_terms( "category", "fields=all&get=all" );
    foreach($cat_all as $value):
 ?>
                <li class="side-item"><a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name;?></a></li>
<?php
    endforeach;
?>
            </ul>
        </div>
        <div class="side-block">
            <div class="side-title">Writer</div>
            <ul>
<?php
    $users = get_users( array('orderby'=>ID,'order'=>ASC) );

    foreach($users as $user):
        $uid = $user->ID;
        $userData = get_userdata($uid);
        echo '<li class="side-item"><a href="' . get_bloginfo(url).'/?author='.$uid . '">' .$user->display_name.'</a></li>';
    endforeach;
?>
            </ul>
        </div>
    </div>
</aside>