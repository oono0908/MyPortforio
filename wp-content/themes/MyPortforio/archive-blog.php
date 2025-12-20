<?php get_header(); ?>

<main>
  <section class="blog">
    <div class="blog__container">
      <div class="blog__top">
        <h1 class="blog__title">BLOG</h1>
      </div>
      <div class="blog__main">
        <div class="blog__main-inner">
          <ul class="blog__items">
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
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
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>