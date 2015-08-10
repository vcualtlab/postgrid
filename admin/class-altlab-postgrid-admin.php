<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://luetkemj.github.io
 * @since      1.0.0
 *
 * @package    Altlab_Postgrid
 * @subpackage Altlab_Postgrid/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Altlab_Postgrid
 * @subpackage Altlab_Postgrid/admin
 * @author     Mark Luetke <luetkemj@gmail.com>
 */
class Altlab_Postgrid_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Altlab_Postgrid_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Altlab_Postgrid_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/altlab-postgrid-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Altlab_Postgrid_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Altlab_Postgrid_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/altlab-postgrid-admin.js', array( 'jquery' ), $this->version, false );

	}

}


// [bartag foo="foo-value"]
function altlab_postgrid_shortcode( $atts ) {
	global $post;
    $a = shortcode_atts( array(
    	'mix_it_up' => 'false',
        'paged' => 'true',
        'post_type' => 'post',
        'category' => 'uncategorized',
        'tag' => '',
        'posts_per_page' => '15',
        'max_column' => '3',
        'thumbnail' => 'true',
        'thumbnail_size' => 'large',
        'excerpt' => 'true',
        'content' => 'false',
        'title' => 'true',
        'permalink' => 'true',
        'author' => 'true',
        'date' => 'true',
        'use_plugin_styles' => 'true',
        'use_plugin_theme' => 'light'
    ), $atts );

 	$classy_cats = "";
 	$classy_tags = "";
 	$mix_it_up = "";
 	$mixer = "";
 	$cats_array = "";
 	$tags_array = "";

 	$output= "";

 	function get_mix_cats( $categories ) {
 		$classy_cats = "";
 		
 		if( $categories ){
	 		foreach ( $categories as $cat ){
	 			// print_r( $cat );
	 			$classy_cats .= $cat->slug." ";
	 		}
	 	}
 		
 		return $classy_cats;
 	}

 	function get_mix_tags( $tags ) {
 		$classy_tags = "";
 		
 		if ( $tags ) {
	 		foreach ( $tags as $tag ){
	 			// print_r( $cat );
	 			$classy_tags .= "tag-".$tag->slug." ";
	 		}
 		} 		

 		return $classy_tags;
 	}
	
	// setup mix_it_up
	if ( $a['mix_it_up'] == 'true' ){ 
		$mix_it_up = 'mix';
		$mixer = "mixer";

		if ( $a['category'] ){
			$clean_cats = str_replace(' ', '', $a['category'] );
			$cats_array = explode(",", $clean_cats);
		}
		if ( $a['tag'] ){
			$clean_tags = str_replace(' ', '', $a['tag'] );
			$tags_array = explode(",", $clean_tags);
		}
		
		if ( $cats_array ){
			$cat_filters = '';
			foreach ($cats_array as $filter){
				$cat_filters .= "<button class='filter' data-filter='.".$filter."'>".$filter."</button>";
			}
			echo $cat_filters;
		}
		if ( $tags_array ){
			$tag_filters = '';
			foreach ($tags_array as $filter){
				$tag_filters .= "<button class='filter' data-filter='.tag-".$filter."'>".$filter."</button>";
			}
			echo $tag_filters;
		}

	} else { 
		$mix_it_up = ''; 
	}


	// Run a new query for the twitpics
	if ( $a['paged'] == 'true' ){ $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; } else { $paged = null; }

	$args = array(
		'post_type' => $a['post_type'],
		'paged' => $paged,
		'posts_per_page' => $a['posts_per_page'],
		'category_name' => $a['category'],
        'tag' => $a['tag'],

        'tax_query' => array(
		    'relation' => 
		    	'OR',                      
			    array(
			      'taxonomy' => 'category',                //(string) - Taxonomy.
			      'field' => 'slug',                    //(string) - Select taxonomy term by ('id' or 'slug')
			      'terms' => array( $a['category'] ),    //(int/string/array) - Taxonomy term(s).
			      'include_children' => false,
			    ),
			    array(
			      'taxonomy' => 'tag',
			      'field' => 'slug',
			      'terms' => array( $a['tag'] ),
			      'include_children' => false,
			    )
	    ),
	);

	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) :
		$output = "
			<div class='altlab-postgrid-masonry maxcol".$a['max_column']." ".$mixer."'>
		  		<div class='altlab-postgrid-grid-sizer'></div>";
	
	
	while ( $the_query->have_posts() ) : $the_query->the_post();
		// thumbnail output
		$style = ($a['use_plugin_styles'] == 'true') ? 'styled' : '';
		$theme = $a['use_plugin_theme'];
		$output .= "<article class='altlab-postgrid-brick ".$style." ".$theme." ".$mix_it_up." ".get_mix_cats( get_the_category() )." ".get_mix_tags( get_the_tags() )."'>";
		if ( has_post_thumbnail() && $a['thumbnail'] == 'true' ) {
			$thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $a['thumbnail_size']);
			$output .= "<a href='".get_permalink()."'><img class='thumbnail' src='".$thumbnail_url[0]."'/></a>";
		}
		
		// postmeta
		if ( $a['title'] == 'true' || $a['author'] == 'true' || $a['date'] == 'true' ){
			$output .= "<ul class='post-meta'>";
			if ( $a['permalink'] == 'true' ){
				$output .= "<a href='".get_permalink()."'>";
			}
				if ( $a['title'] == 'true' ){
					$output .= "<li class='post-title'>".get_the_title()."</li>";
				}
			if ( $a['permalink'] == 'true' ){
				$output .= "</a>";
			}
			if ( $a['author'] == 'true' ){
				$output .= "<li class='post-author'>".get_the_author()."</li>";
			}
			if ( $a['date'] == 'true' ){
				$output .= "<li class='post-date'>".get_the_date()."</li>";
			}
			$output .= "</ul>";
		}

		if ( $a['content'] == 'true' ){
			$output .= get_the_content();
		}
		if ( $a['excerpt'] == 'true' ){
			$output .= get_the_excerpt();
		}

		if ( current_user_can('administrator') ){
			$output .= "<div class='edit-this-link'><a href='".get_edit_post_link()."'>edit this</a></div>";
		}

		$output .= "</article>";
	
	endwhile;
		$output .= "</div>";
	endif;
		

	if ( $a['paged'] == 'true' ){
		$output .= "<nav class='navigation pagination'><div class='next'>".get_next_posts_link('Next Page', $the_query->max_num_pages)."</div>";
		$output .= "<div class='prev'>".get_previous_posts_link('Previous Page')."</div></nav>";
	}


	wp_reset_postdata();	

    return $output;
}
add_shortcode( 'altlab-postgrid', 'altlab_postgrid_shortcode' );
