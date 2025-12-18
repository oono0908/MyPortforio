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
            <div class="swiper-slide">
              <div class="works__item">
                <div class="work__item-cover">
                  <div class="work__item-title"><?php the_title(); ?></div>
                </div>
                <?php if ($image) : ?>
                  <img class="works__item-image" src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>">
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>