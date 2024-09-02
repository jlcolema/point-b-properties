<?php get_header(); ?>

	<div id="section">

		<div class="wrap">

			<div class="inner-wrap">

				<h1 class="title"><?php the_title(); ?></h1>

			</div>

		</div>

	</div>

	<div id="content">

		<div class="wrap">

			<div id="main" role="main">

				<?php if( have_rows('project_samples') ): ?>

					<div id="samples">

						<div class="flexslider">

							<ul class="slides">

								<?php while( have_rows('project_samples') ): the_row();

									/* Image */

									$project_sample_image = get_sub_field('project_sample_image');

									/* Description */

									$project_sample_description = get_sub_field('project_sample_description');

								?>



									<li data-thumb="<?php echo $project_sample_image['url']; ?>">

										<img src="<?php echo $project_sample_image['url']; ?>" alt="<?php echo $project_sample_description; ?>" />

									</li>

								<?php endwhile; ?>

							</ul>

						</div>

					</div>

				<?php endif; ?>

				<div class="detail">

					<div class="location">

						<h1 class="street">

							<?php the_title(); ?>

						</h1>

						<span class="city"><?php the_field('project_city'); ?></span>,

						<span class="state"><?php the_field('project_state'); ?></span>

					</div>

					<div class="availability">

						<div class="price">

							$<?php the_field('project_price'); ?>

						</div>

						<div class="for">

							<?php the_field('project_availability'); ?>

						</div>

					</div>

					<div class="description">

						<?php the_field('project_description'); ?>

					</div>

				</div>

				<?php if ( get_field('project_floor_plan') ): ?>

					<div class="floor-plan">

						<div class="more">

							<a href="<?php the_field('project_floor_plan'); ?>" rel="external">

								View Floor Plan <span class="arrow">&rarr;</span>

							</a>

						</div>

					</div>

				<?php endif; ?>

				<div class="map">

					<div class="sub-section">

						<div class="title">Location</div>

						<div class="more">

							<a href="#">Get Directions</a>

						</div>

					</div>

					<?php

						$location = get_field('project_map');

					?>

					<div class="acf-map">

						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>

					</div>

				</div>

			</div>

			<div id="secondary" role="complementary">

				<?php

					$posts = get_field('project_broker');

					if( $posts ): ?>

						<div class="module brokers">

							<div class="header">

								<h3 class="title">Broker</h3>

							</div>

							<div class="content">

								<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

								<?php setup_postdata($post); ?>

									<div class="broker">

										<div class="logo">

											<img src="http://placeimg.com/300/150/arch" alt="" />

										</div>

										<div class="vcard">

											<div class="fn n org"><?php the_title(); ?></div>

											<div class="tel"><?php the_field('broker_phone'); ?></div>

											<div class="fax"><?php the_field('broker_fax'); ?></div>

											<div class="email">

												<a href="mailto:<?php the_field('broker_email'); ?>"><?php the_field('broker_email'); ?></a>

											</div>

										</div>

									</div>

								<?php endforeach; ?>

							</div>

						</div>

					<?php wp_reset_postdata(); ?>

				<?php endif; ?>

				<?php

					$posts = get_field('project_lender');

					if( $posts ): ?>

						<div class="module lenders">

							<div class="header">

								<h3 class="title">Lender</h3>

							</div>

							<div class="content">

								<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

								<?php setup_postdata($post); ?>

									<div class="lender">

										<div class="logo">

											<img src="http://placeimg.com/300/150/arch" alt="" />

										</div>

									</div>

								<?php endforeach; ?>

							</div>

						</div>

					<?php wp_reset_postdata(); ?>

				<?php endif; ?>

			</div>

		</div>

	</div>

	<?php

		/* CTA */

	?>

	<?php include (TEMPLATEPATH . "/a/inc/cta.php" ); ?>

<?php get_footer(); ?>