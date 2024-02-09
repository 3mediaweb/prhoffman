{{--
  Template Name: Product Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())

<?php $url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
<?php if( have_rows('product_series') ): ?>
  <?php while( have_rows('product_series') ): the_row();
  
    $series_name = get_sub_field('product_series_name');
    $series_slug = sanitize_title($series_name);
    $series_overview = get_sub_field('product_series_overview');
    $series_detail_heading = get_sub_field('product_series_detail_heading');
    $series_detail_1 = get_sub_field('product_series_detail_column_1');
    $series_detail_2 = get_sub_field('product_series_detail_column_2');
    $series_detail_image = get_sub_field('product_series_detail_image');
  ?>
  <?php $bg = get_sub_field('product_series_hero_image'); ?>

  <?php if (get_row_index() == 1 ) : ?>
  <section class="bg-center bg-cover h-[300px] md:h-[500px]" <?php if ($bg) : ?>style="background-image: url(<?php echo $bg; ?>);"<?php endif; ?>>
    <div class="h-full bg-gradient-to-b from-black">
      <div class="h-full bg-no-repeat bg-contain">
        <div class="px-5 <?php if (get_row_index() == 1 ) : ?>pt-32<?php else : ?>py-16<?php endif; ?> mx-auto max-w-7xl">
          <h1 class="text-white font-semibold uppercase text-[2.375rem] text-shadow border-l-4 border-coral pl-5 leading-tight"><?php echo $series_name; ?></h1>
        </div>
        <?php if (get_row_index() == 1 ) : ?>
        <div class="px-5 mx-auto mt-10 max-w-7xl">
          <a href="#servo-rs-series" class="text-white font-semibold uppercase text-[2.375rem] text-shadow border-l-4 border-coral pl-5 leading-tight">Servo RS Series</a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php if (get_row_index() != 1 ) : ?>
  <section class="bg-center bg-cover h-[300px] md:h-[500px] scroll-mt-20" <?php if ($bg) : ?>style="background-image: url(<?php echo $bg; ?>);"<?php endif; ?> id="<?php echo $series_slug; ?>">
    <div class="h-full bg-gradient-to-b from-black">
      <div class="h-full bg-no-repeat bg-contain">
        <div class="px-5 <?php if (get_row_index() == 1 ) : ?>pt-32<?php else : ?>py-16<?php endif; ?> mx-auto max-w-7xl">
          <h1 class="text-white font-semibold uppercase text-[2.375rem] text-shadow border-l-4 border-coral pl-5 leading-tight"><?php echo $series_name; ?></h1>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php $bg = get_sub_field('product_series_detail_image'); ?>
  <section class="relative text-[#ADDDEC] bg-purple text-base md:text-[1.375rem] leading-relaxed md:leading-8">
    <div class="absolute top-0 right-0 z-10 w-3/5 h-full bg-cover" <?php if ($bg) : ?>style="background-position: 0 0; background-image: url(<?php echo $bg; ?>);"<?php endif; ?>>
    </div>
    <div class="hidden md:block absolute bottom-0 right-0 h-[48px] bg-black w-1/3"></div>
    <div class="flex px-5 mx-auto max-w-7xl">
      <div class="flex flex-col w-1/3 pr-5 md:pr-10 pt-11 md:pt-4">
        <?php if( have_rows('individual_product') ): ?>
          <?php while( have_rows('individual_product') ): the_row();
            $product_name = get_sub_field('product_name');
            $product_slug = sanitize_title($product_name);
          ?>
            <button class="product-nav text-left text-base md:text-[1.3125rem] mb-5"
            _="
              on click remove .hidden from #series-<?php echo $series_slug; ?>
              on click toggle .hidden on #<?php echo $series_slug; ?>-open
              on click toggle .hidden on #<?php echo $series_slug; ?>-close
              wait 5ms then go to #<?php echo $series_slug; ?>-product-<?php the_row_index(); ?> smoothly
            "
            >
              <?php echo $product_name; ?>
            </button>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>

      <div class="flex flex-col w-2/3 pt-12 pl-5 bg-right-bottom md:pl-0">
        <div class="mb-20 cb md:max-w-2xl">
          <?php echo $series_overview; ?>
        </div>
        <div class="flex items-end flex-1">
          <button class="bg-black text-white text-base leading-[32px] md:text-[1.3125rem] uppercase flex w-full items-center px-5 py-2 z-20"
            _="
              on click toggle .hidden on #series-<?php echo $series_slug; ?>
              on click toggle .hidden on #<?php echo $series_slug; ?>-open
              on click toggle .hidden on #<?php echo $series_slug; ?>-close
            "
          >
            <span id="<?php echo $series_slug; ?>-open" class="<?php if( strpos( $url, "?$series_slug" ) ) : ?>hidden<?php endif; ?> mr-4">&plus;</span>
            <span id="<?php echo $series_slug; ?>-close" class="<?php if( strpos( $url, "?$series_slug" ) === false ) : ?>hidden<?php endif; ?> mr-4">&mdash;</span>
            <span>View <?php echo $series_name; ?></span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <?php if( have_rows('individual_product') ): ?>
  <section id="series-<?php echo $series_slug; ?>" <?php if( strpos( $url, "?$series_slug" ) === false ) : ?>class="hidden"<?php endif; ?>>
    <?php if ( $series_detail_1 ) : ?>
    <div class="flex flex-wrap">
      <?php $bg = $series_detail_image; ?>
      <div class="bg-center bg-cover md:w-1/3 bg-[#AAA29F] bg-opacity-20" <?php if ($bg) : ?>style="background-image: url(<?php echo $bg; ?>);"<?php endif; ?>>
      </div>
      <div class="md:w-2/3 bg-[#AAA29F] bg-opacity-10">
        <div class="grid grid-cols-1 text-lg leading-6 md:gap-5 md:grid-cols-2 cb md:max-w-4xl">
          <div class="pt-10 pl-10 pr-5 text-gray-600 md:pl-20">
            <h2 class="mb-5 font-bold uppercase"><?php echo $series_detail_heading; ?></h2>
            <?php echo $series_detail_1; ?>
          </div>
          <div class="pl-10 pr-5 text-gray-600 md:pt-10 md:pl-20">
            <?php echo $series_detail_2; ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php while( have_rows('individual_product') ): the_row();?>
      <div class="flex flex-wrap scroll-mt-20" id="<?php echo $series_slug; ?>-product-<?php the_row_index(); ?>">
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
            <button class="flex items-center w-full px-5 py-2 text-base font-bold text-white uppercase md:text-lg bg-coral"
              _="
                on click toggle .hidden on #heading-<?php echo $product_slug; ?>-<?php echo $heading_slug; ?>
                on click toggle .info-open on #icon-<?php echo $product_slug; ?>-<?php echo $heading_slug; ?>
              "
            >
              <span class="mr-4" id="icon-<?php echo $product_slug; ?>-<?php echo $heading_slug; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="22.46" height="22.066"><g id="Group_50" data-name="Group 50" transform="translate(-676.199 -1702.04)" fill="none" stroke="#fff" stroke-width="1"><path id="Line_17" data-name="Line 17" transform="rotate(90 -505.224 1203.383)" d="M0 0h15"/><g id="Group_49" data-name="Group 49"><path id="Line_18" data-name="Line 18" transform="rotate(90 -512.474 1211.133)" d="M0 0v17"/><path id="Line_19" data-name="Line 19" transform="rotate(45 -1716.694 1667.868)" d="M0 0h30"/></g></g></svg></span>
              <span><?php echo $heading; ?></span>
            </button>
            <?php if( have_rows('content') ): ?>
            <div id="heading-<?php echo $product_slug; ?>-<?php echo $heading_slug; ?>" class="hidden">
              <?php while( have_rows('content') ): the_row(); ?>
                <?php if( get_row_layout() == 'text' ): ?>
                <div class="p-10 py-10 text-lg leading-6 text-gray-600 cb md:pl-20 md:max-w-3xl">
                  <?php the_sub_field('text'); ?>
                </div>
                <?php elseif( get_row_layout() == 'image' ):
                  $image = get_sub_field('image');
                  $alignment = get_sub_field('image_alignment');
                  $size = 'full';
                  ?>
                  <figure>
                  <?php if( $image && $alignment == "right" ) : ?>
                  <div class="max-w-5xl">
                    <?php echo wp_get_attachment_image( $image, $size, "", array( "class" => "lg:w-[400px] lg:float-right lg:pl-5 mb-5 mt-10 px-10" ) ); ?>
                  </div>
                  <?php else : ?>
                    <?php echo wp_get_attachment_image( $image, $size ); ?>
                  <?php endif; ?>
                  </figure>
                <?php elseif( get_row_layout() == 'video_embed' ): ?>
                  <div class="aspect-w-16 aspect-h-9 w-full">
                    <?php the_sub_field('video_embed'); ?>
                  </div>

                  <?php elseif( get_row_layout() == 'button' ): ?>
                  <?php
                  $link = get_field('button');
                  if( $link ):
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self';
                      ?>
                      <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endwhile; ?>
              </div>
            <?php endif; ?>
          </div>
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
