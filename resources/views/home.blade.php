<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="icon" href="<%= BASE_URL %>favicon.ico">
  <title>QR Code Generator</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PSRP9PQ');</script>
  <!-- End Google Tag Manager -->

</head>

<!-- BODY options, add following classes to body to change options

  // Header options
  1. '.header-fixed'					- Fixed Header

  // Brand options
  1. '.brand-minimized'       - Minimized brand (Only symbol)

  // Sidebar options
  1. '.sidebar-fixed'					- Fixed Sidebar
  2. '.sidebar-hidden'				- Hidden Sidebar
  3. '.sidebar-off-canvas'		- Off Canvas Sidebar
  4. '.sidebar-minimized'			- Minimized Sidebar (Only icons)
  5. '.sidebar-compact'			  - Compact Sidebar

  // Aside options
  1. '.aside-menu-fixed'			- Fixed Aside Menu
  2. '.aside-menu-hidden'			- Hidden Aside Menu
  3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu

  // Breadcrumb options
  1. '.breadcrumb-fixed'			- Fixed Breadcrumb

  // Footer options
  1. '.footer-fixed'					- Fixed footer

  -->

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PSRP9PQ"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <noscript>
    <strong>We're sorry but this app doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
  </noscript>
  <div id="app">
    <v-app>
      <router-view></router-view>
    </v-app>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
