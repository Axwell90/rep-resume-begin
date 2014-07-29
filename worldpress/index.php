<?php get_header(); ?> <!-- вызывает header.php -->
	<div id="main">
			<div id="content">

			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>

				<div <?php post_class(); ?>>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail(); ?></a>
					<?php } else { ?>
						<a href="<?php the_permalink(); ?>" class="post-thumbnail"><img src="<?php bloginfo('templare_url'); ?>"></a>
					<?php } ?>

					<?php the_content(''); ?>

					<div class="post-info">
						<ul>
							<li class="date"><?php the_time('jS F Y'); ?></li>
							<li class="category">Posted in <?php the_category(', '); ?></li>
							<li class="read-more"><a href="<?php the_permalink(); ?>">Read more</a></li>
						</ul>
					</div>

				</div> 

				<?php endwhile; ?>

				<div class="pagination">
					<p class="prev"><?php next_posts_link('Older articles'); ?></p>
					<p class="next"><?php previous_posts_1ink('Newer articles'); ?></p>				
				</div>

			<?php else : ?>

			<div class="nothing">
				<h2>Nothing Found</h2>
				<p>Sorry, but you are looking for something that isn't here.</p>
				<p><a href="<?php echo get_option('home'); ?>">Return to the homepage</a></p>
			</div>

			<?php endif; ?>

			</div>

		<?php// get_sidebar(); ?> <!-- вызывает sidebar.php -->

			</div>

		<?php// get_footer(); ?>    <!-- вызывает footer.php -->