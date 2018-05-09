<?php
/**
 * Template Name: Career
 *
 */
get_header();
$job_overview = get_field('job_overview');
$first_visibility =  get_field('select_first_section_visibility');

// code for count navigation
$count_nav = array();
$mainno = 1;
if($first_visibility == 'on')
{
$count_nav[] = get_field('section_title_frst');
}
if( have_rows('job_overview') ):
 // loop through the rows of data
	while ( have_rows('job_overview') ) : the_row();

		if( get_row_layout() == 'creer_section_two' ):
		$count_nav[] = get_sub_field('section_title');	
		elseif( get_row_layout() == 'section_therr_career' ):
		$count_nav[] = get_sub_field('section_title');	
		elseif( get_row_layout() == 'section_four_career' ):
		$count_nav[] = get_sub_field('section_title');	
		
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
	<section class="sec-<?php echo $mainno;?> page-sec intro-sec intro-colored intro-has-bg has-content dynamic-width career-info" id="career-info">
		<div class="intro-text">
			<h1 class="secondary-title"><?php echo get_field('heading'); ?></h1>
			<div class="intro-content">
				<?php the_content(); ?>
			</div>
		</div>
		<!-- <div class="intro-bg bg-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div> -->
		<div class="intro-bg">
			<div class="parallax inner-img bg-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
		</div> <?php
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
if( have_rows('job_overview') ):

	// loop through the rows of data
	while ( have_rows('job_overview') ) : the_row();

		if( get_row_layout() == 'creer_section_two' ):
		$panel_image_career =  get_sub_field('panel_image_career');
		$section_id = get_sub_field('section_id');
		?>
		<section class="sec-<?php echo $mainno;?> <?php if($first_visibility == 'off'){ echo 'offirst'; }?> page-sec common-sec has-content dynamic-width <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">
				<div class="common-sec-txt" data-bg-type="bg-light">
					<div class="inner-wrap">
						<h2 class="secondary-title"><?php echo get_sub_field('heading'); ?></h2>
						<?php echo get_sub_field('bullet_list_with_short_text'); ?>
					</div>
				</div>
				<!-- <div class="common-sec-img bg-img" style="background-image: url(<?php echo $panel_image_career['url']; ?>)"></div> -->
				<div class="common-sec-img common-sec-img--small">
					<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image_career['url']; ?>)"></div>
				</div> <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?>
			</section>
			<?php
		elseif( get_row_layout() == 'section_therr_career' ):
			$section_id = get_sub_field('section_id');
		?>
			<section class="sec-<?php echo $mainno;?>  page-sec common-sec has-content dynamic-width colored-bg <?php echo $section_id ; ?>" id="<?php echo $section_id ; ?>">
				<div class="common-sec-txt" data-bg-type="bg-light">
					<div class="inner-wrap">
						<h2 class="secondary-title"><?php echo get_sub_field('heading_secthree'); ?></h2>
						<?php echo get_sub_field('career_short_text');?>
					</div>
				</div> <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?>
			</section>
		<?php

		elseif( get_row_layout() == 'section_four_career' ):
			$panel_image_career = get_sub_field('panel_image_career');
			$panel_image_job = get_sub_field('panel_image_job');
			$varying_amot_blocks = get_sub_field('varying_amount_of_jobs_blocks');

			$cta_button_text= get_sub_field('cta_button_text');
			$cta_button_link = get_sub_field('cta_button_link');
			$cta_button_id = get_sub_field('cta_button_id');

			$section_id = get_sub_field('section_id');
			$cta_button_target = get_sub_field('cta_button_target');
		?>
		<section class="sec-<?php echo $mainno;?>  page-sec common-sec has-content dynamic-width dark-bg <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">
			<div class="common-sec-txt">
				<div class="inner-wrap">
					<h2 class="secondary-title"><?php echo get_sub_field('heading_car_forur'); ?></h2>
					<?php
						echo get_sub_field('fourand_short_text');
						if($cta_button_text && $cta_button_link) {
							echo do_shortcode('[CTAButton target="'.$cta_button_target .'" title="'.$cta_button_text.'" url="'.$cta_button_link.'" id="'.$cta_button_id.'"]');
						}
					?>
				</div>
			</div>
			<!-- <div class="common-sec-img bg-img" style="background-image: url(<?php echo $panel_image_career['url']; ?>)"></div> -->
			<div class="common-sec-img common-sec-img--small">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image_career['url']; ?>)"></div>
			</div> <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?>
		</section>

		<?php
		if($varying_amot_blocks) {
		?>

		<section class="sec-<?php echo $mainno;?>  page-sec common-sec dynamic-overlap colored-bg career-view" id="career-view">
			<div class="common-sec-txt" data-bg-type="bg-light">
				<div class="inner-wrap">
					<div class="blocks-content--parent auto-width--parent">
						<?php
						foreach($varying_amot_blocks as $varying_amot) {
							$subtitle = $varying_amot['subtitle'];
							$title = $varying_amot['title'];
							$short_text = $varying_amot['short_text'];
							$cta_button_text = $varying_amot['cta_button_text'];
							$cta_button_link = $varying_amot['cta_button_link'];
							$cta_button_target = $varying_amot['cta_button_target'];

							$string = preg_replace('/\s+/', '_', $title);
							$string  = strtolower($string );
						?>
						<div class="blocks-content--child auto-width--child">
							<span class="small-title"><?php echo $subtitle; ?></span>
							<h3 class="alt-title"><?php echo $title; ?></h3>
							<p><?php echo $short_text; ?></p>
							<a id="career_<?php echo $string ;?>" href="<?php echo $cta_button_link; ?>" title="<?php echo $cta_button_text; ?>" class="btn btn--solid" target="<?php echo $cta_button_target; ?>"><?php echo $cta_button_text; ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-small.svg" alt="arrow" class="btn-icn"></a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<!-- <div class="common-sec-img bg-img" style="background-image: url(<?php echo $panel_image_job['url']; ?>)"></div> -->
			<div class="common-sec-img common-sec-img--small">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image_job['url']; ?>)"></div>
			</div> <?php /*
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  }*/ ?>
		</section>
		<?php }

		endif;

	endwhile;

else:

	// no layouts found

endif;
?>

<?php nav_vlue_count_section($count_nav);  get_footer();
