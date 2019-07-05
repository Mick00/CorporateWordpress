<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WPEmergeTheme
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<section class="section-comments" id="comments">
	<?php if ( have_comments() ) : ?>
		<h3><?php comments_number( __( 'No Responses', 'app' ), __( 'One Response', 'app' ), __( '% Responses', 'app' ) ); ?></h3>
		<ol class="comments">
			<?php
			wp_list_comments(
				[
					'callback' => function( $comment, $args, $depth ) {
						Theme::partial(
							'comment-single',
							[
								'comment' => $comment,
								'args'    => $args,
								'depth'   => $depth,
							]
						);
					},
				]
			);
			?>
		</ol>

		<?php
		carbon_pagination(
			'comments',
			[
				'enable_numbers' => true,
				'prev_html' => '<a href="{URL}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> ' . esc_html__( 'Previous Comment', 'app' ) . '</a>',
				'next_html' => '<a href="{URL}" class="btn btn-primary">' . esc_html__( 'Next Comment', 'app' ) . ' <i class="fas fa-arrow-right"></i></a>',
				]
		);
		?>
	<?php endif; ?>

	<?php
	comment_form(
		[
			'title_reply'         => __( 'Leave a Reply', 'app' ),
			'comment_notes_after' => '',
		]
	);
	?>
</section>
