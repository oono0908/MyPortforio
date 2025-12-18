<?php
/**
 * MyPortfolio Theme Functions
 */

// テーマサポート機能
function myportfolio_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'myportfolio_theme_support');

// アセット読み込み
function myportfolio_enqueue_assets() {
    // 共通CSS読み込み（全ページ）
    wp_enqueue_style( 'common-css', get_theme_file_uri('assets/css/common/style.css'), [], '1.0' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&family=Poppins&family=Viga&display=swap', [], null );


    // ページ別CSS・JS読み込み
    if ( is_front_page() ) {
        wp_enqueue_script( 'common-js', get_theme_file_uri('assets/js/common/script.js'), ['jquery'], '1.0', true, ['defer' => true] );
        wp_enqueue_script( 'top-js', get_theme_file_uri('assets/js/top/script.js'), ['jquery'], '1.0', true, ['defer' => true] );
        wp_enqueue_style( 'top-css', get_theme_file_uri('assets/css/top/style.css'), [], '1.0' );
    }
    elseif ( is_page('about') ) {
        wp_enqueue_style( 'about-css', get_theme_file_uri('assets/css/about/style.css'), [], '1.0' );
        wp_enqueue_script( 'common-js', get_theme_file_uri('assets/js/common/script.js'), ['jquery'], '1.0', true, ['defer' => true] );
    }
    elseif ( is_page('contact') ) {
        wp_enqueue_style( 'contact-css', get_theme_file_uri('assets/css/contact/style.css'), [], '1.0' );
        wp_enqueue_script( 'common-js', get_theme_file_uri('assets/js/common/script.js'), ['jquery'], '1.0', true, ['defer' => true] );
    }
}
add_action('wp_enqueue_scripts', 'myportfolio_enqueue_assets');

/* --------------------------------------------
 * カスタム投稿タイプ[制作実績】
 * -------------------------------------------- */

 function cpt_register_works(){
	$args = [
		'label' => 'works',
		'labels' => [
			'singular_name' => 'works',
			'edit_item' => '実績ページを編集',
			'add_new_item' => '実績を追加'
		],
		'public' => true,
		'show_in_rest' => true,
		'has_archive' => true,
		'delete_with_user' => false,
		'exclude_from_search' => false,
		'hierarchical' => false,
		'query_var' => true,
		'menu_position' => 5,
		'supports' => [
			'title', 'editor', 'thumbnail', 'custom-fields'
		],
	];
	register_post_type('works', $args);
}
add_action('init', 'cpt_register_works');

/* --------------------------------------------
 * カスタム投稿タイプ[ブログ】
 * -------------------------------------------- */

 function cpt_register_blog(){
	$args = [
		'label' => 'blog',
		'labels' => [
			'singular_name' => 'blog',
			'edit_item' => 'ブログページを編集',
			'add_new_item' => 'ブログを追加'
		],
		'public' => true,
		'show_in_rest' => true,
		'has_archive' => true,
		'delete_with_user' => false,
		'exclude_from_search' => false,
		'hierarchical' => false,
		'query_var' => true,
		'menu_position' => 5,
		'supports' => [
			'title', 'editor', 'thumbnail', 'custom-fields'
		],
	];
	register_post_type('blog', $args);
}
add_action('init', 'cpt_register_blog');
