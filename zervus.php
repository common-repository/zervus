<?php
/*
Plugin Name: ZERVUS
Plugin URI: https://de.wordpress.org/plugins/zervus/
Description: Dieses Plugin aendert die Begruessung in der Adminleiste oben rechts, nach dem Einloggen.
Version: 1.33
Author: zyntux.com
Author URI: http://www.zyntux.com
Author Email: zyntux404@gmail.com
License: GPLv2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0
*/

add_action( 'admin_bar_menu', 'hnm_spoof_text', 11 );

function hnm_spoof_text( $wp_admin_bar ) {
	$user_id = get_current_user_id();
	$current_user = wp_get_current_user();
	$profile_url = get_edit_profile_url( $user_id );

	$hnm_spoof = array(
		"Guten Tag, ",
		"Ihr seid es, ",
		"Hey, ",
		"Hallo, ",
		"Hi, ",
        "Moin, ",
        "Servus, ",
        "Mahlzeit, ",
		"Grüß Gott, ",
		"Grüße, ",
   	    "Grüezi, ",
        "Willkommen, ",
		"Hereinspaziert, ",
		"|: Was geht ab ?",
		"I bims: | !!",
   	    "Zervus, ",
   	    "Peace, ",
   	    "Schalom, ",
   	    "Hei, ",
   	    "Salut, ",
   	    "Ahoj, ",
   	    "Hello, ",
   	    "Namaste, ",
   	    "Tere, ",
   	    "Ciao, ",
   	    "Hola, ",
   	    "Nihau, ",
   	    "Privet, ",
   	    "Konitschiva, ",
   	    "Salamaleykum, ",   	    
	);
	$hnm_greeting = $hnm_spoof[array_rand($hnm_spoof)];	
	$hnm_greeting_plode = explode("|", $hnm_greeting);

	if ( 0 != $user_id ) {
		/* Add the "My Account" menu */
		$avatar = get_avatar( $user_id, 28 );
		$howdy = sprintf( __('%1$s'), $current_user->display_name );
		$class = empty( $avatar ) ? '' : 'with-avatar';

		$wp_admin_bar->add_menu( array(
		'id' => 'my-account',
		'parent' => 'top-secondary',
		'title' => $hnm_greeting_plode[0] . $howdy . $hnm_greeting_plode[1]. $avatar,
		'href' => $profile_url,
		'meta' => array(
		'class' => $class,
		),
		) );

	}
}