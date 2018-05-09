<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

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

$js_mod_time = filemtime(get_template_directory() . '/js/main.js');
?>

	<footer class="footer-main page-sec">
		<?php if($footer_content) { ?>
		<div class="footer-item">
			<?php echo $footer_content; ?>
		</div>
		<?php } ?>
		<div class="footer-item">
		<?php if($brands_title) {
			echo '<h5>'.$brands_title.'</h5>';
		}
		if($add_brand_logo) { ?>
			<ul class="footer-brands">
			<?php foreach($add_brand_logo as $add_brand) {
				/*echo '<li><a href="'.$add_brand['barand_link'].'" title="'.$add_brand['brand_name'].'"><img src="'.$add_brand['brand_image']['url'].'" alt="'.$add_brand['brand_name'].'"></a></li>'; */
				$term_id = $add_brand->term_id;
				$small_brand_image = get_field('small_brand_image','brands_'. $term_id);
				$brand_url = get_field('brand_url','brands_'. $term_id);

				echo '<li><a href="'.$brand_url.'" title="'.$add_brand->name.'" target="_blank"><img src="'.$small_brand_image['url'].'" alt="'.$add_brand->name.'" class="svg-convert"></a></li>';
			} ?>
			</ul>
			<?php } ?>
		</div>

		<div class="footer-item">
			<?php if($just_follow_title){ echo '<h5>'.$just_follow_title.'</h5>';}
			if($just_follow) { ?>
			<ul class="social-list">
				<?php foreach($just_follow as $just_foll) {
					echo '<li><a href="'.$just_foll['link'].'" title="'.$just_foll['title'].'" target="_blank"><i class="fa '.$just_foll['icon'].'" aria-hidden="true"></i></a></li>';
				} ?>
			</ul>
			<?php } ?>
		</div>
	</footer>

	<div class="fix-footer">
		<div class="fix-footer-brands">
			<ul class="footer-brands fix-brands">
			<?php foreach($add_brand_logo as $add_brand) {
				/*echo '<li><a href="'.$add_brand['barand_link'].'" title="'.$add_brand['brand_name'].'"><img src="'.$add_brand['brand_image']['url'].'" alt="'.$add_brand['brand_name'].'"></a></li>'; */
				$term_id = $add_brand->term_id;
				$small_brand_image = get_field('small_brand_image','brands_'. $term_id);
				$brand_url = get_field('brand_url','brands_'. $term_id);
				//echo '<li><a href="'.$brand_url.'" title="'.$add_brand->name.'"><img src="'.$small_brand_image['url'].'" alt="'.$add_brand->name.'"></a></li>';
				echo '<li><a href="'.$brand_url.'" title="'.$brand_url.'" target="_blank"><img src="'.$small_brand_image['url'].'" alt="'.$small_brand_image['alt'].'" class="svg-convert"></a></li>';
			} ?>
			</ul>
		</div>
		<?php if($work_with_us_text ||  $just_talk_to_us) { ?>
		<div class="footer-interact">
			<ul class="interact-list">
				<?php if($work_with_us_text && $work_with_us_link && $work_with_us_image) { ?>
				<li class="interact-list--item"><a href="<?php echo $work_with_us_link; ?>" title="<?php echo $work_with_us_text; ?>"><?php echo $work_with_us_text; ?><figure class="interact-icon"><img src="<?php echo $work_with_us_image['url']; ?>" alt="<?php echo $work_with_us_image['alt']; ?>"></figure></a></li>
				<?php } if($just_talk_to_us && $just_talk_to_us_link ){ ?>
				<li class="interact-list--item"><a href="<?php echo $just_talk_to_us_link; ?>" title="<?php echo $just_talk_to_us; ?>"><?php echo $just_talk_to_us; ?> <figure class="interact-icon"><div class="ham-icon"><span></span><span></span><span></span></div></figure></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
	</div>
</div>

<?php wp_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.jInvertScroll.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js<?php echo '?v=' . $js_mod_time; ?>"></script>

</body>
</html>
