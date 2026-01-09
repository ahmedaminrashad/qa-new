<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
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
		<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</div>
<div class="bg-white py-5 py-lg-5">
    <div class="container">
        <div class="bg-white shadow-sm rounded">
            <img class="img-wfull img-h280 img-lg-h380 rounded-top" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <div class="p-4 p-lg-5">
                <h3 class="font-18 font-lg-24 mb-2"><?php the_title(); ?></h3>
                <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex flex-wrap align-items-center removelast_mr">
                    <p class="font-17 mb-2 mr-3">
                        <i class="fa fa-calendar-alt mr-2"></i><?php the_date(); ?>
					</p>
                    
                </div>
                    <ul class="sharesocial bg-colored mx-0 text-lg-right text-center mb-2">
                        <li><a class="fb fab fa-facebook-f" target="popup" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>&amp;amp;t=<?php the_title(); ?>','name','width=600,height=400')"></a></li>
                        <li><a class="tw fab fa-twitter" target="popup" onclick="window.open('http://twitter.com/home/?status=<?php the_title(); ?> : <?php the_permalink() ?>','name','width=600,height=400')"></a></li>
                        <li><a class="wh fab fa-whatsapp" target="popup" onclick="window.open('https://api.whatsapp.com/send?text=<?php the_permalink() ?>','name','width=600,height=400')"></a></li>
                    </ul>
                </div>
                
                <div class="singlecontentbg mt-4">
					<?php the_content() ?>
				</div>
            </div>
        </div>
        <div class="my-5 my-lg-5">
            <h2 class="font-18 font-lg-28 mb-5 mb-lg-6 title-border secondary title-border-sm">
                Related Posts
			</h2>

			<div class="sliderslick shadow color-primary slidermargin10 sliderslick__dotscutsom dots--50" data-slick="{&quot;autoplay&quot;:true,&quot;autoplaySpeed&quot;:4000,&quot;speed&quot;:500,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2,&quot;responsive&quot;: [{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;: 1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;: 1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:510,&quot;settings&quot;:{&quot;slidesToShow&quot;: 1,&quot;slidesToScroll&quot;:1}}]}">

				
			
				<?php
				$tags = wp_get_post_terms( get_queried_object_id(), 'category', ['fields' => 'ids'] );
				$args = [
					'post__not_in'        => array( get_queried_object_id() ),
					'posts_per_page'      => 6,
					'ignore_sticky_posts' => 1,
					'orderby'             => 'rand',
					'tax_query' => [
						[
							'taxonomy' => 'category',
							'terms'    => $tags
						]
					]
				];
				$my_query = new wp_query( $args );
				if( $my_query->have_posts() ) {
						while( $my_query->have_posts() ) {
							$my_query->the_post(); ?>
				
				<a class="boxpostbox d-block hovertop hoverbg-primary hoverbg-textwhite addeffect-all rounded-xxl shadow-sm wow fadeInUp" href="<?php the_permalink(); ?>">
                        <div class="d-md-flex align-items-center">
                           <div>
                              <img class="boxpostbox__thu objectfit-cover" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
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
                     </a>
				
				
				
				
				
				
							
						<?php }
						wp_reset_postdata();
				}
			?> 
				
			</div>
        
			<!--<div class="my-5 my-lg-5">
            <h2 class="font-18 font-lg-28 mb-2 title-border secondary title-border-sm">
                Comments
            </h2>
        </div>
             <div id="respond">
                
            </div>
        -->
    </div>
</div>
</aside>

		

<?php get_footer(); ?>
