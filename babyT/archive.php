<?php get_header(); ?>
<div class="container">
    <div class="inner">
        <div class="media">
            <div class="media__list">
<?php
if(have_posts()): while(have_posts()): the_post();
    get_template_part( 'module/list' );
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