<?php

/* 
	================================================
	 Enqueuing Style
	================================================
*/


	add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
	function my_theme_enqueue_styles() {
	    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

	}



/* 
	================================================
	 Custom Taxanomies
	================================================
*/

	function my_taxonomies_genre() {
	  $labels = array(
	    'name'              => _x( 'Genres', 'taxanomy general name' ),
	    'singular_name'     => _x( 'Genre', 'taxanomy singular name' ),
	    'search_items'      => __( 'Search Genres' ),
	    'all_items'         => __( 'All Genres' ),
	    'parent_item'       => __( 'Parent Genre' ),
	    'parent_item_colon' => __( 'Parent Genre' ),
	    'edit_item'         => __( 'Edit Genre' ), 
	    'update_item'       => __( 'Update Genre' ),
	    'add_new_item'      => __( 'Add New Genre' ),
	    'new_item_name'     => __( 'New Genre' ),
	    'menu_name'         => __( 'Genres' ),
	  );
	  $args = array(
	    'labels' => $labels,
	    'hierarchical' => true,
	  );
	  register_taxonomy( 'movie_genres', 'movies', $args );
	}

	add_action( 'init', 'my_taxonomies_genre', 0 );




	function my_taxonomies_country() {
	  $labels = array(
	    'name'              => _x( 'Countries', 'taxanomy general name' ),
	    'singular_name'     => _x( 'Country', 'taxanomy singular name' ),
	    'search_items'      => __( 'Search Countries' ),
	    'all_items'         => __( 'All Countries' ),
	    'parent_item'       => __( 'Parent Countries' ),
	    'parent_item_colon' => __( 'Parent Countries' ),
	    'edit_item'         => __( 'Edit Countries' ), 
	    'update_item'       => __( 'Update Countries' ),
	    'add_new_item'      => __( 'Add New Countries' ),
	    'new_item_name'     => __( 'New Country' ),
	    'menu_name'         => __( 'Countries' ),
	  );
	  $args = array(
	    'labels' => $labels,
	    'hierarchical' => true,
	  );
	  register_taxonomy( 'movie_countries', 'movies', $args );
	}
	
	add_action( 'init', 'my_taxonomies_country', 0 );



	function my_taxonomies_year() {
	  $labels = array(
	    'name'              => _x( 'Years', 'taxanomy general name' ),
	    'singular_name'     => _x( 'Year', 'taxanomy singular name' ),
	    'search_items'      => __( 'Search Years' ),
	    'all_items'         => __( 'All Years' ),
	    'parent_item'       => __( 'Parent Years' ),
	    'parent_item_colon' => __( 'Parent Years' ),
	    'edit_item'         => __( 'Edit Years' ), 
	    'update_item'       => __( 'Update Years' ),
	    'add_new_item'      => __( 'Add New Years' ),
	    'new_item_name'     => __( 'New Year' ),
	    'menu_name'         => __( 'Years' ),
	  );
	  $args = array(
	    'labels' => $labels,
	    'hierarchical' => true,
	  );
	  register_taxonomy( 'movie_years', 'movies', $args );
	}
	
	add_action( 'init', 'my_taxonomies_year', 0 );



	function my_taxonomies_actors() {
	  $labels = array(
	    'name'              => _x( 'Actors', 'taxanomy general name' ),
	    'singular_name'     => _x( 'Actor', 'taxanomy singular name' ),
	    'search_items'      => __( 'Search Actors' ),
	    'all_items'         => __( 'All Actors' ),
	    'parent_item'       => __( 'Parent Actors' ),
	    'parent_item_colon' => __( 'Parent Actors' ),
	    'edit_item'         => __( 'Edit Actors' ), 
	    'update_item'       => __( 'Update Actors' ),
	    'add_new_item'      => __( 'Add New Actors' ),
	    'new_item_name'     => __( 'New Actor' ),
	    'menu_name'         => __( 'Actors' ),
	  );
	  $args = array(
	    'labels' => $labels,
	    'hierarchical' => true,
	  );
	  register_taxonomy( 'movie_actors', 'movies', $args );
	}
	
	add_action( 'init', 'my_taxonomies_actors', 0 );





/* 
	================================================
	 Custom Post Type
	================================================
*/

	function movie_post_type() {
 
    $labels = array(
        'name'                => 'Movies',
        'singular_name'       => 'Movie',
        'menu_name'           => 'Movies',
        'parent_item_colon'   => 'Parent Movie',
        'all_items'           => 'All Movies',
        'view_item'           => 'View Movie',
        'add_new_item'        => 'Add New Movie',
        'add_new'             => 'Add New',
        'edit_item'           => 'Edit Movie',
        'update_item'         => 'Update Movie',
        'search_items'        => 'Search Movie',
        'not_found'           => 'Not Found',
        'not_found_in_trash'  => 'Not found in Trash',
    );

    $args = array(
        'label'               => 'movies',
        'description'         => 'Movie news and reviews',
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'genres,location' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'query_var'			  => true,
        'rewrite' 			  => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     

    register_post_type( 'movies', $args );
 
}

 
	add_action( 'init', 'movie_post_type', 0 );




	add_action("admin_init", "admin_init");

	function admin_init(){
	  add_meta_box("ticket_price_meta", "Ticket Price", "ticket_price", "movies", "side", "low");
	  add_meta_box("release_date_meta", "Release Date", "release_date", "movies", "side", "low");
	}

	function ticket_price(){
	  global $post;
	  $custom = get_post_custom($post->ID);
	  $ticket_price = $custom["ticket_price"][0];
	  ?>
	  <label>Price:</label>
	  <input name="ticket_price" type="text" value="<?php echo $ticket_price; ?>" />
	  <?php
	}

	function release_date(){
	  global $post;
	  $custom = get_post_custom($post->ID);
	  $release_date = $custom["release_date"][0];
	  ?>
	  <label>Date:</label>
	  <input name="release_date" type="text" value="<?php echo $release_date; ?>" />
	  <?php
	}


	add_action('save_post', 'save_details');


	function save_details(){
	  global $post;

	  update_post_meta($post->ID, "ticket_price", $_POST["ticket_price"]);
	  update_post_meta($post->ID, "release_date", $_POST["release_date"]);
	}




/* 
	================================================
	 Shortcode for Last 5 Movies
	================================================
*/

	function shortcode_last_movies(){


		 $args = array(
            'post_type' => 'movies',
            'post_status' => 'publish',
            'posts_per_page' => 5,
    		'orderby' => 'post_date',
    		'order' => 'DESC',
        );

        $string = '';
        $query = new WP_Query( $args );
        if( $query->have_posts() ){
            $string .= '<ul>';
            while( $query->have_posts() ){
                $query->the_post();
                $string .= '<li><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">'. get_the_title() .'</a></li>';
            }
            $string .= '</ul>';
        }
        wp_reset_postdata();
        return $string;


	}

	add_shortcode('last_movies', 'shortcode_last_movies');


	

?>