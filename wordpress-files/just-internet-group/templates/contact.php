<?php
/**
 * Template Name: Contact page
 *
 */
get_header();
$section_one = get_field('section_one');

$section_one_id = get_field('section_one_id');
$section_two_id = get_field('section_two_id');

$address = $section_one['address'];
$phone_no = $section_one['phone_no_'];
$email_address = $section_one['email_address'];
$address_line_two = $section_one['address_line_two'];
$heading_info = $section_one['heading_info'];
$panel_image = $section_one['panel_image'];
$first_visibility =  get_field('select_first_section_visibility');

$count_nav = array();
$mainno = 1;

if($first_visibility == 'on')
{
$count_nav[] = get_field('section_title_frst');
}

    $section2_title = get_field('section2_title'); 
if($section2_title)
{
	$count_nav[] = $section2_title;
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
if($section_one) {
?>
<section class="sec-<?php echo $mainno;?> page-sec intro-sec intro-colored has-content dynamic-width <?php echo $section_one_id; ?>" id="<?php echo $section_one_id; ?>">
	<div class="intro-text">
		<h1 class="secondary-title"><?php the_title(); ?></h1>
		<div class="intro-content">
			<div class="contact-list">
				<div class="contact-list--item">
					<address>
					<?php echo $address;?>
					</address>
					<?php  if($phone_no || $email_address){ ?>
					<ul class="nulled-list">
						<?php  if($phone_no){
						$input = preg_replace('/[^a-zA-Z0-9-_\.]/','', $phone_no);
						//print_r($input);
						?>
						<li><strong>T</strong> <a href="tel:+<?php echo $input;?>" title="Call us">+<?php echo $phone_no; ?></a></li> <?php }
						if($email_address){ ?>
						<li><strong>E</strong> <a href="mailto:<?php echo $email_address; ?>" title="Mail us"><?php echo $email_address; ?></a></li><?php } ?>
					</ul>
					<?php }  ?>
				</div>
				<?php
				if($address_line_two  || $heading_info)
				{
				?>
				<div class="contact-list--item">
					<?php if($address_line_two){ ?><address>
						<?php echo $address_line_two; ?>
					</address>
					<?php } if($heading_info) { ?>
					<ul class="nulled-list">
					<?php foreach($heading_info as $headin) {
						echo '<li><span>'.$headin['title'].' </span>'.$headin['text'].'</li>';
					} ?>
					</ul>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<!--<div class="intro-bg bg-img parallax" style="background-image: url(images/intro-reference.jpg)"></div>-->
	<?php if($panel_image ) { ?>
	<div class="intro-bg" data-bg-type="<?php the_field('section_design'); ?>">
		<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $panel_image['url']; ?>)"></div>
	</div>
	<?php } ?>
    <!-- <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?> -->
</section>

<?php
}

}
if(have_posts()):
	while ( have_posts() ) : the_post();
	?>
	<section class="sec-<?php echo $mainno;?> <?php if($first_visibility == 'off'){ echo 'offirst'; }?> page-sec common-sec common-sec--wide colored-bg <?php echo $section_two_id ; ?>" id="<?php echo $section_two_id ; ?>">
		<div class="common-sec-txt" data-bg-type="bg-light">
			<div class="inner-wrap">
				<?php the_content(); ?>
			</div>
		</div>
		<!--<div class="common-sec-img bg-img parallax" style="background-image: url(images/banner-reference-1.jpg)"></div>-->
		<div class="common-sec-img common-sec-img--small" data-bg-type="<?php the_field('section_design_1'); ?>">
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

nav_vlue_count_section($count_nav);
?>

<?php get_footer();
