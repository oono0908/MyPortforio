<?php get_header(); ?>

<main>
  <section class="works">
    <div class="works__container">
      <div class="works__top">
        <h1 class="works__title">WORKS</h1>
      </div>
      <div class="works__main">
        <div class="works__main-inner">
          <ul class="works__items">
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
                <li class="works__item">
                  <a href="<?php the_permalink(); ?>">  
                    <div class="works__item-image-wrapper">
                      <img class="works__item-image" src="<?php echo esc_url(get_field('image')); ?>" alt="<?php the_title(); ?>">
                    </div>
                  </a>
                  <div class="works__item-title">
                    <?php the_title(); ?>
                  </div>
                </li>
              <?php endwhile; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>