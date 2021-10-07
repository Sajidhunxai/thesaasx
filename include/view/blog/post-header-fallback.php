<?php
/**
 * Template part for displaying single post.
 */

$permalink = esc_url( get_permalink() );
$title = get_the_title();
$thumb = get_the_post_thumbnail_url();
$cats = get_the_category();
if ( empty( $title ) ) {
	$title = get_the_date();
}

?>

<div class="text-center mt-8">
	<h2><?php echo esc_html( $title ); ?></h2>
	<p>
		<?php echo get_post_time(); ?>
		<?php esc_html_e( 'in', 'thesaasx' ) ?>
		<?php
			foreach( $cats as $cat ):
				$url  = esc_url( get_category_link( $cat->term_id ) );
				$name = esc_html( $cat->name );
				echo '<a class="mr-2" href="'. $url .'">'. $name .'</a>';
			endforeach;
		?>
	</p>
</div>


<?php if ( $thumb !== false ) : ?>
	<div class="text-center my-8">
		<img class="rounded-md" src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( $title ); ?>">
	</div>
<?php endif; ?>
