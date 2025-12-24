<?php get_header(); ?>

<main>
  <section class="works-single">
    <div class="works-single__container">
    <h1 class="works-single__title"><?php the_title(); ?></h1>
      <div class="works-single__images-wrapper">
        <div class="works-single__image-pc-wrapper">
          <img class="works-single__image-pc" src="<?php echo esc_url(get_field('image-pc')); ?>" alt="<?php the_title(); ?>">
        </div>
      </div>
      <ul class="works-single__lists">
        <li class="works-single__item item">
          <div class="item__title">About this site</div>
          <div class="item__content"> <?php the_field('others'); ?></div>
        </li>
        <li class="works-single__item item">
          <div class="item__title">Title</div>
          <div class="item__content"> <?php the_field('title'); ?></div>
        </li>
        <li class="works-single__item item">
          <div class="item__title">Skill</div>
          <div class="item__content"> <?php the_field('skill'); ?></div>
        </li>
        <li class="works-single__item item">
          <div class="item__title">URL</div>
          <a class="item__url" href="<?php the_field('url'); ?>" target="_blank" aria-label="作品ページへ移動"> <?php the_field('url'); ?></a>
        </li>
      </ul>
      
      <div class="works-single__other-works">
        <h2 class="works-single__other-works-title">Other Works</h2>
        <ul class="works-single__other-works-list">
          <?php
          $current_post_id = get_the_ID();
          $args = array(
            'post_type' => 'works',
            'posts_per_page' => -1,
            'post__not_in' => array($current_post_id),
            'orderby' => 'date',
            'order' => 'DESC'
          );
          $other_works = new WP_Query($args);
          
          if ($other_works->have_posts()) :
            while ($other_works->have_posts()) : $other_works->the_post();
          ?>
            <li class="works-single__other-work-item">
              <a href="<?php the_permalink(); ?>" class="works-single__other-work-link">
                <div class="works-single__other-work-image-wrapper">
                  <img class="works-single__other-work-image" src="<?php echo esc_url(get_field('image-pc')); ?>" alt="<?php the_title(); ?>">
                </div>
                <h3 class="works-single__other-work-title"><?php the_title(); ?></h3>
              </a>
            </li>
          <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </ul>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>