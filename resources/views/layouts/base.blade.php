<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  	<meta charset="utf-8" />

    <title>{{ Meta::get('title', 'DMusik | Music Free Streaming') }}</title>
  	
    @include('partials.meta')
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  	<link rel="stylesheet" href="/css/all.css" type="text/css" />
  	<link rel="stylesheet" href="/css/app.css" type="text/css" /> 

    @yield('css')

    <!--[if lt IE 9]>
    <script src="/js/ie/html5shiv.js"></script>
    <script src="/js/ie/respond.min.js"></script>
    <script src="/js/ie/excanvas.js"></script>
  	<![endif]-->
</head>
<body class="">
  
	@yield('body')

  <section id="slidepanel" class="cb_slide_panel vbox">
    <div class="slim-scroll" data-height="auto" data-disable-fade-out="false" data-distance="2" data-size="6px" data-railOpacity="0.2">
      <div class="inner"><div class="content"></div></div>
    </div>
  </section>
  
  <script src="/js/vendor.js"></script>

  <!-- App -->
  <script src="/js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="/js/infinitescroll/jquery.infinitescroll.min.js" ></script>  
  <script src="/js/app.plugin.js"></script>

  <script src="/js/app.js"></script>
  
  @yield('js')

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-59355601-1', 'auto');
    ga('send', 'pageview');

  </script>

</body>