<?php get_header(); ?>
	<div id="main">
			<div id="content">

			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>

				<div <?php post_class(); ?>>
					<h2><?php the_title(); ?></h2>

					<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail(); ?></a>
					<?php } else { ?>
						<a href="<?php the_permalink(); ?>" class="post-thumbnail"><img src="<?php bloginfo('templare_url'); ?>"></a>
					<?php } ?>

					<?php the_content(''); ?>

				</div>

				<?php comments_template(); ?>

				<?php endwhile; ?>

			<?php else : ?>

			<div class="nothing">
				<h2>Nothing Found</h2>
				<p>Sorry, but you are Looking for something that isn't here.</p>
				<p><a href="<?php echo get_option('home'); ?>">Return to the homepage</a></p>
			</div>

			<?php endif; ?>

			</div>

		<?php get_sidebar(); ?> <!--Bbl3blBaeT sidebar.php -->

			</div>

		<?php get_footer(); ?>    <!-- Bbl3blBaeT footer.php -->