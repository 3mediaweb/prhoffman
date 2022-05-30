<article @php(post_class('pb-5 mb-5 border-b'))>
  <header>
    <h2 class="text-xl">
      <a class="text-coral" href="{{ get_permalink() }}">
        {!! $title !!}
      </a>
    </h2>
  </header>

  <div class="entry-summary">
    @php(the_excerpt())
  </div>
</article>
