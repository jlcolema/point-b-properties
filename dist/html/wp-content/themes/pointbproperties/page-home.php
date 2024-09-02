<?php get_header(); ?>

	<div id="section">

		<div class="wrap">

			<h1><?php the_title(); ?></h1>

		</div>

	</div>

	<?php if( have_rows('featured_destinations_new') ): ?>

		<div id="featured">

			<div class="wrap">

    			<div class="flexslider">

					<ul class="slides">

						<?php while( have_rows('featured_destinations_new') ): the_row();

							// Image

							$image = get_sub_field('featured_destination_image');

						?>

							<li class="slide">

								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

							</li>

						<?php endwhile; ?>

					</ul>

				</div>

			</div>

		</div>

	<?php endif; ?>

	<div id="content">

		<div class="wrap">

			<div id="main" role="main">

				<div class="intro">

					<?php the_field('intro'); ?>

				</div>

			</div>

		</div>

	</div>

	<?php

		/* Services */

	?>

	<?php include (TEMPLATEPATH . "/a/inc/services.php" ); ?>

	<?php

		/* CTA */

	?>

	<?php include (TEMPLATEPATH . "/a/inc/cta.php" ); ?>

<?php get_footer(); ?>