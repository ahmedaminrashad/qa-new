<?php
get_header();
?>

<aside>
<?php include get_template_directory() . '/template-parts/modal-contact.php'; ?>
	
<div class="bg-primary text-center text-white py-4">
    <div class="container">
        <h1 class="font-22 font-lg-26 mb-2 wow fadeInUp"><?php the_archive_title(); ?></h1>
		<ol class="breadcrumb breadcrumb__custom bg-transparent p-0 m-0 wow fadeInUp justify-content-center" style="visibility: visible;">
			<li class="breadcrumb-item"><a href="https://qarabic.com/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php the_archive_title(); ?></li>
		</ol>
    </div>
</div><div class="bg-white py-5 py-lg-6">
    <div class="container">
        <div class="row row-col-xl">
             
			<?php 
					if ( have_posts() ) {
						while ( have_posts() ) {
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
                    Read More
                </span>
            </div>
        </div>
    </div>
</a>            </div>

					<?php } }?>
			
			
			<?php get_template_part( 'template-parts/pagination' ); ?>
			
	    
        </div>
    </div>
</div>
</aside>


<?php
get_footer();
