<!doctype html>
<html ng-app="app">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="/css/vendor.css">
	<link rel="stylesheet" href="/css/all.css">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body layout="column">


	<div ui-view></div>

	<script src="/js/vendor.js"></script>
	<script src="/js/app.js"></script>
</body>
</html>
