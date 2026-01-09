<?php
/**
 * Template Name: About Us
 */

get_header();
?>

<aside>
	<div class="bg-primary text-center text-white py-5">
		<div class="container">
			<h1 class="font-24 font-lg-30 mb-2 wow fadeInUp">
				<?php the_title(); ?>
			</h1>

		</div>
	</div>
<div class="bg-white py-5 py-lg-5">
    <div class="container">
        <div class="bg-white shadow-sm rounded">
            <div class="p-4 p-lg-5">
                <div class="singlecontentbg mt-4">
					<?php the_content() ?>
				</div>
            </div>
        </div>
        
</div>
</aside>

		

<?php get_footer(); ?>
