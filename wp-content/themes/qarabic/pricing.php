<?php
/**
 * Template Name: Pricing
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

		</div>
	</div>
<div class="bg-white py-5 py-lg-5">
    <div class="container">
        <div class="bg-white">
				
				<div class="tabs-wrapper">
  <ul class="tabs clearfix" data-tabgroup="first-tab-group">
    <li><a href="#tab1" class="active">30 Minutes Packages</a></li>
    <li><a href="#tab2">60 Minutes Packages</a></li>
  </ul>
  <section id="first-tab-group" class="tabgroup">
    <div id="tab1" class="tabcontent">
      
		<div class="pricing-tables d-flex flex-wrap justify-content-center" >
			
			<?php
			if( have_rows('package_details') ):
			while( have_rows('package_details') ) : the_row();
			$pduration = get_sub_field('pricing_duration');
			$pdollar = get_sub_field('pricing_price_dollar');
			$peuro = get_sub_field('pricing_price_euro');
			?>
			
			<div class="pricing-wrapper">
				<div class="pricing-inner">
					<div class="is-border" style="border-color:rgb(248, 233, 33);border-radius:9px;border-width:7px 0px 0px 0px;"></div>
					
					<div class="pricing-info">
						<span class="pricing-duration"><?php echo $pduration; ?></span>
						<span class="pricing-price">$<?php echo $pdollar; ?><span>/</span>£<?php echo $peuro; ?></span>
						<span class="pricing-month">Per month</span>
					</div>
					
					<?php if( have_rows('package_features') ): ?>
					<ul>
						<?php while( have_rows('package_features') ) : the_row(); 
						$featuretitle = get_sub_field('feature_title');
						?>
						
						<li><i class="fas fa-check"></i><?php echo $featuretitle; ?></li>
						<?php endwhile; ?>
					</ul>
					
					<a href="/free-trial/" target="_self" class="btn pricing-book">
						<span>Book Free Trial</span>
					</a>
					
					<?php
					endif; 
					?>
				
				</div>
			</div>
			
			<?php
			endwhile;
			endif;
			?>
		</div>
    </div>
	  
    <div id="tab2" class="tabcontent">
		<div class="pricing-tables d-flex flex-wrap justify-content-center" >
			
			<?php
			if( have_rows('package_details60') ):
			while( have_rows('package_details60') ) : the_row();
			$pdurationa = get_sub_field('pricing_duration60');
			$pdollara = get_sub_field('pricing_price_dollar60');
			$peuroa = get_sub_field('pricing_price_euro60');
			?>
			
			<div class="pricing-wrapper">
				<div class="pricing-inner">
					<div class="is-border" style="border-color:rgb(248, 233, 33);border-radius:9px;border-width:7px 0px 0px 0px;"></div>
					
					<div class="pricing-info">
						<span class="pricing-duration"><?php echo $pdurationa; ?></span>
						<span class="pricing-price">$<?php echo $pdollara; ?><span>/</span>£<?php echo $peuroa; ?></span>
						<span class="pricing-month">Per month</span>
					</div>
					
					<?php if( have_rows('package_features60') ): ?>
					<ul>
						<?php while( have_rows('package_features60') ) : the_row(); 
						$featuretitlea = get_sub_field('feature_title60');
						?>
						
						<li><i class="fas fa-check"></i><?php echo $featuretitlea; ?></li>
						<?php endwhile; ?>
					</ul>
					
					<a href="/free-trial/" target="_self" class="btn pricing-book">
						<span>Book Free Trial</span>
					</a>
					
					<?php
					endif; 
					?>
				
				</div>
			</div>
			
			<?php
			endwhile;
			endif;
			?>
		</div>
	  </div>
 
  </section>
</div>
				
                
        </div>
	</div>
</div>
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