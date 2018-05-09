<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();
//section_title
/* Start the Loop */
$first_visibility =  get_field('select_first_section_visibility');

// code for count navigation
$count_nav = array();
$mainno = 1;
if($first_visibility == 'on')
{
$count_nav[] = get_field('section_title_frst');
}
 $job_section_title = get_field('section_two_blog'); 
if($job_section_title )
{
	$count_nav[] = $job_section_title['section_title'];
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
while ( have_posts() ) : the_post();
?>

	<section class="sec-<?php echo $mainno; ?> page-sec intro-sec intro-colored intro-has-bg light-bg has-content dynamic-width blog-detail" id="blog-detail">
		<div class="intro-text" data-bg-type="bg-light">
			<h1 class="secondary-title"><?php the_title(); ?></h1>
			<div class="intro-content">
				<?php
				the_content();
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
	</section>

<?php
endwhile; // End of the loop.
}

// vars
$section_two_blog = get_field('section_two_blog');
if( $section_two_blog ):

	$heading = $section_two_blog['heading'];
	$blog_body_text_for_section = $section_two_blog['blog_body_text_for_section'];
	$cta_button_text = $section_two_blog['cta_button_text'];
	$cta_button_link = $section_two_blog['cta_button_link'];
	$panel_image = $section_two_blog['panel_image'];
	$cta_button_id = $section_two_blog['cta_button_id'];
	$cta_button_target = $section_two_blog['cta_button_target'];
	$section_id = $section_two_blog['section_id'];

	?>
	<section class="sec-<?php echo $mainno;?> <?php if($first_visibility == 'off'){ echo 'offirst'; }?>  page-sec common-sec common-sec--wide has-content dynamic-width dark-bg <?php echo $section_id; ?>" id="<?php echo $section_id; ?>">
		<div class="common-sec-txt">
			<div class="inner-wrap">
				<h2 class="secondary-title ft-norm"><?php echo $heading; ?></h2>
			 	<?php echo $blog_body_text_for_section;
				if($cta_button_text && $cta_button_link) { ?>
				<a target="<?php echo $cta_button_target; ?>" id="<?php echo $cta_button_id; ?>" href="<?php echo $cta_button_link;  ?>" title="<?php echo $cta_button_text; ?>" class="btn btn--solid"><?php echo $cta_button_text; ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-small.svg" alt="arrow" class="btn-icn"></a>
				<?php } ?>
			</div>
		</div>
		<!-- <div class="common-sec-img bg-img" style="background-image: url(<?php echo $panel_image['url']; ?>)"></div> -->
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
endif;

nav_vlue_count_section($count_nav);
get_footer();
