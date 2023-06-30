<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Run The Theme
|--------------------------------------------------------------------------
|
| Once we have the theme booted, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

require_once __DIR__ . '/bootstrap/app.php';

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}


function switcher_style() {
    ?>
<style>.product-category-grid{display:grid;grid-gap:2.2rem;grid-template-columns:repeat(auto-fill,minmax(min(250px,100%),1fr))}.product-category-grid article{background:#f1f0f0;display:flex;flex-direction:column;overflow:hidden}.product-page-intro{color:#fff;padding:2rem 1rem}.product-page-intro h2{text-transform:uppercase}.product-page-intro p{margin:1.3rem 0;font-size:1.3rem}.product-page-intro span{color:#00aeef}.product-image{width:100%;padding:0;margin:0;background:#fff;min-height:300px;display:flex;justify-content:center;align-content:center}.product-detail-list{margin:1.2rem;list-style-type:none}.product-detail-list li::before{content:"\25a0";color:#00aeef;position:relative;top:-1px}a.product-link{margin-bottom:1.2rem;color:rgba(21,61,147,1)}
</style>
<?php
}
add_action('wp_head', 'switcher_style');