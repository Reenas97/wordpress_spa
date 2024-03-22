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
                                <h1><?php single_cat_title(); ?></h1>
                                <div class="d-none d-md-block"><?php echo category_description(); ?></div>
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
            <?php 
                $qobj = get_queried_object();
                $args = array(
                  'posts_per_page' => -1,
                  'orderby' => 'date',
                    'order'   => 'ASC',
                  'tax_query' => array(
                    array(
                      'taxonomy' => $qobj->taxonomy,
                      'field' => 'id',
                      'terms' => $qobj->term_id
                    )
                  )
                );
            
                $random_query = new WP_Query( $args );
            ?>
            <?php if ($random_query->have_posts()) : ?>
                <?php while ($random_query->have_posts()) : $random_query->the_post(); ?>
                    <div class="col-md-6 col-lg-4 my-2">
                        <?php 
                            $term_name = $qobj->name;
                            if($term_name === 'SPA') : ?>
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
                            <?php else : ?>
                                <div class="service__item massage">
                                    <?php if (has_post_thumbnail()){ ?>
                                        <?php the_post_thumbnail('full', array('class' => 'img-fluid service-item__img'));?>
                                    <?php } ;?>
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
                            <?php endif;
                        ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>