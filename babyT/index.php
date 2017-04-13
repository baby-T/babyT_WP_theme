<?php get_header(); ?>
<div class="container">
    <div class="inner">
        <div class="media">
            <div class="media__list">
<?php
$paged = get_query_var('paged')? get_query_var('paged') : 1;

$the_query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 12,
    'paged' => $paged,
    'post_status' => 'publish'
));
if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post();

        get_template_part( 'module/list' );

        if( function_exists('wp_pagenavi') ):
            wp_pagenavi( $the_query );
        endif;

    endwhile;
endif;
wp_reset_postdata();
?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
