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

function prhoffman_javascript() {
    ?>
<script>
window.addEventListener("load",e=>{const o=document.querySelector(".modal-content-group-chart");if(o){var n=document.getElementById("modal-content-chart"),t=document.getElementById("modal-control-chart"),c=document.getElementsByClassName("modal-close-chart")[0];t.onclick=function(){n.style.display="block"},c.onclick=function(){n.style.display="none"},window.onclick=function(e){e.target==n&&(n.style.display="none")}}const l=document.querySelector(".modal-content-group-brochure");if(l){var d=document.getElementById("modal-content-brochure"),a=document.getElementById("modal-control-brochure");c=document.getElementsByClassName("modal-close-brochure")[0],a.onclick=function(){d.style.display="block"},c.onclick=function(){d.style.display="none"},window.onclick=function(e){e.target==d&&(d.style.display="none")}}});
</script>

<?php
}
add_action('wp_footer', 'prhoffman_javascript');

function prhoffman_style() {
    ?>
<style>
.modal{display:none;position:fixed;z-index:1;padding-top:100px;left:0;top:0;width:100%;height:100%;overflow:auto;background-color:rgba(0,0,0,.4)}.sidebar-button-group{margin-top:22em;margin-bottom:3em}.sidebar-button-group a,.sidebar-button-group button{width:90%;margin:1em auto}a.button-style-link{color:#fff!important;display:inline-block;margin-top:4em}a.button-style-link:active,a.button-style-link:hover{text-decoration-line:none!important;border:none}.product-category-grid{display:grid;grid-gap:2.2rem;grid-template-columns:repeat(auto-fill,minmax(min(250px,100%),1fr))}.product-main-grid{display:grid;grid-gap:2.2rem;grid-template-columns:repeat(auto-fill,minmax(min(350px,100%),1fr))}.product-category-grid article{background:#f1f0f0;display:flex;flex-direction:column;overflow:hidden}.product-page-intro{color:#fff;padding:2rem 1rem}.product-page-intro h2{text-transform:uppercase}.product-page-intro p{margin:1.3rem 0;font-size:1.3rem}.product-page-intro span{color:#00aeef}.product-image{width:100%;padding:0;margin:0;background:#fff;min-height:300px;display:flex;justify-content:center;align-content:center}.product-detail-list{margin:1.2rem;list-style-type:none}.product-detail-list li::before{content:'\25a0';color:#00aeef;position:relative;top:-1px}a.product-link{margin-bottom:1.2rem;color:rgba(21,61,147,1)}.alignright{float:right;margin:1rem}.alignleft{float:left;margin:1rem}.md\:max-w-6xl{max-width:60rem;margin:auto}
</style>
<?php
}
add_action('wp_head', 'prhoffman_style');