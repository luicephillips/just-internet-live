<?php
/**
 * Template Name: Our team
 *
 */
get_header();
$team_photo_grid = get_field('team_photo_grid');
$panel_image_team = get_field('panel_image_team');
$section_id = get_field('section_id');
$first_visibility =  get_field('select_first_section_visibility');

/**************************/
$count_nav = array();
$mainno = 1;

if($first_visibility == 'on')
{
$count_nav[] = get_field('section_title_frst');
}

    $job_section_title = get_field('section_title'); 
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
		while ( have_posts() ) : the_post();
		?>
	
		<section class="sec-<?php echo $mainno;?> page-sec intro-sec intro-has-bg intro-colored intro-colored--small team_main" id="team_main">
			<div class="intro-text">
				<h1 class="secondary-title"><?php echo get_field('heading'); ?></h1>
				<div class="intro-content">
					<?php the_content(); ?>
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
if($team_photo_grid) { ?>

	<section class="sec-<?php echo $mainno;?> <?php if($first_visibility == 'off'){ echo 'offirst'; }?> page-sec dynamic-overlap overlap-3-rows common-sec common-sec--short colored-bg <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">
		<div class="common-sec-txt" data-bg-type="bg-light">
			<div class="inner-wrap">
				<div class="auto-width--parent team-list--parent">
				<?php
				foreach($team_photo_grid as $team_phot) {
					$companyimg = $team_phot['companyimg'];
					$name = $team_phot['name'];
					$function = $team_phot['function'];
					$employee_image = $team_phot['employee_image'];
					$employee_image_hover = $team_phot['employee_image_hover'];
					
					$string = preg_replace('/\s+/', '_', $name);
					$string  = strtolower($string);

					$term_id = $companyimg->term_id;
					$small_brand_image = get_field('small_brand_image','brands_'. $term_id);
					$brand_url = get_field('brand_url','brands_'. $term_id);
					?>
					<div class="auto-width--child team-list--child">
						<a id="team_<?php echo $string; ?>" href="javascript:;" title="<?php echo $name; ?>" class="block-link team_<?php echo $string; ?>">
							<figure class="team-img">
								<img src="<?php echo $employee_image['sizes']['medium']?>" alt="<?php echo $employee_image['alt']?>" class="def-img" />
								<img src="<?php echo $employee_image_hover['sizes']['medium']; ?>" alt="<?php echo $employee_image['alt']?>" class="on-hover" />
								<figcaption>
									<img src="<?php echo $small_brand_image['url']?>" alt="<?php echo $small_brand_image['alt']?>" class="team-brand svg-convert">
									<h4><?php echo $name; ?></h4>
									<p><?php echo $function ; ?></p>
								</figcaption>
							</figure>
						</a>
					</div>
					<?php } ?>
				</div>
			 </div>
		</div>
		<!-- <div class="common-sec-img bg-img parallax" style="background-image: url(<?php echo $panel_image_team['url']; ?>)"></div> -->
		<div class="common-sec-img common-sec-img--small" data-bg-type="<?php the_field('section_design_1'); ?>">
			<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image_team['url']; ?>)"></div>
		</div>
        <!-- <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?> -->
	</section>

<?php }
nav_vlue_count_section($count_nav);
get_footer();
