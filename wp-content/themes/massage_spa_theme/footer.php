<footer class="paddingt-default bg--light-green">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if (get_field('logo', 7)) : ?>
                        <img src="<?php the_field('logo', 7); ?>" class="img-fluid mb-4" alt="Massage & SPA">
                    <?php else : ?>
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-massage-spa.png" class="img-fluid mb-4" alt="Massage & Spa" title="Massage & Spa">
                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                    <nav class="footer-nav">
                        <?php wp_nav_menu(
							array(
								'menu' => 'Main',
								'theme_location' => 'main_menu',
								'depth' => 1,
								'container' => false,
								'walker' => new Bootstrap_Walker_Nav_Menu
							)
							);
						?>
                    </nav>
                </div>
                <div class="col-md-4">
                    <nav class="footer-contact">
                        <ul>
                            <li>
                                <ul class="footer-contact__infos">
                                    <li>
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/icon-map.png" class="img-fluid" alt="Endereço" title="Endereço">
                                        <?php if(get_field('address', 7)) { 
                                            the_field('address', 7) ;
                                        } ;?>
                                    </li>
                                    <li>
                                        <a href="mailto:<?php if(get_field('email', 7)) { the_field('email', 7); };?>">
                                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/icon-mail.png" class="img-fluid" alt="E-mail" title="E-mail">
                                            <?php if(get_field('email', 7)) { 
                                                the_field('email', 7) ;
                                            } ;?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tel:+<?php if(get_field('phone', 7)) { the_field('phone', 7); };?>">
                                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/icon-phone.png" class="img-fluid" alt="Telefone" title="Telefone">
                                            <?php if(get_field('phone', 7)) { 
                                                the_field('phone', 7) ;
                                            } ;?>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-12">
                    <div class="footer-copyright text-center">
                        <p>Copyright © <?php echo date("Y"); ?> - Massage & SPA - SPA Natural. Desenvolvido por <a href="https://github.com/Reenas97" target="_blank">Renata Sanchez</a>.</p>
                    </div>
                </div>
            </div>  
        </div>
    </footer>



	<?php wp_footer(); ?>
	
</body>

</html>