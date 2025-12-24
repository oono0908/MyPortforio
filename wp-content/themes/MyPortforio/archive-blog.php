<?php get_header(); ?>

<main>
  <section class="blog">
    <div class="blog__container">
      <div class="blog__top">
        <h1 class="blog__title">BLOG</h1>
      </div>
      <div class="blog__main">
        <div class="blog__main-inner">
          <?php
          // カテゴリー配列を定義
          $categories = array('it', 'english', 'private');

          // 各カテゴリーごとにループ
          foreach ($categories as $category) :
            // カテゴリーに属する投稿をクエリ
            $args = array(
              'post_type' => 'blog',
              'posts_per_page' => -1,
              'tax_query' => array(
                array(
                  'taxonomy' => 'blog_category',
                  'field' => 'slug',
                  'terms' => $category
                )
              )
            );
            $category_query = new WP_Query($args);
            
            // 投稿が存在する場合のみ表示
            if ($category_query->have_posts()) :
          ?>
            <div class="blog__category-section">
              <h2 class="blog__category-title"><?php echo strtoupper($category); ?></h2>
              <ul class="blog__items blog__items-<?php echo $category; ?>">
                <?php while ($category_query->have_posts()) : $category_query->the_post(); ?>
                  <li class="blog__item">
                    <a href="<?php the_permalink(); ?>">  
                      <div class="blog__item-image-wrapper">
                        <img class="blog__item-image" src="<?php echo esc_url(get_field('image')); ?>" alt="<?php the_title(); ?>">
                      </div>
                    </a>
                    <div class="blog__item-title">
                      <?php the_title(); ?>
                    </div>
                    <div class="blog__item-date">
                      <?php echo get_the_date(); ?>
                    </div>
                  </li>
                <?php endwhile; ?>
              </ul>
              <div class="blog__category-button">
                <a href="<?php echo get_term_link($category, 'blog_category'); ?>" class="blog__category-button-link">
                  View All <?php echo strtoupper($category); ?> posts
                </a>
              </div>
            </div>
          <?php
            endif;
            wp_reset_postdata(); // クエリをリセット
          endforeach;
          ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>