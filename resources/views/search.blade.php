@extends('layouts.app')

@section('content')
<section class="bg-center bg-cover h-[300px] md:h-[500px]" style="background-image: url(/wp-content/uploads/hero-company-1.jpg);">
    <div class="h-full bg-gradient-to-b from-black">
      <div class="h-full bg-no-repeat bg-contain" style="background-image: url(/wp-content/themes/prhoffman/public/assets/images/product-hero-lineart.png); background-size: 454px 338px;">
        <div class="px-5 pt-32 mx-auto max-w-7xl">
          <h1 class="text-white font-semibold uppercase text-[2.375rem] text-shadow border-l-4 border-coral pl-5 leading-tight">Search</h1>
        </div>
      </div>
    </div>
  </section>

  <div class="max-w-5xl px-5 pt-10 pb-10 mx-auto">
  {!! get_search_form(false) !!}
  @if (! have_posts())
    <div class="mt-10 mb-10 text-xl font-semibold">
      {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
    </div>
  @endif


  @while(have_posts()) @php(the_post())
  <div class="mt-10">
    @include('partials.content-search')
  </div>
  @endwhile

  {!! get_the_posts_navigation() !!}
  </div>
@endsection
