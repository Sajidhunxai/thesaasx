<?php
/**
 * Template part for displaying posts in grid style.
 */
$hide_sidebar = get_theme_mod( 'blog_archive_hide_sidebar', true );

if ( isset( $_GET['blog_sidebar'] ) ) {
	$hide_sidebar = ! filter_var( $_GET['blog_sidebar'], FILTER_VALIDATE_BOOLEAN );
}

?>
<section class="section bg-light p-0">
	<div class="container">

		<div class="row gap-y">

			<div class="col-md-10 col-lg-8 mx-auto">

				<?php
				if ( have_posts() ) :

					while ( have_posts() ) : the_post();
						$permalink = get_permalink();
						$title = get_the_title();
						$thumb = get_the_post_thumbnail_url( null, 'thesaasx-featured-image' );
						$cats = get_the_category();
						if ( empty( $title ) ) {
							$title = get_the_date();
						}
						?>
							<div class="card hover-shadow-7 my-8">
								<div class="row">
									<div class="col-md-4">
										<?php if ( $thumb !== false ) : ?>
											<a href="<?php echo esc_url( $permalink ); ?>">
												<img class="fit-cover position-absolute h-100" src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( $title ); ?>">
											</a>
										<?php endif; ?>
									</div>

									<div class="col-md-8">
										<div class="p-7">
											<h4><a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a></h4>
											<?php the_excerpt(); ?>
											<a class="small ls-1" href="<?php echo esc_url( $permalink ); ?>"><?php esc_html_e( 'Read More', 'thesaasx' ); ?> <span class="pl-1">&xrarr;</span></a>
										</div>
									</div>
								</div>
							</div>
						<?php
					endwhile;

				else :
					get_template_part( 'include/view/blog/post-none' );
				endif;
				?>

				<?php get_template_part( 'include/view/blog/pagination' ); ?>
			</div>

			<?php if ( $hide_sidebar == false ): ?>
				<div class="col-lg-4 col-xl-3 my-8">
					<?php get_template_part( 'include/view/blog/sidebar' ); ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>
