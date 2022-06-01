<article @php(post_class())>
  <header>
    @include('partials/entry-meta')
  </header>

  <div class="entry-content cb">
    @php(the_content())
  </div>

</article>
