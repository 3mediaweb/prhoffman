<?php 
 $product_name = get_the_title();
 $product_slug = sanitize_title($product_name);
?>
<div class="pl-10 md:pl-20 md:w-2/3 pb-10">
    <h2
    class="text-purple text-2xl md:text-[2.375rem] uppercase font-semibold mb-4 pl-5 md:pl-10 border-l-4 border-coral pt-3">
    Capacity Chart - <?php echo $product_name ?></h2>
  
   <div class="relative mx-auto bg-white w-full  p-8 pt-10">
      <?php the_content(); ?>
    </div>
</div>
