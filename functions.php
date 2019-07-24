<?php
	// version define code
	if (site_url() == "http://code-practice.com") {
		define("VERSION", time());
	} else {
		define("VERSION", wp_get_theme()->get("Version"));
	}

	require_once get_theme_file_path('/inc/tgm.php');
	if (class_exists('Attachments')) {
		require_once get_theme_file_path('/inc/attachments.php');
	}

	//after theme setup
	function philosophy_default_setup()
	{
		load_theme_textdomain("philosophy");
		add_theme_support("title-tag");
		add_theme_support("post-thumbnails");
		add_theme_support("custom-logo");
		add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
		add_theme_support('post-formats', array('audio', 'video', 'gallery', 'quote', 'image', 'link'));
		add_image_size("philosophy_post_thumb_square", 400, 400, true);
		register_nav_menu("top-menu", __("ToP Menu", "philosophy"));
		register_nav_menus(array(
			"footer_left" => __("footer left"),
			"footer_middle" => __("footer middle"),
			"footer_right" => __("footer right"),
		));
	}

	add_action("after_setup_theme", "philosophy_default_setup");


	// assets management
	function philosophy_assets()
	{
		wp_enqueue_style("font-awesome-css", get_theme_file_uri("/assets/css/font-awesome/css/font-awesome.min.css"), null, VERSION, "all");
		wp_enqueue_style("fonts-css", get_theme_file_uri("/assets/css/fonts.css"), null, VERSION, "all");
		wp_enqueue_style("base-css", get_theme_file_uri("/assets/css/base.css"), null, VERSION, "all");
		wp_enqueue_style("vendor-css", get_theme_file_uri("/assets/css/vendor.css"), null, VERSION, "all");
		wp_enqueue_style("main-css", get_theme_file_uri("/assets/css/main.css"), null, VERSION, "all");
		wp_enqueue_style("philosophy-css", get_stylesheet_uri(), null, VERSION, "all");


		wp_enqueue_script("modernizr-js", get_theme_file_uri("/assets/js/modernizr.js"), null, 1.0, false);
		wp_enqueue_script("pace-js", get_theme_file_uri("/assets/js/pace.min.js"), null, 1.0, false);
		wp_enqueue_script("plugins-js", get_theme_file_uri("/assets/js/plugins.js"), array("jquery"), 1.0, true);
		wp_enqueue_script("main-js", get_theme_file_uri("/assets/js/main.js"), array("jquery"), 1.0, true);
	}

	add_action("wp_enqueue_scripts", "philosophy_assets");



	// pagination
	function philosophy_pagination(){
		global $wp_query;
		$links = paginate_links(array(
		 	"current" => max(1,get_query_var("paged")),
			 "total" => $wp_query->max_num_pages,
			 "type" => "list",
		 ));
		$links = str_replace("page-numbers","pgn__num",$links);
		$links = str_replace("<ul class='pgn__num'>","<ul>",$links);
		$links = str_replace("prev pgn__num","pgn__prev",$links);
		$links = str_replace("next pgn__num","pgn__next",$links);
		echo $links;
	}

	//widgets
	function philosophy_sidebar(){
		register_sidebar(array(
			'name' => __('Footer Top Right', 'philosophy'),
			'id' => 'footer_top_right',
			'description' => __('Footer Top Right Sidebar', 'philosophy'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
		register_sidebar(array(
			'name' => __('About page widgets', 'philosophy'),
			'id' => 'about_page_widgets',
			'description' => __('About page widgets after content', 'philosophy'),
			'before_widget' => '<div id="%1$s" class="col-block %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="quarter-top-margin">',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => __('Contact page Maps', 'philosophy'),
			'id' => 'contact_page_maps_widgets',
			'description' => __('contact page maps widget before content', 'philosophy'),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
		));
		register_sidebar(array(
			'name' => __('Contact page info', 'philosophy'),
			'id' => 'contact_page_info_widgets',
			'description' => __('contact page info widget after content', 'philosophy'),
			'before_widget' => '<div id="%1$s" class="col-six tab-full %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => __('Footer Right', 'philosophy'),
			'id' => 'footer_right',
			'description' => __('Footer Right', 'philosophy'),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Footer Bottom', 'philosophy'),
			'id' => 'footer_bottom',
			'description' => __('Footer Bottom', 'philosophy'),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
		));
	}
	add_action("widgets_init","philosophy_sidebar");


	// remove <p></P> tag form category term
	remove_action("term_description","wpautop");


	//search result ke highlight korar jonno
	function philosophy_highlight_search_results($text)
	{
		if (is_search()) {
			$pattern = '/(' . join('|', explode(' ', get_search_query())) . ')/i';
			$text    = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
		}
		return $text;
	}

	add_filter('the_content', 'philosophy_highlight_search_results');
	add_filter('the_excerpt', 'philosophy_highlight_search_results');
	add_filter('the_title', 'philosophy_highlight_search_results');
