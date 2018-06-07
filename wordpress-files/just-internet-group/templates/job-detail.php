<?php
/**
 * Template Name: Job Detail
 *
 */
get_header();
$cta_button_text_job = get_field('cta_button_text_job');
$cta_button_link_job = get_field('cta_button_link_job');
$cta_buttin_id = get_field('cta_buttin_id');
//$select_company_logo = get_field('select_company_logo');
$cta_button_target = get_field('cta_button_target');
$first_visibility =  get_field('select_first_section_visibility');



// code for count navigation
$count_nav = array();
$mainno = 1;
if($first_visibility == 'on')
{
$count_nav[] = get_field('section_title_frst');
}


	
		if( have_rows('add_job_section') ):

	// loop through the rows of data
	while ( have_rows('add_job_section') ) : the_row();

		if( get_row_layout() == 'section_two_white_panel' ):
				$count_nav[] = get_sub_field('section_title');
			elseif( get_row_layout() == 'section_thr_black_panel' ):
		        $count_nav[] = get_sub_field('section_title');
		 elseif( get_row_layout() == 'section_fiv_white_panel' ):
		         $count_nav[] = get_sub_field('section_title');
		 elseif( get_row_layout() == 'section_six_grey_panel' ):

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
// close code for count section nav


if($first_visibility == 'on')
{ 
	if(have_posts()):
		while ( have_posts() ) : the_post();
		?>
	
		<section class="sec-<?php echo $mainno;?> page-sec intro-sec intro-has-bg intro-colored light-bg has-content dynamic-width jobinfo" id="jobinfo">
			<div class="intro-text" data-bg-type="bg-light">
				<?php
				$brand_name = get_field('select_company_logo');
				$logo_visible = get_field('logo_visible');
				$small_brand_image = get_field('small_brand_image','brands_'. $brand_name->term_id);
				?>
				<figure class="detail-brand-img">
					<img src="<?php echo $small_brand_image['url']; ?>" alt="<?php echo $brand_name->name; ?>" <?php if($logo_visible == 'hide') { echo 'style="visibility:hidden;"'; } ?>>
				</figure>
				<h1 class="secondary-title"><?php the_title(); ?></h1>
				<div class="intro-content">
					<?php the_content(); 
					//print_r($count_nav);
					?>
				</div>
			</div>
			<!-- <div class="intro-bg bg-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div> -->
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

if( have_rows('add_job_section') ):

	// loop through the rows of data
	while ( have_rows('add_job_section') ) : the_row();

		if( get_row_layout() == 'section_two_white_panel' ):
			$heading_whit =  get_sub_field('heading_whit');
			$body_text_white =  get_sub_field('body_text_white');
			$section_id = get_sub_field('section_id');
		?>

		<section class="sec-<?php echo $mainno;?> <?php if($first_visibility == 'off'){ echo 'offirst'; }?> page-sec common-sec has-content dynamic-width <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">
			<div class="common-sec-txt" data-bg-type="bg-light">
				<div class="inner-wrap">
					<h2 class="secondary-title ft-norm"><?php echo $heading_whit; ?></h2>
					<?php echo $body_text_white; ?>
				</div>
			</div>
            <!-- <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?> -->
		</section>

	<?php elseif( get_row_layout() == 'section_thr_black_panel' ):
		$heading_black =  get_sub_field('heading_black');
		$body_text_with_bullet_points =  get_sub_field('body_text_with_bullet_points');
		$panel_image_black =  get_sub_field('panel_image_black');
		$section_id = get_sub_field('section_id');
	?>
		<section class="sec-<?php echo $mainno;?> page-sec common-sec has-content dynamic-width dark-bg <?php echo $section_id; ?>"  id="<?php echo $section_id; ?>">
			<div class="common-sec-txt">
				<div class="inner-wrap">
					<h2 class="secondary-title ft-norm"><?php echo $heading_black; ?></h2>
					<?php echo $body_text_with_bullet_points; ?>
				</div>
			</div>
			<!-- <div class="common-sec-img bg-img" style="background-image: url(<?php echo $panel_image_black['url']; ?>)"></div> -->
			<div class="common-sec-img common-sec-img--small" data-bg-type="<?php the_sub_field('section_design'); ?>">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image_black['url']; ?>)"></div>
			</div>
            <!-- <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?> -->
		</section>

	<?php elseif( get_row_layout() == 'section_fiv_white_panel' ):
		$headingfiv_wht = get_sub_field('headingfiv_wht');
		$body_text_fv_white = get_sub_field('body_text_fv_white');
		$section_id = get_sub_field('section_id');
	?>

		<section class="sec-<?php echo $mainno;?> page-sec common-sec has-content dynamic-width <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">
			<div class="common-sec-txt" data-bg-type="bg-light">
				<div class="inner-wrap">
					<h2 class="secondary-title ft-norm"><?php echo $headingfiv_wht; ?></h2>
					<?php echo $body_text_fv_white; ?>
				</div>
			</div>
            <!-- <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?> -->
		</section>

	<?php elseif( get_row_layout() == 'section_six_grey_panel' ):

		$heading_six = get_sub_field('heading_six');
		$body_text_with_mailto_link = get_sub_field('body_text_with_mailto_link');
		$panel_image_six = get_sub_field('panel_image_six');
		$section_id = get_sub_field('section_id');
	?>

		<section class="sec-<?php echo $mainno;?> page-sec common-sec has-content dynamic-width colored-bg <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">
			<div class="common-sec-txt" data-bg-type="bg-light">
				<div class="inner-wrap">
					<h2 class="secondary-title ft-norm"><?php echo $heading_six; ?></h2>
					<?php echo $body_text_with_mailto_link; ?>
				</div>
			</div>
			<!-- <div class="common-sec-img bg-img" style="background-image: url(<?php echo $panel_image_six['url']; ?>)"></div> -->
			<div class="common-sec-img common-sec-img--small" data-bg-type="<?php the_sub_field('section_design'); ?>">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image_six['url']; ?>)"></div>
			</div>
            <!-- <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?> -->
		</section>

	<?php
		endif;
   endwhile;
else :

	// no layouts found

endif;
nav_vlue_count_section($count_nav);
get_footer();
