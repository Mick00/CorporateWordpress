<?php
/**
 * App Layout: layouts/nosidebar.php
 *
 * This is the template that is used for displaying 404 errors.
 *
 * @package WPEmergeTheme
 */

?>
<div class="wp-block-spacer" style="height: 100px;"></div>

<div class="py-3">
	<p>
		<h3><?php printf(esc_html__('The page you are looking for could not be found'))?></h3>
		<?php
		printf(
			/* translators: 404 page content; placeholders represents homepage opening and closing anchor tags */
			esc_html__( 'Please check the URL for proper spelling and capitalization. If you\'re having trouble locating a destination, try visiting the %1$shome page%2$s.', 'app' ),
			'<a href="' . esc_url( home_url( '/' ) ) . '">',
			'</a>'
		);
		?>
	</p>
	<?php WPEmerge\render( 'searchform' );  ?>
</div>
