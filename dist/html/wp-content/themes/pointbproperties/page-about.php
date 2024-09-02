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

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; endif; ?>

			</div>

			<div id="secondary" role="complimentary">



			</div>

		</div>

	</div>

<?php get_footer(); ?>