<?php get_header(); ?>

<main>
  <!-- メインビジュアル -->
  <div class="mv">
    <div class="mv__title">
      <span
        class="txt-rotate"
        data-period="1000"
        data-rotate='[ "I am Shinichiro Ono.","This web site is my portfolio site.", "Have fun.", "Thank you for visiting." ]'>
      </span>
    </div>
  </div>

  <!-- works -->
  <section class="works">
    <div class="works__container">
      <h2 class="works__title">Works</h2>

      <!-- Swiper -->
      <div class="swiper">
        <div class="swiper-wrapper">
          <?php
          $args = array(
            'post_type' => 'works',
            'posts_per_page' => -1,
          );
          $works_query = new WP_Query($args);

          while ($works_query->have_posts()) : $works_query->the_post();
            $image = get_field('image');
          ?>
            <ul class="swiper-slide">
              <li class="works__item">
                <a href="<?php the_permalink(); ?>" class="works__item-link">
                  <div class="work__item-cover">
                    <div class="work__item-title"><?php the_title(); ?></div>
                  </div>
                    <?php if ($image) : ?>
                      <img class="works__item-image" src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </a>
              </li>
            </ul>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
    <div class="works__button">
      <a href="<?php echo home_url('/works'); ?>" class="works__button-link" aria-label="作品一覧へ移動">
      </a>
    </div>
    <span
        class="txt-rotate works__button-text"
        data-period="1000"
        data-rotate='[ "View ALL" ]'>
   </span>
  </section>

  <!-- blog -->
  <section class="blog">
    <div class="blog__container">
      <h2 class="blog__title">Blog</h2>
      <ul class="blog__list">
        <?php
        $args = array(
          'post_type' => 'blog',
          'posts_per_page' => 9,
        );
        $blog_query = new WP_Query($args);
        while ($blog_query->have_posts()) : $blog_query->the_post();
          $image = get_field('image');
        ?>
          <li class="blog__item">
            <a href="<?php the_permalink(); ?>" class="blog__item-link" aria-label="<?php the_title(); ?>へ移動">
              <div class="blog__item-inner">
                  <div class="blog__item-image">
                    <?php if ($image) : ?>
                      <img src="<?php echo esc_url($image); ?>" class="blog__item-image" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                  </div>
              </div>
            </a>
            <div class="blog__item-title"><?php the_title(); ?></div>
          </li>
        <?php endwhile; wp_reset_postdata(); ?>
      </ul>
    </div>
    <div class="blog__button">
      <a href="<?php echo home_url('/blog'); ?>" class="blog__button-link" aria-label="ブログ一覧へ移動">
      </a>
    </div>
    <span
        class="txt-rotate blog__button-text"
        data-period="1000"
        data-rotate='[ "View ALL" ]'>
   </span>
  </section>
  <section class="contact">
    <div class="contact__container">
      <a href="<?php echo home_url('/contact'); ?>" class="contact__link" aria-label="お問い合わせへ移動">
        <div class="contact__title">Contact Me</div>
      </a>
    </div>
  </section>

</main>

<?php get_footer(); ?>