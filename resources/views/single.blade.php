@extends('layouts.app')

<?php $bg = get_field('news_hero_image', 200); ?>
<section class="bg-center bg-cover min-h-[225px]" <?php if ($bg) : ?>style="background-image: url(<?php echo $bg; ?>);"<?php endif; ?>>
  <div class="h-full bg-gradient-to-b from-black">
    <div class="h-full bg-no-repeat bg-contain" style="background-image: url(@asset('assets/images/product-hero-lineart.png')); background-size: 454px 338px;">
      <div class="px-5 <?php if (get_row_index() == 1 ) : ?>pt-32<?php else : ?>py-16<?php endif; ?> mx-auto max-w-7xl">
        <h1 class="text-white font-semibold uppercase text-3xl md:text-[2.375rem] text-shadow border-l-4 border-coral pl-5 leading-tight"><?php the_title(); ?></h1>
      </div>
    </div>
  </div>
</section>



@section('content')
<div class="px-5 pt-10 pb-32 mx-auto max-w-7xl">
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
  @endwhile
</div>
@endsection

