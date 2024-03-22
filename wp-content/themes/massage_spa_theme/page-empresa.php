<?php

/**
 * Template Name: Sobre Nós
 */
?>

<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <section class="intern-banner">
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/interns-banner.jpg" class="w-100" alt="">
                <div class="intern-banner__overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h1><?php the_title();?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<main class="margint-default marginb-default">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="txt-style">
                    <?php the_content();?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>