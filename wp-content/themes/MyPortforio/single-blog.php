<?php get_header(); ?>

<main>
  <section class="blog-single">
    <div class="blog-single__container">
      <h1 class="blog-single__title"><?php the_title(); ?></h1>
      <div class="blog-single__image-wrapper">
        <img class="blog-single__image" src="<?php echo esc_url(get_field('image')); ?>" alt="<?php the_title(); ?>">
      </div>
      <div class="blog-single__date">
        <?php echo get_the_date(); ?>
      </div>
      <div class="blog-single__content">
        <?php the_content(); ?>
      </div>
      <div class="blog-single__pagination">
        <div class="blog-single__prev">
          <?php previous_post_link('%link', '%title'); ?>
        </div>
        <div class="blog-single__next">
          <?php next_post_link('%link', '%title'); ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>