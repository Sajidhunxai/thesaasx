<?php
/**
 * Template part for displaying posts in grid style.
 */

$hide_sidebar = get_theme_mod( 'blog_archive_hide_sidebar', true );
$show_details = get_theme_mod( 'blog_classic_show_post_details', true );

if ( isset( $_GET['blog_sidebar'] ) ) {
	$hide_sidebar = ! filter_var( $_GET['blog_sidebar'], FILTER_VALIDATE_BOOLEAN );
}

?>
<section class="section p-0">
	<div class="container">

		<div class="row">
			<div class="col-md-8 col-xl-6 mx-auto">

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

						$time = human_time_diff( get_post_time('U'), current_time( 'U' ) );
						$time .= ' '. esc_html__( 'ago', 'thesaasx' );
						?>
							<article class="my-8">
								<header class="text-center mb-7">
									<?php
									if ( ! empty( $cats ) ) {
										$url  = esc_url( get_category_link( $cats[0]->term_id ) );
										$name = esc_html( $cats[0]->name );
										echo '<p><a class="small-4 text-lighter text-uppercase ls-2 fw-600" href="' . $url . '">' . $name . '</a></p>';
									}
									?>
									<h3><a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a></h3>
								</header>


								<?php if ( $thumb !== false ) : ?>
									<a href="<?php echo esc_url( $permalink ); ?>">
										<img class="rounded-md" src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( $title ); ?>">
									</a>
								<?php endif; ?>


								<div class="card-body">
									<?php if ( $show_details ) : ?>
									<div class="row mb-5 small-2 text-lighter">
										<div class="col-auto">
											<span><?php esc_html_e( 'by', 'thesaasx' ) ?> <?php echo get_the_author_meta('display_name'); ?></span>
											<span class="align-middle px-1">&bull;</span>
											<time datetime="<?php echo esc_attr( get_the_date('d-m-Y') ); ?>"><?php echo esc_html( $time ); ?></time>
										</div>

										<div class="col-auto ml-auto">
											<a class="text-inherit ml-5" href="<?php echo get_comments_link(); ?>"><i class="fa fa-comments pr-1 opacity-60"></i> <?php echo get_comments_number(); ?></a>
										</div>
									</div>
									<?php endif; ?>

									<?php the_excerpt(); ?>

									<p class="text-center mt-7">
										<a class="btn btn-primary btn-round" href="<?php echo esc_url( $permalink ); ?>"><?php esc_html_e( 'Read More', 'thesaasx' ); ?></a>
									</p>
								</div>
							</article>

						<?php

						if ( $wp_query->current_post + 1 != $wp_query->post_count ) {
						  echo '<hr>';
						}
					endwhile;

				else :
					get_template_part( 'include/view/blog/post-none' );
				endif;
				?>

				<?php get_template_part( 'include/view/blog/pagination' ); ?>
			</div>

			<?php if ( $hide_sidebar == false ): ?>
				<div class="col-md-4 col-xl-3 my-8">
					<?php get_template_part( 'include/view/blog/sidebar' ); ?>
				</div>
			<?php endif; ?>

		</div>

	</div>
</section>
