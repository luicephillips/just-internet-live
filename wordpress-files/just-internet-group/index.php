<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header();

$page_for_posts = get_option( 'page_for_posts' );

$heading_text = get_field('heading_text',$page_for_posts);

$short_text = get_field('short_text',$page_for_posts);

$section_panel_image = get_field('section_panel_image',$page_for_posts);

$first_visibility =  get_field('select_first_section_visibility',$page_for_posts);

$section_design = get_field('section_design',$page_for_posts); 

/**************************/
$count_nav = array();
$mainno = 1;

if($first_visibility == 'on')
{
$count_nav[] = get_field('section_title_frst',$page_for_posts);
}

    $job_section_title = get_field('section_2_title',$page_for_posts); 
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
 ?>
	  <section class="sec-<?php echo $mainno; ?> page-sec intro-sec intro-has-bg intro-colored intro-colored--small has-content dynamic-width blogtitle" id="blogtitle">

			<div class="intro-text">

				<h1 class="secondary-title"><?php echo $heading_text; ?></h1>

				<div class="intro-content">

					<?php echo $short_text; ?>

				</div>

			</div>

			<!-- <div class="intro-bg bg-img" style="background-image: url(<?php echo get_the_post_thumbnail_url($page_for_posts); ?>)"></div> -->

			<div class="intro-bg ">

				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo get_the_post_thumbnail_url($page_for_posts); ?>)"></div>

			</div>
<!-- <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?> -->
		</section>
<?php 
}
?>
	<section class="sec-<?php echo $mainno;?> <?php if($first_visibility == 'off'){ echo 'offirst'; }?> page-sec common-sec common-sec--short dynamic-overlap colored-bg blog-list-wrap bloglist" id="bloglist">

			<div class="common-sec-txt" data-bg-type="bg-light">

				<div class="inner-wrap">

			<script type="text/javascript">

			jQuery(document).ready(function ($) {
				// This is required for AJAX to work on our page
				var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

				function cvf_load_all_posts(page) {
					// Start the transition
					$(".cvf_pag_loading").fadeIn('slow'); //.css('background','#ccc');
					console.log(this);
					$(".cvf_pag_loading").closest(".common-sec-txt").addClass("ax-loading");
					// Data to receive from our server
					// the value in 'action' is the key that will be identified by the 'wp_ajax_' hook
					var data = {
						page: page,
						action: "demo-pagination-load-posts"
					};
					// Send the data
					$.post(ajaxurl, data, function (response) {
						// If successful Append the data into our html container
						$(".cvf_universal_container").html(response);
						$(".content-img--parent").addClass("animate");
						jQuery(".svg-convert").each(function () {
							var getImgWd = $(this).width();
							var getImgHt = $(this).height();
							var $img = jQuery(this);
							var imgID = $img.attr("id");
							var imgClass = $img.attr("class");
							var imgURL = $img.attr("src");

							jQuery.get(
								imgURL,
								function (data) {
									//console.log(jQuery(data).find('svg'))
									var $svg = jQuery(data).find("svg");
									if (typeof imgID !== "undefined") {
										$svg = $svg.attr("id", imgID);
									}
									if (typeof imgClass !== "undefined") {
										$svg = $svg.attr("class", imgClass + " svg-img");
									}
									$svg = $svg.removeAttr("xmlns:a");
									$img.replaceWith($svg);
								},
								"xml"
							);
						});
						// End the transition

						setTimeout(function() {
							main_width();
							initHorScroll();
						}, 501);

						function main_width() {
							if (window.innerWidth > 767) {
								$(".culture-list")
									.closest(".inner-wrap")
									.width($(".culture-list").width());
								$(".dynamic-overlap").each(function () {
									var getWidth = $(this)
										.find(".auto-width--parent")
										.width();
									$(this)
										.find(".inner-wrap")
										.width(getWidth);
								});
								var width = 0;
								$(".page-sec").each(function () {
									width += $(this).outerWidth(true);
								});
								width = Math.ceil(width);
								$(".site-wrapper").css("width", width);
							}
						}

						function initHorScroll() {
							elem = $.jInvertScroll([".site-wrapper"], {
								width: "auto",
								height: "auto",
								onScroll: function (percent) {
									if (percent == 0) {
										$(".back-page").hide();
										$(".next-page").fadeIn();
									}
									if (percent == 1) {
										$(".next-page").hide();
										//$(".interact-list").fadeOut();
										$("body").addClass("scroll-end");
									}
									if (percent > 0 && percent < 1) {
										$(".next-page").hide();
										$("body").removeClass("scroll-end");
									}
								}
							});
							$("body").addClass("scrollHor");
						}
						console.log("loaded");
						$(".cvf_pag_loading").closest(".common-sec-txt").removeClass("ax-loading");
					});
				}
				// Load page 1 as the default
				cvf_load_all_posts(1);
				// Handle the clicks
				$('.cvf_universal_container').on('click', '.cvf-universal-pagination span.active', function () {
					var page = $(this).attr('p');
					cvf_load_all_posts(page);
				});
			});

			</script>

			<div class = "cvf_pag_loading">

				<div class = "cvf_universal_container">

					<div class="cvf-universal-content"></div>

				</div>

			</div>



				</div>

			</div>

			<!-- <div class="common-sec-img bg-img" style="background-image: url(<?php echo $section_panel_image['url']; ?>)"></div> -->

			<div class="common-sec-img common-sec-img--small"  data-bg-type="<?php echo $section_design; ?>">

				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo $section_panel_image['url']; ?>)"></div>

			</div>
<!-- <?php
		if(count($count_nav)>1)
		{
		?>
		<div class="site-page"><span class="current-page"><?php if($mainno<=9){echo 0; }?><?php echo $mainno++; ?></span>/<span class="total-page"><?php echo $secvar; ?></span></div>
       <?php  } ?> -->
		</section>



<?php nav_vlue_count_section($count_nav); get_footer();

