{{--
  Template Name: Company Template
--}}

@extends('layouts.app')

@include('partials.page-header')

@section('content')
  @while(have_posts()) @php(the_post())


  <?php if( have_rows('company_overview_content') ): ?>
    <?php while( have_rows('company_overview_content') ): the_row(); ?>
      <?php if( get_row_layout() == 'text_image' ): ?>
        <div class="grid grid-cols-1 lg:grid-cols-2">
          <?php $bg = get_sub_field('company_ti_image'); ?>
          <div class="h-[300px] lg:h-auto bg-center bg-cover <?php if ( get_sub_field('company_ti_image_alignment') == 'right' ) : ?> lg:order-2<?php endif; ?>" style="background-image: url('<?php echo $bg; ?>')"></div>
          <div class="bg-[#AAA29F] bg-opacity-10 p-5 md:p-14 cb">
            <div class="text-gray-600 md:max-w-2xl"><?php the_sub_field('company_ti_text'); ?></div>
            <?php
            $link = get_sub_field('company_ti_featured_link');
            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="bg-[#BFC1C3] button py-2 px-5 mt-5 inline-block text-white uppercase font-bold" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
          </div>
        </div>

        <?php elseif( get_row_layout() == 'logos_image' ): ?>
          <div class="grid grid-cols-1 md:grid-cols-2">
          <?php $bg = get_sub_field('company_logos_image'); ?>
          <div class="h-[300px] md:h-auto bg-center bg-cover <?php if ( get_sub_field('company_logos_image_alignment') == 'right' ) : ?> md:order-2<?php endif; ?>" style="background-image: url('<?php echo $bg; ?>')"></div>
          <div class="p-14">
            <?php
            $images = get_sub_field('company_logos_logos');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if( $images ): ?>
                <div class="grid items-center grid-cols-2 gap-10">
                  <?php foreach( $images as $image_id ): ?>
                  <?php if ( get_field('media_image_link', $image_id) ) : ?>
                  <a href="<?php the_field('media_image_link', $image_id); ?>">
                  <?php endif; ?>
                    <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                  <?php if ( get_field('media_image_link', $image_id) ) : ?>
                  </a>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </div>
            <?php endif; ?>
          </div>
        </div>

        <?php elseif( get_row_layout() == 'buttons_image' ): ?>
        <div class="grid grid-cols-1 md:grid-cols-2">
          <?php $bg = get_sub_field('company_bi_image'); ?>
          <div class="h-[300px] md:h-auto bg-center bg-cover <?php if ( get_sub_field('company_bi_image_alignment') == 'right' ) : ?> md:order-2<?php endif; ?>" style="background-image: url('<?php echo $bg; ?>')"></div>
          <div class="p-14">
            <?php if( have_rows('buttons') ): ?>
                <?php while( have_rows('buttons') ): the_row();
                    $link = get_sub_field('button');
                    if( $link ):
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self';
                      ?>
                      <a class="block max-w-lg py-2 pl-5 pr-10 m-auto mt-5 text-sm font-bold text-center text-white uppercase button bg-coral" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                  <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="text-gray-600 md:max-w-2xl"><?php the_sub_field('company_ti_text'); ?></div>
            <?php
            $link = get_sub_field('company_ti_featured_link');
            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="bg-[#BFC1C3] py-2 pl-5 pr-10 mt-5 inline-block text-white uppercase font-bold" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
          </div>
        </div>

      <?php elseif( get_row_layout() == 'text_w_blue_background' ): ?>
        <?php $bg = get_sub_field('company_tb_background_image'); ?>
        <div class="flex text-[#ADDDEC] bg-purple md:justify-center py-10 md:py-20 relative">
          <div class="absolute top-0 right-0 z-10 w-3/5 h-full bg-cover" <?php if ($bg) : ?>style="background-position: 0 0; background-image: url(<?php echo $bg; ?>);"<?php endif; ?>></div>
          <div class="px-5 md:max-w-4xl text-[1.375rem]">
            <?php if ( get_sub_field('company_tb_heading') ) : ?><h2 class="mb-5 text-3xl font-semibold"><?php the_sub_field('company_tb_heading'); ?></h2><?php endif; ?>
            <div class="cb">
              <?php the_sub_field('company_tb_text'); ?>
            </div>
            <div class="relative z-30 grid max-w-2xl grid-cols-2 mt-10 gap-x-2">
              <?php
                $link = get_sub_field('company_tb_button_1');
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="inline-flex items-center justify-center px-5 py-3 leading-tight text-center text-sm uppercase border font-semibold border-white hover:border-coral transform duration-300 hover:bg-coral hover:bg-opacity-50 hover:text-[#253f8f] max-w-[200px]" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
                <?php endif; ?>

                <?php
                $link = get_sub_field('company_tb_button_2');
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="inline-flex px-5 items-center justify-center text-center leading-tight py-1 text-sm uppercase border font-semibold hover:bg-blue-800 border-transparent transform duration-300 bg-coral hover:text-blue-400  max-w-[200px]" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
                <?php endif; ?>
              </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php endif; ?>


  @endwhile
@endsection
