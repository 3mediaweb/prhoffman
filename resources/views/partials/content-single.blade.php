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
    <div class="block px-5 py-1 mb-5 font-semibold text-white uppercase bg-coral">More Posts</div>
    <div class="grid grid-cols-2 gap-20 nxt_pre">
      <div>
        <?php previous_post_link('%link','Previous Post'); ?>
      </div>
      <div>
        <?php next_post_link('%link','Next Post'); ?>

      </div>
    </div>
  </div>
</article>