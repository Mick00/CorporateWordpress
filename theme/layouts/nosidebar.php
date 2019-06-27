<?php
/**
 * Base app layout.
 *
 * @link https://docs.wpemerge.com/#/framework/views/layouts
 *
 * @package WPEmergeTheme
 */

WPEmerge\render( 'header' );

?>
<div class="page-transition">
</div>
<div class="container wrapper">
	<div class="row">
		<div class="col">
      <?php WPEmerge\layout_content();?>
		</div>
	</div>
</div>
<?php WPEmerge\render( 'footer' ); ?>
