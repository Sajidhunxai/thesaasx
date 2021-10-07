<?php
/**
 * Template part for displaying single post.
 */

$hide_sidebar = get_theme_mod( 'blog_post_hide_sidebar', true );
$hide_tags    = get_theme_mod( 'blog_post_hide_tags', false );
$disable_tags_link = get_theme_mod( 'blog_post_disable_tags_link', false );

while ( have_posts() ) : the_post();
	$permalink = esc_url( get_permalink() );
	$title = get_the_title();
	$thumb = esc_url( get_the_post_thumbnail_url() );
	$cats = get_the_category();
	if ( empty( $title ) ) {
		$title = get_the_date();
	}

	$time = human_time_diff( get_post_time('U'), current_time( 'U' ) );
	$time .= ' '. esc_html__( 'ago', 'thesaasx' );
?>

<div class="post-content my-8" id="post-content">

	<?php if ( $hide_sidebar == false ): ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
	<?php endif; ?>


	<?php thesaasx_content(); ?>

	<div class="container-sm">
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'thesaasx' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
		?>

		<div class="gap-xy-2 mt-6">
			<?php
				if ( $hide_tags == false ):
					$post_tags = get_the_tags();
					if ( ! empty( $post_tags ) ) {
						foreach ($post_tags as $tag) {
							if ( $disable_tags_link ):
								echo '<span class="badge badge-pill badge-secondary">'. $tag->name .'</span>';
							else:
								echo '<a class="badge badge-pill badge-secondary" href="'. get_tag_link($tag->term_id) .'">'. $tag->name .'</a>';
							endif;

						}
					}
				endif;
			?>
		</div>
	</div>


	<?php if ( $hide_sidebar == false ): ?>
				</div>
				<div class="col-lg-4 col-xl-3">
					<?php get_template_part( 'include/view/blog/sidebar' ); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

</div>

<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile;
