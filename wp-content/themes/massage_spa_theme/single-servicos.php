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
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="txt-style service mb-4">
                    <?php if (!empty(get_the_content())){?>
                        <h3 class="title-style">Descrição</h3>
                        <?php 
                            if(get_field('time')){ ?>
                                <p>
                                    Duração:
                                    <?php the_field('time'); ?>
                                </p>
                            <?php }
                        ;?>
                    <?php the_content();?>
                        <?php 
                            if(get_field('price')){ ?>
                                <p>
                                    <strong>
                                        Por apenas:
                                        <?php the_field('price'); ?>
                                    </strong>
                                </p>
                            <?php }
                        ;?>
                    <?php };?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-form bg--light-green p-5">
                    <?php ?>
                        <h2 class="title-style"><?php the_field('form_text'); ?></h2>
                    <?php ;?>
                    <?php echo do_shortcode('[contact-form-7 id="49ca32b" title="Reserva"]');?>
                </div>
            </div>
        </div>
    </div>
</main>

<section class="marginb-default">
    <div class="container">
        <div class="row">
            <?php
				//get the taxonomy terms of custom post type
				$customTaxonomyTerms = wp_get_object_terms( $post->ID, 'categorias', array('fields' => 'ids') );
				//query arguments
				$args = array(
				    'post_type' => 'servicos',
				    'post_status' => 'publish',
				    'posts_per_page' => 3,
					'orderby' => 'rand',
				    'tax_query' => array(
				        array(
				            'taxonomy' => 'categorias',
				            'field' => 'id',
                            'terms' => $customTaxonomyTerms
				        )
                        ),
				    'post__not_in' => array ($post->ID),
				);
				//the query
				$relatedPosts = new WP_Query( $args );
            ?>
			<?php if ($relatedPosts->have_posts()) : ?>
				<div class="col-12">
                    <h2 class="title-style text-center">Serviços Relacionados</h2>
                </div>
			    <?php while ($relatedPosts->have_posts()) : $relatedPosts->the_post(); ?>
			        <div class="col-md-6 col-lg-4 mb-3 mb-lg-0 mx-auto">
                        <?php if (has_term('spa', 'categorias', $post->ID)) : ?>
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
                        <?php endif ;?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>