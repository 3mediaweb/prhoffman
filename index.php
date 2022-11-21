<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="be34f4c4-3f9f-4afd-9e80-91fb2c41ec95" data-blockingmode="auto" type="text/javascript"></script>
    <!-- Google tag (gtag.js) --> <script async src=https://www.googletagmanager.com/gtag/js?id=G-FNSHXF86K0></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-FNSHXF86K0'); </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/hyperscript.org@0.9.4"></script>
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />
    <?php wp_head(); ?>
  </head>

  <body class="font-sans test" <?php body_class('no-js'); ?> x-data="{ mobileNavOpen: false }">
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app">
      <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>
