<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

 <?php 
  if(have_posts()):
			while ( have_posts() ) : the_post();

  ?>

    <section class="page-sec intro-sec intro-colored">
		<div class="intro-bg bg-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
		<div class="intro-text">
			<h1 class="secondary-title"><?php the_title(); ?></h1>
			<div class="intro-content">
				<?php 
			the_content(); 
			?>
			</div>
		</div>
	</section>
  <?php
			endwhile; // End of the loop.
			
  endif;
  
  
  ?>

<?php get_footer();
