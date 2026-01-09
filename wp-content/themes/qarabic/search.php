<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>


	
	<?php

	$archive_title    = '';
	$archive_subtitle = '';

	if ( is_search() ) {
		global $wp_query;

		$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="color-accent">' . __( 'نتائج البحث عن:', 'twentytwenty' ) . '</span>',
			'&ldquo;' . get_search_query() . '&rdquo;'
		);

	} 
?>
	
	

<aside>
	<?php include get_template_directory() . '/template-parts/modal-contact.php'; ?>
	
	<div class="bg-primary text-center text-white py-4">
		<div class="container">
			<h1 class="font-22 font-lg-26 mb-2 wow fadeInUp">
			   نتائج البحث عن <?php echo $archive_title; ?>
			</h1>
		</div>
	</div>
	<div class="bg-white py-4 py-lg-7">
		<div class="container">

<?php  if ( have_posts() ) { ?>
<div class="row row-col-xl">
<?php while ( have_posts() ) {
	the_post();  ?>

	
	<div class="col-lg-6">
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
                    إقرأ المزيد
                </span>
            </div>
        </div>
    </div>
</a>            
	</div>
	
						
					<?php } ?>
							
</div>
							<?php
				} else {
				?>

		<div class="text-center">
				<h1 class="font-20 font-md-50 font-lg-80 text-danger line-10 wow fadeInUp">404 <i class="d-block mt-1 line-10 font-sn font-20 font-w200">صفحة غير موجودة!</i></h1>
				<div class="mt-4">
					<p class="font-16 mb-2 text-light wow fadeInUp">
						الصفحة التي تحاول الوصول إليها غير موجودة <br>
						قد يكون تم حذفها أو نقلها إلى مكان آخر في الموقع
					</p>
					<div class="d-flex mt-4 mt-lg-5 flex-wrap align-items-center justify-content-center">
						<p class="mb-0 font-16 font-w600 wow fadeInUp">
							يمكنك البحث
						</p>
						<div class="headertop__search position-relative mx-3 wow fadeInUp">
							<form action="https://qarabic.com/">
								<input type="text" name="s" class="form-control form-control-lg rounded-pill" placeholder="هل تبحث عن شئ..؟" style="width:220px">
								<button class="btn btn-lg btn-secondary position-absolute rounded-pill p-0 text-center" style="top:0;left:0;width:50px;height:50px;line-height:52px" type="submit">
									<i class="fa fa-search"></i>
								</button>
							</form>
						</div>
						<p class="m-0 font-16 font-w600 wow fadeInUp">
							أو عودة إلى <a class="btn btn-lg btn-primary ml-2 btn-mw160 font-w700 rounded-pill" href="https://qarabic.com/">صفحة الرئيسية</a>
						</p>
					</div>
				</div>
			</div>

		<?php
	}
	?>

			</div>
	</div>
</aside>
					
	<?php get_template_part( 'template-parts/pagination' ); ?>

			

<?php
get_footer();
