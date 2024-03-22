<?php get_header(); ?>

<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <section class="intern-banner">
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/interns-banner.jpg" class="w-100" alt="">
                <div class="intern-banner__overlay">
                    <div class="container">
                        <div class="row justify-content-center">
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

<main>
    <?php if($paged == 1): ?>
        <section class="margint-default marginb-default">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title-style text-center">Em destaque</h2>  
                    </div>
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'category_name' => 'Destaque',
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'posts_per_page' => 3,
                            'paged' => $paged
                        );
                        $loop = new WP_Query($args);
                        $i = 0;
                    ?>
                    <?php if ($loop->have_posts()) : ?>
                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                            <?php if ($i==0){?>
                                <!-- Início do primeiro destaque, apenas na primeira página -->
                                <div class="col-lg-7 h-auto pe-lg-1">
                                    <div class="news-highlight bigger-post">
                                        <div class="news-highlight__content bigger-post">
                                            <?php the_post_thumbnail('full', array('class' => 'w-100 bigger-post'));?>
                                            <div class="news-highlight__overlay">
                                                <h3><?php the_title();?></h3>
                                                <p class="d-none d-lg-block">
                                                    <?php 
                                                        $content = get_the_content();
                                                        $excerpt = wp_trim_words( $content, 15 );
                                                        echo $excerpt;
                                                    ?>
                                                </p>
                                                <a href="<?php the_permalink();?>" class="btn--read-more white">Ler mais</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim do primeiro destaque -->
                                <div class="col-lg-5 ps-lg-0 mt-md-1 mt-lg-0">
                                    <?php }elseif ($i==1 && $paged == 1){ ?>
                                        <!-- Início do segundo destaque, apenas na primeira página -->
                                        <div class="news-highlight small ">
                                            <div class="news-highlight__content">
                                                <?php the_post_thumbnail('full', array('class' => 'w-100'));?>
                                                <div class="news-highlight__overlay">
                                                    <h3><?php the_title();?></h3>
                                                    <a href="<?php the_permalink();?>" class="btn--read-more white">Ler mais</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fim do segundo destaque -->
                                    <?php }elseif ($i==2 && $paged == 1){?>
                                        <!-- Início do terceiro destaque, apenas na primeira página -->
                                        <div class="news-highlight small mt-1">
                                            <div class="news-highlight__content">
                                                <?php the_post_thumbnail('full', array('class' => 'w-100'));?>
                                                <div class="news-highlight__overlay">
                                                    <h3><?php the_title();?></h3>
                                                    <a href="<?php the_permalink();?>" class="btn--read-more white">Ler mais</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fim do terceiro destaque -->
                                </div>
                            <?php };?>
                            <?php $i++; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php endif;?>

    <section class="margint-default marginb-default">
        <div class="container">
            <div class="row">
                <?php
                    $destaque_cat = get_category_by_slug('destaque');
                    $destaque_cat_id = $destaque_cat->term_id;
                    $args = array(
                        'post_type' => 'post',
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'posts_per_page' => 3,
                        'category__not_in' => array($destaque_cat_id),
                        'paged' => $paged
                    );
                    $loop = new WP_Query($args);
                    $i = 0;
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

                <div class="col-md-12 mt-3 text-center">
                    <?php 
                        echo paginate_links( array(
                            'total' => $loop->max_num_pages
                        ) );
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
