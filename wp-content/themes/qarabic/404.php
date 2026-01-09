<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
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
				<?php _e( '404 Page Not Found', 'twentytwenty' ); ?>
			</h1>

		</div>
	</div>
<div class="bg-white py-5 py-lg-5">
    <div class="container">
        <div class="bg-white shadow-sm rounded">
            <div class="p-4 p-lg-5">
                <h3 class="font-18 font-lg-24 mb-2"><?php _e( '404 Page Not Found', 'twentytwenty' ); ?></h3>
                
                <div class="singlecontentbg mt-4">
					<div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'twentytwenty' ); ?></p></div>
				</div>
            </div>
        </div>
	</div>
</div>
</aside>

<?php
get_footer();
