<?php
/**
 * 
 *
 * Template Name: Home
 * 
 * 
 */

get_header();
?>


<aside>
   <?php include get_template_directory() . '/template-parts/modal-contact.php'; ?>
	
	
   <div class="heroblock bg-white color-primary py-5 py-lg-5 wow fadeInUp">

               <div class="container">
                  <div class="slidersblock__row row justify-content-between align-items-center">
                     <div class="col-lg-6">
                        <div class="slidersblock__content mb-5 mb-lg-0 text-center text-lg-left">
                           <h1 class="font-29 font-lg-36 mb-2 text-primary"><?php the_field('top_title'); ?></h1>
                           <p class="font-18 font-lg-20 mb-3 line-16">
							   <?php the_field('top_desc'); ?>
							</p>
                           
							<div class="row">
                              <div class="col-md-12 home-btns">
								  <a class="trial-btn" href="<?php the_field('free_trial_link'); ?>">Free Trial</a>
								  <a class="reviews-btn" href="<?php the_field('pricing_link'); ?>">Pricing</a>
                              </div>
							   
                           </div>
                        </div>
                     </div>
					
                     <div class="col-lg-6 d-none d-lg-inline-block">
                        <a class="slidersblock__video d-block rounded-xxl hovertopscale popup_youtube position-relative" 
						   <?php if (!empty(get_field('top_video'))) { ?> 
						   href="<?php the_field('top_video'); ?>"
						   <?php } ?>
						   >
                           <div class="bg position-absolute rounded-xxl"></div>
                           <img class="img-wfull rounded-xxl" src="<?php the_field('top_image'); ?>" alt="">
							<?php if (!empty(get_field('top_video'))) { ?> 
                           <img class="icon position-absolute" src="https://qarabic.com/wp-content/themes/qarabic/assets/img/icon04.svg" alt="">
							<?php } ?>
                        </a>
                     </div>
                  </div>
               </div>
   </div>
	
	
	<div class="whyusblock wow fadeInUp">
		<div class="container">
			<div class="row br10 bg-secondary whyusdata justify-content-between align-items-center wow fadeInUp">
				
				<?php if( have_rows('home_features') ): ?>
				<?php while( have_rows('home_features') ): the_row(); 
					$fimg = get_sub_field('feature_icon');
					$ftitle = get_sub_field('Feature_title');
					$fdesc = get_sub_field('feature_des');
					?>
					
				<div class="col-lg-4">
					<div class="featured-box d-flex align-items-center">
						<div class="icon mr-3">
							<img src="<?php echo $fimg; ?>">
						</div>
						<div class="icon-box-text">
							<h3 class="font-19 text-primary"><?php echo $ftitle; ?></h3>
							<p class="font-15 text-black"><?php echo $fdesc; ?></p>
						</div>
					</div>
				</div>
				

				<?php endwhile; ?>
			<?php endif; ?>
				

			</div>
		</div>
	</div>
	
	
	<div class="slidersblock sliderslick sliderslick__dotscutsom dots--50 wow fadeInUp" data-slick="{&quot;autoplay&quot;:true,&quot;arrows&quot;:true,&quot;autoplaySpeed&quot;:2000,&quot;speed&quot;:500,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;responsive&quot;: [{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;: 1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;: 1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:510,&quot;settings&quot;:{&quot;slidesToShow&quot;: 1,&quot;slidesToScroll&quot;:1}}]}">

		
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
		
	   <div>
			 <div class="container">
                  <div class="slidersblock__row row justify-content-between align-items-center">
					  <div class="col-lg-5">
                        <a class="d-block rounded-xxl hovertopscale position-relative" href="<?php the_permalink(); ?>">
                           <img class="img-wfull rounded-xxl" src="<?php the_post_thumbnail_url(); ?>" alt="">
                        </a>
                     </div>
					  
                     <div class="col-lg-6">
                        <div class="slidersblock__content mb-5 mb-lg-0 text-center text-lg-left">
                           <h2 class="font-26 font-lg-30 mb-2"><?php the_title(); ?></h2>
								   <?php the_excerpt(); ?>
                           <a class="view-course font-17 d-lg-inline-block br50" href="<?php the_permalink(); ?>">
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
               </div>
			  </div>
			
		<?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>
	   
		
   </div>
	
   <div class="steps-section py-5 py-lg-5">
      <div class="container">
         <div class="row row-col-xl">
			 
            <div class="col-lg-8 col-md-8">
				
               <div class="steps-heading mb-3 wow fadeInUp">
                  <h3 class="font-40 font-lg-40"><?php the_field('steps_title'); ?></h3>
                  <p class="font-17 line-16 m-0">
                     <?php the_field('steps_desc'); ?>						
                  </p>
               </div>
				
				<?php if( have_rows('steps_wrapper') ): ?>
				<?php while( have_rows('steps_wrapper') ): the_row(); 
					$simg = get_sub_field('step_icon');
					$stitle = get_sub_field('step_title');
					$sdesc = get_sub_field('step_desc');
					?>
				
				<div class="steps-row mb-3 d-flex align-items-center wow fadeInUp">
				   		<img src="<?php echo $simg; ?>">
					   <div class="step-data">
						   <h3 class="font-20 font-lg-20 mb-1"><?php echo $stitle; ?></h3>
						  <p class="font-15 line-16 m-0 text-light">
							 <?php echo $sdesc; ?>						
						  </p>
					   </div>
				   </div>

				<?php endwhile; ?>
			<?php endif; ?>
				
	
            </div>
			 
            <div class="col-lg-4 col-md-4 wow fadeInUp">
                  <img class="d-block mx-auto img-fluid" src="<?php the_field('steps_simage'); ?>">
            </div>
    
         </div>
      </div>
   </div><!-- End Steps -->
	
	
   <div class="about-section bg-primary pt-5 pb-7">
      <div class="container">
         <div class="blocktitle position-relative">
			<h3 class="font-25 font-lg-25 mb-3 text-white wow fadeInUp"><?php the_field('about_subtitle'); ?></h3>
            <h2 class="font-40 font-lg-40 mb-3 text-yellow wow fadeInUp"><?php the_field('about_title'); ?></h2>
               <?php the_field('about_desc'); ?>
			 <a class="btn btn-secondary btn-md btn-mw150 rounded-pill wow fadeInUp" href="<?php the_field('about_link'); ?>">Read More</a>
         </div>
         
      </div>
   </div><!-- END Services -->
	
	
   
	
   <div class="blog-section bg-white py-5 py-lg-5">
      <div class="container">
         <div class="d-md-flex align-items-center justify-content-between mb-5 mb-lg-5 text-center text-md-left">
            <div class="blocktitle primary position-relative mb-4 mb-md-0">
               <h2 class="font-29 font-lg-36 mb-3 text-primary wow fadeInUp"><?php the_field('posts_title'); ?></h2>
               <p class="font-17 mb-3 text-light wow fadeInUp">
                  <?php the_field('posts_desc'); ?>
               </p>
            </div>
            <a class="btn btn-outline-primary btn-lg btn-mw150 rounded-pill wow fadeInUp" href="<?php the_field('posts_url'); ?>">See All</a>
         </div>
         <div class="sliderslick shadow color-primary slidermargin10 sliderslick__dotscutsom dots--50" data-slick="{&quot;autoplay&quot;:true,&quot;arrows&quot;:true,&quot;autoplaySpeed&quot;:4000,&quot;speed&quot;:500,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2,&quot;responsive&quot;: [{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;: 1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;: 1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:510,&quot;settings&quot;:{&quot;slidesToShow&quot;: 1,&quot;slidesToScroll&quot;:1}}]}">

			 
			 
<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 6
);
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			 
			 
                     <a class="boxpostbox d-block hovertop hoverbg-primary hoverbg-textwhite addeffect-all rounded-xxl shadow-sm wow fadeInUp" href="<?php the_permalink(); ?>">
                        <div class="d-md-flex align-items-center">
                           <div>
                              <img class="boxpostbox__thu objectfit-cover" src="<?php the_post_thumbnail_url(); ?>" alt="">
                           </div>
                           <div class="flex-fill">
                              <div class="py-5 px-4">
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
                     </a>

			 <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>

         </div>
      </div>
   </div>
   <div class="py-5 bg-light50 position-relative">
      <div class="container">
         <div class="bg-white rounded-xxl shadow-sm p-5">
            <div class="blocktitle primary text-center mb-5 mb-lg-5 position-relative">
               <h2 class="font-29 font-lg-36 mb-3 text-primary wow fadeInUp"><?php the_field('stats_title'); ?></h2>
               <p class="font-17 mb-3 text-light wow fadeInUp">
				   <?php the_field('stats_desc'); ?>
				</p>
            </div>
            <div class="row row-col-xl justify-content-center">
               
				<?php if( have_rows('stats_wrapper') ): ?>
				<?php while( have_rows('stats_wrapper') ): the_row(); 
					$stats_img = get_sub_field('stats_icon');
					$stats_num = get_sub_field('stats_num');
					$stats_title = get_sub_field('stats_title');
					?>

				<div class="col-lg-4 col-md-6">
                  <div class="boxstats text-center wow fadeInUp">
                     <img class="img-fluid mb-3" src="<?php echo $stats_img; ?>">
                     <div class="counter">
                        <div class="counter-value font-w700 line-10 m-0 font-50 text-primary"><?php echo $stats_num; ?></div>
                     </div>
                     <p class="font-22 m-0"><?php echo $stats_title; ?></p>
                  </div>
				</div>

				<?php endwhile; ?>
			<?php endif; ?>

            </div>
         </div>
      </div>
   </div>
   <div id="reviews" class="reviews-section bg-white py-5 py-lg-5">
      <div class="container">
         <div class="blocktitle primary text-center mb-5 mb-lg-5 position-relative">
            <h2 class="font-29 font-lg-36 mb-3 text-primary wow fadeInUp" style="visibility: hidden; animation-name: none;">Recent Reviews</h2>
            <p class="font-17 mb-3 text-light wow fadeInUp">
               What our students say about us..					
            </p>
         </div>
         <div class="sliderslick color-primary slidermargin10 sliderslick__dotscutsom dots--50 wow fadeInUp" data-slick='{"arrows": true}'>
                  
			 <?php if( have_rows('reviews_wrapper') ): ?>
				<?php while( have_rows('reviews_wrapper') ): the_row(); 
					$review_img = get_sub_field('review_img');
					$review_name = get_sub_field('review_name');
					$review_pos = get_sub_field('review_position');
					 $review_desc = get_sub_field('review_description');
					?>
			 
			 <div>
				 <div class="review-wrapper">
					 <div class="review-author">
						 <img src="<?php echo $review_img; ?>">
						 <ul class="review-author-info">
							 <li><?php echo $review_name; ?></li>
							 <li><?php echo $review_pos; ?></li>
						 </ul>
					 </div>
					 <p><?php echo $review_desc; ?></p>
					 <img src="https://qarabic.com/wp-content/uploads/2022/06/stars.svg" alt="Learn Quran online reviews" class="stars">
				 </div>	
			 </div>

				<?php endwhile; ?>
			<?php endif; ?>

            </div>
            
         </div>
      </div>
</aside>



<?php
get_footer();
