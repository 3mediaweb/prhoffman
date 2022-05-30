<?php if ( get_field('blog_date_override') ) : ?>
  <div class="px-5 py-1 mb-5 font-semibold text-white bg-coral">
    <?php the_field('blog_date_override'); ?>
  </div>
<?php else : ?>
  <time class="block px-5 py-1 mb-5 font-semibold text-white bg-coral" datetime="{{ get_post_time('c', true) }}">
    {{ get_the_date() }}
  </time>
<?php endif; ?>