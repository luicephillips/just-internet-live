<?php
/**
 * Template Name: References
 *
 */
get_header();
$section_id = get_field('section_id');
$first_visibility =  get_field('select_first_section_visibility');

/**************************/
$count_nav = array();
$mainno = 1;

if($first_visibility == 'on')
{
$count_nav[] = get_field('section_title_frst');
}

    $job_section_title = get_field('section_title_ref'); 
if($job_section_title)
{
	$count_nav[] = $job_section_title;
}

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
	while ( have_posts() ) : the_post(); ?>

	<section class="sec-<?php echo $mainno;?> page-sec intro-sec has-content dynamic-width refrenceinfo" id="refrenceinfo">
		<div class="intro-text">
			<h1 class="secondary-title"><?php echo get_field('heading'); ?></h1>
			<div class="intro-content"><?php
		the_content();
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
if( have_rows('section_two_team_photo_grid') ):

	while( have_rows('section_two_team_photo_grid') ): the_row();

		// vars
		$block_per_client = get_sub_field('block_per_client');
		$image_panel_ref = get_sub_field('image_panel_ref');

		if($block_per_client) {
		?>
		<section class="sec-<?php echo $mainno;?> <?php if($first_visibility == 'off'){ echo 'offirst'; }?> page-sec common-sec dynamic-overlap overlap-end colored-bg <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">
			<div class="common-sec-txt" data-bg-type="bg-light">
				<div class="inner-wrap">
					<div class="logo-list--parent auto-width--parent">
					<?php foreach($block_per_client as $block_per) {
						$name = $block_per['name'];
						$company_logo = $block_per['company_logo'];
						$company_logo_hover = $block_per['company_logo_hover'];
						$link = $block_per['link'];
						$link_target = $block_per['link_target'];

						$string = preg_replace('/\s+/', '_', $name);
						$string  = strtolower($string );
					?>
						<div class="logo-list--child auto-width--child">
							<a target="<?php if( $link_target=='blank'){?>_blank<?php } ?>" id="<?php echo $string; ?>" href="<?php echo $link; ?>" title="<?php echo $name; ?>" class="logo-list--link">
								<figure>
									<img src="<?php echo $company_logo ['url']; ?>" alt="<?php echo $company_logo ['alt']; ?>" class="svg-convert">
								</figure>
							</a>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
			<!-- <div class="common-sec-img bg-img" style="background-image: url(<?php echo $image_panel_ref ['url']?>)"></div> -->
			<div class="common-sec-img common-sec-img--small" data-bg-type="<?php the_field('section_design_1'); ?>">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $image_panel_ref ['url']?>)"></div>
			</div>
             <!-- <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?> -->
		</section>
	<?php }
	endwhile;

endif;
nav_vlue_count_section($count_nav);
get_footer();
