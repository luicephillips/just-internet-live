<?php
/**
 * Template Name: About Us
 *
 */
get_header();
//$add_section = get_field('add_section');
?>
	<?php
	$first_visibility =  get_field('select_first_section_visibility');



// code for count navigation
$count_nav = array();
$mainno = 1;
if($first_visibility == 'on')
{
$count_nav[] = get_field('section_title_frst');
}
if( have_rows('add_section_about') ):
	 // loop through the rows of data
	while ( have_rows('add_section_about') ) : the_row();
		if( get_row_layout() == 'about_page_section_two' ):

			$count_nav[] = get_sub_field('section_title');	
			
		elseif( get_row_layout() == 'barnd_details' ):
			$count_nav[] = get_sub_field('section_title');					
		endif;
	endwhile;
else :

	// no layouts found

endif;
if(count($count_nav)<10)
{
$secvar = '0'.count($count_nav);	
}else
{
$secvar = 	count($count_nav);
}


// code for count navigation close
if($first_visibility == 'on')
{
  if(have_posts()):
			while ( have_posts() ) : the_post();

  ?>

		<section class="sec-<?php echo $mainno;?> page-sec intro-sec intro-has-bg intro-colored aboutmain" id="aboutmain">
			<div class="intro-text">
				<h1 class="secondary-title"><?php echo get_field('heading'); ?></h1>
				<div class="intro-content">
					<?php 	the_content(); 	?>
				</div>
			</div>
			<!--<div class="intro-bg bg-img parallax" style="background-image: url(images/intro-about.jpg)"></div>-->
			<div class="intro-bg">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
			</div>
             <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?>
		</section>
  <?php
			endwhile; // End of the loop.
  endif;
}

// check if the flexible content field has rows of data
if( have_rows('add_section_about') ):

	 // loop through the rows of data
	while ( have_rows('add_section_about') ) : the_row();

		if( get_row_layout() == 'about_page_section_two' ):

			$heading_and_short_text =  get_sub_field('heading_and_short_text');
			$heading_just_five_brands = get_sub_field('heading_just_five_brands');
			$five_blocks_with_brandabout = get_sub_field('five_blocks_with_brandabout');
			$panel_image = get_sub_field('panel_image');
			$section_id = get_sub_field('section_id');
			?>
			<section class="sec-<?php echo $mainno;?> <?php if($first_visibility == 'off'){ echo 'offirst'; }?> page-sec page-about-sec common-sec dark-bg has-content dynamic-width <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">
				<div class="common-sec-txt">
					<div class="inner-wrap">
					   <?php echo $heading_and_short_text; ?>
					</div>
				</div>
			</section>
			<?php
			if($five_blocks_with_brandabout)
			{	?>
			 <section class="page-sec common-sec block-sec colored-bg">
				 <div class="common-sec-txt" data-bg-type="bg-light">
					<div class="inner-wrap">
					<h2><?php echo $heading_just_five_brands; ?></h2>
					<div class="brand-list auto-width--parent">

						<?php
						foreach($five_blocks_with_brandabout as $five_bloc)
						{
							$brand_image = $five_bloc['brand_image'];
							$target_link = $five_bloc['target_link'];
							//echo '<pre>';
							//print_r($brand_image);
							?>
							<div class="brand-list--item auto-width--child">
								<a href="<?php echo $five_bloc['brand_link']; ?>" title="<?php echo $five_bloc['title']; ?>" class="brand-list--link" target="<?php echo $target_link; ?>">
									<img src="<?php echo $brand_image['url']; ?>" alt="<?php echo $brand_image['alt']; ?>" class="svg-convert">
								</a>
							</div>
							<?php
						}
						?>

					</div>
					</div>
				</div>
				<!-- <div class="common-sec-img bg-img" style="background-image: url(<?php echo $panel_image['url'];?>)"></div> -->
				<div class="common-sec-img common-sec-img--small">
					<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image['url'];?>)"></div>
				</div>
                 <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?>
			</section>
					<?php
			} else {}




		elseif( get_row_layout() == 'barnd_details' ):
				$branad_image = get_sub_field('branad_image');
				$heading_and_content = get_sub_field('heading_and_content');
				$panel_image_three = get_sub_field('panel_image_three');
				$background_color = get_sub_field('background_color');
				$cta_button_text = get_sub_field('cta_button_text');
				$cta_button_link = get_sub_field('cta_button_link');
				$cta_button_id = get_sub_field('cta_button_id');
				$cta_button_target = get_sub_field('cta_button_target');
				$section_id = get_sub_field('section_id');
			?>

			<section class="sec-<?php echo $mainno;?> <?php echo $section_id ?>  page-sec common-sec common-sec--alt has-content dynamic-width <?php echo $background_color; ?>" id="<?php echo $section_id ?>">

				<div class="common-sec-txt" data-bg-type="bg-light">
					<div class="inner-wrap">
						<figure class="brand-img"><img src="<?php echo $branad_image['url'];?>" alt="<?php echo $branad_image['alt'];?>"></figure>
						<?php
						echo $heading_and_content;
						if($cta_button_text && $cta_button_link) {
							echo do_shortcode('[CTAButton target="'.$cta_button_target.'" title="'.$cta_button_text.'" url="'.$cta_button_link.'" id="'.$cta_button_id.'"]');
						} ?>
					</div>
				</div>
				<?php
				if( $panel_image_three ) {
				?>
				<!-- <div class="common-sec-img bg-img" style="background-image: url(<?php echo $panel_image_three['url'];?>)"></div> -->
				<div class="common-sec-img common-sec-img--small">
					<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image_three['url'];?>)"></div>
				</div>
				<?php } ?>
                 <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?>
			</section>
			<?php

		endif;

	endwhile;

else :

	// no layouts found

endif;
 ?>



  <?php
  nav_vlue_count_section($count_nav); 
  
  get_footer();
