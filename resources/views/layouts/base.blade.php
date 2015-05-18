<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  	<meta charset="utf-8" />

    <title>{{ Meta::get('title', 'Elearning System') }}</title>
  	
    @include('partials.meta')
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="stylesheet" href="/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="/css/font.css" type="text/css" />
    <link rel="stylesheet" href="/css/all.css" type="text/css" />  

    @yield('css')

    <!--[if lt IE 9]>
    <script src="/js/ie/html5shiv.js"></script>
    <script src="/js/ie/respond.min.js"></script>
    <script src="/js/ie/excanvas.js"></script>
  	<![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.13.0/react.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.13.0/JSXTransformer.js"></script>
    
</head>
<body class="">
  
	@yield('body')
  
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.js"></script>
  <!-- App -->
  <script src="/js/slimscroll/jquery.slimscroll.min.js"></script> 
  <script src="/js/app.plugin.js"></script>

  <script src="/js/app.js"></script>
  <script src="/js/all.js"></script>
  
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
</html>
