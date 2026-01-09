<?php
/**
 * Template Name: Faqs
 */

get_header();
?>

<aside>
	<div class="bg-primary text-center text-white py-5">
		<div class="container">
			<h1 class="font-24 font-lg-30 mb-2 wow fadeInUp">
				<?php the_title(); ?>
			</h1>
			<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
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
						if( have_rows('faqs_wrapper') ): ?>
					
					<?php
							while( have_rows('faqs_wrapper') ) :  the_row(); $count++;
								// Get parent value.
								$question = get_sub_field('faq_question');
								$answer = get_sub_field('faq_answer');

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

					
			<?php echo $pduration; ?>
			
			
							<?php
							endwhile;
							?>
							
							<?php endif; ?>
				
               </div>
            </div>
         </div>
      </div>
   </div>
	
	
	
</aside>

		

<?php get_footer(); ?>
