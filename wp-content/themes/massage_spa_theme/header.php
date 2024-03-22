<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg py-0">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/'));?>">
                        <?php if (get_field('logo', 7)) : ?>
                            <img src="<?php the_field('logo', 7); ?>" class="img-fluid logo__img" alt="Massage & SPA">
                        <?php else : ?>
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-massage-spa.png" class="img-fluid logo__img" alt="Massage & Spa" title="Massage & Spa">
                        <?php endif; ?>
                    </a>
                    <!-- MENU DESKTOP -->
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
						<?php wp_nav_menu(
							array(
								'menu' => 'Main',
								'theme_location' => 'main_menu',
								'menu_class' => 'navbar-nav',
								'depth' => 2,
								'container' => false,
								'walker' => new Bootstrap_Walker_Nav_Menu
							)
							);
						?>
                    </div>
                    <!-- MENU MOBILE -->
                    <button class="btn--menu-mobile d-block d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <div class="menu-lines"></div>
                    </button>

                    <div class="offcanvas offcanvas-end d-block d-lg-none" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header justify-content-end">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
							<?php wp_nav_menu(
								array(
									'menu' => 'Menu Principal',
									'theme_location' => 'main_menu',
									'menu_class' => 'navbar-nav',
									'depth' => 2,
									'container' => false,
									'walker' => new Bootstrap_Walker_Nav_Menu
								)
								);
							?>
                        </div>
                    </div>

                    <!-- SEARCH -->
                    <form action="<?php echo get_home_url(); ?>/" method="get" class="header-search">
                        <input type="text" name="s" id="s" placeholder="Qual serviço você precisa?">
                        <button type="submit"><img src="<?php bloginfo('template_directory'); ?>/assets/images/icon-search.png" class="img-fluid" alt="Buscar" title="Buscar"></button>
                    </form>
                </div>
            </nav>
        </div>
    </header>

    <div class="space-menu"></div>