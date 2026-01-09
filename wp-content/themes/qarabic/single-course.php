<?php
/**
 * The template for displaying single posts and pages.
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
                           <h2 class="font-35 font-lg-40 mb-2 text-primary"><?php the_title(); ?></h2>
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
   <div class="bg-white py-5 py-lg-5">
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
			 <div class="col-md-3">
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
   
   <div class="bg-light py-5 py-lg-5">
      <div class="container">
         <div class="blocktitle primary text-center mb-5 mb-lg-5 position-relative">
            <h2 class="font-35 font-lg-40 mb-3 text-primary"><?php the_field('tabs_title'); ?></h2>
			 <p class="font-15 mb-3 text-light">
              <?php the_field('tabs_subtitle'); ?>
			 </p>
         </div>
         <div class="row color-primary">
		  	<div class="tabs-wrapper">
  <ul class="tabs clearfix" data-tabgroup="first-tab-group">
	  <?php
	  $count= 0;
	  if( have_rows('tabs_wrapper') ):
	  while( have_rows('tabs_wrapper') ) :  the_row(); $count++;
	  $thead = get_sub_field('tab_head');
	  ?>
	  <li><a href="#tab<?php echo $count; ?>"><?php echo $thead; ?></a></li>
	  <?php
	  endwhile;
	  endif;
	  ?>
  </ul>
  <section id="first-tab-group" class="tabgroup">
	  
	  <?php
	  $count= 0;
	  if( have_rows('tabs_wrapper') ):
	  while( have_rows('tabs_wrapper') ) :  the_row(); $count++;
	  $tcontent = get_sub_field('tab_content');
	  ?>
		  <div id="tab<?php echo $count; ?>" class="tabcontent">
			  <?php echo $tcontent; ?>
		  </div>
	  <?php
	  endwhile;
	  endif;
	  ?>

  </section>
</div>
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