<article @php(post_class('flex flex-wrap mb-20 border-t border-coral'))>
  <div class="w-full md:w-[300px] lg:w-[500px]">
    @include('partials/entry-meta')
    <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail(); ?>
    <?php endif; ?>
  </div>

  <div class="w-full pt-5 md:px-10 md:pt-12 md:flex-1">
    <h2 class="text-[1.375rem] font-bold text-gray-900 uppercase">{!! $title !!}</h2>
    <?php if ( get_field('blog_subheading') ) : ?>
    <h3 class="font-semibold text-gray-600"><?php the_field('blog_subheading'); ?></h3>
    <?php endif; ?>
    <div class="mt-3 font-semibold text-gray-600 cb">
      @php(the_content())
    </div>
    <a class="inline-flex items-center justify-center px-5 py-3 leading-tight text-center text-sm uppercase border font-semibold border-[#BFC1C3] hover:border-gray-600 transform duration-300 hover:bg-coral hover:bg-opacity-50 hover:text-coral text-coral" href="{{ get_permalink() }}">Read Full Post</a>
  </div>
</article>
