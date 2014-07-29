<?php get_header(); ?>
	<div id="main">
			<div id="content">

			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>

				<div class="post">
					<h2 class="title"><?php the_title(); ?></h2>
					<?php the_content(''); ?>
				</div> 

				<?php endwhile; ?>

				<?php endif; ?>

			</div>

		<?php get_sidebar(); ?> <!--Bbl3blBaeT sidebar.php -->

			</div>

		<?php get_footer(); ?>    <!-- Bbl3blBaeT footer.php -->