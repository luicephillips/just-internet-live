<?php
/**
 * Template Name: Job Overview
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
		if( get_row_layout() == 'section_one_job_overview' ):
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
	<section class="sec-<?php echo $mainno;?> page-sec intro-sec intro-colored intro-has-bg has-content dynamic-width intro-section" id="intro-section">
		<div class="intro-text">
			<h1 class="secondary-title"><?php echo get_field('heading'); ?></h1>
			<div class="intro-content">
				<?php the_content(); ?>
			</div>
		</div>
		<!-- <div class="intro-bg bg-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div> -->
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
if( have_rows('job_overview') ):

	// loop through the rows of data
	while ( have_rows('job_overview') ) : the_row();
		if( get_row_layout() == 'section_one_job_overview' ):
			$panel_image_job = get_sub_field('panel_image_job');
			$varying_amot_blocks = get_sub_field('varying_amount_of_jobs_blocks');
		?>

		<?php if($varying_amot_blocks) { ?>

		<section class="sec-<?php echo $mainno;?> <?php if($first_visibility == 'off'){ echo 'offirst'; }?> page-sec common-sec dynamic-overlap colored-bg job-overview" id="job-overview">
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
			</div>
            <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?>
		</section>

		<?php }

		endif;
   endwhile;
else :

	// no layouts found

endif;
?>

<?php
// start footer (override footer.php)
$footer_content = get_field('footer_content','option');
$brands_title = get_field('brands_title','option');
$add_brand_logo = get_field('add_brand_logo','option');
$just_follow_title = get_field('just_follow_title','option');
$just_follow = get_field('just_follow','option');
$just_go_there = get_field('just_go_there','option');
$go_back = get_field('go_back','option');

$work_with_us_text = get_field('work_with_us_text','option');
$work_with_us_link = get_field('work_with_us_link','option');
$work_with_us_image = get_field('work_with_us_image','option');
$just_talk_to_us = get_field('just_talk_to_us','option');
$just_talk_to_us_link = get_field('just_talk_to_us_link','option');
$just_talk_to_us_image = get_field('just_talk_to_us_image','option');

?>

		<footer class="footer-main page-sec">

		<?php
		if($footer_content)
			{
			?>
		    	<div class="footer-item">

				<?php
				echo $footer_content;
				?>
			</div>
       <?php } ?>

		     <div class="footer-item">

			<?php if($brands_title){ echo '<h5>'.$brands_title.'</h5>';  }
			if($add_brand_logo)
			{
			?>

			<ul class="footer-brands">
			<?php
				foreach($add_brand_logo as $add_brand)
				{
					/*echo '<li><a href="'.$add_brand['barand_link'].'" title="'.$add_brand['brand_name'].'"><img src="'.$add_brand['brand_image']['url'].'" alt="'.$add_brand['brand_name'].'"></a></li>'; */

					$term_id = $add_brand->term_id;
			        $small_brand_image = get_field('small_brand_image','brands_'. $term_id);
					$brand_url = get_field('brand_url','brands_'. $term_id);

					echo '<li><a href="'.$brand_url.'" title="'.$add_brand->name.'" target="_blank"><img src="'.$small_brand_image['url'].'" alt="'.$add_brand->name.'" class="svg-convert"></a></li>';

				}
			?>


			</ul>
           <?php } ?>
		</div>

		     <div class="footer-item">

			<?php if($just_follow_title){ echo '<h5>'.$just_follow_title.'</h5>';}

			if($just_follow){?>

			<ul class="social-list">

                <?php
				foreach($just_follow as $just_foll)
				{
					echo '<li><a href="'.$just_foll['link'].'" title="'.$just_foll['title'].'" target="_blank"><i class="fa '.$just_foll['icon'].'" aria-hidden="true"></i></a></li>';
				}
				?>


			</ul>

            <?php } ?>

		</div>

	</footer>

        <div class="fix-footer">
			<div class="fix-footer-brands">
				<ul class="footer-brands fix-brands">

                    <?php
				foreach($add_brand_logo as $add_brand)
				{
					/*echo '<li><a href="'.$add_brand['barand_link'].'" title="'.$add_brand['brand_name'].'"><img src="'.$add_brand['brand_image']['url'].'" alt="'.$add_brand['brand_name'].'"></a></li>'; */

				$term_id = $add_brand->term_id;
				$small_brand_image = get_field('small_brand_image','brands_'. $term_id);
				$brand_url = get_field('brand_url','brands_'. $term_id);
				//echo '<li><a href="'.$brand_url.'" title="'.$add_brand->name.'"><img src="'.$small_brand_image['url'].'" alt="'.$add_brand->name.'"></a></li>';
				echo '<li><a href="'.$brand_url.'" title="'.$brand_url.'" target="_blank"><img src="'.$small_brand_image['url'].'" alt="'.$small_brand_image['alt'].'" class="svg-convert"></a></li>';

				}
			?>
				</ul>
			</div>
            <?php
			if($work_with_us_text ||  $just_talk_to_us)
			{
			?>
			<div class="footer-interact">
				<ul class="interact-list">
                	<?php
					if($work_with_us_text && $work_with_us_link && $work_with_us_image)
					{
					?>
					<li class="interact-list--item"><a href="<?php echo $work_with_us_link; ?>" title="<?php echo $work_with_us_text; ?>"><?php echo $work_with_us_text; ?><figure class="interact-icon"><img src="<?php echo $work_with_us_image['url']; ?>" alt="<?php echo $work_with_us_image['alt']; ?>"></figure></a></li>
                    <?php }
					if($just_talk_to_us && $just_talk_to_us_link ){ ?>
					<li class="interact-list--item"><a href="<?php echo $just_talk_to_us_link; ?>" title="<?php echo $just_talk_to_us; ?>"><?php echo $just_talk_to_us; ?> <figure class="interact-icon"><div class="ham-icon"><span></span><span></span><span></span></div></figure></a></li>
                    <?php } ?>
				</ul>


			</div>
            <?php

			} ?>
		</div>




	<div class="nav-btns">
		<a href="javascript:void(0)" title="just go there!" class="next-page">just show me the jobs! <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-white.svg" alt="<?php echo $just_go_there; ?>" class="img-icn"></a>
		<a href="javascript:void(0)" title="go back" class="back-page"><?php echo $go_back; ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-white.svg" alt="<?php echo $go_back; ?>" class="img-icn"></a>
	</div>

</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.jInvertScroll.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
<?php 
nav_vlue_count_section($count_nav);
wp_footer(); ?>


