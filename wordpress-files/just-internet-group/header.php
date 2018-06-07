<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KC35JC2');</script>
<!-- End Google Tag Manager -->

<meta charset="utf-8">

	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="theme-color" content="#e40421">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="icon" sizes="192x192" href="android-chrome.png">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KC35JC2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="site-wrapper">
	<header class="site-header">
		<div class="logo-sec">
			<a href="<?php echo get_home_url(); ?>" title="Just Internet" class="logo"><img src="<?php echo get_field('add_logo_image','option'); ?>" alt="Just Internet"></a>
			<!-- <?php
				if(is_front_page())
				{				
					if(is_home())
					{
					$page_for_posts = get_option( 'page_for_posts' );	
					echo '<span class="page-meta">_'.get_the_title($page_for_posts ).'</span>';	
					}else
					{
					echo '<span class="page-meta">_'.get_the_title().'</span>';	
					}
				}
			?> -->			
		</div>
	<div class="menu-wrap">
		<div class="menu-icon"><span></span><span></span></div>
		<div class="menu-container">
		<?php
		$menu_social_medai = get_field('menu_social_medai','option');

		if($menu_social_medai) { ?>
			<ul class="social-list">
			<?php foreach($menu_social_medai as $menu_soci) {
			echo '<li><a href="'.$menu_soci['social_media_link'].'" target="_blank" title="'.$menu_soci['title'].'"><i class="fa '.$menu_soci['icon_class'].'" aria-hidden="true"></i></a></li>';
			} ?>
			</ul>
		<?php } ?>
			<div class="menu-inner-wrap">
			<?php wp_nav_menu(array('menu'=>'Main menu','container'=>false, 'menu_class'=>'primary-menu')) ?>
			</div>
			<div class="menu-footer">
			<?php
			$menu_footer_copyright = get_field('menu_footer_copyright','option');
			$menu_footer_language = get_field('menu_footer_language','option');
			
			if($menu_footer_copyright || get_field('copyright_header','option')) { ?>
				<div class="copy">
					<small class="copy"><?php echo $menu_footer_copyright ; ?></small>
					<?php the_field('copyright_header','option'); ?>
				</div>
			<?php }

			dynamic_sidebar('sidebar-2');

			/* if($menu_footer_language) {
			?>
			<ul class="lang">
			<?php  foreach($menu_footer_language as $menu_foote) {
				echo '<li><a href="'.$menu_foote['language_link'].'" title="'.$menu_foote['language_name'].'">'.$menu_foote['language_name'].'</a></li>';
			} ?>
			</ul>
			<?php } */
			?>
			</div>
		</div>
	</div>
</header>
