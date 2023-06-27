<article @php(post_class('flex flex-wrap mb-20 border-t border-coral'))>
    <div class="w-full md:w-[300px] lg:w-[500px]">
        <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail(); ?>
        <?php endif; ?>
    </div>
    <div class="w-full pt-5 md:px-10 md:pt-12 md:flex-1">
        <?php 
	  	  $capacity_chart = get_field('capacity_chart_button');
		  if( $capacity_chart ): ?>
        <div class="pl-10 md:pl-20 border-t-[22px] border-coral pb-10">
            <div class="pr-5 text-base leading-6 text-gray-600 md:text-lg cb md:max-w-3xl md:pr-0">
                <?php
					  if( $capacity_chart ):
						  $capacity_chart_url = $capacity_chart['url'];
						  $capacity_chart_title = $capacity_chart['title'];
						  $capacity_chart_target = $capacity_chart['target'] ? $capacity_chart['target'] : '_self';
						  ?>
                <a class="button"
                   href="<?php echo esc_url( $capacity_chart_url ); ?>"
                   target="<?php echo esc_attr( $capacity_chart_target ); ?>"><?php echo esc_html( $capacity_chart_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="mt-3 font-semibold text-gray-600 cb">
            @php(the_content())
        </div>

        <div class="pl-10 md:pl-20 border-t-[22px] border-coral pb-10">
            <div class="pr-5 text-base leading-6 text-gray-600 md:text-lg cb md:max-w-3xl md:pr-0">
                <?php
              $form = get_field('product_brochure_form');
            if( $form ): ?>
                <button _="
                on click
                  wait 0.1s then send open to #form"
                        class="bg-[#BFC1C3] button py-2 px-5 mt-5 inline-block text-white uppercase font-bold">Download
                    Brochure</button>
                <?php endif; ?>
            </div>
        </div>

        <div id="form<?php echo $product_slug; ?>"
             class="fixed top-0 bottom-0 left-0 right-0 z-50 hidden pt-24 bg-black modal bg-opacity-70"
             _="on open
            remove .hidden
          on close or keyup[key is 'Escape'] from <body/>
            trigger hidden
            wait 0.1s then add .hidden
          end">
            <div class="relative max-w-[510px] mx-auto bg-white w-full border-[3px] border-coral rounded-md p-8 pt-10">
                <button class="absolute top-[20px] right-[20px]"
                        _="on click send close to #form<?php echo $product_slug; ?>">
                    <svg width="20"
                         height="20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="m17.411 0-7.399 7.399L2.589 0 0 2.589l7.424 7.399L0 17.411 2.589 20l7.423-7.424L17.411 20 20 17.411l-7.399-7.423L20 2.589z"
                              fill="#000"
                              fill-rule="nonzero" />
                    </svg>
                </button>
                <?php gravity_form( $form['id'], true, true, false, '', true, 1 ); ?>
                <div
                     class="hidden w-[30px] h-[30px] border-l-[3px] border-b-[3px] border-blue-500 rotate-45 transform rounded-b-md rounded-l-md absolute bottom-0 top-[100px] left-[-18px] bg-white">
                </div>
            </div>
        </div>
    </div>

</article>

<article>
    <?php if( have_rows('product_info_section') ): ?>
    <?php while( have_rows('product_info_section') ): the_row();
          $heading = get_sub_field('section_heading');
          $heading_slug = sanitize_title($heading);
        ?>
    <div class="flex flex-wrap mb-10">
        <div class="w-full">
            <button class="flex items-center w-full px-5 py-2 text-base font-bold text-white uppercase md:text-lg bg-coral"
                    _="
                on click toggle .hidden on #heading-<?php echo $product_slug; ?>-<?php echo $heading_slug; ?>
                on click toggle .info-open on #icon-<?php echo $product_slug; ?>-<?php echo $heading_slug; ?>
              ">
                <span class="mr-4"
                      id="icon-<?php echo $product_slug; ?>-<?php echo $heading_slug; ?>"><svg
                         xmlns="http://www.w3.org/2000/svg"
                         width="22.46"
                         height="22.066">
                        <g id="Group_50"
                           data-name="Group 50"
                           transform="translate(-676.199 -1702.04)"
                           fill="none"
                           stroke="#fff"
                           stroke-width="1">
                            <path id="Line_17"
                                  data-name="Line 17"
                                  transform="rotate(90 -505.224 1203.383)"
                                  d="M0 0h15" />
                            <g id="Group_49"
                               data-name="Group 49">
                                <path id="Line_18"
                                      data-name="Line 18"
                                      transform="rotate(90 -512.474 1211.133)"
                                      d="M0 0v17" />
                                <path id="Line_19"
                                      data-name="Line 19"
                                      transform="rotate(45 -1716.694 1667.868)"
                                      d="M0 0h30" />
                            </g>
                        </g>
                    </svg></span>
                <span><?php echo $heading; ?></span>
            </button>

            <?php if( have_rows('content') ): ?>
            <div id="heading-<?php echo $product_slug; ?>-<?php echo $heading_slug; ?>"
                 class="hidden">
                <?php while( have_rows('content') ): the_row(); ?>

                <?php if( get_row_layout() == 'text' ): ?>
                <div class="p-10 py-10 text-lg leading-6 text-gray-600 cb md:pl-20 md:max-w-3xl">
                    <?php the_sub_field('text'); ?>
                </div>

                <?php elseif( get_row_layout() == 'image' ):
                  	$image = get_sub_field('image');
                  	$alignment = get_sub_field('image_alignment');
                  	$size = 'full';
                  ?>
                <figure>
                    <?php if( $image && $alignment == "right" ) : ?>
                    <div class="max-w-5xl">
                        <?php echo wp_get_attachment_image( $image, $size, "", array( "class" => "lg:w-[400px] lg:float-right lg:pl-5 mb-5 mt-10 px-10" ) ); ?>
                    </div>
                    <?php else : ?>
                    <?php echo wp_get_attachment_image( $image, $size ); ?>
                    <?php endif; ?>
                </figure>

                <?php elseif( get_row_layout() == 'video_embed' ): ?>
                <div class="aspect-w-16 aspect-h-9">
                    <?php echo the_sub_field('video_embed'); ?>
                </div>

                <?php elseif( get_row_layout() == 'button' ): ?>
                <?php
                  $link = get_field('button');
                  if( $link ):
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                <a class="button"
                   href="<?php echo esc_url( $link_url ); ?>"
                   target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</article>