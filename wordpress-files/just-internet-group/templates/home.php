<?php
/**
 * Template Name: Home Page
 *
 */
get_header();
//$add_section = get_field('add_section');
$cta_button_text = get_field('cta_button_text');
$cata_button_link = get_field('cata_button_link');
$cta_button_id = get_field('cta_button_id');
$button_target = get_field('button_target');
$first_visibility =  get_field('select_first_section_visibility');



// code for count navigation
$count_nav = array();
$mainno = 1;
if($first_visibility == 'on')
{
$count_nav[] = get_field('section_title_frst');
}

if( have_rows('add_section') ):
	 // loop through the rows of data
	while ( have_rows('add_section') ) : the_row();
		if( get_row_layout() == 'home_page_section_two' ):
		$count_nav[] = get_sub_field('section_title');	
	 	elseif( get_row_layout() == 'home_page_section_three' ):
		$count_nav[] = get_sub_field('section_title');	
		elseif( get_row_layout() == 'home_page_segment_work_with_us' ):
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
 	<section class="page-sec sec-1 intro-sec home" id="home">
		<div class="intro-text">
			<h1 class="primary-title"><?php echo get_field('heading'); ?></h1>
			<div class="intro-content">
			<?php
			the_content();

			if($cta_button_text && $cata_button_link)
			{
				echo do_shortcode('[CTAButton title="'.$cta_button_text.'" url="'.$cata_button_link.'" class="'.$cta_button_id.'" id="'.$cta_button_id.'" target="'.$button_target.'"]');
			}
			//print_r($count_nav);
        
			//[CTAButton title="Tell me more!" url="#"]
			?>
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
		<div class="just-scroll">Just scroll</div>
		<!--<ul class="nav-list">
			<li class="active-num"><a href="#sec-1"><span class="nav-num">1</span> <span class="nav-title">Nav Title</span></a></li>
			<li><a href="#sec-2"><span class="nav-num">2</span> <span class="nav-title">Nav Title</span></a></li>
			<li><a href="#sec-3"><span class="nav-num">3</span> <span class="nav-title">Nav Title</span></a></li>
			<li><a href="#sec-4"><span class="nav-num">4</span> <span class="nav-title">Nav Title</span></a></li>
		</ul>-->
        
        
	</section>
 	<?php
	endwhile; // End of the loop.
endif;
}
?>
        
<?php
// check if the flexible content field has rows of data
if( have_rows('add_section') ):

	 // loop through the rows of data
	while ( have_rows('add_section') ) : the_row();

		if( get_row_layout() == 'home_page_section_two' ):

		$short_text = get_sub_field('short_text');
		$panel_image = get_sub_field('panel_image');

		$cta_button_text = get_sub_field('cta_button_text');
		$cta_button_link = get_sub_field('cta_button_link');
		$cta_button_id = get_sub_field('cta_button_id');
		$section_id = get_sub_field('section_id');
		$cta_button_target = get_sub_field('cta_button_target');

		?>
		<section class="<?php if($first_visibility == 'off'){ echo 'offirst'; }?> page-sec sec-2 page-about-sec common-sec has-content dynamic-width <?php echo $section_id.' '; ?>" id="<?php echo $section_id; ?>">
			<div class="common-sec-txt" data-bg-type="bg-light">
				<div class="inner-wrap">
				<?php echo $short_text;

				if($cta_button_link && $cta_button_text) {
					echo do_shortcode('[CTAButton target="'.$cta_button_target.'" title="'.$cta_button_text.'" url="'.$cta_button_link.'" class="'.$cta_button_id.'" id="'.$cta_button_id.'"]');
				} ?>
				</div>
			</div>
			<!-- <div class="common-sec-img bg-img parallax" style="background-image: url(<?php echo $panel_image['url']; ?>)"></div> -->
			<div class="common-sec-img common-sec-img--small">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image['url']; ?>)"></div>
			</div>
		
  <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?>
		</section>

		<?php

	 	elseif( get_row_layout() == 'home_page_section_three' ):

		$heading_hthree = get_sub_field('heading_hthree');
		$panel_image_three = get_sub_field('panel_image_three');
		$five_blockrands = get_sub_field('five_blocks_with_our_brands');
		$selct_brands_dbnm = get_sub_field('selct_brands_dbnm');
		$add_brands = get_sub_field('add_brands');
		$section_id = get_sub_field('section_id');
		?>
		<section class="page-sec sec-3 common-sec dynamic-overlap dynamic-overlap--one-side colored-bg <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">

			<div class="common-sec-txt" data-bg-type="bg-light">

				<div class="inner-wrap">

					<h2><?php echo $heading_hthree; ?></h2>

					<?php
					if($add_brands) {
					?>

					<div class="brand-list auto-width--parent">

						<?php
						foreach($add_brands as $add_brand) {
							$image = $add_brand['image'];
							$title = $add_brand['title'];
							$brand_url = $add_brand['brand_url'];
							$target = $add_brand['target'];
							$string = preg_replace('/\s+/', '_', $title);
							$string  = strtolower($string );
							?>

							<div class="brand-list--item auto-width--child">
								<a target="<?php echo $target; ?>" id="home_<?php echo $string ; ?>" href="<?php echo $brand_url; ?>" title="<?php echo $title; ?>" class="brand-list--link">
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="svg-convert">
								</a>
							</div>
							<?php
							}

						} ?>
					</div>
				</div>
			</div>

			<!-- <div class="common-sec-img bg-img" style="background-image: url(<?php echo $panel_image_three['url']; ?>)"></div> -->
			<div class="common-sec-img common-sec-img--small">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image_three['url']; ?>)"></div>
			</div>
			  <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?>

		</section>
		<?php
		elseif( get_row_layout() == 'home_page_segment_work_with_us' ):

		$short_text = get_sub_field('short_text');
		$panel_hseimage = get_sub_field('panel_hseimage');
		$cta_button_text = get_sub_field('cta_button_text');
		$cta_button_link = get_sub_field('cta_button_link');
		$cta_button_id = get_sub_field('cta_button_id');
		$section_id = get_sub_field('section_id');
		$cta_button_target = get_sub_field('cta_button_target');
		?>

		<section class="page-sec sec-4 common-sec dark-bg has-content dynamic-width <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">
			<div class="common-sec-txt">
				<div class="inner-wrap">
					<?php
					echo $short_text;
					if($cta_button_text && $cta_button_link) {
						echo do_shortcode('[CTAButton title="'.$cta_button_text.'" url="'.$cta_button_link.'" class="'.$cta_button_id.'" id="'.$cta_button_id.'" target="'.$cta_button_target.'"]');
					} ?>
				</div>
			</div>

			<!-- <div class="common-sec-img bg-img" style="background-image: url(<?php echo $panel_hseimage['url'];  ?>)"></div> -->
			<div class="common-sec-img common-sec-img--small">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_hseimage['url'];  ?>)"></div>
			</div>
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

nav_vlue_count_section($count_nav); 

get_footer();
