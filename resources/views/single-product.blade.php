{{--
  Template Name: Single Product Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())

<?php $url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
<?php if( have_rows('product_series') ): ?>
  <?php while( have_rows('product_series') ): the_row();
  
    $product_name = get_field('product_name');
    $product_slug = sanitize_title($product_name);

    $product_overview = get_field('product_overview');
   
   
 
   
  ?>
  <?php $bg = get_sub_field('product_series_hero_image'); ?>

  <?php if (get_row_index() == 1 ) : ?>
  <section class="bg-center bg-cover h-[300px] md:h-[500px]" <?php if ($bg) : ?>style="background-image: url(<?php echo $bg; ?>);"<?php endif; ?>>
    <div class="h-full bg-gradient-to-b from-black">
      <div class="h-full bg-no-repeat bg-contain" style="background-image: url(@asset('assets/images/product-hero-lineart.png')); background-size: 454px 338px;">
        <div class="px-5 <?php if (get_row_index() == 1 ) : ?>pt-32<?php else : ?>py-16<?php endif; ?> mx-auto max-w-7xl">
          <h1 class="text-white font-semibold uppercase text-[2.375rem] text-shadow border-l-4 border-coral pl-5 leading-tight"><?php echo $product_name; ?></h1>
        </div>
        
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php if (get_row_index() != 1 ) : ?>
  <section class="bg-center bg-cover h-[300px] md:h-[500px] scroll-mt-20" <?php if ($bg) : ?>style="background-image: url(<?php echo $bg; ?>);"<?php endif; ?> id="<?php echo $product_slug; ?>">
    <div class="h-full bg-gradient-to-b from-black">
      <div class="h-full bg-no-repeat bg-contain" style="background-image: url(@asset('assets/images/product-hero-lineart.png')); background-size: 454px 338px;">
        <div class="px-5 <?php if (get_row_index() == 1 ) : ?>pt-32<?php else : ?>py-16<?php endif; ?> mx-auto max-w-7xl">
          <h1 class="text-white font-semibold uppercase text-[2.375rem] text-shadow border-l-4 border-coral pl-5 leading-tight"><?php echo $product_name; ?></h1>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php $bg = get_sub_field('product_series_detail_image'); ?>
  <section class="relative text-[#ADDDEC] bg-purple text-base md:text-[1.375rem] leading-relaxed md:leading-8">
    <div class="absolute top-0 right-0 z-10 w-3/5 h-full bg-cover" <?php if ($bg) : ?>style="background-position: 0 0; background-image: url(<?php echo $bg; ?>);"<?php endif; ?>>
    </div>
   
   
  </section>

  <?php if( have_rows('individual_product') ): ?>
  <section id="series-<?php echo $product_slug; ?>" <?php if( strpos( $url, "?$product_slug" ) === false ) : ?><?php endif; ?>>
   
    <?php while( have_rows('individual_product') ): the_row();?>
      <div class="flex flex-wrap scroll-mt-20" id="<?php echo $product_slug; ?>-product-<?php the_row_index(); ?>">
        <div class="md:p-10 md:pt-10 bg-white md:w-1/3 px-5 text-center <?php if (get_row_index() != 1 ) : ?>md:border-t-[11px] md:border-[#DBDBDB]<?php endif; ?>">
        <?php
          $product_name = get_sub_field('product_name');
          $product_slug = sanitize_title($product_name);
          $image = get_sub_field('product_feature_image');
          $size = 'full'; // (thumbnail, medium, large, full or custom size)
          if( $image ) {
              echo wp_get_attachment_image( $image, $size );
          }
        ?>
        </div>
        <div class="pl-10 md:pl-20 md:w-2/3 border-t-[22px] border-coral pb-10">
          <h2 class="text-purple text-2xl md:text-[2.375rem] uppercase font-semibold mb-4 pl-5 md:pl-10 border-l-4 border-coral pt-3"><?php the_sub_field('product_name'); ?></h2>
          <div class="pr-5 text-base leading-6 text-gray-600 md:text-lg cb md:max-w-3xl md:pr-0">
            <?php the_sub_field('product_overview'); ?>
            <?php
              $form = get_sub_field('product_brochure_form');
            if( $form ): ?>
                <button _="
                on click
                  wait 0.1s then send open to #form<?php echo $product_slug; ?>
                "
                class="bg-[#BFC1C3] button py-2 px-5 mt-5 inline-block text-white uppercase font-bold">Download Brochure</button>
            <?php endif; ?>
          </div>
        </div>
        <div id="form<?php echo $product_slug; ?>" class="fixed top-0 bottom-0 left-0 right-0 z-50 hidden pt-24 bg-black modal bg-opacity-70"
        _="on open
            remove .hidden
          on close or keyup[key is 'Escape'] from <body/>
            trigger hidden
            wait 0.1s then add .hidden
          end
        "
      >
        <div class="relative max-w-[510px] mx-auto bg-white w-full border-[3px] border-coral rounded-md p-8 pt-10">
          <button class="absolute top-[20px] right-[20px]" _="on click send close to #form<?php echo $product_slug; ?>">
            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"><path d="m17.411 0-7.399 7.399L2.589 0 0 2.589l7.424 7.399L0 17.411 2.589 20l7.423-7.424L17.411 20 20 17.411l-7.399-7.423L20 2.589z" fill="#000" fill-rule="nonzero"/></svg>
          </button>
          <?php gravity_form( $form['id'], true, true, false, '', true, 1 ); ?>
          <div class="hidden w-[30px] h-[30px] border-l-[3px] border-b-[3px] border-blue-500 rotate-45 transform rounded-b-md rounded-l-md absolute bottom-0 top-[100px] left-[-18px] bg-white"></div>
        </div>
      </div>
      </div>
      <?php if( have_rows('product_info_section') ): ?>
        <?php while( have_rows('product_info_section') ): the_row();
          $heading = get_sub_field('section_heading');
          $heading_slug = sanitize_title($heading);
        ?>
        <div class="flex flex-wrap mb-10">
          <div class="hidden bg-white md:block md:w-1/3"></div>
          <div class="w-full md:w-2/3">

        </div>
        <?php endwhile; ?>
      <?php endif; ?>
    <?php endwhile; ?>
  </section>
  <?php endif; ?>


  <?php endwhile; ?>
<?php endif; ?>

  @endwhile
@endsection
