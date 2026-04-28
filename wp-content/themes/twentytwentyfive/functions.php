<?php

/**
 * Twenty Twenty-Five functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

// Adds theme support for post formats.
if (! function_exists('twentytwentyfive_post_format_setup')) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_post_format_setup()
	{
		add_theme_support('post-formats', array('aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'post-thumbnails'));
		//Suport for navigation menus
		add_theme_support('menus');
	}
endif;
add_action('after_setup_theme', 'twentytwentyfive_post_format_setup');

//initial funtion
function register_my_menus()
{
	register_nav_menus([
		'menu-principal' => 'Menú Principal (cabecera)',
		'menu-legal' => 'Menú Legal (pie de página)'

	]);
}

//Hook init WP
add_action('init', 'register_my_menus');

//Shortcut
function shortcode_any_actual(){
	return date("Y");
}
add_shortcode("any_actual", "shortcode_any_actual");

//Notification admin action
function add_msg_admin(){
	echo "Bienvenida al panel de administración";
}
add_action('admin_notices', 'add_msg_admin');

// Limit content length
function modificar_longitud_extracte($longitud)
{
	return 25;
}
add_filter('excerpt_length', 'modificar_longitud_extracte');

// Enqueues editor-style.css in the editors.
if (! function_exists('twentytwentyfive_editor_style')) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_editor_style()
	{
		add_editor_style('assets/css/editor-style.css');
	}
endif;
add_action('after_setup_theme', 'twentytwentyfive_editor_style');

// Enqueues the theme stylesheet on the front.
if (! function_exists('twentytwentyfive_enqueue_styles')) :
	/**
	 * Enqueues the theme stylesheet on the front.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_enqueue_styles()
	{
		$suffix = SCRIPT_DEBUG ? '' : '.min';
		$src    = 'style' . $suffix . '.css';

		wp_enqueue_style(
			'twentytwentyfive-style',
			get_parent_theme_file_uri($src),
			array(),
			wp_get_theme()->get('Version')
		);
		wp_style_add_data(
			'twentytwentyfive-style',
			'path',
			get_parent_theme_file_path($src)
		);
	}
endif;
add_action('wp_enqueue_scripts', 'twentytwentyfive_enqueue_styles');

// Registers custom block styles.
if (! function_exists('twentytwentyfive_block_styles')) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_block_styles()
	{
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __('Checkmark', 'twentytwentyfive'),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action('init', 'twentytwentyfive_block_styles');

// Registers pattern categories.
if (! function_exists('twentytwentyfive_pattern_categories')) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_pattern_categories()
	{

		register_block_pattern_category(
			'twentytwentyfive_page',
			array(
				'label'       => __('Pages', 'twentytwentyfive'),
				'description' => __('A collection of full page layouts.', 'twentytwentyfive'),
			)
		);

		register_block_pattern_category(
			'twentytwentyfive_post-format',
			array(
				'label'       => __('Post formats', 'twentytwentyfive'),
				'description' => __('A collection of post format patterns.', 'twentytwentyfive'),
			)
		);
	}
endif;
add_action('init', 'twentytwentyfive_pattern_categories');

// Registers block binding sources.
if (! function_exists('twentytwentyfive_register_block_bindings')) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_register_block_bindings()
	{
		register_block_bindings_source(
			'twentytwentyfive/format',
			array(
				'label'              => _x('Post format name', 'Label for the block binding placeholder in the editor', 'twentytwentyfive'),
				'get_value_callback' => 'twentytwentyfive_format_binding',
			)
		);
	}
endif;
add_action('init', 'twentytwentyfive_register_block_bindings');

// Registers block binding callback function for the post format name.
if (! function_exists('twentytwentyfive_format_binding')) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function twentytwentyfive_format_binding()
	{
		$post_format_slug = get_post_format();

		if ($post_format_slug && 'standard' !== $post_format_slug) {
			return get_post_format_string($post_format_slug);
		}
	}
endif;
