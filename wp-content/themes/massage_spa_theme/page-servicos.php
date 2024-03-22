<?php

/**
 * Template Name: Serviços
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

<main>
    <section class="margint-default marginb-default">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title-style text-center">SPA</h2>
                    <div class="txt-style text-center">
                        <p>
                            <?php
                                $category = get_term_by('name', 'spa', 'categorias');
                                if ($category) {
                                    $description = $category->description;                       
                                    if (!empty($description)) {
                                        echo $description;
                                    } 
                                } 
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="row">
                        <?php
                            $args = array(
                                'post_type' => 'servicos',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'categorias',
                                        'field' => 'slug',
                                        'terms' => 'spa'
                                    )
                                ),
                                'orderby' => 'date',
                                'order' => 'ASC',
                                'posts_per_page' => -1
                            );
                            $loop = new WP_Query($args);
                        ?>
                        <?php if ($loop->have_posts()) : ?>
                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                <div class="col-md-6 col-lg-4 my-2">
                                    <div class="service__item spa">
                                        <div class="service-item__content">
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="service-item__title">
                                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/icon.png" class="img-fluid" alt="">
                                                    <h3><?php the_title();?></h3>
                                                </div>
                                                <div class="txt-style">
                                                <?php the_content();?>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="margint-default marginb-default">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title-style text-center">Massagens</h2>
                    <div class="txt-style text-center">
                        <p>
                            <?php
                                $category = get_term_by('name', 'massagem', 'categorias');
                                if ($category) {
                                    $description = $category->description;                       
                                    if (!empty($description)) {
                                        echo $description;
                                    } 
                                } 
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="row">
                        <?php
                            $args = array(
                                'post_type' => 'servicos',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'categorias',
                                        'field' => 'slug',
                                        'terms' => 'massagem'
                                    )
                                ),
                                'orderby' => 'date',
                                'order' => 'ASC',
                                'posts_per_page' => -1
                            );
                            $loop = new WP_Query($args);
                        ?>
                        <?php if ($loop->have_posts()) : ?>
                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                            <div class="col-md-6 col-lg-4 my-2">
                                <div class="service__item massage">
                                    <?php the_post_thumbnail('full', array('class' => 'img-fluid service-item__img'));?>
                                    <div class="service-item__content">
                                        <div class="service-item__title">
                                            <h3><?php the_title();?></h3>
                                        </div>
                                        <p>
                                            <?php 
                                                $content = get_the_content();
                                                $excerpt = wp_trim_words( $content, 15 );
                                                echo $excerpt;
                                            ?>
                                        </p>
                                        <a href="<?php the_permalink(); ?>" class="btn btn--green d-block mx-auto">Saiba Mais</a>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>