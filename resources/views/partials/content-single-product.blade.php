<?php 
 $product_name = get_the_title();
 $product_slug = sanitize_title($product_name);
?>

<div class="flex flex-wrap scroll-mt-20"> 
  <div class="md:p-10 md:pt-10 bg-white md:w-1/3 px-5 text-center <?php if (get_row_index() != 1 ) : ?>md:border-t-[11px] md:border-[#DBDBDB]<?php endif; ?>">
         
          <?php
      // Give the Post Thumbnail a class "alignleft".
      echo get_the_post_thumbnail( get_the_ID(), 'medium', array( 'class' => 'alignleft' ) );
      ?>
        <?php
      $image = get_the_post_thumbnail( 'medium_large' ); 
      $size = 'full'; // (thumbnail, medium, large, full or custom size)
      if( $image ) {
          echo wp_get_attachment_image( $image, $size );
      }
      ?>
        
         <div class="pr-5 text-base leading-6 text-gray-600 md:text-lg cb md:max-w-3xl md:pr-0 sidebar-button-group">
          <?php $link = get_field('capacity_chart_button');
          if( $link ):
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
<a class="button bg-[#BFC1C3] py-2 px-5 mt-5 inline-block text-white uppercase font-bold"
href="<?php echo esc_url( $link_url ); ?>"
target="<?php echo esc_attr( $link_target ); ?>" style="color: white; text-decoration: none;">Capacity Chart</a>
<?php endif; ?>

          <?php
          $form = get_field('product_brochure_form');
        if( $form ): ?>
        <div class="modal-content-group-brochure">
          <button class="bg-[#BFC1C3] button py-2 px-5 mt-5 inline-block text-white uppercase font-bold button-style-link"
            id="modal-control-brochure">Download Brochure</button>
            <div id="modal-content-brochure"  class="fixed top-0 bottom-0 left-0 right-0 z-50 hidden pt-24 bg-black modal bg-opacity-70">
              <div class="relative max-w-[510px] mx-auto bg-white w-full border-[3px] border-coral rounded-md p-8 pt-10">
                <span class="modal-close-brochure absolute top-[20px] right-[20px]"><svg width="20"
                  height="20"
                  xmlns="http://www.w3.org/2000/svg">
                 <path d="m17.411 0-7.399 7.399L2.589 0 0 2.589l7.424 7.399L0 17.411 2.589 20l7.423-7.424L17.411 20 20 17.411l-7.399-7.423L20 2.589z"
                       fill="#000"
                       fill-rule="nonzero" />
             </svg></span>
             <?php gravity_form( $form['id'], true, true, false, '', true, 1 ); ?>
             <div
                  class="w-[30px] h-[30px] border-l-[3px] border-b-[3px] border-blue-500 rotate-45 transform rounded-b-md rounded-l-md absolute bottom-0 top-[100px] left-[-18px] bg-white">
             </div>
              </div>

            </div>

        </div>
        
        <?php endif; ?>

         

 </div>
</div>

<div class="pl-10 md:pl-20 md:w-2/3 pb-10">
  <h2
  class="text-purple text-2xl md:text-[2.375rem] uppercase font-semibold mb-4 pl-5 md:pl-10 border-l-4 border-coral pt-3">
  <?php echo $product_name ?></h2>
  <div class="pr-5 text-base leading-6 text-gray-600 md:text-lg cb md:max-w-3xl md:pr-0">
    <?php the_content(); ?>

    <?php 
     $section_heading = get_field('section_heading'); 
    ?>
    <div class="hidden bg-white md:block"></div>
  </div>
</div>
    <?php if ($section_heading) : ?>
        <h2
            class="text-purple text-2xl md:text-[2.375rem] uppercase font-semibold mb-4 pl-5 md:pl-10 border-l-4 border-coral pt-3 w-full block">
            <?php echo $section_heading ?></h2>  
    <?php endif; ?>
    <div class="hidden bg-white md:block"></div>
    <?php

    if( have_rows('single_product_flexible_content') ):
    
        while ( have_rows('single_product_flexible_content') ) : the_row();
    ?>
    <?php if( get_row_layout() == 'text' ): ?>
   <div class="p-10 py-10 text-lg leading-6 text-gray-600 w-full block">
        <?php the_sub_field('text'); ?>
  </div>
    <?php elseif( get_row_layout() == 'flex_section_heading' ): ?>
   <div class="hidden bg-white md:block"></div>
   <h2
   class="text-purple text-2xl md:text-[2.375rem] uppercase font-semibold mb-4 pl-5 md:pl-10 border-l-4 border-coral pt-3 w-full block">
            <?php the_sub_field('section_heading'); ?></h2>
    
    <?php elseif( get_row_layout() == 'image' ):
                    $image = get_sub_field('image');
                    $alignment = get_sub_field('image_alignment');
                    $size = 'full';
                    ?>
    <figure>
      <div class="max-w-5xl pt-3 mb-5">
        <?php if( $image && $alignment == "right" ) : ?>
       
            <?php echo wp_get_attachment_image( $image, $size, "", array( "class" => "lg:w-[400px] lg:float-right lg:pl-5 mb-5 mt-10 px-10" ) ); ?>
      </div>
        <?php else : ?>
        <?php echo wp_get_attachment_image( $image, $size ); ?>
        
    </figure>
    <?php endif; ?>
    <?php elseif( get_row_layout() == 'video_embed' ): ?>
<div class="aspect-w-16 aspect-h-9 w-full">
        <?php the_sub_field('video_embed'); ?>
</div>    
    <?php elseif( get_row_layout() == 'button' ): ?>
    <?php
                    $link = get_sub_field('button');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
    <a class="button bg-[#BFC1C3] py-2 px-5 mt-5 inline-block text-white uppercase font-bold"
       href="<?php echo esc_url( $link_url ); ?>"
       target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
  
</div>

</div>

</div>
<?php endif; ?>
<?php endif; ?>
<?php 
  
    endwhile; ?> <?php
   
endif;?>
