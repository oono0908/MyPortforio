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
    wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/gsap.min.js', [], null, true );
    wp_enqueue_script(
      'gsap-scrolltrigger',
      'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
      array('gsap-js'),
      null,
      true
    );


    // 共通JS読み込み（chaffleはViteでバンドル済み）
    wp_enqueue_script( 'common-js', get_theme_file_uri('assets/js/common/script.js'), ['jquery'], '1.0', true );
    wp_enqueue_script( 'scroll-title-animation', get_theme_file_uri('assets/js/modules/scroll-title-animation.js'), ['jquery'], '1.0', true );

    // ページ別CSS・JS読み込み
    if ( is_front_page() ) {
        // トップページ
        wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], null );
        wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true );
        wp_enqueue_script( 'top-js', get_theme_file_uri('assets/js/top/script.js'), ['jquery', 'swiper-js', 'common-js'], '1.0', true );
        wp_enqueue_style( 'top-css', get_theme_file_uri('assets/css/top/style.css'), [], '1.0' );
    }
    // 単一投稿（より具体的な条件を先に）
    elseif ( is_singular('blog') ) {
        // blog単一投稿ページ
        wp_enqueue_style( 'blog-single-css', get_theme_file_uri('assets/css/blog/single.css'), [], '1.0' );
    }
    elseif ( is_singular('works') ) {
        // works単一投稿ページ
        wp_enqueue_style( 'works-single-css', get_theme_file_uri('assets/css/works/single.css'), [], '1.0' );
    }
    // タクソノミーアーカイブページ（より具体的な条件を先にチェック）
    elseif ( is_tax('blog_category') ) {
        // blogカテゴリーページ
        wp_enqueue_style( 'blog-category-css', get_theme_file_uri('assets/css/blog/category.css'), [], '1.0' );
    }
    // アーカイブページ
    elseif ( is_post_type_archive('blog') ) {
        // blogアーカイブページ
        wp_enqueue_style( 'blog-css', get_theme_file_uri('assets/css/blog/style.css'), [], '1.0' );
        wp_enqueue_script( 'blog-js', get_theme_file_uri('assets/js/blog/script.js'), ['jquery', 'common-js', 'scroll-title-animation'], '1.0', true );
    }
    elseif ( is_post_type_archive('works') ) {
        // worksアーカイブページ
        wp_enqueue_style( 'works-css', get_theme_file_uri('assets/css/works/style.css'), [], '1.0' );
        wp_enqueue_script( 'works-js', get_theme_file_uri('assets/js/works/script.js'), ['jquery', 'gsap-js', 'gsap-scrolltrigger', 'common-js', 'scroll-title-animation'], '1.0', true );
    }
    // 固定ページ
    elseif ( is_page('about') ) {
        wp_enqueue_style( 'about-css', get_theme_file_uri('assets/css/about/style.css'), [], '1.0' );
        wp_enqueue_script( 'about-js', get_theme_file_uri('assets/js/about/script.js'), ['jquery', 'common-js', 'scroll-title-animation'], '1.0', true );
    }
    elseif ( is_page('contact') ) {
        wp_enqueue_style( 'contact-css', get_theme_file_uri('assets/css/contact/style.css'), [], '1.0' );
        wp_enqueue_script( 'contact-js', get_theme_file_uri('assets/js/contact/script.js'), ['jquery', 'common-js', 'scroll-title-animation'], '1.0', true );
    }
    elseif ( is_page('thanks') ) {
        wp_enqueue_style( 'thanks-css', get_theme_file_uri('assets/css/contact/thanks.css'), [], '1.0' );
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

// カスタムタクソノミー（カテゴリー）の登録
function create_blog_taxonomy() {
  register_taxonomy(
      'blog_category',  // タクソノミーのスラッグ
      'blog',           // 紐付ける投稿タイプ
      array(
          'label' => 'Blogカテゴリー',
          'labels' => array(
              'name' => 'Blogカテゴリー',
              'singular_name' => 'Blogカテゴリー',
              'search_items' => 'カテゴリーを検索',
              'all_items' => 'すべてのカテゴリー',
              'edit_item' => 'カテゴリーを編集',
              'update_item' => 'カテゴリーを更新',
              'add_new_item' => '新規カテゴリーを追加',
              'new_item_name' => '新しいカテゴリー名',
              'menu_name' => 'カテゴリー',
          ),
          'hierarchical' => true,  // 階層構造を有効化（カテゴリー形式）
          'show_ui' => true,
          'show_admin_column' => true,  // 投稿一覧にカテゴリー列を表示
          'query_var' => true,
          'rewrite' => array('slug' => 'blog-category'),
      )
  );
}
add_action('init', 'create_blog_taxonomy');

// カテゴリーを自動作成（初回のみ実行）
function create_default_blog_categories() {
  if (!get_option('blog_categories_created')) {
      $categories = array('IT', 'ENGLISH', 'PRIVATE');
      
      foreach ($categories as $category) {
          if (!term_exists($category, 'blog_category')) {
              wp_insert_term(
                  $category,
                  'blog_category',
                  array('slug' => strtolower($category))
              );
          }
      }
      
      update_option('blog_categories_created', true);
  }
}
add_action('init', 'create_default_blog_categories');

// フォームの自動改行を無効化
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
} 

// フォーム送信後にリダイレクト
add_action('wp_footer', 'redirect_to_thanks_page');
function redirect_to_thanks_page() {
  $homeUrl = home_url();
  echo <<< EOD
    <script>
      document.addEventListener( 'wpcf7mailsent', function( event ) {
        location = '{$homeUrl}/thanks/';
      }, false );
    </script>
  EOD;
}
