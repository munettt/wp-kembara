<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kembara
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

</div><!-- #content -->
	
	</div>
</div>

<section id="secondary-nav">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>
</section>
