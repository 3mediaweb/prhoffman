<article @php(post_class('flex flex-wrap mb-20 border border-coral')) style="padding-bottom: 1.2rem;">
    <div class="product-image">
   
      <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail(); ?>
      <?php endif; ?>
    </div>
  
    <div class="w-full" style="padding: 1.2rem;">
      <h2 class="text-[1.375rem] font-bold text-gray-900 uppercase">{!! $title !!}</h2>

      <?php

// Check rows existexists.
if( have_rows('product_list_items') ): ?>
<ul class="product-detail-list">
   <?php
    while( have_rows('product_list_items') ) : the_row();
?>
       <li>
        <?php
        $list_item_content = get_sub_field('product_list_item');
        echo $list_item_content;
       ?>
       </li>
       <?php

  
    endwhile;

?></ul>
<?php
endif;
?>



      <a class="product-link" href="{{ get_permalink() }}">View Product Page</a>
    </div>

  </article>
  
