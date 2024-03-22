<?php


//Add thumbnail, automatic feed links and title tag support
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_image_size('blogPostThumb', 700, 378, true);

//Add content width (desktop default)
if ( ! isset( $content_width ) ) {
	$content_width = 768;
}

//Add menu support and register main menu
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'main_menu' => 'Main Menu'
		)
	);
}


// filter the Gravity Forms button type
add_filter('gform_submit_button', 'form_submit_button', 10, 2);

function form_submit_button($button, $form){
	return "<button class='button btn' id='gform_submit_button_{$form["id"]}'><span>{$form['button']['text']}</span></button>";
}

// Register sidebar
add_action('widgets_init', 'theme_register_sidebar');

function theme_register_sidebar() {
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'id' => 'sidebar-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		));
	}
}

// Bootstrap_Walker_Nav_Menu setup

add_action('after_setup_theme', 'bootstrap_setup');

if (!function_exists('bootstrap_setup')) :

	function bootstrap_setup()
	{
		add_action('init', 'register_menu');
		function register_menu()
		{
			register_nav_menu('top-bar', 'Bootstrap Top Menu');
		}

		class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu
		{

			function start_lvl(&$output, $depth = 0, $args = array())
			{
				$indent = str_repeat("\t", $depth);
				$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";
			}

			function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
			{

				if (!is_object($args)) {
					return; // menu has not been configured
				}
				$indent = ($depth) ? str_repeat("\t", $depth) : '';

				$li_attributes = '';
				$class_names = $value = '';

				$classes = empty($item->classes) ? array() : (array) $item->classes;
				$classes[] = ($args->has_children) ? 'dropdown' : '';
				$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
				$classes[] = 'menu-item-' . $item->ID;

				$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
				$class_names = ' class="' . esc_attr($class_names) . '"';

				$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
				$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

				$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

				$attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
				$attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
				$attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
				$attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
				$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-bs-toggle="dropdown"' : '';

				$item_output = $args->before;
				$item_output .= '<a' . $attributes . '>';
				$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
				$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
				$item_output .= $args->after;

				$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
			}

			function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
			{

				if (!$element)
					return;

				$id_field = $this->db_fields['id'];

				//display this element
				if (is_array($args[0]))
					$args[0]['has_children'] = !empty($children_elements[$element->$id_field]);
				else if (is_object($args[0]))
					$args[0]->has_children = !empty($children_elements[$element->$id_field]);
				$cb_args = array_merge(array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'start_el'), $cb_args);

				$id = $element->$id_field;

				// descend only when the depth is right and there are childrens for this element
				if (($max_depth == 0 || $max_depth > $depth + 1) && isset($children_elements[$id])) {

					foreach ($children_elements[$id] as $child) {

						if (!isset($newlevel)) {
							$newlevel = true;
							//start the child delimiter
							$cb_args = array_merge(array(&$output, $depth), $args);
							call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
						}
						$this->display_element($child, $children_elements, $max_depth, $depth + 1, $args, $output);
					}
					unset($children_elements[$id]);
				}

				if (isset($newlevel) && $newlevel) {
					//end the child delimiter
					$cb_args = array_merge(array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
				}

				//end this element
				$cb_args = array_merge(array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'end_el'), $cb_args);
			}
		}
	}
endif;

/**
 * Load site scripts.
 */

// --------- Massage Spa Functions

function massage_spa_enqueue_script() {
	$template_url = get_template_directory_uri();

	wp_enqueue_style( 'wp-style', get_stylesheet_uri() );

	//jquery
	wp_enqueue_script('bootstrap-jquery', '//code.jquery.com/jquery-3.7.1.min.js', NULL, '1.0', true);

	// boostrap
	wp_enqueue_style( 'bootstrap-style', '//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' );
	wp_enqueue_script('bootstrap-js', '//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', NULL, '1.0', true);

	// font-awesome
	wp_enqueue_style('fontawesome-css', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );

	// google fonts
	wp_enqueue_style( 'google-font-montserrat', '//fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

	// massage_spa
	wp_enqueue_style( 'massage_spa-style', get_theme_file_uri('/assets/css/style.css') );
	wp_enqueue_script('massage_spa-js', get_theme_file_uri('/assets/js/script.js'), NULL, '1.0', true);

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	
}

add_action( 'wp_enqueue_scripts', 'massage_spa_enqueue_script', 1 );


// CUSTOM POST TYPE FOR SERVIÇOS MASSAGE & SPA

add_action( 'init', 'create_post_type_nossos_servicos' );

/**
 * Esta é a função que é chamada pelo add_action()
 */
function create_post_type_nossos_servicos() {

    /**
     * Labels customizados para o tipo de post
     * 
     */
    $labels = array(
    	'name' => _x('Serviços', 'post type general name'),
    	'singular_name' => _x('Serviços', 'post type singular name'),
    	'add_new' => _x('Adicionar Novo', 'Serviços'),
    	'add_new_item' => __('Adicionar novo Serviço'),
    	'edit_item' => __('Editar Serviço'),
    	'new_item' => __('Novo Serviço'),
    	'all_items' => __('Todos Serviços'),
    	'view_item' => __('Ver Serviço'),
    	'search_items' => __('Buscar Serviço'),
    	'not_found' =>  __('Nenhum Serviço Encontrado'),
    	'not_found_in_trash' => __('Nenhum Serviço Encontrado no Lixo'),
    	'parent_item_colon' => '',
    	'menu_name' => 'Serviços'
    );
    
    register_taxonomy('categorias', 'servicos', array(
    	'hierarchical' => true,
    	'labels' => $labels,
    	'show_ui' => true,
    	'show_admin_column' => true,
    	'query_var' => true,
    	'rewrite' => array( 'slug' => 'servicos' )
    ));  
   // 
    register_post_type( 'servicos', array(
    	'labels' => $labels,
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true,
    	'show_in_menu' => true,
    	'has_archive' => 'servico',
    	'rewrite' => array(
    	'slug' => 'servico',
    	'with_front' => false, ),
    	'capability_type' => 'post',
    	'has_archive' => true,
    	'hierarchical' => false,
    	'menu_position' => null,
    	'menu_icon' => 'dashicons-screenoptions',
    	'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields')
    )
);
    
}


/* SEARCH ONLY FOR SERVIÇOS */
function searchfilter($query) {
 
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('servicos'));
    }
 
return $query;
}
 
add_filter('pre_get_posts','searchfilter');

/* Show post excerpt */
function get_excerpt( $count ) {
	/* 	$permalink = get_permalink($post->ID); */
		$excerpt = get_the_content();
		$excerpt = strip_tags($excerpt);
		$excerpt = substr($excerpt, 0, $count);
		$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
		$excerpt = '<p>'.$excerpt.'... </p>';
		return $excerpt;
	}