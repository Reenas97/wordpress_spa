<?php
/**
 * The template for displaying all single posts.
 *
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <section class="intern-banner">
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/interns-banner.jpg" class="w-100" alt="">
                <div class="intern-banner__overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h1><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<main class="margint-default marginb-default text-center">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php echo get_the_post_thumbnail( $recent["ID"], 'full', array( 'class' => 'img-fluid mb-5 d-block mx-auto') ) ?>
				<h2 class="title-style"><?php the_title();?></h2>
				<div class="txt-style">
					<?php the_content();?>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer();
