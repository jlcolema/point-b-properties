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

				<div class="sub-section">

					<div class="title">Get in Touch</div>

				</div>

				<div class="form">

					<?php gravity_form(

						"1", // $id_or_title
						false, // $display_title
						false, // $display_description
						false, // $display inactive
						null, // $field_values
						false, // $ajax
						1 // $tabindex

					); ?>

				</div>

			</div>

			<div id="secondary" role="complimentary">



			</div>

		</div>

	</div>

	<?php

		/* CTA */

	?>

	<?php include (TEMPLATEPATH . "/a/inc/cta.php" ); ?>

<?php get_footer(); ?>