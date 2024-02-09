@extends('layouts.app')

@section('content')
<?php 
$product_cat = get_queried_object();
$product_cat_title = get_field('page_title', $product_cat);
$product_cat_intro = get_field('intro_text', $product_cat);

$bg = get_field('hero_image', $product_cat); 

?>
<section class="bg-center bg-cover h-[300px] md:h-[480px]" style="background-image: url(<?php echo $bg; ?>);">
  <div class="h-full bg-gradient-to-b from-black">
    <div class="h-full bg-no-repeat bg-contain">
      <div class="px-5 <?php if (get_row_index() == 1 ) : ?>pt-32<?php else : ?>py-16<?php endif; ?> mx-auto max-w-7xl">
        <h1 class="text-white font-semibold uppercase text-[2.375rem] text-shadow border-l-4 border-coral pl-5 leading-tight"><?php echo $product_cat_title  ?></h1>
       
      </div>
    </div>
  </div>
</section>
<div class="w-full" style="background-color: rgba(21, 61, 147, 1); padding: 3rem; margin: 0;">
<div class="px-5 mx-auto max-w-7xl product-page-intro">
    <h2><span>PR Hoffman |</span><?php echo $product_cat_title ?></h2>
    <p><?php echo $product_cat_intro ?></p>
</div>

  <div class="px-5 mx-auto max-w-7xl product-category-grid">

  @if (!have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif
  @php
  $term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
  $all_posts = new WP_Query([
    'post_type' => 'product',
    'orderby' => 'title',
    'order' => 'ASC',
    'nopaging' => true,
    'tax_query' => [
      [
        'taxonomy' => 'product-category',
        'field' => 'slug',
        'terms' => $term->slug,
      ],
    ],
  ]);
  
  @endphp
  @while($all_posts->have_posts()) @php($all_posts->the_post())
    @includeFirst(['partials.content-taxonomy-product-category-' . get_post_type(), 'partials.content-taxonomy-product-category'])
  @endwhile

 

  </div>
  <?php wp_reset_postdata(); ?>
  

@endsection
</div>