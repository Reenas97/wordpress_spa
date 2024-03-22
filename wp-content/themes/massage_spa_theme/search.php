<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package massage-spa
 */

get_header();
?>

	<main class="margint-default marginb-default">
        <div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="title-style">
						<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Resultados da busca por: %s', 'massage-spa' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
					<?php if ( have_posts() ) : ?>
						<div class="row">
        			    	    <?php while ( have_posts() ) : the_post();?>
                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
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
								<?php endwhile; else: ?>
								<div class="txt-style">
									<p>Desculpe, não conseguimos encontrar resultados para sua busca.</p>
								</div>
							</div>
						</div>
	    			<?php endif; ?>
				</div>
			</div>
        </div>

	</main>

<?php get_footer();?>