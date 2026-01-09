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
            <div class="p-4 p-lg-5">
                <h3 class="font-18 font-lg-24 mb-2"><?php the_title(); ?></h3>
             
                <div class="singlecontentbg mt-4">
					<?php the_content() ?>
				</div>
            </div>
        </div>
	</div>
</div>
</aside>

		

<?php get_footer(); ?>
