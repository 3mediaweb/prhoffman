{{--
  Template Name: Contact Template
--}}

@extends('layouts.app')

@include('partials.page-header')
<div class="border-purple border-b-[45px] md:border-b-[92px] w-full"></div>

@section('content')
  @while(have_posts()) @php(the_post())

  <div class="grid grid-cols-1 md:grid-cols-2 cb">
    <div class="text-gray-900">
      <div class="grid w-full grid-cols-1 gap-20 lg:grid-cols-2 justify-self-end max-w-[900px] mr-0 ml-auto py-20 pr-20 pl-5">
        <div>
          <h2 class="px-3 py-1 bg-[#BFC1C3] uppercase text-lg font-bold text-white">Contact Info</h2>
          <?php the_field('contact_general_contact_info'); ?>
        </div>
        <div>
          <h2 class="px-3 py-1 bg-[#BFC1C3] uppercase text-lg font-bold text-white">Sales Team</h2>
          <?php the_field('contact_sales_team'); ?>
        </div>
      </div>
    </div>
    <div class="p-20 text-white bg-no-repeat md:pl-48 bg-coral" style="background-image: url(@asset('assets/images/product-hero-lineart.png')); background-size: 375px 284px; background-position: -75px 0">
      <div class="max-w-2xl text-3xl font-semibold">
        <?php the_field('contact_general_contact_text'); ?>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 cb">
    <div class="text-gray-900 bg-[#AAA29F] bg-opacity-[15%] scroll-mt-20" id="reps">
      <div class="py-3 text-lg font-bold text-white uppercase bg-coral">
        <div class="w-full max-w-[900px] mr-0 ml-auto flex justify-self-end pl-5">Representatives</div>
      </div>
      <div class="grid w-full grid-cols-1 gap-20 lg:grid-cols-2 justify-self-end max-w-[900px] mr-0 ml-auto py-20 pr-20 pl-5">
        <div>
          <h2 class="px-3 py-1 bg-[#BFC1C3] uppercase text-lg font-bold text-white">United States</h2>
          <div class="mb-10"><?php the_field('united_states_reps'); ?></div>

          <h2 class="px-3 py-1 bg-[#BFC1C3] uppercase text-lg font-bold text-white">Japan</h2>
          <div class="mb-10"><?php the_field('japan_reps'); ?></div>

          <h2 class="px-3 py-1 bg-[#BFC1C3] uppercase text-lg font-bold text-white">Malaysia</h2>
          <?php the_field('malaysia_reps'); ?>
        </div>
        <div>
          <h2 class="px-3 py-1 bg-[#BFC1C3] uppercase text-lg font-bold text-white">China</h2>
          <div class="mb-10"><?php the_field('china_reps'); ?></div>

          <h2 class="px-3 py-1 bg-[#BFC1C3] uppercase text-lg font-bold text-white">Europe</h2>
          <?php the_field('europe_reps'); ?>

          <div class="border-t-[7px] border-coral pt-2 mt-10">
            <?php the_field('rep_assistance_text'); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="p-10 custom-form scroll-mt-20" id="form">
      <div class="mb-10 text-coral">* indicates a required field We respect your privacy and will never give your information away</div>
      <?php gravity_form( 1, false, false, false, '', true ); ?>
    </div>
  </div>


  <div class="grid grid-cols-1 md:grid-cols-2">
    <div class="p-20 text-3xl font-semibold text-white bg-no-repeat md:pl-48 bg-coral" style="background-image: url(@asset('assets/images/product-hero-lineart.png')); background-size: 375px 284px; background-position: -75px 0">
      <h2 class="uppercase"><?php the_field('careers_heading'); ?></h2>
      <span class="inline-block w-10 h-[4px] bg-white mb-5"></span>
      <div class="mt-5"><?php the_field('contact_careers_text'); ?></div>
    </div>
    <?php $bg = get_field('careers_image'); ?>
    <div class="p-20 text-white bg-center bg-cover" <?php if ($bg) : ?>style="background-image: url(<?php echo $bg; ?>);"<?php endif; ?>></div>
  </div>


  <div class="grid grid-cols-1 text-gray-600 md:grid-cols-2 cb scroll-mt-20" id="careers">
    <div class="flex">
      <div class="w-1/2 py-10 px-5 text-lg md:text-[1.375rem] leading-loose items-end pr-10 bg-[#AAA29F] bg-opacity-[15%]">
        <div class="flex flex-col w-full max-w-[350px] mr-0 ml-auto">
          <h2><?php the_field('contact_values_heading'); ?></h2>
          <span class="inline-block w-10 h-[4px] bg-coral mb-5"></span>
          <?php the_field('contact_values_text'); ?>
        </div>
      </div>
      <div class="w-1/2 p-5 md:pr-20 md:py-10 md:pl-10">
        <h2 class="px-3 py-1 bg-[#BFC1C3] uppercase text-lg font-bold text-white">Benefits</h2>
        <div class="mb-10"><?php the_field('benefits'); ?></div>

        <h2 class="px-3 py-1 bg-[#BFC1C3] uppercase text-lg font-bold text-white">How to Apply?</h2>
        <?php the_field('how_to_apply'); ?>

        <?php
        $link = get_field('careers_button');
        if( $link ):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="inline-flex max-w-lg px-10 py-2 m-auto mt-5 text-sm font-bold text-center text-white uppercase duration-300 button bg-coral hover:text-blue-400 hover:bg-blue-800 tranform" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
        <?php endif; ?>
      </div>
    </div>
    <div class="flex flex-col justify-center px-5 py-5 text-white md:py-0 md:px-32 bg-[#AAA29F] bg-opacity-[15%]">
      <div class="max-w-[535px]">
      <?php if( have_rows('contact_buttons') ): ?>
        <?php while( have_rows('contact_buttons') ): the_row();
            $link = get_sub_field('contact_button');
            if( $link ):
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
              <a class="block max-w-lg py-2 pl-5 pr-10 m-auto mt-5 text-sm font-bold text-center text-white uppercase duration-300 button bg-coral hover:text-blue-400 hover:bg-blue-800 tranform" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php endif; ?>
      </div>
    </div>
  </div>

  <?php echo do_shortcode("[wpgmza id='1']"); ?>

  @endwhile
@endsection