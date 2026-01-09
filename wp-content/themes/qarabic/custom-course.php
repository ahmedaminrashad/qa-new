<?php
/**
 * Template Name: Custom Course
 *
 */

get_header();
?>

<aside>
   <?php include get_template_directory() . '/template-parts/modal-contact.php'; ?>
	
   <div class="course-summary bg-white py-5 py-lg-5 wow fadeInUp">
      
               <div class="container">
                  <div class="slidersblock__row row justify-content-between align-items-center">
                     <div class="col-lg-6">
                        <div class="slidersblock__content mb-5 mb-lg-0 text-center text-lg-left">
                           <h1 class="font-35 font-lg-40 mb-2 text-primary"><?php the_title(); ?></h1>
                              <?php the_content(); ?>                      
                           <div class="row">
                              <div class="col-md-12 course-btns mb-2">
								  <a class="trial-btn" href="https://qarabic.com/free-trial/">Free Trial</a>
								  <a class="pricing-btn" href="https://qarabic.com/fee-and-plans/">Pricing</a>
								  <a class="reviews-btn" href="#reviews">Reviews</a>
                              </div>
							   <div class="col-md-12">
							   		<a href="https://qarabic.com/courses/">Click here to view other courses >></a>
							   </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <a class="slidersblock__video d-block rounded-xxl hovertopscale popup_youtube position-relative">
                           <div class="bg position-absolute rounded-xxl"></div>
                           <img class="img-wfull rounded-xxl" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        </a>
                     </div>
                  </div>
               </div>

   </div>
	
	
	<div class="bg-light py-5 py-lg-5">
      
               <div class="container">
                  <div>
                     <div class="col-lg-12">
                        <div class="slidersblock__content mb-5 mb-lg-0 text-left">
                           <h2 class="font-35 font-lg-40 mb-2 text-primary wow fadeInUp"><?php the_field('pre_table_heading'); ?></h2>
                              <div class="mb-4 wow fadeInUp">
								  <?php the_field('pre_table_content'); ?> 
							</div>        
                           <div class="row">
							   
							   <?php
			  if( have_rows('content_tables') ):
			  while( have_rows('content_tables') ) :  the_row(); $count++;
			  $heading = get_sub_field('ctable_heading');
			  $left = get_sub_field('ctable_left');
			  $right = get_sub_field('ctable_right');
			  $btnu = get_sub_field('ctbutton_url');
			  $btnt = get_sub_field('ctbutton_text');
			  ?>
							   
							   <div class="content-table p-3 p-md-5 py-3 mb-4 rounded-lg wow fadeInUp">
								   <h3 class="text-center mb-4">
									   <?php echo $heading; ?>
								   </h3>
								   <div class="d-flex flex-wrap mb-md-5 mb-3">
									   <div class="table-cleft">
											<?php echo $left; ?>
									   </div>
									   <div class="table-cright">
											<?php echo $right; ?>
									   </div>
								   </div>
								   
								   <a class="ctable-btn" href="<?php echo $btnu; ?>"><?php echo $btnt; ?></a>
								   
							   </div>
							   
							   <?php
			  endwhile;
			  endif;
			  ?>
			 
							   
							   
							   
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>

   </div>
	
	<div class="bg-white py-5 py-lg-5">
      <div class="container">
         <div class="blocktitle primary text-center mb-5 mb-lg-5 position-relative">
            <h2 class="font-35 font-lg-40 mb-3 text-primary"><?php the_field('csection_title'); ?></h2>
			 <p class="font-15 mb-3 text-light">
             	<?php the_field('features_subtitle'); ?>
			 </p>
         </div>
         <div class="color-primary row">
			 
	  <?php
	  $count= 0;
	  if( have_rows('cblocks_wrapper') ):
	  while( have_rows('cblocks_wrapper') ) :  the_row(); $count++;
			 $cbimg = get_sub_field('cblocks_image');
			 $cbhead = get_sub_field('cblock_head');
			 $cbcontent = get_sub_field('cblock_content');
	  ?>
			 
			 <div class="col-md-4 align-items-center content-block mb-5">
				<img class="w-100 mb-3" src="<?php echo $cbimg; ?>">
				 <h3 class="text-primary">
					 <?php echo $cbhead; ?>
				 </h3>
				 <?php echo $cbcontent; ?>
		  </div>
				 
				 
	  <?php
	  endwhile;
	  endif;
	  ?>

	  
		  </div>
      </div>
   </div>
	
	
   <div class="bg-light py-5 py-lg-5">
      <div class="container">
         <div class="blocktitle primary text-center mb-5 mb-lg-5 position-relative">
            <h2 class="font-35 font-lg-40 mb-3 text-primary"><?php the_field('features_title'); ?></h2>
			 <p class="font-15 mb-3 text-light">
             	<?php the_field('features_subtitle'); ?>
			 </p>
         </div>
         <div class="row color-primary">
		   
			 <?php
			  $count= 0;
			  if( have_rows('features_boxes') ):
			  while( have_rows('features_boxes') ) :  the_row(); $count++;
			  $ficon = get_sub_field('feature_icon');
			  $fhead = get_sub_field('feature_head');
			  $fdesc = get_sub_field('feature_description');
			  ?>
			 <div class="col-md-4">
				 <div class="boxfea addeffect addeffect-all px-4 py-md-5 py-3 mb-4 rounded-lg text-center">
					 <img class="d-block mx-auto img-fluid mb-4" src="<?php echo $ficon; ?>">
					 <h2 class="font-22 font-lg-25 mb-3"><?php echo $fhead; ?></h2>
					 <p class="font-15 line-16 m-0 text-light">
						 <?php echo $fdesc; ?>
					 </p>
				 </div>
			 </div>
			  <?php
			  endwhile;
			  endif;
			  ?>
			 

         </div>
      </div>
   </div>
	
	
	
	<div class="bg-primary py-5 py-lg-5">
      <div class="container">
         <div class="blocktitle text-center position-relative">
            <p class="font-20 font-lg-26 mb-3 text-white font-w700"><?php the_field('branding_title'); ?></p>
            <a class="branding-btn" href="<?php the_field('bbutton_url'); ?>"><?php the_field('bbutton_text'); ?></a>
         </div>
      </div>
   </div>
	
	
   
   <div class="bg-white py-5 py-lg-5">
      <div class="container">
         <div class="blocktitle primary text-center mb-5 mb-lg-5 position-relative">
            <p class="font-20 font-lg-26 mb-3 text-primary font-w700">Frequently Asked Questions</p>
            <p class="font-17 mb-3 text-light">
            </p>
         </div>
         <div class="row justify-content-center">
            <div class="col-lg-10">
               <div class="customaccordion" id="accordion">
				   
				   <?php
					$count= 0;
						if( have_rows('course_faqs') ): ?>
					
					<?php
							while( have_rows('course_faqs') ) :  the_row(); $count++;
								// Get parent value.
								$question = get_sub_field('tfaq_question');
								$answer = get_sub_field('tfaq_answer');

							?>
				   
				   <div class="card">
                     <div class="card-header" id="a<?php echo $count; ?>">
                        <a class="collapsed" data-toggle="collapse" href="#b<?php echo $count; ?>" aria-expanded="true" aria-controls="b<?php echo $count; ?>">
                        <?php echo $question; ?>
						 </a>
                     </div>
                     <div id="b<?php echo $count; ?>" class="collapse" aria-labelledby="a<?php echo $count; ?>" data-parent="#accordion">
                        <div class="card-body">
							<?php echo $answer; ?>
						 </div>
                     </div>
                  </div>

					
							<?php
							endwhile;
							?>
							
							<?php endif; ?>
				   
               </div>
            </div>
         </div>
      </div>
   </div>
	
	<section class="bg-light py-5 py-lg-5 review-service" id="reviews">
		<div class="container">
		<div class="blocktitle primary text-center mb-5 mb-lg-5 position-relative">
            <p class="font-20 font-lg-26 mb-3 text-primary font-w700">Students Reviews</p>
            <p class="font-17 mb-3 text-light">
            </p>
         </div>
  
    <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
				<?php echo do_shortcode('[site_reviews_form assigned_posts="post_id"]'); ?>
			  
			  <div class="previous-reviews mt-3">
				  <?php echo do_shortcode('[site_reviews assigned_posts="post_id" schema="true"]'); ?>
			  </div>
			  
		</div>
	  </div>
	</div>
</section>
   
</aside>


<script>
jQuery(document).ready(function($) {
$('.tabgroup > div').hide();
$('.tabgroup > div:first-of-type').show();
$('.tabs a').click(function(e){
  e.preventDefault();
    var $this = $(this),
        tabgroup = '#'+$this.parents('.tabs').data('tabgroup'),
        others = $this.closest('li').siblings().children('a'),
        target = $this.attr('href');
    others.removeClass('active');
    $this.addClass('active');
    $(tabgroup).children('div').hide();
    $(target).show();
  
});
});
</script>
<?php get_footer(); ?>