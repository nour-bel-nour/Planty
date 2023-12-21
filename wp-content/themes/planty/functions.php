<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}


add_filter( 'wp_nav_menu_items', 'add_admin_menu', 10,2);
 function add_admin_menu ( $items, $args ) {
		 // utilisateur connecté ou non.  
         /*echo $args->theme_location;*/
			if (is_user_logged_in() && $args->theme_location == 'primary') {
		  // Donner accès à un menu admin et l'URL du tableau de bord WP et afficher le lien dans le menu
		 $items .= '<li class="menu-admin menu-item"><a href="'. admin_url() .'">Admin</a></li>';
		}
		
		return $items;
	}