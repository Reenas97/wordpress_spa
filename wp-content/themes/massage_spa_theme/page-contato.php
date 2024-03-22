
<?php

/**
 * Template Name: Contato
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
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <h1><?php the_title();?></h1>
                                <p><?php the_content();?></p>
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
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="contact-form bg--light-green p-5">
                    <?php echo do_shortcode('[contact-form-7 id="5f7a455" title="Contato"]');?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>