@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())
<?php if( have_rows('home_content') ): ?>
<?php while( have_rows('home_content') ): the_row(); ?>
<?php if( get_row_layout() == 'parallax_group' ): ?>
<div class="relative overflow-hidden min-h-[500px]">
    <div class="py-20 md:h-[60vh] min-h-[400px] md:min-h-[500px] relative">
        <div class="absolute top-0 left-0 w-full h-full poly-clip">
            <div class="will-change-transform h-[400px] z-10 absolute top-0 w-full opacity-90"
                 style="background-image: linear-gradient(to top,rgba(13,22,35,0),#0d1623);"></div>
            <div class="will-change-transform fixed top-0 left-0 block w-full h-full bg-center bg-purple z-[1] parallax-image-holder"
                 style="background-image: url('<?php the_sub_field('pg_top_image'); ?>'); background-size: cover"></div>
            <div class="relative z-10 px-5 pt-40 m-auto will-change-transform max-w-7xl">
                <?php if (get_sub_field('make_h1')) : ?><h1><?php else : ?><h2><?php endif; ?>
                        <span
                              class="uppercase text-white text-2xl md:text-[2.375rem] text-shadow-lg leading-8 md:leading-10 pl-5 border-l-4 border-blue-300 inline-block font-semibold"><?php the_sub_field('pg_top_text'); ?></span>
                        <?php if (get_sub_field('make_h1')) : ?></h1><?php else : ?></h2><?php endif; ?>
            </div>
        </div>
    </div>
    <div class="relative py-10 text-white md:py-20">
        <div class="h-full overflow-hidden">
            <div class="absolute top-0 left-0 z-0 w-full h-full poly-clip">
                <div class="will-change-transform fixed top-0 block w-full h-full bg-center bg-cover bg-purple z-[-1] parallax-image-holder"
                     style="background-image: url('<?php the_sub_field('pg_bottom_image'); ?>');"></div>
            </div>
            <div class="relative h-full px-5 m-auto overflow-hidden max-w-7xl will-change-transform">
                <div class="uppercase text-white text-lg md:text-[1.3125rem] mb-2">
                    <?php the_sub_field('pg_bottom_small_heading'); ?>
                </div>
                <span class="inline-block w-10 h-[4px] bg-blue-500 mb-5"></span>
                <div class="relative md:pr-44 md:pl-28">
                    <h2 class="mb-8 text-2xl md:text-3xl text-semibold"><?php the_sub_field('pg_bottom_heading'); ?>
                    </h2>
                    <div class="text-xl md:text-[1.375rem] mb-10"><?php the_sub_field('pg_bottom_text'); ?></div>
                    <div class="grid max-w-2xl grid-cols-2 gap-x-2">
                        <?php
                    $link = get_sub_field('pg_bottom_button_1');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="inline-flex items-center justify-center px-5 py-3 leading-tight text-center text-sm uppercase border font-semibold border-white hover:border-coral transform duration-300 hover:bg-coral hover:bg-opacity-50 hover:text-[#253f8f] max-w-[200px]"
                           href="<?php echo esc_url( $link_url ); ?>"
                           target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
                        <?php endif; ?>

                        <?php
                    $link = get_sub_field('pg_bottom_button_2');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="inline-flex px-5 items-center justify-center text-center leading-tight py-1 text-sm uppercase border font-semibold hover:bg-blue-800 border-transparent transform duration-300 bg-coral hover:text-blue-400  max-w-[200px]"
                           href="<?php echo esc_url( $link_url ); ?>"
                           target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php elseif( get_row_layout() == 'text_image_cta' ): ?>
<div class="grid grid-cols-1 md:grid-cols-2">
    <div class="flex flex-wrap">
        <div
             class="w-full lg:w-1/2 py-10 px-5 text-lg md:text-[1.375rem] leading-loose text-gray-600 flex justify-end pr-10 pl-5">
            <div class="lg:max-w-[325px]"><?php the_sub_field('tic_intro_text'); ?></div>
        </div>
        <div class="w-full text-white bg-center md:bg-right bg-no-repeat <?php if ( get_sub_field('tic_image_cover') ) : ?>bg-cover <? else : ?>bg-contain <?php endif; ?> lg:w-1/2 h-[300px] lg:h-auto"
             style="background-image: url('<?php the_sub_field('tic_image'); ?>');"></div>
    </div>
    <div class="flex flex-col justify-center px-5 py-5 text-white md:py-0 lg:px-32 bg-coral">
        <div class="max-w-[535px]">
            <div class="mb-16 text-xl uppercase md:text-3xl">
                <?php the_sub_field('tic_cta_text'); ?>
            </div>
            <?php
              $link = get_sub_field('tic_cta_link');
              if( $link ):
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
            <a class="flex text-sm uppercase"
               href="<?php echo esc_url( $link_url ); ?>"
               target="<?php echo esc_attr( $link_target ); ?>">
                <div class="mr-2">
                    <?php echo esc_html( $link_title ); ?>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         width="120.93"
                         height="15.937">
                        <path data-name="Path 3"
                              d="M0 15.437h119l-27-15"
                              fill="none"
                              stroke="#fff" />
                    </svg>
                </div>
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php elseif( get_row_layout() == 'text' ): ?>
<div class="grid grid-cols-1 md:grid-cols-2">
    //this is mine
</div>

<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
@endwhile
@endsection