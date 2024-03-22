<?php

/**
 * Template Name: Home
 */
?>

<?php get_header(); ?>

<main>
    <section class="home-banner">
        <?php if (get_field('banner_image')) : ?>
            <img src="<?php the_field('banner_image'); ?>" class="w-100" alt="Massage & SPA">
        <?php else : ?>
            <img src="<?php echo bloginfo('template_directory'); ?>/assets/images/banner-home.jpg" class="w-100" alt="Massage & SPA">
        <?php endif; ?>
        <div class="home-banner__overlay">
            <div class="container">
                <?php if(get_field('banner_title')) { ?>
                    <h1><?php the_field('banner_title') ;?></h1>
                <?php };?>
                <?php if(get_field('banner_text')) { ?>
                    <p><?php the_field('banner_text') ;?></p>
                <?php };?>
                <?php if(get_field('banner_link')) { ?>
                    <a href="<?php echo esc_url(site_url('/' . get_field('banner_link')));?>" class="btn btn--transparent d-block mx-auto">Saiba Mais</a> 
                <?php };?>
            </div>
        </div>
    </section>
    <section class="margint-default marginb-default home-about">
        <div class="container">
            <h2 class="title-style text-center">Sobre nós</h2>
            <div class="txt-style">
                <?php the_content();?>
                <a href="<?php echo esc_url(site_url('/sobre-nos'));?>" class="btn btn--green d-block mx-auto">Saiba Mais</a>
            </div>
        </div>
    </section>
    <section class="bg--light-green paddingt-default paddingb-default">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center text-md-start mb-3 mb-lg-0">
                    <h2 class="title-style">Nossos Pacotes</h2>
                    <div class="txt-style">
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
                    <a href="<?php echo esc_url(site_url('/servicos/spa'));?>" class="btn btn--green">Ver todos os pacotes</a>
                </div>
                <div class="col-lg-8 mt-auto">
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
                                'posts_per_page' => 3
                            );
                            $loop = new WP_Query($args);
                        ?>
                        <?php if ($loop->have_posts()) : ?>
                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                <div class="col-md-6 col-lg-4 mx-auto my-3 my-lg-0">
                                    <div class="service__item spa">
                                        <div class="service-item__content">
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="service-item__title">
                                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/icon.png" class="img-fluid" alt="">
                                                    <h3><?php the_title();?></h3>
                                                </div>
                                                <?php the_content();?>
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
            <div class="row mt-5">
                <div class="col-lg-8 mt-auto order-2 order-lg-1">
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
                                'posts_per_page' => 3
                            );
                            $loop = new WP_Query($args);
                        ?>
                        <?php if ($loop->have_posts()) : ?>
                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                <div class="col-md-6 col-lg-4 my-3 my-lg-0 mx-auto">
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
                <div class="col-lg-4 text-center text-md-start text-lg-end order-1 order-lg-2 mb-3 mb-lg-0">
                    <h2 class="title-style">Massagens</h2>
                    <div class="txt-style">
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
                    <a href="<?php echo esc_url(site_url('/servicos/massagem'));?>" class="btn btn--green">Ver todas as Massagens</a>
                </div>
            </div>
        </div>
    </section>
</main>

<section class="margint-default marginb-default">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
                <h2 class="title-style">Blog</h2>
            </div>
        </div>
        <div class="row mt-4">
            <?php
                $args = array(
                    'post_type' => 'post',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => 3
                );
                $loop = new WP_Query($args);
            ?>
            <?php if ($loop->have_posts()) : ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="news-item">
                            <a href="<?php the_permalink();?>">
                                <?php the_post_thumbnail('full', array('class' => 'w-100'));?>
                                 <div class="news__infos">
                                     <p class="news--title"><?php the_title();?></p>
                                     <p class="news--date"><?php echo get_the_date('d M. Y');?></p>
                                 </div>
                                 <a href="<?php the_permalink();?>" class="news--see-more"><img src="<?php bloginfo('template_directory'); ?>/assets/images/arrow-right.svg" class="img-fluid" alt="Ler mais" title="Ler mais"></a>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            <div class="col-12 d-flex mt-4">
                <a href="<?php echo esc_url(site_url('/blog'));?>" class="btn btn--green mx-auto">Ver todos os posts</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>