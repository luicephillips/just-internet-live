<?php
/**
 * Template Name: Culture
 *
 */
get_header();

$first_visibility =  get_field('select_first_section_visibility');
// code for count navigation
$count_nav = array();
$mainno = 1;
if($first_visibility == 'on')
{
$count_nav[] = get_field('section_title_frst');
}
if( have_rows('add_culture_section') ):

	// loop through the rows of data
	while ( have_rows('add_culture_section') ) : the_row();

		if( get_row_layout() == 'culture_section_two' ):
			$count_nav[] = get_sub_field('section_title');
		elseif( get_row_layout() == 'culture_section_three' ):
			$count_nav[] = get_sub_field('section_title');

		/* else { } */

	endif;

endwhile;

else:

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
		<section class="sec-<?php echo $mainno;?> page-sec intro-sec intro-sec-alt culturemain" id="culturemain">
			<div class="intro-text">
				<h1 class="secondary-title"><?php echo get_field('heading'); ?></h1>
			</div>
			<!-- <div class="intro-bg bg-img parallax" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div> -->
			<div class="intro-bg" data-bg-type="<?php the_field('section_design'); ?>">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
			</div>
            <!-- <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?> -->
		</section>

	<?php
	endwhile; // End of the loop.
endif;
}

// check if the flexible content field has rows of data
if( have_rows('add_culture_section') ):

	// loop through the rows of data
	while ( have_rows('add_culture_section') ) : the_row();

		if( get_row_layout() == 'culture_section_two' ):
			$culture_and_short_text =  get_sub_field('culture_and_short_text');
			$panel_image_culture = get_sub_field('panel_image_culture');
			$section_id = get_sub_field('section_id');
		?>

		<section class="sec-<?php echo $mainno;?> <?php if($first_visibility == 'off'){ echo 'offirst'; }?> page-sec page-about-sec common-sec has-content dynamic-width <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">
			<div class="common-sec-txt" data-bg-type="bg-light">
				<div class="inner-wrap">
					 <?php echo $culture_and_short_text; ?>
				</div>
			</div>
			<!-- <div class="common-sec-img bg-img" data-bg-type="bg-dark" style="background-image: url(<?php echo $panel_image_culture['url'];?>)"></div> -->
			<div class="common-sec-img common-sec-img--small" data-bg-type="<?php the_sub_field('section_design'); ?>">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image_culture['url'];?>)"></div>
			</div>
            <!-- <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?> -->
		 </section>

		<?php
		elseif( get_row_layout() == 'culture_section_three' ):
			$heading_and_short_culture = get_sub_field('heading_and_short_culture');
			$panel_image_culture = get_sub_field('panel_image_culture');
			$five_blocks_with_competences = get_sub_field('five_blocks_with_competences');
			$panel_image_fiveblock = get_sub_field('panel_image_fiveblock');
			$section_id = get_sub_field('section_id');
		?>

		<section class="sec-<?php echo $mainno;?> page-sec common-sec dark-bg dynamic-width has-content dynamic-width <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">
		<div class="common-sec-txt">
			<div class="inner-wrap">
					<?php
					echo  $heading_and_short_culture;
					?>
				</div>
			</div>
			<!-- <div class="common-sec-img bg-img parallax" data-bg-type="bg-dark" style="background-image: url(<?php echo $panel_image_culture['url']; ?>)"></div> -->
			<div class="common-sec-img common-sec-img--small" data-bg-type="<?php the_sub_field('section_design'); ?>">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image_culture['url']; ?>)"></div>
			</div>
           <!-- <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?> --> 
		</section>

		<?php if( $five_blocks_with_competences) { ?>

		<section class="sec-<?php echo $mainno;?> page-sec common-sec dynamic-overlap overlap-start colored-bg culture_block" id="culture_block">
		<div class="common-sec-txt" data-bg-type="bg-light">
			<div class="inner-wrap">
				<div class="culture-list auto-width--parent">
					<div class="culture-list--item auto-width--child" style="background-color: transparent;"></div>
					<?php foreach($five_blocks_with_competences as $five_blocks_wit) { ?>
						<div class="culture-list--item auto-width--child">
							<h3 class="secondary-title"><?php echo $five_blocks_wit['heading'];?></h3>
							<p><?php echo $five_blocks_wit['content'];?></p>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
			<!-- <div class="common-sec-img bg-img" data-bg-type="bg-dark" style="background-image: url(<?php echo $panel_image_fiveblock['url'];?>)"></div> -->
			<div class="common-sec-img common-sec-img--small" data-bg-type="<?php the_sub_field('section_design_1'); ?>">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image_fiveblock['url'];?>)"></div>
			</div>
		</section>
		<?php }

		/* else { } */

	endif;

endwhile;

else:

	// no layouts found

endif;
nav_vlue_count_section($count_nav); 
get_footer();
