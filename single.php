<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kembara
 */
$comment = 0;
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			$comment = 1;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( $comment == 1 && ( comments_open() || get_comments_number() ) ) :
	comments_template();
endif;
get_sidebar();
get_footer();
