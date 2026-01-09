<?php
/**
 * The template for displaying the footer
 *
 *
 */

?>

<footer>
   <a class="buttonwhastapp2 d-block position-fixed text-center font-16 rounded px-24 shadow-sm pb-24 pt-2" href="tel:0013093775300"><i class="fa fa-phone mr-2"></i> Call Us</a>
   <a class="buttonwhastapp d-block position-fixed text-center font-16 rounded px-24 shadow-sm pb-24 pt-2" target="_blank" href="https://api.whatsapp.com/send?phone=13093775300&amp;text=Hello, I have enquiry"><i class="fab fa-whatsapp mr-2"></i> Send a Message</a>
	
   
   <div class="footercenter text-white bg-background bg-size-cover bg-position-centerbottom py-5 py-lg-6" style="background-image: url(https://qarabic.com/wp-content/themes/qarabic/assets/img/footerbg.png);background-color:#7a1c1a">
      <div class="container">
         <div class="row justify-content-between">
            <div class="col-lg-3 mb-2 mb-lg-0">
				<?php dynamic_sidebar('footer-1'); ?>
            </div>
			 
			 <div class="col-lg-3 list-unstyled m-0 footercenter__links d-flex flex-wrap wow fadeInUp">
				 <?php dynamic_sidebar('footer-2'); ?>
			 </div>
			<div class="col-lg-3 list-unstyled m-0 footercenter__links d-flex flex-wrap wow fadeInUp">
				<?php dynamic_sidebar('footer-3'); ?>
			</div>
				
			 
			 <div class="col-lg-3 mb-2 mb-lg-0">
				<h3 class="text-yellow">Contact Us</h3>
                 <a class="line-15 d-block font-18 text-white m-0" href="tel:+1 (309) 377-5300">
					  <i class="fa fa-phone mr-2"></i>+1 (309) 377-5300
				 </a>
				 <a class="line-15 d-block font-18 text-white m-0" href="https://wa.me/13093775300">
					  <i class="fab fa-whatsapp mr-2"></i>+1 (309) 377-5300
				 </a>
				 <a class="line-15 d-block font-20 text-white m-0" href="mailto:info@qarabic.com">
					 <i class="fa fa-envelope mr-2"></i> info@qarabic.com
				 </a>
				 <?php dynamic_sidebar('footer-4'); ?>
            </div>
			 
         </div>
      </div>
   </div>
   <div class="footerbottom bg-white py-3">
      <div class="container">
         <div class="d-lg-flex align-items-center justify-content-between text-center">
            <p class="font-16 m-0 line-15 wow fadeInUp">
               All Rights Reserved for QArabic © 2024. 
            </p>
            
			 <?php
				 wp_nav_menu( 
					array( 
						'theme_location' => 'copyrights', 
						'menu_class' => 'list-unstyled m-0 p-0 footerbottom__links d-flex flex-wrap justify-content-center wow fadeInUp' 
					) 
				);
			?>
			 
            
         </div>
      </div>
   </div>
   
</footer>

<?php wp_footer(); ?>
</body>
</html>
