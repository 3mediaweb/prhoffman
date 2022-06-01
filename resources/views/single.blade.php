@extends('layouts.app')

@include('partials.page-header')


@section('content')
<div class="max-w-5xl px-5 pt-10 pb-32 mx-auto">
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
  @endwhile
</div>
@endsection

