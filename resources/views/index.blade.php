@extends('layouts.app')

@section('content')
<?php $bg = get_field('news_hero_image', 200); ?>
<section class="bg-center bg-cover h-[300px] md:h-[500px]" style="background-image: url(<?php echo $bg; ?>);">
  <div class="h-full bg-gradient-to-b from-black">
    <div class="h-full bg-no-repeat bg-contain" style="background-image: url(@asset('assets/images/product-hero-lineart.png')); background-size: 454px 338px;">
      <div class="px-5 <?php if (get_row_index() == 1 ) : ?>pt-32<?php else : ?>py-16<?php endif; ?> mx-auto max-w-7xl">
        <h1 class="text-white font-semibold uppercase text-[2.375rem] text-shadow border-l-4 border-coral pl-5 leading-tight">News</h1>
      </div>
    </div>
  </div>
</section>
<div class="border-purple border-b-[45px] md:border-b-[92px] w-full mb-10 md:mb-20"></div>


  <div class="px-5 mx-auto max-w-7xl">
  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif


  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
  @endwhile

  {!! get_the_posts_navigation() !!}

  </div>
@endsection
