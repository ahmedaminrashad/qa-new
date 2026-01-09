<?php
/**
 * Template Name: Blog
 */

get_header();
?>

<aside>
<?php include get_template_directory() . '/template-parts/modal-contact.php'; ?>
	
<div class="bg-primary text-center text-white py-4">
    <div class="container">
        <h1 class="font-22 font-lg-26 mb-2 wow fadeInUp">Blog</h1>
		<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</div><div class="bg-white py-5 py-lg-6">
    <div class="container">
        <div class="row row-col-xl">
             
			<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 20
);
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="col-lg-6">
                <a class="boxpostbox d-block hovertop hoverbg-primary hoverbg-textwhite addeffect-all rounded-xxl shadow-sm wow fadeInUp" href="<?php the_permalink(); ?>">
    <div class="d-md-flex align-items-center">
        <div>
            <img class="boxpostbox__thu objectfit-cover" src="<?php the_post_thumbnail_url(); ?>">
        </div>
        <div class="flex-fill">
            <div class="p-5">
                <h3 class="font-22 mb-4 text-primary"><?php the_title(); ?></h3>
                <p class="text-light font-16 font-lg-17 overflow-hidden mb-4 line-15">
					<?php echo strip_tags( get_the_excerpt() ); ?>
				</p>
                <span class="btn btn-primary btn-lg btn-mw120 rounded-xxl">
                    Read More
                </span>
            </div>
        </div>
    </div>
</a>            </div>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>
			
			
                       
        </div>
    </div>
</div>
</aside>

		

<?php get_footer(); ?>
