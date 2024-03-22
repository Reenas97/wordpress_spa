<?php get_header(); ?>

<div class="pages">
	<div class="page-title-block">
		<div class="container">
			<h1 class=""><?php the_title();?></h1>
		</div> <!-- /.container -->
	</div>

	<div class="page-content">
		<div class="container">

			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_content(); ?>
					</div>

				<?php endwhile; ?>

			<?php else : ?>

				<div class="alert alert-info">
					<strong>No content in this loop</strong>
				</div>

			<?php endif; ?>
		
		</div> <!-- /.container -->
	</div>
</div>

<?php get_footer(); ?>