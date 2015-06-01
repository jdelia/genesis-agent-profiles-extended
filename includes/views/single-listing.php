<?php
remove_action( 'genesis_before_post_content', 'genesis_post_info' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 ); // HTML5
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' ); // HTML5
remove_action( 'genesis_after_post', 'genesis_do_author_box_single' );
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 ); // HTML5
remove_action( 'genesis_after_post', 'genesis_get_comments_template' );
remove_action( 'genesis_after_entry', 'genesis_get_comments_template' ); // HTML5
remove_action( 'genesis_after_post_content', 'agentevo_post_meta' );
remove_action( 'genesis_entry_footer', 'agentevo_post_meta' ); // HTML5

add_action( 'genesis_after_post', 'aeprofiles_show_connected_agent' ); // XHTML
add_action( 'genesis_after_entry', 'aeprofiles_show_connected_agent' ); // HTML5

function aeprofiles_show_connected_agent() {
	if (function_exists('_p2p_init') && function_exists('agentpress_listings_init') || function_exists('_p2p_init') && function_exists('wp_listings_init')) {
		echo'
		<div class="connected-agents">';
		aeprofiles_connected_agents_markup();
		echo '</div>';
	}
}

genesis();