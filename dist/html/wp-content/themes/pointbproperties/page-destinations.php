<?php get_header(); ?>

	<div id="section">

		<div class="wrap">

			<div class="inner-wrap">

				<h1 class="title"><?php the_title(); ?></h1>

			</div>

		</div>

	</div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="intro-content">

			<div class="wrap">

				<?php the_content(); ?>

			</div>

		</div>

	<?php endwhile; endif; ?>

	<div id="content">

		<div class="wrap">

			<div id="main" role="main">

				<div class="projects">

					<ul>

						<?php

							/* Individual Project */

						?>

						<?php

							$args = array(

								'numberposts'	=> -1,
								'post_type'	=> 'destination',
								'orderby'		=> 'menu_order',
								'post_status'	=> 'publish',
								'order'			=> 'ASC'

							);

							$items = get_posts($args);

						?>

						<?php foreach($items as $item): ?>

							<?php

								/* Thumbnail */

								$project_thumbnail = get_field('project_thumbnail', $item->ID);

								/* Type */

								$project_type = get_field('project_type', $item->ID);

								/* City */

								$project_city = get_field('project_city', $item->ID);

								/* State */

								$project_state = get_field('project_state', $item->ID);

								/* Price */

								$project_price = get_field('project_price', $item->ID);

								/* Availability */

								$project_availability = get_field('project_availability', $item->ID);

								/* Description */

								$project_lede = get_field('project_lede', $item->ID);

							?>

							<li>

								<div class="inner-wrap">

									<div class="thumbnail">

										<a href="<?php echo get_permalink($item->ID); ?>">

											<img src="<?php echo $project_thumbnail; ?>" alt="<?php echo $item->post_title; ?>" />

											<div class="type">

												<?php echo $project_type; ?>

											</div>

										</a>

									</div>

									<div class="detail">

										<div class="location">

											<h1 class="street">

												<a href="<?php echo get_permalink($item->ID); ?>">

													<?php echo $item->post_title; ?>

												</a>

											</h1>

											<span class="city"><?php echo $project_city; ?></span>,

											<span class="state"><?php echo $project_state; ?></span>

										</div>

										<div class="availability">

											<div class="price">

												$<?php echo $project_price; ?>

											</div>

											<div class="for">

												<?php echo $project_availability; ?>

											</div>

										</div>

										<div class="description">

											<?php echo $project_lede; ?>

										</div>

										<?php /*

											<div class="amenities">

												<div class="beds">5 Bed</div>

												<div class="baths">3 Bath</div>

											</div>

										*/ ?>

										<div class="more">

											<a href="<?php echo get_permalink($item->ID); ?>">View Project</a>

										</div>

									</div>

								</div>

							</li>

						<?php endforeach; ?>

					</ul>

				</div>

			</div>

		</div>

	</div>

<?php get_footer(); ?>