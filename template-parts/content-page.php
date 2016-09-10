<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kembara
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('mpost'); ?>>
	<div class="post-header">
		<?php
		if ( is_single() ) :
			the_title( '<h2>', '</h2>' );
		else :
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</div>
	<div class="post-body">
		
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kembara' ),
				'after'  => '</div>',
			) );
		?>

	</div>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="post-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'kembara' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article>