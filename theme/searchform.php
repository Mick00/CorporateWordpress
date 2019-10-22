<?php
/**
 * Search form partial.
 *
 * @link https://codex.wordpress.org/Styling_Theme_Forms#The_Search_Form
 *
 * @package WPEmergeTheme
 */

?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form card p-3 my2" method="get" role="search">
	<h4>Rechercher</h4>
	<div class="d-flex flex-sm-gutter">
		<div class="form-group flex-bigger">
			<label class="d-inline" for="s">
				<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'app' ); ?></span>
			</label>
			<input type="text" class="form-control" title="<?php esc_attr_e( 'Search for:', 'app' ); ?>" name="s" value="" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'app' ); ?>" />
		</div>
		<div class="form-group">
			<input type="submit" class="form-control btn btn-primary" value="<?php esc_attr_e( 'Search', 'app' ); ?>" class="search-form__submit-button screen-reader-text" />
		</div>
	</div>
</form>
