{{--
  Template Name: Main Product Template
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())
@include('partials.product-header')
<?php if( have_rows('product_page_content') ): ?>
<?php while( have_rows('product_page_content') ): the_row(); ?>
<?php if( get_row_layout() == 'main_product_grid' ): ?>
<div class="w-full py-20">
            <div class="z-10 px-5q m-auto max-w-7xl">
                <?php
                if( have_rows('product_grid_block') ): ?>
                <div class="mx-auto max-w-7xl  product-main-grid"><?php
                    while( have_rows('product_grid_block') ) : the_row();
                        $product_name = get_sub_field('product_name');
                        $product_image = get_sub_field('product_image');
                        $image_url = $product_image['url'];
                        $image_alt = $product_image['alt'];
                        $product_link = get_sub_field('product_link');
                        $product_intro = get_sub_field('product_intro');
                        $product_description = get_sub_field ('product_description');
                        $product_link_text = get_sub_field('product_link_text');

                        ?>
                        <div class="product-wrapper flex flex-col justify-center bg-white mb-20 " style="height: 100%; justify-content: space-between; ">
                            
            <div class="product-content flex flex-col justify-center text-center p-4">
                <figure class="product-image" ><img class="rounded-full aspect-w-square aspect-h-square" style="width: 300px; height: 300px; aspect-ratio: 1;" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" /></figure>
                <h2 class="text-purple pt-20 text-1xl md:text-[1.375rem] uppercase font-semibold  w-full block"><a href="<?php echo esc_attr($product_link); ?>">
                <?php echo esc_attr($product_name); ?></a></h2>
                <p><b><?php echo esc_attr($product_intro); ?></b></p>
                <p><?php echo esc_attr($product_description); ?></p>
               
            </div>
            <a class="button bg-[#BFC1C3] py-2 px-5 mt-5 inline-block text-white uppercase font-bold" href="<?php echo esc_attr($product_link); ?>"><?php echo($product_link_text); ?></a>
            </div>
                    <?php 
                    endwhile;
                    ?></div><?php
                endif;?>
            </div>
</div><!--end grid -->
<?php elseif( get_row_layout() == 'section_heading' ): ?>
<div class="min-h-[200px] py-6">
        <div class=" w-full ">
            <div class="relative z-10 pt-20 pb-20 px-5 m-auto max-w-7xl">
                <h2
                class="text-purple text-2xl md:text-[2.375rem] uppercase font-semibold mb-4 pl-5 md:pl-10 border-l-4 border-coral pt-3 w-full block">
                         <?php the_sub_field('section_heading'); ?></h2>
            </div>
        </div>
 
</div><!--end section heading -->

<?php elseif( get_row_layout() == 'image_block' ): ?>

    <div class="flex flex-col justify-center w-full text-center">
        
       
        
              <?php  $image = get_sub_field('image');
            
              $size = 'full';
              ?>
<figure class="text-center">

  <?php echo wp_get_attachment_image( $image, $size, "", array("style" => "width: 100%") ); ?>
 
</figure>
</div><!--end image block-->

<?php elseif( get_row_layout() == 'single_button_cta' ): ?>
<div class="relative">
    <div class="py-20 relative">
        <div class=" w-full ">
       
          
            <div class="relative z-10 px-5 m-auto max-w-7xl">
                <?php $link = get_sub_field('cta_button_single');
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
<a class="button bg-[#BFC1C3] py-2 px-5 mt-5 inline-block text-white uppercase font-bold"
   href="<?php echo esc_url( $link_url ); ?>"
   target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
   <?php endif; ?>
            </div>
        </div>
    </div>
</div><!--end single button cta-->


<?php elseif( get_row_layout() == 'text_image_cta' ): ?>
<div class="grid grid-cols-1 md:grid-cols-2">
    <div class="flex flex-wrap">
        <div
             class="w-full lg:w-1/2 py-10 px-5 text-lg md:text-[1.375rem] leading-loose text-gray-600 flex justify-end pr-10 pl-5">
            <div class="lg:max-w-[325px]"><?php the_sub_field('tic_intro_text'); ?></div>
        </div>
        <div class="w-full text-white bg-center md:bg-right bg-no-repeat <?php if ( get_sub_field('tic_image_cover') ) : ?>bg-cover <? else : ?>bg-contain <?php endif; ?> lg:w-1/2 h-[300px] lg:h-auto"
             style="background-image: url('<?php the_sub_field('tic_image'); ?>');"></div>
    </div>
    <div class="flex flex-col justify-center px-5 py-5 text-white md:py-0 lg:px-32 bg-coral">
        <div class="max-w-[535px]">
            <div class="mb-16 text-xl uppercase md:text-3xl">
                <?php the_sub_field('tic_cta_text'); ?>
            </div>
            <?php
              $link = get_sub_field('tic_cta_link');
              if( $link ):
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
            <a class="flex text-sm uppercase"
               href="<?php echo esc_url( $link_url ); ?>"
               target="<?php echo esc_attr( $link_target ); ?>">
                <div class="mr-2">
                    <?php echo esc_html( $link_title ); ?>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         width="120.93"
                         height="15.937">
                        <path data-name="Path 3"
                              d="M0 15.437h119l-27-15"
                              fill="none"
                              stroke="#fff" />
                    </svg>
                </div>
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- end text/image with cta -->

<?php elseif( get_row_layout() == 'text_image_lr' ): ?>

<div class="grid grid-cols-1 lg:grid-cols-2">
    <?php $bg = get_sub_field('product_ti_image'); ?>
    <div class="h-[300px] lg:h-auto bg-center bg-cover <?php if ( get_sub_field('product_ti_image_align') == 'right' ) : ?> lg:order-2<?php endif; ?>" style="background-image: url('<?php echo $bg; ?>')"></div>
    <div class="bg-[#AAA29F] bg-opacity-10 p-5 md:p-14 cb">
      <div class="text-gray-600 md:max-w-2xl"><?php the_sub_field('product_ti_text'); ?></div>
      <?php
      $link = get_sub_field('product_ti_featured_link');
      if( $link ):
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
          ?>
          <a class="bg-[#BFC1C3] button py-2 px-5 mt-5 inline-block text-white uppercase font-bold" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
      <?php endif; ?>
    </div>
  </div>

<?php elseif( get_row_layout() == 'simple_wysiwyg' ): ?>
<div class="grid grid-cols-1 md:grid-cols-1">
  <div class="flex flex-wrap">

    <div class="w-full text-white bg-center md:bg-right bg-no-repeat <?php if ( get_sub_field('wysiwyg_background_image') ) : ?>bg-cover <? else : ?>bg-contain <?php endif; ?> "
        style="<?php if (get_sub_field('background_overlay')) : echo('background-color: grey; background-blend-mode: multiply;'); endif; ?> <?php if (get_sub_field('wysiwyg_background_image') ) : ?>background-image: url('<?php the_sub_field('wysiwyg_background_image'); ?>'); <?php endif; ?><?php if (get_sub_field('wysiwyg_background_color') ) : ?>background-color:<?php the_sub_field('wysiwyg_background_color'); endif; ?>;">
        <div class="relative  px-5 m-auto overflow-hidden max-w-7xl will-change-transform">


      <div class="relative md:pr-44 md:pl-28">
                 
                  <div class="text-xl md:text-[1.375rem] mb-10" style="padding: 3rem 0 0 0; <?php if (get_sub_field('wysiwyg_text_color')) : ?>color: <?php echo the_sub_field('wysiwyg_text_color'); endif; ?>">
            <?php the_sub_field('simple_wysisyg_content'); ?>
       
        </div>
   

    </div>
  </div>
        
      </div>
  </div>
</div>
<!-- end my stuff -->
<?php  endif; ?>
<?php endwhile; ?>
<?php endif; ?>
@endwhile
@endsection