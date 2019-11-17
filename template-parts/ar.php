<?php
/**
 * Template Name: My Custom Post Type Listing
 */

get_header(); ?>

<main>
	<?php while ( have_posts() ) : the_post(); ?>
		<h2><?php the_title(); ?></h2>

		<?php
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => - 1,
			);
			$q    = new WP_Query( $args );
		?>

		<div class="row">
			<?php while ( $q->have_posts() ) : $q->the_post(); ?>
				<div class="col-6">
					<h3>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>
					<?php the_excerpt(); ?>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>

	<?php endwhile; ?>
</main>

<?php get_footer();