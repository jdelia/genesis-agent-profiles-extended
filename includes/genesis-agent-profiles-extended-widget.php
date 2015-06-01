<?php
/**
* This widget displays a featured agent.
*
* @since 2.0
* @author Agent Evolution
*/

if (! class_exists('AgentEvolution_Profiles_Widget')) {
	wp_die( sprintf( __( 'Sorry, you can\'t activate unless you have Genesis Agent Profiles plugin installed and activated' ) )); 
}

class Custom_AgentEvolution_Profiles_Widget extends AgentEvolution_Profiles_Widget {

	function MyAgentEvolution_Profiles_Widget() {
		$widget_ops = array( 'classname' => 'featured-agent', 'description' => __( 'Displays featured agent', 'aep' ) );
		$control_ops = array( 'width' => 300, 'height' => 350 );
		$this->WP_Widget( 'featured-agent', __( 'Featured Agent', 'aep' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {

		global $post;

		/** defaults */
		$instance = wp_parse_args( $instance, array(
			'post_id'	=> '',
			'show_agent'	=> 0,
			'show_number' => 0
			) );

		extract( $args );

        //* Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$title = $instance['title'];
		$orderby = $instance['orderby'];
		$order = $instance['order'];
		$show_agent = $instance['show_agent'];
        $show_number = ( ! empty( $instance['show_number'] ) ) ? absint( $instance['show_number'] ) : 0;
     
        if ( empty($show_number) )
            $show_number = -1;

		echo $before_widget;

		if ( $show_agent == 'show_all' ) {
			echo $before_title . apply_filters( 'widget_title', $title , $instance, $this->id_base ) . $after_title;
			$query_args = array(
				'post_type'			=> 'aeprofiles',
				'posts_per_page'	=> -1,
				'orderby'   => $orderby,
				'order'     => $order
				);

		} elseif ($show_agent == 'show_random') {

			echo $before_title . apply_filters( 'widget_title', $title , $instance, $this->id_base ) . $after_title;
			$query_args = array(
				'post_type'			=> 'aeprofiles',
				'p'					=> $post_id[0],
				'posts_per_page'	=> $show_number,
				'orderby'   => 'rand',
				'order'     => $order
				);


		} elseif ( !empty( $instance['post_id'] ) ) {
			$post_id = explode( ',', $instance['post_id']);
			echo $before_title . apply_filters( 'widget_title', $title , $instance, $this->id_base ) . $after_title;
			$query_args = array(
				'post_type'			=> 'aeprofiles',
				'p'					=> $post_id[0],
				'posts_per_page'	=> 1,
				'orderby'   => $orderby,
				'order'     => $order
				);
		}

		
        query_posts( $query_args );

		if ( have_posts() ) : while ( have_posts() ) : the_post();

		if ( $show_agent !== 'show_selected' )
			echo '<div ', post_class('widget-agent-wrap'), '>';
		    echo '<a href="', get_permalink(), '">', get_the_post_thumbnail( $post->ID, 'agent-profile-photo-square' ), '</a>';
		    printf('<div class="widget-agent-details"><a class="fn" href="%s">%s</a>', get_permalink(), get_the_title() );
		    echo do_agent_details_archive();
		if (function_exists('_p2p_init') && function_exists('agentpress_listings_init') || function_exists('_p2p_init') && function_exists('wp_listings_init')) {
			echo '<a class="agent-listings-link" href="' . get_permalink() . '#agent-listings">View My Listings</a>';
		}

		echo '</div>';
		//echo do_agent_social();
	  	if ( $show_agent !== 'show_selected' )
			echo '</div><!-- .widget-agent-wrap -->';

		endwhile; endif;
		wp_reset_query();

		echo $after_widget;

	}

	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']          = strip_tags( $new_instance['title'] );
        $instance['show_number'] = (int) $new_instance['show_number'];
		return $new_instance;
	}

	function form( $instance ) {

        
		$instance = wp_parse_args( $instance, array(
			'post_id'   =>	'',
			'title'		=>	'Featured Agents',
			'show_agent'	=>	''
			) ); 

            $show_number    = isset( $instance['show_number'] ) ? absint( $instance['show_number'] ) : 0;
			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php esc_attr_e( $instance['title'] ); ?>" />
			</p>
			<?php 
			echo '<p>';
			echo '<label for="' . $this->get_field_id( 'post_id' ) . '">Select an Agent:</label>';
			echo '<select id="' . $this->get_field_id( 'post_id' ) . '" name="' . $this->get_field_name( 'post_id' ) . '" class="widefat" style="width:100%;">';
			global $post;
			$args = array('post_type' => 'aeprofiles', 'posts_per_page'	=> -1);
			$agents = get_posts($args);
			foreach( $agents as $post ) : setup_postdata($post);
			  echo '<option style="margin-left: 8px; padding-right:10px;" value="' . $post->ID . ',' . $post->post_title . '" ' . selected( $post->ID . ',' . $post->post_title, $instance['post_id'], false ) . '>' . $post->post_title . '</option>';
			endforeach;
			echo '</select>';
			echo '</p>';

			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'show_agent' ); ?>"><?php _e( 'Show Agent', 'genesis' ); ?>:</label>
				<select id="<?php echo $this->get_field_id( 'show_agent' ); ?>" name="<?php echo $this->get_field_name( 'show_agent' ); ?>">
					<option value="show_selected" <?php selected( 'show_selected', $instance['show_agent'] ); ?>><?php _e( 'Show Agent selected above', 'genesis' ); ?></option>
					<option value="show_random" <?php selected( 'show_random', $instance['show_agent'] ); ?>><?php _e( 'Show Random', 'genesis' ); ?></option>
					<option value="show_all" <?php selected( 'show_all', $instance['show_agent'] ); ?>><?php _e( 'Show All', 'genesis' ); ?></option>
				</select>
			</p>
	<p><hr></p>
			<p>if Show Random selected: </p>
	       
         <p>

         <label for="<?php echo $this->get_field_id( 'show_number' ); ?>"><?php _e( 'Max number of agents to show:' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'show_number' ); ?>" name="<?php echo $this->get_field_name( 'show_number' ); ?>" type="text" value="<?php echo $show_number; ?>" size="3" maxlength="2" />
        
        </p>
			
		<p><hr></p>
			<p>if Show All selected: </p>
	        <p>
				<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( 'Order By', 'genesis' ); ?>:</label>
				<select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>">
					<option value="date" <?php selected( 'date', $instance['orderby'] ); ?>><?php _e( 'Date', 'genesis' ); ?></option>
					<option value="title" <?php selected( 'title', $instance['orderby'] ); ?>><?php _e( 'Title', 'genesis' ); ?></option>
					<option value="menu_order" <?php selected( 'menu_order', $instance['orderby'] ); ?>><?php _e( 'Menu Order', 'genesis' ); ?></option>
					<option value="ID" <?php selected( 'ID', $instance['orderby'] ); ?>><?php _e( 'ID', 'genesis' ); ?></option>
					<option value="rand" <?php selected( 'rand', $instance['orderby'] ); ?>><?php _e( 'Random', 'genesis' ); ?></option>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Sort Order', 'genesis' ); ?>:</label>
				<select id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>">
					<option value="DESC" <?php selected( 'DESC', $instance['order'] ); ?>><?php _e( 'Descending (3, 2, 1)', 'genesis' ); ?></option>
					<option value="ASC" <?php selected( 'ASC', $instance['order'] ); ?>><?php _e( 'Ascending (1, 2, 3)', 'genesis' ); ?></option>
				</select>
			</p>

				<?php


			}

		}