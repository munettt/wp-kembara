<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kembara
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('mpost search-post'); ?>>
	<div class="post-header">
		<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		
	</div>
	<?php if ( 'post' === get_post_type() ) : ?>
	<div class="post-meta">
		<?php kembara_entry_meta(); ?>
	</div>
	<?php endif; ?>
	<div class="post-body">
		
		<?php the_excerpt(); ?>

	</div>
</article>