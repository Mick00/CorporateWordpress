<?php
/**
 * Theme footer partial.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPEmergeTheme
 */

?>

		</div>
		<?php wp_footer(); ?>
		<footer class="container-fluid text-light pt-2">
			<div class="row">
				<div class="widgets-container container d-flex flex-wrap justify-content-center">
					<?php if(is_active_sidebar('footerleft')): ?>
						<?php dynamic_sidebar( 'footer-left' ); ?>
					<?php endif;?>
					<?php if(is_active_sidebar('footer-center')): ?>
						<?php dynamic_sidebar( 'footer-center' ); ?>
					<?php endif;?>
					<?php if(is_active_sidebar('footer-right')): ?>
						<?php dynamic_sidebar( 'footer-right' ); ?>
					<?php endif;?>
				</div>
			</div>
			<div class="row py-2">
				<span class="mx-auto">Emergence Wordpress <?=date('Y');?> <?=get_socials_icon_link('icon-big mx-1')?></span>
			</div>
		</footer>
	</body>
</html>
