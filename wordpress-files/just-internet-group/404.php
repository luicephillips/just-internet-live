<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>



 <section class="page-sec intro-sec intro-has-bg intro-colored has-content dynamic-width">
			<div class="intro-text">
				<h1 class="secondary-title"><?php the_field('404_page_title','option');// _e( 'Oops! <br> That page can&rsquo;t be found.', 'twentyseventeen' ); ?></h1>
				<div class="intro-content">
                
					<?php the_field('404_page_text','option'); //_e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyseventeen' ); ?>
				</div>
			</div>
			<!-- <div class="intro-bg bg-img" style="background-image: url(<?php echo get_field('404_page_panel_image','option') ;?>)"></div> -->
			<div class="intro-bg">
				<div class="parallax inner-img bg-img" style="background-image: url(<?php echo get_field('404_page_panel_image','option') ;?>)"></div>
			</div>
		</section>

<?php get_footer();
