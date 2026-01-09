<?php
/**
 * Template name: Courses
 * 
 */

get_header();
?>

<aside>
<?php include get_template_directory() . '/template-parts/modal-contact.php'; ?>
	<div class="bg-primary text-center text-white py-5">
		<div class="container">
			<h1 class="font-24 font-lg-30 mb-2 wow fadeInUp">
				<?php the_title(); ?>
			</h1>
		</div>
	</div>
<div class="all-courses py-4">
		
			 <div class="container">
		<?php
$args = array(
    'post_type' => 'page',
    'posts_per_page' => 20,
	'meta_key' => '_wp_page_template',
	'meta_value' => 'custom-course.php'
);
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		
	   
                  <div class="slidersblock__row row justify-content-between align-items-center mb-3">
					  <div class="col-lg-6">
                        <a class="d-block rounded-xxl hovertopscale position-relative" href="<?php the_permalink(); ?>">
                           <img class="img-wfull rounded-xxl" src="<?php the_post_thumbnail_url(); ?>" alt="">
                        </a>
                     </div>
					  
                     <div class="col-lg-6">
                        <div class="slidersblock__content mb-5 mb-lg-0 text-center text-lg-left">
                           <h2 class="font-26 font-lg-30 mb-2"><?php the_title(); ?></h2>
								   <?php the_excerpt(); ?>
                           <a class="view-course font-17 d-lg-inline-block br50 bg-primary text-white" href="<?php the_permalink(); ?>">
							   <?php 
							   $vcbutton = get_field('custom_view_course_text'); 
							   if (!empty($vcbutton)) {
								   echo $vcbutton;
							   } else {
								   echo 'View Course';
							   }
							   ?>
							</a>
                        </div>
                     </div>
                    
                  </div>
               
			
		<?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>
	   
			  </div>
   </div>
</aside>

		

<?php get_footer(); ?>
