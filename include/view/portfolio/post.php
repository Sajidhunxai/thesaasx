<?php
/**
 * Template part for displaying single post.
 */

while ( have_posts() ) : the_post();
	$permalink = esc_url( get_permalink() );
	$title = get_the_title();
	$thumb = esc_url( get_the_post_thumbnail_url() );
	$cats = get_the_category();
	if ( empty( $title ) ) {
		$title = get_the_date();
	}

?>

<div class="post-content" id="post-content">
	<?php thesaasx_content(); ?>
</div>

<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile;
