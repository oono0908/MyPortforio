<?php get_header(); ?>

<main>
  <section class="blog__category-section">
    <h2 class="blog__category-title">IT</h2>
    <ul class="blog__items blog__items-it">
    <?php while (have_posts()) : the_post(); ?>
        <li class="blog__item">
          <a href="<?php the_permalink(); ?>">
            <div class="blog__item-image-wrapper">
              <img class="blog__item-image" src="<?php echo esc_url(get_field('image')); ?>" alt="<?php the_title(); ?>">
            </div>
            <div class="blog__item-title">
              <?php the_title(); ?>
            </div>
            <div class="blog__item-date">
              <?php echo get_the_date(); ?>
            </div>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  </section>
</main>

<?php get_footer(); ?>